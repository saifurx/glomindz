<?php

class Employee_Service_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_employee() {
        $table_employee = TABLE_PREFIX . "_employee_master";
        $table_department = TABLE_PREFIX . "_department_master";
        $table_designation = TABLE_PREFIX . "_designation_master";
        $query = "SELECT emp.id,emp.firstname,emp.lastname,emp.mobile,emp.doj,dept.name as department,desg.name as designation FROM $table_employee emp, $table_department dept,  $table_designation desg where emp.dept_id=dept.id and emp.designation_id=desg.id and emp.status=1 order by emp.firstname,emp.lastname,emp.dept_id";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function search_employee() {
        $emp_type = $_POST['emp_type'];
        $table_employee = TABLE_PREFIX . "_employee_master";
        $table_department = TABLE_PREFIX . "_department_master";
        $table_designation = TABLE_PREFIX . "_designation_master";
        $query = "SELECT emp.id,emp.firstname,emp.lastname,emp.mobile,emp.doj,dept.name as department,desg.name as designation FROM $table_employee emp, $table_department dept,  $table_designation desg where emp.dept_id=dept.id and emp.designation_id=desg.id and emp.status=1 order by emp.firstname,emp.lastname,emp.dept_id";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    
    function add_advertisement(){
    	Session::init();
    	$user_id = Session::get('user_id');
    	$table_advertisement_master = TABLE_PREFIX . "_advertisement_master";
    	$data =array();
    	$data['name'] = $_POST['name'];
    	$data['size'] = $_POST['size'];
    	$data['ro_no'] = $_POST['ro_no'];
    	$data['source'] = $_POST['source'];
    	$data['edition'] = $_POST['edition'];
    	$data['page_no'] = $_POST['page_no'];
    	$data['type'] = $_POST['type'];
    	$data['amount'] = $_POST['amount'];
    	$data['ref'] = $_POST['ref'];
    	$data['user_id'] = $user_id;
    	$this->db->insert($table_advertisement_master, $data);
    	$id=$this->db->lastInsertId();
    	header("Content-type: application/json");
    	echo json_encode($id);
    }
    
    function get_advertisement(){
		$table_advertisement_master = TABLE_PREFIX."_advertisement_master";
		
		$source = $_POST['source'];
		$edition = $_POST['edition'];
		$query = "";
		if($source == '0' && $edition == '0'){
			$query = "SELECT * FROM $table_advertisement_master";
		}
		else if($source == '0'){
			$query = "SELECT * FROM $table_advertisement_master WHERE edition = '$edition'";
		}
		else if($edition == '0'){
			$query = "SELECT * FROM $table_advertisement_master WHERE source = '$source'";
		}
		else{
			$query = "SELECT * FROM $table_advertisement_master WHERE source = '$source' AND edition = '$edition'";
		}
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }
}