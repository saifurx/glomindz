<?php

class About_us extends Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('about_us/index');
	}
	
}