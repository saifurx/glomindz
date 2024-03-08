<?php
class Invoices_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_invoices(){
		$table_invoice=TABLE_PREFIX."_invoice_master";
		$table_customer=TABLE_PREFIX."_customer_database";
		$table_order_master=TABLE_PREFIX."_order_master";
		$data=array();
		$data['error']='';
		$tables="$table_invoice invoice, $table_customer customer, $table_order_master orders";
		$where="where invoice.order_id=orders.id and orders.customer_id=customer.id and invoice.status='Open'";
		$query="SELECT invoice.order_id,customer.company,customer.name,customer.mobile,orders.booking_station,invoice.devilery_date,invoice.despatch_through FROM $tables  $where";
		//echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_invoices_data(){
		$table_invoice=TABLE_PREFIX."_invoice_master";
		$data=array();
		$data['error']='';
		$order_id=$_POST['order_id'];
		$query="SELECT * FROM $table_invoice where order_id=$order_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function update_stock_master_from_sale($order_id){
		$is_stock_update=true;
		$today= date("Y-m-d");
		$table_order_item_list=TABLE_PREFIX."_order_item_list";
		$table_price_master=TABLE_PREFIX."_price_master";
		$table_package_master=TABLE_PREFIX."_package_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_order_master=TABLE_PREFIX."_order_master";

		$user_id = Session::get('user_id');


		if($this->is_order_possible($order_id)){
			$where=" where items.order_id=$order_id and price.id=items.price_id and price.package_id=package.id and product.id=price.product_id and price.status=1 and om.id=$order_id";
			$query="SELECT om.booking_station, product.name, items.quantity, price.id price_id, price.product_id, price.package_id, price.unit_price, package.quantity_in_box,package.volume, package.type  FROM $table_order_item_list items, $table_price_master price, $table_package_master package,$table_product_master product,$table_order_master om  $where";
			$sth = $this->db->prepare($query);
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$sth->execute();
			$result = $sth->fetchAll();

			foreach ($result as $row){
				$product_id=$row['product_id'];
				$package_id =$row['package_id'];
				$quantity=$row['quantity'];
				$data_stock=array();
				$data_stock['product_id']=$product_id;
				$data_stock['package_id']=$package_id;
				$data_stock['quantity']=$quantity;
				$data_stock['booking_station']=$row['booking_station'];
				$stocks =$this->check_stock_availibility($data_stock);
				if($stocks==0){
					$is_stock_update= false;
				}else{
					foreach ($stocks as $value){
						$data=array();
						$data['product_id'] = $product_id;
						$data['package_id'] = $package_id;
						$data['batch_id'] = $value['batch_id'];
						$data['batch_no'] = $value['batch_no'];
						$data['mfg_date'] = $value['mfg_date'];
						$data['exp_date'] = $value['exp_date'];
						$data['location'] = $value['location'];
						$data['quantity'] = $value['quantity'];
						$data['transaction_date'] =$today ;
						$data['transaction_reference_no'] = $order_id;
						$data['transaction_type'] = 'Sale';
						$data['remarks'] = 'System';
						$data['user_id'] = $user_id;
						$this->add_stock_ledger($data);
					}
				}
			}

		}
			

		return $is_stock_update;
	}
	public function add_stock_ledger($data){
		$result=array();
		$table_stock_ledger=TABLE_PREFIX."_stock_ledger";
		$this->db->insert($table_stock_ledger,$data);
		$ledger_id = $this->db->lastInsertId();
		if($ledger_id<=0){
			$data['error']='Error inserting stock ledger';
			echo $data['error'];
		}else{
			$data['ledger_id'] = $ledger_id;
			$data['quantity'] =$data['quantity'];
			$result =$this->update_stock_master($data);
		}
		return $result;
	}
	public function update_stock_master($data){
		$table_stock_master=TABLE_PREFIX."_stock_master";
		$error='';
		$product_id = $data['product_id'];
		$package_id = $data['package_id'];
		$batch_no = $data['batch_no'];
		$batch_id = $data['batch_id'];
		$location = $data['location'];
		$mfg_date=$data['mfg_date'];
		$exp_date=$data['exp_date'];
		$transaction_type =$data['transaction_type'];
		$quantity =$data['quantity'];
		$user_id= $data['user_id'];
		$data_sm=array();
		$data_sm['product_id'] = $product_id;
		$data_sm['package_id'] = $package_id;
		$data_sm['quantity'] = $quantity;
		$data_sm['transaction_type'] = $transaction_type;
		$data_sm['location'] = $location;
		$data_sm['user_id'] = $user_id;
		$data_sm['batch_id'] = $batch_id;
		$data_sm['batch_no'] = $batch_no;
		$data_sm['mfg_date'] = $mfg_date;
		$data_sm['exp_date'] = $exp_date;

		$query="SELECT id, available_unit FROM $table_stock_master where product_id=$product_id and package_id=$package_id and location='$location' and batch_id='$batch_id' and batch_no=$batch_no";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		$count =  $sth->rowCount();
		//$error =$count;
		if($count == 1){
			$id =$result[0]['id'];
			$available_unit =$result[0]['available_unit'];
			if($transaction_type=='Sale'){
				$available_unit = intval($available_unit)-intval($quantity);
				$query="UPDATE $table_stock_master  SET available_unit=$available_unit, transaction_type='$transaction_type',user_id=$user_id,exp_date='$exp_date',mfg_date='$mfg_date' where id=$id";
				$sth = $this->db->prepare($query);
				$sth->execute();
			}
		}else{
			$error ='Multiple row error in stock ledger';

		}
		$data_sm['error']=$error;
		return $data_sm;
	}
	public function save_invoice(){
		$data=array();
		$error='';
		$today= date("Y-m-d");
		$data['status']='Open';
		$data['user_id']=Session::get('user_id');
		$data['order_id']=$_POST['order_id'];
		$data['devilery_date']=$_POST['devilery_date'];
		$data['despatch_no']=$_POST['despatch_no'];
		$data['despatch_date']=$_POST['despatch_date'];
		$data['despatch_through']=$_POST['despatch_through'];
		$data['devilery_terms']=$_POST['devilery_terms'];
		$data['destination']=$_POST['destination'];
		$customer_id=$_POST['customer_id'];

		$table_customer_master=TABLE_PREFIX."_customer_database";
		$table_customer_address=TABLE_PREFIX."_customer_address";

		$query="SELECT address.id  FROM $table_customer_master customer,$table_customer_address address where customer.id=$customer_id and customer.id=address.company_id and address.address_type='Billing'";

		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result=$sth->fetchAll();
		$count=$sth->rowCount();
		if($count==1){
			$data['customer_address_id']=$result[0]['id'];
		}


		$data['challan_date']=$today;
		$data['invoice_date']=$today;
		try {
			$this->db->beginTransaction();
			$is_stock_update=$this->update_stock_master_from_sale($data['order_id']);
			if($is_stock_update){
				$table_invoice_master=TABLE_PREFIX.'_invoice_master';
				$this->db->insert($table_invoice_master,$data);
				$invoice_id =$this->db->lastInsertId();
				if($invoice_id>0){
					$this->close_order($data['order_id']);
				}
			}else{
				$error="Problem in generation invoice.";
			}
			$this->db->commit();
		} catch (Exception $e) {
			$error="Problem in generation invoice.";
			$this->db->rollback();
		}
		$data['error']=$error;
		echo json_encode($data);
	}
	function close_order($order_id){
		$data['status']='Closed';
		$where="id=$order_id";
		$table_order_master=TABLE_PREFIX.'_order_master';
		$this->db->update($table_order_master,$data,$where);

	}

	function get_ordered_product_list_print_invoice($order_id){
		$return_array=array();
		$error='';
		$table_order_item_list=TABLE_PREFIX."_order_item_list";
		$table_price_master=TABLE_PREFIX."_price_master";
		$table_package_master=TABLE_PREFIX."_package_master";
		$table_product_master=TABLE_PREFIX."_product_master";

		$where=" where items.order_id=$order_id and price.id=items.price_id and price.package_id=package.id and product.id=price.product_id and price.status=1";
		$query="SELECT product.name, items.quantity, price.id price_id, price.product_id, price.package_id,price.mrp, price.unit_price, package.quantity_in_box,package.volume, package.type  FROM $table_order_item_list items, $table_price_master price, $table_package_master package,$table_product_master product  $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		//$return_array['error']=$query;
		$count=0;
		foreach ($result as $row){
			$data=array();
			$product_id=$row['product_id'];
			$package_id =$row['package_id'];
			$price_id =$row['price_id'];
			$quantity=$row['quantity'];

			$data['price_id']=$price_id;
			$data['product_id']=$product_id;
			$data['package_id']=$package_id;
			$data['quantity']=$quantity;

			$data['stocks'] =$this->get_stock_detsils_print($product_id,$order_id);

			$data['quantity_in_box']=$row['quantity_in_box'];
			$data['unit_price']=$row['unit_price'];
			$data['name']=$row['name'];
			$data['volume']=$row['volume'];
			$data['type']=$row['type'];
			$data['mrp']=$row['mrp'];
			$return_array[$count]=$data;
			$count++;

		}

		echo json_encode($return_array);

	}
	function  get_stock_detsils_print($product_id,$order_id){
		$return_array=array();
		$table_stock_ledger=TABLE_PREFIX."_stock_ledger";
		$query="SELECT id,location,batch_id,batch_no,exp_date,mfg_date,quantity FROM $table_stock_ledger where product_id=$product_id and transaction_type='Sale' and transaction_reference_no=$order_id order by batch_no";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		$count =  $sth->rowCount();
		foreach ($result as $row){
			$data=array();
			$stock_id=$row['id'];
			$data['stock_id']=$stock_id;
			$data['batch_id']=$row['batch_id'];
			$data['batch_no']=$row['batch_no'];
			$data['location']=$row['location'];
			$data['exp_date']=$row['exp_date'];
			$data['mfg_date']=$row['mfg_date'];
			$data['quantity_from_batch']=$row['quantity'];;

			$return_array[$stock_id]=$data;

		}
		return $return_array;
	}
	function get_ordered_product_list($order_id){
		$return_array=array();
		$error='';
		$table_order_item_list=TABLE_PREFIX."_order_item_list";
		$table_price_master=TABLE_PREFIX."_price_master";
		$table_package_master=TABLE_PREFIX."_package_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_order_master=TABLE_PREFIX."_order_master";

		$where=" where items.order_id=$order_id and price.id=items.price_id and price.package_id=package.id and product.id=price.product_id and price.status=1 and om.id=$order_id";
		$query="SELECT product.name, items.quantity, price.id price_id, price.product_id, price.package_id,price.mrp, price.unit_price, package.quantity_in_box,package.volume, package.type, om.booking_station  FROM $table_order_item_list items, $table_price_master price, $table_package_master package,$table_product_master product,$table_order_master om  $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		//$return_array['error']=$query;
		$count=0;
		foreach ($result as $row){
			$data=array();
			$product_id=$row['product_id'];
			$package_id =$row['package_id'];
			$price_id =$row['price_id'];
			$quantity=$row['quantity'];
			$booking_station=$row['booking_station'];

			$data['price_id']=$price_id;
			$data['product_id']=$product_id;
			$data['package_id']=$package_id;
			$data['quantity']=$quantity;
			$data['booking_station']=$booking_station;

			$data['stocks'] =$this->check_stock_availibility($data);

			$data['quantity_in_box']=$row['quantity_in_box'];
			$data['unit_price']=$row['unit_price'];
			$data['name']=$row['name'];
			$data['volume']=$row['volume'];
			$data['type']=$row['type'];
			$data['mrp']=$row['mrp'];
			$return_array[$count]=$data;
			$count++;

		}

		echo json_encode($return_array);

	}

	function get_pending_orders(){


		$table_order_master=TABLE_PREFIX."_order_master";
		$result=array();
		$tables =TABLE_PREFIX.'_order_master orders, '.TABLE_PREFIX.'_customer_database customer';
		$where="orders.customer_id = customer.id and orders.status='Open' order by orders.last_update";
		$query="SELECT *,orders.id order_id FROM $tables  where $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();

		foreach ($data as &$value){
			$order_id=$value['order_id'];
			$is_order_possible=$this->is_order_possible($order_id);
			$value['is_order_possible']=$is_order_possible;

		}
		echo json_encode($data);
	}
	function is_order_possible($order_id){

		$table_order_item_list=TABLE_PREFIX."_order_item_list";
		$table_price_master=TABLE_PREFIX."_price_master";
		$table_package_master=TABLE_PREFIX."_package_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_order_master=TABLE_PREFIX."_order_master";

		$where=" where items.order_id=$order_id and price.id=items.price_id and price.package_id=package.id and product.id=price.product_id and price.status=1 and om.id=$order_id";
		$query="SELECT product.name, items.quantity, price.id price_id, price.product_id, price.package_id, price.unit_price, package.quantity_in_box,package.volume, package.type,om.booking_station  FROM $table_order_item_list items, $table_price_master price, $table_package_master package,$table_product_master product,$table_order_master om  $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();

		foreach ($result as $row){
			$data=array();

			$product_id=$row['product_id'];
			$package_id =$row['package_id'];
			$quantity=$row['quantity'];
			$booking_station=$row['booking_station'];
				
			$data['product_id']=$product_id;
			$data['package_id']=$package_id;
			$data['quantity']=$quantity;
			$data['booking_station']=$booking_station;
			$stocks =$this->check_stock_availibility($data);
			if($stocks==0){
				return false;
			}

		}

		return true;
	}

	function check_stock_availibility($data_array){
		$product_id=$data_array['product_id'];
		$package_id =$data_array['package_id'];
		$quantity=$data_array['quantity'];
		$booking_station=$data_array['booking_station'];
		$return_array=array();
		$table_stock_master=TABLE_PREFIX."_stock_master";
		$query="SELECT id, available_unit,location,batch_id,batch_no,exp_date,mfg_date FROM $table_stock_master where product_id=$product_id and package_id=$package_id and location ='$booking_station' order by batch_no";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		$count =  $sth->rowCount();
		foreach ($result as $row){
			$data=array();
			$available_unit =$row['available_unit'];
			$stock_id=$row['id'];
			$data['stock_id']=$stock_id;
			$data['batch_id']=$row['batch_id'];
			$data['batch_no']=$row['batch_no'];
			$data['location']=$row['location'];
			$data['exp_date']=$row['exp_date'];
			$data['mfg_date']=$row['mfg_date'];
			$data['product_id']=$product_id;
			$data['package_id']=$package_id;
			$data['quantity_order']=$quantity;
			if($quantity!=0){
				if(intval($available_unit)>=intval($quantity)){
					$data['quantity']=$quantity;
					$quantity=0;
					$return_array[$stock_id]=$data;
				}else{
					$quantity=intval($quantity) -intval($available_unit);
					$data['quantity']=$available_unit;
					$return_array[$stock_id]=$data;
				}
			}
		}
		if(intval($quantity)!=0){
			$return_array=0;
		}
		return $return_array;
	}

	public function search_invoices($search_query){
		$data=array();
		$query="SELECT * FROM spl_customer_database customer, spl_invoice_master invoice, spl_customer_address address WHERE customer.company LIKE  '%$search_query%' AND customer.id = address.company_id AND address.address_type =  'Billing' AND invoice.customer_address_id = address.id LIMIT 0 , 30";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_order_products_footer($order_id){
		$result=array();
		$table_order_tax_discount=TABLE_PREFIX.'_order_tax_discount';
		$table_tax_master=TABLE_PREFIX.'_tax_master';
		$table_customer_discount_master=TABLE_PREFIX.'_customer_discount_master';
		$table_sale_ledger=TABLE_PREFIX.'_sale_ledger';

		$query="SELECT otd.id, otd.order_id, otd.tax_discount_id, otd.type, tm.name, tm.percentage FROM  $table_order_tax_discount otd, $table_tax_master tm WHERE otd.tax_discount_id = tm.id and otd.order_id = $order_id UNION ";
		$query=$query." SELECT otd.id, otd.order_id, otd.tax_discount_id, otd.type, dm.name, dm.percentage FROM  $table_order_tax_discount otd, $table_customer_discount_master dm WHERE otd.tax_discount_id = dm.id and otd.order_id = $order_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		$tax='';
		$discount='';
		foreach ($data as $row){

			$type =$row['type'];

			if($type=='Discount'){
				$discount=$row['name'].','.$discount;
			}

			if($type=='Tax'){
				$tax=$row['name'].', '.$tax;
			}
		}
		$result['tax']=$tax;
		$result['discount']=$discount;

		$query="SELECT * FROM  $table_sale_ledger where order_id = $order_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		foreach ($data as $row){
			$result['total_amount']=$row['total_amount'];
			$result['discount_amount']=$row['discount_amount'];
			$result['tax_amount']=$row['tax_amount'];
			$result['round_off']=$row['round_off'];
			$result['bill_amount']=$row['bill_amount'];
			$result['last_update']=$row['last_update'];
		}
		echo json_encode($result);
	}
}