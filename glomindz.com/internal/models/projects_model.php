<?php

class Projects_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function create_project(){
		Session::init();
		$user_id = Session::get('user_id');
		$table=TABLE_PREFIX."_project_master";
		$data =array();
		$data['actual_man_days'] = $_POST['actual_man_days'];
		$data['approx_budget'] = $_POST['approx_budget'];
		$data['customer_id'] = $_POST['customer_id'];
		$data['duration'] = $_POST['duration'];
		$data['end_date'] = $_POST['end_date'];
		$data['estimate_man_days'] = $_POST['estimate_man_days'];
		$data['name'] = $_POST['name'];
		$data['reference'] = $_POST['reference'];
		$data['start_date'] = $_POST['start_date'];
		$data['support_end'] = $_POST['support_end'];
		$data['support_start'] = $_POST['support_start'];
		$data['traffic_daily'] = $_POST['traffic_daily'];
		$data['requirment'] = $_POST['requirment'];
		$data['user_id'] = $user_id;
		$data['status'] = 'Open';
		$this->db->insert($table,$data);
		$id = $this->db->lastInsertId();
		echo $id; 
	}
	
	public function update_project(){
		Session::init();
		$user_id = Session::get('user_id');
		$table=TABLE_PREFIX."_project_master";
		
		$id = $_POST['edit_pid'];
		$data =array();
		$data['actual_man_days'] = $_POST['actual_man_days'];
                $data['customer_id'] = $_POST['edit_customer_id'];
		$data['approx_budget'] = $_POST['approx_budget'];
		$data['duration'] = $_POST['duration'];
		$data['end_date'] = $_POST['end_date'];
		$data['estimate_man_days'] = $_POST['estimate_man_days'];
		$data['name'] = $_POST['name'];
		$data['reference'] = $_POST['reference'];
		$data['start_date'] = $_POST['start_date'];
		$data['support_end'] = $_POST['support_end'];
		$data['support_start'] = $_POST['support_start'];
		$data['traffic_daily'] = $_POST['traffic_daily'];
		$data['requirment'] = $_POST['requirment'];
		$data['user_id'] = $user_id;
		$data['status'] = 'Open';
		$where = "id = $id";
		$this->db->update($table,$data,$where);
		echo $id;
		
	}
	
	public function get_all_projects(){
		$table_pm=TABLE_PREFIX."_project_master";
		$table_cm=TABLE_PREFIX."_customer_master";
		$sth = $this->db->prepare("SELECT mpm.*, mcm.name as customer_name, mcm.customer_type  FROM $table_pm mpm, $table_cm mcm WHERE mpm.customer_id = mcm.id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function get_project_details($id){
		$table_pm=TABLE_PREFIX."_project_master";
		$table_cm=TABLE_PREFIX."_customer_master";
		$sth = $this->db->prepare("SELECT mpm.*, mcm.name as customer_name, mcm.customer_type  FROM $table_pm mpm, $table_cm mcm WHERE mpm.id=$id AND mpm.customer_id = mcm.id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
}