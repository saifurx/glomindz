<?php

class User_Service extends Controller {

	function __construct() {
		parent::__construct();
	}

	function login(){
		$this->model->login();
	}

	 
	function recover_password() {
		$this->model->recover_password();
	}


	function send_contact_us_email() {
		$this->model->send_contact_us_email();
	}

	function logout() {
		$this->model->logout();
	}

}