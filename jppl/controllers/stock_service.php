<?php
class Stock_Service extends Controller{

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('user_type');
		
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}
	
	function get_stocks(){
		$this->model->get_stocks();
	}
	
	function add_stocks(){
		$this->model->add_stocks();	
	}
   
	function all_product(){
		$this->model->all_product();
	}
	
	function add_consumption(){
		$this->model->add_consumption();
	}
	
	function get_consumption(){
		$this->model->get_consumption();
	}
}