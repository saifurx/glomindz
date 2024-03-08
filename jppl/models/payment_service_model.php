<?php

class Payment_Service_Model extends Model {

    function __construct() {
        parent::__construct();
    }
    
    function get_all_payment(){
    	$table_customer_payments = TABLE_PREFIX . "_customer_payments";
    	$dept = $_POST['dept'];
    	$from_date = $_POST['from_date'];
    	$to_date = $_POST['to_date'];
    	if($dept == '0' && ($from_date ==null && $to_date == null)){
    		$query = "SELECT * FROM $table_customer_payments";
    	}
    	else if($dept != '0' && ($from_date == null && $to_date == null)){
    		$query = "SELECT * FROM $table_customer_payments WHERE dept = $dept";
    	}
    	else if($dept != '0' && ($from_date !=null && $to_date == null)){
    		$query = "SELECT * FROM $table_customer_payments WHERE payment_date = '$from_date'";
    	}
    	else if($dept == '0' && ($from_date !=null && $to_date != null)){
    		$query = "SELECT * FROM $table_customer_payments WHERE payment_date BETWEEN '$from_date' AND '$to_date'";
    	}
    	else{
    		$query = "SELECT * FROM $table_customer_payments WHERE dept = $dept AND payment_date BETWEEN '$from_date' AND '$to_date'";
    	}
    	
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	header("Content-type: application/json");
    	echo json_encode($data);
    	//echo $query;
    }
    
    function add_payment(){
    	Session::init();
    	$user_id = Session::get('user_id');
    	$table_customer_payments = TABLE_PREFIX . "_customer_payments";
    	
    	$data =array();
    	$data['dept'] = $_POST['dept'];
    	$data['received_from'] = $_POST['received_from'];
    	$data['amount'] = $_POST['amount'];
    	$data['payment_date'] = $_POST['payment_date'];
    	$data['payment_mode'] = $_POST['payment_mode'];
    	$data['instrument_number'] = $_POST['instrument_number'];
    	$data['instrument_date'] = $_POST['instrument_date'];
    	$data['remark'] = $_POST['remark'];
    	$data['user_id'] = $user_id;
    	$this->db->insert($table_customer_payments, $data);
    	$id=$this->db->lastInsertId();
    	header("Content-type: application/json");
    	echo json_encode($id);
    }
}