<?php

class Orders_Model extends Model {

	public function __construct() {
		parent::__construct();
		Session::init();
	}
	public function check_duplicate_products($price_id,$order_id){
		$table_order_item=TABLE_PREFIX.'_order_item_list';
		$query="SELECT * from $table_order_item where order_id=$order_id and price_id=$price_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		return $sth->rowCount();
	}
	public function add_cart(){
		$table_product=TABLE_PREFIX."_product_master";
		$table_price=TABLE_PREFIX."_price_master";
		$table_package=TABLE_PREFIX."_package_master";
		$table_customer_master=TABLE_PREFIX."_customer_database";
		$tables= "$table_product product, $table_package package, $table_price price,$table_customer_master customer";
		$data=array();
		$error='';
		$data['order_id'] = $_POST['order_id'];
		$package_id=$_POST['package_id'];
		$product_id=$_POST['product_id'];
		$product_name=$_POST['product_name'];
		$customer_id=$_POST['customer_id'];


		$where ="where product.id=$product_id and price.product_id=$product_id and package.id=$package_id and price.package_id=$package_id and price.package_id=$package_id and price.customer_type=customer.customer_type and price.status=1 and customer.id=$customer_id";
		//$query="SELECT price.id as price_id FROM $table_product product, $table_package package, $table_price price where product.short_code='$shot_code' and package.id=$package_id and price.package_id=$package_id and price.customer_type='$customer_type' and price.status=1";
		$query="SELECT price.id as price_id,price.unit_price as unit_price,package.quantity_in_box as quantity_in_box,customer.customer_type FROM $tables $where";
		//echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result=$sth->fetchAll();
		$count =  $sth->rowCount();

		if($count == 1){
			$data['quantity'] = $_POST['quantity'];
			$data['price_id']=$result[0]['price_id'];

			$return =$this->check_duplicate_products($data['price_id'],$data['order_id']);
			if($return>0){
				$error='Product already in the order list.Please delete the old product.';

			}else{
				$order_item_id= $this->insert_order_item($data);
				if($order_item_id==0){
					$error='Error in adding product.';
				}
				$data['order_item_id']=$order_item_id;
				$data['unit_price']=$result[0]['unit_price'];
				$data['quantity_in_box']=$result[0]['quantity_in_box'];
				$data['customer_type']=$result[0]['customer_type'];
			}


		}else{
			$error='No Price set for this product';

		}
		//$data['shot_code']=$shot_code;
		$data['product_id']=$product_id;
		$data['package_id']=$package_id;
		$data['product_name']=$product_name;
		$data['product_name']=$product_name;
		$availibility =$this->check_availibility_loc($product_id,$package_id);
		$data['error']=$error;
		array_push($data,$availibility);


		echo json_encode($data);
	}

	public function insert_order_item($data){
		$table_order_item=TABLE_PREFIX.'_order_item_list';


		$this->db->insert($table_order_item,$data);
		return $this->db->lastInsertId();
	}
	function check_availibility_loc($product_id,$package_id){

		$return_array=array();
		$table_stock_master=TABLE_PREFIX."_stock_master";
		$query="SELECT SUM(available_unit) as availibility,location FROM $table_stock_master where product_id=$product_id and package_id=$package_id GROUP BY location";

		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		foreach ($result as $row){
			$key =$row['location'];
			$return_array['availibility'.$key]=$row['availibility'];
		}
		return $return_array;
	}

	public function save_order(){
		$error='';
		try {
			$this->db->beginTransaction();

			$data=array();
			$data['status']='Open';
			$data['user_id']=Session::get('user_id');
			$data['customer_id']=$_POST['customer_id'];
			$data['prefered_delivery_date'] = $_POST['prefered_delivery_date'];
			$data['reference'] = $_POST['reference'];
			$data['prefered_payment']= $_POST['prefered_payment'];
			$data['booking_station']= $_POST['booking_station'];
			$data['prefered_transport']= $_POST['prefered_transport'];
			$data['terms_of_delivery']= $_POST['terms_of_delivery'];
			$data['discount_request']= $_POST['discount_request'];
			$order_id=$_POST['order_id'];
			//$data['order_id']=$order_id;
			$where="id=$order_id";
			$table_order_master=TABLE_PREFIX.'_order_master';
			$this->db->update($table_order_master,$data,$where);



			$table_order_tax_discount=TABLE_PREFIX.'_order_tax_discount';

			$query="DELETE FROM $table_order_tax_discount WHERE order_id = $order_id";
			$sth = $this->db->prepare($query);
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$sth->execute();

			$discount_ids = json_decode($_POST['discount_ids']);
			$tax_ids= json_decode($_POST['tax_ids']);
			if(isset($discount_ids)){
				foreach ($discount_ids as $discount_id){
					$data =array();
					$data['order_id'] =$order_id;
					$data['tax_discount_id'] =$discount_id;
					$data['type'] ='Discount';
					$this->db->insert($table_order_tax_discount,$data);
					$this->db->lastInsertId();
				}
			}
			if(isset($tax_ids)){
				foreach ($tax_ids as $tax_id){
					$data_tax =array();
					$data_tax['order_id'] =$order_id;
					$data_tax['tax_discount_id'] =$tax_id;
					$data_tax['type'] ='Tax';
					$this->db->insert($table_order_tax_discount,$data_tax);
					$this->db->lastInsertId();
				}
			}

			$data_sales=array();
			$data_sales['order_id']=$order_id;
			$data_sales['customer_id']=$_POST['customer_id'];
			$data_sales['total_amount']=$_POST['total_amount'];
			$data_sales['discount_amount']=$_POST['discount_amount'];
			$data_sales['tax_amount']=$_POST['tax_amount'];
			$data_sales['round_off']=$_POST['round_off'];
			$data_sales['bill_amount']=$_POST['bill_amount'];

			$this->insert_sale_ledger($data_sales);

			$this->db->commit();
		} catch (Exception $e) {
			$error="Problem in Saving order.";
			$this->db->rollback();
		}
		echo $error;
	}

	function insert_sale_ledger($data){
		$order_id=$data['order_id'];
		$table_sale_ledger=TABLE_PREFIX.'_sale_ledger';
		$query="SELECT * FROM $table_sale_ledger WHERE id = $order_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$count=$sth->rowCount();
		if($count==1){
			$where="id=".$order_id;
			$this->db->update($table_sale_ledger,$data,$where);
		}else{
			$this->db->insert($table_sale_ledger,$data);
		}

	}

	public function get_order_preview(){
		$order_id = $_POST['order_id'];
		$table_order_master=TABLE_PREFIX."_order_master";
		$table_customer_database=TABLE_PREFIX."_customer_database";
		$where="";
		$query="SELECT * FROM $table_order_master om, $table_customer_database cdb WHERE om.id = $order_id AND om.customer_id = cdb.id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	function delete_product_from_cart($id){
		$table_order_item=TABLE_PREFIX.'_order_item_list';
		$query="DELETE FROM $table_order_item WHERE id=$id";
		$sth = $this->db->prepare($query);
		$sth->execute();
		echo 'deleted';
	}

	public function search_order($search_query){
		$table_order_master=TABLE_PREFIX."_order_master";
		$data=array();
		$tables =TABLE_PREFIX.'_order_master orders, '.TABLE_PREFIX.'_customer_database customer';
		$where="orders.customer_id = customer.id and orders.status='Open' and customer.company like '%$search_query%' order by orders.last_update";
		$query="SELECT *,orders.id order_id FROM $tables  where $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function cancel_order($order_id){
		$table_order_item=TABLE_PREFIX.'_order_item_list';
		$table_order_master=TABLE_PREFIX."_order_master";
		$table_order_tax_discount=TABLE_PREFIX.'_order_tax_discount';

		$query="DELETE FROM $table_order_master WHERE id=$order_id";
		$sth = $this->db->prepare($query);
		$sth->execute();

		$query="DELETE FROM $table_order_item WHERE order_id=$order_id";
		$sth = $this->db->prepare($query);
		$sth->execute();

		$query="DELETE FROM $table_order_tax_discount WHERE order_id=$order_id";
		$sth = $this->db->prepare($query);
		$sth->execute();
	}

	public function get_product_list($order_id){
		$result=array();
		$table_order_item=TABLE_PREFIX.'_order_item_list';
		$table_product=TABLE_PREFIX."_product_master";
		$table_price=TABLE_PREFIX."_price_master";
		$table_package=TABLE_PREFIX."_package_master";
		$tables= "$table_order_item order_item, $table_product product, $table_package package, $table_price price";
		$where="where order_item.order_id=$order_id and price.id=order_item.price_id and package.id=price.package_id and price.product_id=product.id";
		$query="SELECT *,order_item.id as order_item_id FROM $tables $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		/* $count=0;
		 foreach ($data as $row){
		 $product_id=$row['product_id'];
		 $package_id=$row['package_id'];
		 $availibility =$this->check_availibility_loc($product_id,$package_id);
		 array_push($row,$availibility);
		 $result[$count]=$row;
		 } */
		echo json_encode($data);

	}
}