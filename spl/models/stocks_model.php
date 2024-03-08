<?php

class Stocks_Model extends Model {

	public function __construct() {
		parent::__construct();
		Session::init();
	}

	public function add_new_stock(){

		$table_stock_ledger=TABLE_PREFIX."_stock_ledger";

		$user_id = Session::get('user_id');
		$result=array();
		$data=array();
		$data['product_id'] = $_POST['product_id'];
		$data['package_id'] = $_POST['package_id'];
		$data['batch_id'] = $_POST['batch_id'];
		$data['batch_no'] = $_POST['batch_no'];
		$data['mfg_date'] = $_POST['mfg_date'];
		$data['exp_date'] = $_POST['exp_month'];
		$data['location'] = $_POST['location'];
		$data['transaction_date'] = $_POST['transaction_date'];
		$data['transaction_reference_no'] = $_POST['transaction_reference_no'];
		$data['quantity'] = $_POST['quantity'];
		$data['transaction_type'] = $_POST['transaction_type'];
		$data['remarks'] = $_POST['remarks'];
		$data['user_id'] = $user_id;
		$this->db->insert($table_stock_ledger,$data);

		$ledger_id = $this->db->lastInsertId();

		if($ledger_id<=0){
			$data['error']='Error inserting stock ledger';
			echo $data['error'];
		}else{
			$data['ledger_id'] = $ledger_id;
			$data['available_unit'] =$_POST['quantity'];
			$result =$this->update_stock_master($data);
		}
		echo json_encode($result);
	}
	public function add_stock_ledger($data){
		$result='';
		$ledger_id=0;
		$table_stock_ledger=TABLE_PREFIX."_stock_ledger";
		try{
			$this->db->insert($table_stock_ledger,$data);
			$ledger_id = $this->db->lastInsertId();
		}catch(PDOException $e)
		{
			$data['error']= "Error " . $e->getMessage();

		}
		if($ledger_id<=0){
			$data['error']='Error inserting stock ledger1';
			$result= $data['error'];
		}else{
			$data['ledger_id'] = $ledger_id;
			$data['available_unit'] =$data['quantity'];
			$result =$this->update_stock_master($data);
		}
		//echo json_encode($result);
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
		$data_sm['available_unit'] = $quantity;
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
			if($transaction_type=='Production'){
				$available_unit = intval($available_unit)+intval($quantity);
				$query="UPDATE $table_stock_master  SET available_unit=$available_unit, transaction_type='$transaction_type',user_id=$user_id,exp_date='$exp_date',mfg_date='$mfg_date' where id=$id";
				$sth = $this->db->prepare($query);
				$sth->execute();
			}
			if($transaction_type=='Transfer-in'){
				$available_unit = intval($available_unit)+intval($quantity);
				$query="UPDATE $table_stock_master  SET available_unit=$available_unit, transaction_type='$transaction_type',user_id=$user_id,exp_date='$exp_date',mfg_date='$mfg_date' where id=$id";
				$sth = $this->db->prepare($query);
				$sth->execute();
			}
			if($transaction_type=='Stock_correction'){
				$available_unit = intval($available_unit)-intval($quantity);
				if($available_unit==0){
					$query="DELETE FROM $table_stock_master where id=$id";
				}
				else{
					$query="UPDATE $table_stock_master  SET available_unit=$available_unit, transaction_type='$transaction_type',user_id=$user_id,exp_date='$exp_date',mfg_date='$mfg_date' where id=$id";
				}
				$sth = $this->db->prepare($query);
				$sth->execute();
			}
			if($transaction_type=='Transfer-out'){
				$available_unit = intval($available_unit)-intval($quantity);
				if($available_unit>0){
					if($location=='RD'){
						$data_sm['location'] ='GD';
					}else{
						$data_sm['location'] ='RD';
					}

					$data_sm['transaction_type'] ='Transfer-pending';
					$this->db->insert($table_stock_master,$data_sm);
					$stock_id = $this->db->lastInsertId();


					$query="UPDATE $table_stock_master  SET available_unit=$available_unit, transaction_type='$transaction_type',user_id=$user_id,exp_date='$exp_date',mfg_date='$mfg_date' where id=$id";
					$sth = $this->db->prepare($query);
					$sth->execute();

				}else if($available_unit==0){
					if($location=='RD'){
						$location ='GD';
					}else{
						$location ='RD';
					}

					$query="UPDATE $table_stock_master  SET available_unit=$quantity, transaction_type='Transfer-pending',location='$location' where id=$id";
					$sth = $this->db->prepare($query);
					$sth->execute();
				}else{
					$error='Stock not available for Transfer!';
				}
			}



		}else if($count == 0){
			if($transaction_type=='Transfer-out'){
				$error='Stock not available for Transfer!';
			}else{
				$data_sm['transaction_type'] =$transaction_type;
				$data_sm['location'] = $location;
				$this->db->insert($table_stock_master,$data_sm);
				$stock_id = $this->db->lastInsertId();
			}
			//echo 'stoct_master id--'.$stock_id;

		}else{
			$error ='Multiple row error in stock ledger';

		}
		$data_sm['error']=$error;
		return $data_sm;
	}
	public function recived_stock($stock_id){
		$data=array();
		$error='';
		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_stock_ledger=TABLE_PREFIX."_stock_ledger";
		$user_id = Session::get('user_id');


		$query="SELECT * FROM $table_stock_master where id=$stock_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		foreach ($result as $row){
			$product_id = $row['product_id'];
			$package_id = $row['package_id'];
			$batch_id = $row['batch_id'];
			$batch_no = $row['batch_no'];
			$mfg_date = $row['mfg_date'];
			$exp_date = $row['exp_date'];
			$location = $row['location'];
			$quantity = $row['available_unit'];

		}
		$data['product_id'] = $product_id;
		$data['package_id'] = $package_id;
		$data['batch_id'] = $batch_id;
		$data['batch_no'] = $batch_no;
		$data['mfg_date'] =$mfg_date;
		$data['exp_date'] = $exp_date;
		$data['location'] = $location;
		$data['quantity'] =$quantity;
		$data['transaction_type'] = 'Transfer-in';
		$data['user_id'] = $user_id;
		$this->db->insert($table_stock_ledger,$data);
		$ledger_id = $this->db->lastInsertId();

		if($ledger_id<=0){
			$data['error']='Error inserting stock ledger';
		}else{
			$query="SELECT id, available_unit FROM $table_stock_master where product_id=$product_id and package_id=$package_id and location='$location' and batch_id='$batch_id' and batch_no=$batch_no and transaction_type!='Transfer-pending'";
			$sth = $this->db->prepare($query);
			$sth->setFetchMode(PDO::FETCH_ASSOC);
			$sth->execute();
			$result = $sth->fetchAll();
			$count =  $sth->rowCount();
			if($count == 1){
				$id =$result[0]['id'];
				$available_unit =$result[0]['available_unit'];
				$available_unit = intval($available_unit)+intval($quantity);
				$query="UPDATE $table_stock_master  SET available_unit=$available_unit, transaction_type='Transfer-in',user_id=$user_id where id=$id";
				$sth = $this->db->prepare($query);
				$sth->execute();
				$query="DELETE FROM $table_stock_master where id=$stock_id";
				$sth = $this->db->prepare($query);
				$sth->execute();
			}else if($count == 0){

				$query="UPDATE $table_stock_master  SET available_unit=$quantity, transaction_type='Transfer-in',user_id=$user_id where id=$stock_id";
				$sth = $this->db->prepare($query);
				$sth->execute();

			}else{
				$data['error']='Multiple stock row  Error';

			}

		}
		echo json_encode($error);
	}

	function get_available_short_code($location){

		$data_short_code=array();
		$data_package_name=array();
		$data_batch_no=array();

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		$tables ="$table_stock_master stock, $table_product_master product, $table_package_master package";
		$where="where stock.location='$location' and stock.product_id=product.id and stock.package_id=package.id";
		$query="SELECT DISTINCT(product.name),product.id FROM $tables $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		echo json_encode($result);
	}

	function get_available_packages($product_id,$location){
		$return_final=array();

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		$tables ="$table_stock_master stock, $table_product_master product, $table_package_master package";
		$where="where stock.location='RD'  and stock.product_id=product.id and stock.package_id=package.id and product.id=$product_id";
		$query="SELECT DISTINCT(package.id), package.* FROM $tables $where";
		//echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();

		foreach ($result as $row){
			$return=array();
			$id= $row['id'];
			$name =$row['volume'].' '.$row['unit_type'].' '.$row['quantity_in_box'].' nos '.$row['type'];
			$return['id']=$id;
			$return['name']=$name;
			array_push($return_final,$return);
		}
		echo json_encode($return_final);
	}
	function get_available_batches($product_id,$package_id,$location){
		$return_final=array();

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		$tables ="$table_stock_master stock, $table_product_master product, $table_package_master package";
		$where="where stock.location='$location' and stock.product_id=product.id and stock.package_id=package.id and product.id=$product_id and package.id=$package_id";
		$query="SELECT *  FROM $tables $where";
		//	echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();

		foreach ($result as $row){
			$return=array();
			$id= $row['id'];
			$exp =date('MY', strtotime($row['exp_date']));
			$name =$row['batch_id'].$row['batch_no'].strtoupper($exp).'('.$row['available_unit'].')';
			$return['id']=$id;
			$return['name']=$name;
			$return['available_unit']=$row['available_unit'];
			$return['batch_no']=$row['batch_no'];
			$return['exp_date']=$row['exp_date'];
			$return['mfg_date']=$row['mfg_date'];
			array_push($return_final,$return);
		}
		echo json_encode($return_final);
	}


	function search_stocks_by_product(){

		$location = $_POST['location'];
		$product_id = $_POST['product_id'];
		$package_id = $_POST['package_id'];

		if($product_id == 0){
			$product = " product.id LIKE '%' ";
		}
		else{
			$product = " product.id = $product_id";
		}

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		if($package_id==0){
			$query="SELECT product.id,product.short_code, product.name, SUM( stock.available_unit ) AS available_unit
			FROM $table_stock_master stock, $table_product_master product, $table_package_master package 
			WHERE $product 
			AND stock.location = '$location' 
			AND stock.product_id = product.id 
			AND stock.package_id=package.id	
			AND stock.transaction_type!='Transfer-pending' group by product.id";
		}
		else{
			$query="SELECT product.id, product.short_code, product.name, SUM( stock.available_unit ) AS available_unit
			FROM $table_stock_master stock, $table_product_master product, $table_package_master package 
			WHERE  $product
			AND stock.location = '$location' 
			AND stock.package_id=$package_id
			AND stock.product_id = product.id 
			AND stock.package_id=package.id	
			AND stock.transaction_type!='Transfer-pending'";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		echo json_encode($result);
		//echo $query;
	}

	function show_product_details(){
		$pid=$_POST['product_id'];
		$location = $_POST['location'];
		$package_id = $_POST['package_id'];

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		if($package_id == 0){
			$query = "SELECT * FROM  $table_stock_master stock, $table_package_master package WHERE product_id = $pid AND location = '$location' AND package.id=stock.package_id AND stock.transaction_type!='Transfer-pending' ORDER BY stock.package_id";
		}
		else{
			$query = "SELECT * FROM  $table_stock_master stock, $table_package_master package WHERE product_id = $pid AND location = '$location' AND package.id=stock.package_id AND package.id = $package_id AND stock.transaction_type!='Transfer-pending' ORDER BY  stock.package_id";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		echo json_encode($result);
		//echo $query;
	}

	function removeTrailingCommas($json)
	{
		$json=preg_replace('/,\s*([\]}])/m', '$1', $json);
		return $json;
	}
	function save_stn(){
		$return_final=array();
		$today= date("Y-m-d");
		$user_id = Session::get('user_id');
		$vechile_no = $_POST['vechile_no'];
		$despatch_no = $_POST['despatch_no'];
		$despatch_date = $_POST['despatch_date'];
		$despatch_through = $_POST['despatch_through'];
		$remarks = $_POST['remarks'];

		$stn_id=$this->save_stn_master($vechile_no,$despatch_no,$despatch_date,$despatch_through,$remarks,$user_id);

		$json_obj=$_POST['stn_products'];


		$stn_products =array();
		$stn_products = json_decode(stripcslashes($json_obj),true);
		if($stn_id!=0){
			//echo sizeof($stn_products);
			foreach ($stn_products AS $value){
				$data=array();
				$data['product_id'] = $value['product_id'];
				$data['package_id'] = $value['package_id'];
				$data['batch_id'] = 'L';
				$data['batch_no'] = $value['batch_id'];
				$data['mfg_date'] =$value['mfg_date'];
				$data['exp_date'] = $value['exp_date'];
				$data['location'] = 'RD';
				$data['quantity'] = intval($value['qunatity']);
				$data['transaction_date'] =$today ;
				$data['transaction_reference_no'] = $stn_id;
				$data['transaction_type'] = 'Transfer-out';
				$data['remarks'] = $remarks;
				$data['user_id'] = $user_id;
				array_push($return_final,$data);
				$this->add_stock_ledger($data);
			}
		}
		echo json_encode($return_final);
	}
	function save_stn_master($vechile_no,$despatch_no,$despatch_date,$despatch_through,$remarks,$user_id){
		$table_stn_master =TABLE_PREFIX.'_stn_master';
		$today= date("Y-m-d");
		$result =0;
		$data =array();
		$data['vehicle_no'] = $vechile_no;
		$data['despatch_no'] = $despatch_no;
		$data['despatch_date'] = $despatch_date;
		$data['despatch_through'] = $despatch_through;
		$data['devilery_terms'] = $remarks;
		$data['user_id'] =$user_id;
		$data['destination'] ="Guwahati";
		$data['stn_date'] =$today;
		$data['status'] ='Open';

		$this->db->insert($table_stn_master,$data);
		$result = $this->db->lastInsertId();
		return $result;
	}
	function get_stn_master(){
		$table_stn_master=TABLE_PREFIX."_stn_master";
		$query="SELECT *  FROM $table_stn_master where status='Open' order by last_update desc limit 0,30";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();

		echo json_encode($result);
	}
	function get_stn_product_list($stn_id){
		$table_stock_ledger=TABLE_PREFIX."_stock_ledger";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		$tables ="$table_stock_ledger stock, $table_product_master product, $table_package_master package";
		$where="where stock.product_id=product.id and stock.package_id=package.id and stock.transaction_type='Transfer-out' and stock.transaction_reference_no=$stn_id";

		$query="SELECT *  FROM $tables $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		echo json_encode($result);
	}


	function get_all_products(){

		$data_short_code=array();
		$data_package_name=array();
		$data_batch_no=array();

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product_master=TABLE_PREFIX."_product_master";
		$table_package_master=TABLE_PREFIX."_package_master";

		$tables ="$table_stock_master stock, $table_product_master product, $table_package_master package";
		$where="where stock.product_id=product.id and stock.package_id=package.id";
		$query="SELECT DISTINCT(product.name),product.id FROM $tables $where";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();
		echo json_encode($result);
	}
	function get_all_packages(){
		$return_final=array();
		$table_package_master=TABLE_PREFIX."_package_master";
		$query="SELECT * FROM $table_package_master";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$result = $sth->fetchAll();

		foreach ($result as $row){
			$return=array();
			$id= $row['id'];
			$name =$row['volume'].' '.$row['unit_type'].' '.$row['quantity_in_box'].' nos '.$row['type'];
			$return['id']=$id;
			$return['name']=$name;
			array_push($return_final,$return);
		}
		echo json_encode($return_final);
	}
	function save_stock_correction(){
		$today= date("Y-m-d");
		$user_id = Session::get('user_id');
		$return_final=array();
		$json_obj=$_POST['stn_products'];
		$stn_products =array();
		$stn_products = json_decode(stripcslashes($json_obj),true);

		foreach ($stn_products AS $value){
			$data=array();
			$data['product_id'] = $value['product_id'];
			$data['package_id'] = $value['package_id'];
			$data['batch_id'] = 'L';
			$data['batch_no'] = $value['batch_id'];
			$data['mfg_date'] =$value['mfg_date'];
			$data['exp_date'] = $value['exp_date'];
			$data['location'] = $value['location'];
			$data['quantity'] = intval($value['qunatity']);
			$data['transaction_date'] =$today ;
			$data['transaction_reference_no'] = 1111;
			$data['transaction_type'] = 'Stock_correction';
			$data['remarks'] = $value['reason'];
			$data['user_id'] = $user_id;
			array_push($return_final,$data);
			$this->add_stock_ledger($data);
		}

		echo json_encode($return_final);
	}

	function validate_batch(){
		$batch_no = $_POST['batch_no'];
                $package_id = $_POST['package_id'];
                $product_id = $_POST['product_id'];
		$table__stock_ledger=TABLE_PREFIX."_stock_ledger";
		$query="SELECT  count(distinct(product_id)) as c FROM $table__stock_ledger WHERE product_id!=$product_id and package_id!=$package_id and batch_no = $batch_no ";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetch();
		$result = $data['c'];
		echo $result;
	}
	public function get_transfer_pending_stocks(){

$data=array();
		$data['error']='';

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product=TABLE_PREFIX."_product_master";
		$table_price=TABLE_PREFIX."_price_master";
		$table_package=TABLE_PREFIX."_package_master";
		$table="$table_stock_master stock, $table_product product, $table_package package";
		$select="SELECT stock.id stock_id, product.short_code, product.name,package.type,package.volume,package.quantity_in_box,stock.available_unit, stock.exp_date, stock.mfg_date,stock.batch_id,stock.batch_no,stock.location,stock.transaction_type	FROM";
		$where="where stock.product_id=product.id and stock.package_id=package.id and stock.transaction_type='Transfer-pending'";

		$query=$select.' '.$table.' '.$where.' order by stock.last_update desc';
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);

	}
}