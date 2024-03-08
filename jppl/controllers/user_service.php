<?php
class User_Service extends Controller{

	function __construct() {
		parent::__construct();
	}

	function login(){
		$this->model->login();
	}
       
	function change_password(){
		$this->model->change_password();
	}
	
	function profile(){
		$this->model->profile();
	}
	//
	function logout(){
		$this->model->logout();
	}
	
}