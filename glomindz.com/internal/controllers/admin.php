<?php

class Admin extends Controller {

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

	function index() {
		$this->view->render('admin/index');

	}
	function clients() {
		$this->view->render('admin/clients');

	}

	function settings() {
		$this->view->render('admin/settings');

	}
	function payments() {
		$this->view->render('admin/payments');

	}
	function burndown() {
		$this->view->render('admin/burndown');

	}
	function projects() {
		$this->view->render('admin/projects');

	}
	function tasks() {
		$this->view->get_all_user = $this->model->get_all_user();
		$this->view->render('admin/tasks');
	}
	function deliverables() {
		$this->view->render('admin/deliverables');

	}
	function profile() {
		$this->view->render('admin/profile');

	}
	function logout(){
		Session::destroy();
		header('location: '. URL);
		exit;
	}
}