<?php

class Product_Model extends Model {




	public function __construct() {
		parent::__construct();
	}

	public function get_short_code(){
		$table_product=TABLE_PREFIX."_product_master";

		$query ='';
		if(isset($_POST['query'])){
			$query=$_POST['query'];
		}
		$query="SELECT id, short_code, name FROM $table_product where short_code LIKE '$query%' OR name LIKE '$query%'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function save_new_product(){

		$table_product=TABLE_PREFIX."_product_master";
		$data_product = array();
		$data_product['short_code'] = $_POST['short_code'];
		$data_product['name'] = $_POST['name'];
		$data_product['type'] = $_POST['type'];
		$count =$this->check_product($data_product['short_code']);

		if($count<=0){
			$this->db->insert($table_product,$data_product);
			$data_product['id'] = $this->db->lastInsertId();
			$data_product['error']='';
		}else{
			$data_product['error']= 'Product already available for the Short Code '.$data_product['short_code'];
		}

		echo json_encode($data_product);
	}
	function check_product($short_code){
		$table_product=TABLE_PREFIX."_product_master";
		$query="SELECT id FROM $table_product where short_code = '$short_code'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		$count =  $sth->rowCount();
		return $count;
	}

	public function update_price(){
		$table_price=TABLE_PREFIX."_price_master";
		$data = array();
		$data['product_id'] = $_POST['product_id'];
		$data['package_id'] = $_POST['package_id'];
		$data['customer_type'] = $_POST['customer_type'];
		$data['unit_price'] = $_POST['unit_price'];
		$data['mrp'] = $_POST['mrp'];
		$data['valid_from'] = $_POST['valid_from'];
		$data['valid_to'] = $_POST['valid_to'];
		
		$this->disabled_old_price($data['product_id'], $data['package_id'],$data['customer_type']);
		
		$price_id=0;
		$data['status'] = 1;
		$this->db->insert($table_price,$data);
		$price_id = $this->db->lastInsertId();
		
		if($price_id<=0){
			$data['error']='Error inserting price';
		}else{
			$data['price_id'] = $price_id;
		}
		echo json_encode($data);
	}

	public function disabled_old_price($product_id, $package_id,$customer_type){
		$table_price=TABLE_PREFIX."_price_master";
		$query="SELECT id FROM $table_price where product_id=$product_id and package_id=$package_id and customer_type='$customer_type' and status=1";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		$count =  $sth->rowCount();
		if($count == 1){
			$query="UPDATE $table_price  SET status=0 where product_id=$product_id and package_id=$package_id AND customer_type='$customer_type'";
			$sth = $this->db->prepare($query);
			$sth->execute();
		}
	}
}