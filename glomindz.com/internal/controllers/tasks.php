<?php

class Tasks extends Controller {

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
	public function create_task(){
		$this->model->create_task();
	}

	public function update_task(){
		$this->model->update_task();
	}
	
	public function get_all_tasks(){
		$this->model->get_all_tasks();
	}
	public function get_all_tasks_and_burned_time(){
		$this->model->get_all_tasks_and_burned_time();
	}	
	public function get_task_details(){
		$id = $_POST['id'];
		$this->model->get_task_details($id);
	}
	
	public function burndown(){
		$this->model->burndown();
	}
	
	public function get_project_deliverables(){
		$this->model->get_project_deliverables();
	}
	public function close_task(){
		$this->model->close_task();
	}

	
}