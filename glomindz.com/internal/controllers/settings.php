<?php

class Settings extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false) {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}

	function save_new_deliverable() {
		$table=TABLE_PREFIX."_deliverable_master";
		$data = array();
		$data['name'] = $_POST['name'];
		$data['category'] = $_POST['category'];
		$data['optimum_man_days'] = $_POST['optimum_man_days'];
		$data['optimum_duration'] = $_POST['optimum_duration'];
		$this->model->save_new_deliverable($table,$data);
	}

	function save_new_project_deliverable(){
		$table=TABLE_PREFIX."_project_deleverables";
		$data = array();
		$data['name'] = $_POST['name'];
		$data['project_id'] = $_POST['project_id'];
		$data['deleverables_name'] = $_POST['deleverables_name'];
		$data['deleverables_id'] = $_POST['deleverables_id'];
		$data['estimate_man_days'] = $_POST['estimate_man_days'];
		$data['actual_man_days'] = $_POST['actual_man_days'];
		$data['start_date'] = $_POST['start_date'];
		$data['end_date'] = $_POST['end_date'];		
		$data['status'] = 'Open';
		$this->model->save_new_project_deliverable($table,$data);
	}
	
	function get_project_deliverables(){
		$this->model->get_project_deliverables();
	}
	
	function get_deliverables() {
		$table=TABLE_PREFIX."_deliverable_master";
		$this->model->get_deliverables($table);
	}
	
	function edit_deliverables(){
		$table=TABLE_PREFIX."_deliverable_master";
		$id = $_POST['id'];
		$this->model->edit_deliverables($id,$table);
	}
	
	function update_deliverable(){
		$table=TABLE_PREFIX."_deliverable_master";
		$id = $_POST['deliverable_id'];
		$data = array();
		$data['name'] = $_POST['name'];
		$data['category'] = $_POST['category'];
		$data['optimum_man_days'] = $_POST['optimum_man_days'];
		$data['optimum_duration'] = $_POST['optimum_duration'];
		$where = "id = $id";
		$this->model->update_deliverable($table,$data,$where);
	}
	
	function get_all_users() {
		$table=TABLE_PREFIX."_user_master";
		$this->model->get_all_users($table);
	}

	function save_new_user(){
		$table=TABLE_PREFIX."_user_master";
		$data = array();
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile'];
		$data['password'] = '88f2dccb02b2a20615211e5492f85204';
		$data['role'] = $_POST['role'];
		$data['status'] =1;
		$this->model->save_new_user($table,$data);
	}
	
	function change_status(){
		$table=TABLE_PREFIX.'_user_master';
		$id = $_POST['id'];
		$status = $_POST['status'];
		$this->model->change_status($table,$id,$status);
	}
}