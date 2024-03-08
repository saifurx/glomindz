<?php

class Stock_Service_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_stocks(){
    	$table_stock = TABLE_PREFIX . "_stock_master";
    	$query = "SELECT * from $table_stock";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	header("Content-type: application/json");
    	echo json_encode($data);
    }
    
    function add_stocks(){
    	Session::init();
    	$user_id = Session::get('user_id');
    	$table_stock_ledger = TABLE_PREFIX . "_stock_ledger";
    	$data =array();
    	$data['product_id'] = $_POST['product_id'];
    	$data['location'] = $_POST['location'];
    	$data['transaction_date'] = $_POST['transaction_date'];
    	$data['unit_quantity'] = $_POST['unit_quantity'];
    	$data['box_quantity'] = $_POST['box_quantity'];
    	$data['transaction_type'] = $_POST['transaction_type'];
    	$data['remarks'] = $_POST['remarks'];
    	$data['user_id'] = $user_id;
    	$this->db->insert($table_stock_ledger, $data);
    	$id=$this->db->lastInsertId();
    	header("Content-type: application/json");
    	echo json_encode($id);
    }
    
    function all_product(){
    	$table_product_master = TABLE_PREFIX . "_product_master";
    	$query = "SELECT * from $table_product_master";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	header("Content-type: application/json");
    	echo json_encode($data);
    }
    
    function add_consumption(){
    	Session::init();
    	$user_id = Session::get('user_id');
    	$table_print_master = TABLE_PREFIX ."_print_master";
    	$data =array();
    	$data['publication'] = $_POST['publication'];
    	$data['date'] = $_POST['date'];
    	$data['print_order'] = $_POST['print_order'];
    	$data['color_page'] = $_POST['color_page'];
    	$data['bw_page'] = $_POST['bw_page'];
    	$data['location'] = $_POST['location'];
    	$data['user_id'] = $user_id;
    	$this->db->insert($table_print_master, $data);
    	$id=$this->db->lastInsertId();
    	
    	$data['id'] = $id;
    	header("Content-type: application/json");
    	echo json_encode($data);
    }
     
    function get_consumption(){
    	$table_print_master = TABLE_PREFIX . "_print_master";
    	$location = $_POST['location'];
    	$query = "";
    	if($location == '0'){
    		$query = "SELECT * FROM $table_print_master";
    	}
    	else{
    		$query = "SELECT * FROM $table_print_master WHERE location = '$location'";
    	}
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	header("Content-type: application/json");
    	echo json_encode($data);
    }
}    