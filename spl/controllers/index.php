<?php

class Index extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		//echo Hash::create('md5', 'demo', HASH_PASSWORD_KEY);
		$this->view->render('index/index');
		
	}
		
}