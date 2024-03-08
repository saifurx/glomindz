<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->view->render('index/index');
	}
	function signin() {
		$this->view->render('index/sign_in');
	}

}