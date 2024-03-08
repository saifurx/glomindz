<?php
class Accounts_Service extends Controller{

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
}