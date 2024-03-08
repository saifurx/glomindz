<?php

class Admin extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->view->render('admin/index');
	}
	function signin() {
		$this->view->render('admin/profile');
	}
	function production() {
		$this->view->render('admin/production');
	}

}