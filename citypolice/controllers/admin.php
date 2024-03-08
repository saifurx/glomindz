<?php

class Admin extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}

	}

	public function index(){
		$this->view->render('admin/index');
	}
}