<?php
class Apps extends Controller{

	function __construct() {
		parent::__construct();
	}
	
	function about(){
		$this->view->render('index/about');
	}
		
	function contact(){
		$this->view->render('index/contact');
	}
	
	function survey_result(){
		$this->view->render('index/survey_result');
	}
	
	function forget_password(){
		$this->view->render('index/forget_password');
	}
	
	function new_register(){
		$this->view->render('index/new_register');
	}

	
	function order() {
		$this->view->render('index/order');
	}
}