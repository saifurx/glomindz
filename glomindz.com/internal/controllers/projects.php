<?php

class Projects extends Controller {

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
	public function create_project(){
		$this->model->create_project();
	}
	
	public function update_project(){
		$this->model->update_project();
	}
	
	public function get_all_projects(){
		$this->model->get_all_projects();
	}
	
	public function get_project_details(){
		$id=$_POST['id'];
		$this->model->get_project_details($id);
	}
}