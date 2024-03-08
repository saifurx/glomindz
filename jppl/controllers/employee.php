<?php
class Employee extends Controller{

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
	
    function index() {
		$this->view->render('admin/index');
    }
    function hr() {
		$this->view->render('admin/hr');
    }
    function payroll() {
		$this->view->render('admin/payroll');
    }
    function stocks() {
		$this->view->render('admin/stocks');
    }
     function accounts() {
		$this->view->render('admin/accounts');
    }
     function circulation() {
		$this->view->render('admin/circulation');
    }
     function advertisement() {
		$this->view->render('admin/advertisement');
    }
    
     function production() {
		$this->view->render('admin/production');
    }
    
    function payment() {
    	$this->view->render('admin/payment');
    }
}