<?php
class Employee_Service extends Controller{

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
        
    public function get_all_employee(){
		$this->model->get_all_employee();   
    }
    
    function add_advertisement(){
    	$this->model->add_advertisement();
    }
	
    function get_advertisement(){
    	$this->model->get_advertisement();
    }
  
}