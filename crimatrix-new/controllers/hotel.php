<?php
class Hotel extends Controller{

	function __construct() {
		parent::__construct();
        Session::init();
		$logged = Session::get('loggedIn');
	}
	
	function index(){
		$this->view->render('hotel/index');
	}
	
	function faq(){
		$this->view->render('hotel/faq');
	}
	
	function upload(){
		$this->view->render('hotel/upload');
	}
	
	function profile(){
		$this->view->render('hotel/profile');
	}

}	