<?php
class Hotel extends Controller{

	function __construct() {
		parent::__construct();
                  Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('user_type');
		
		if ($logged == false || $role != 'hotel') {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
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