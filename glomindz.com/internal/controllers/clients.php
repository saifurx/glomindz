<?php

class Clients extends Controller {

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
	public function create_client(){
		$this->model->create_client();
	}
	
	public function get_all_client(){
		$this->model->get_all_client();
	}
	
	public function get_client_details(){
		$id=$_POST['client_id'];
		$this->model->get_client_details($id);
	}
	
	public function update_client(){
		$this->model->update_client();
	}

}