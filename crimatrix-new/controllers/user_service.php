<?php

class User_Service extends Controller {

    function __construct() {
        parent::__construct();
    }

    function login(){
    	$this->model->login();
    }

    function register_hotel_user(){
        $this->model->register_hotel_user();
    }

    function recover_password() {
        $this->model->recover_password();
    }
    
	function changePassword() {
        $this->model->changePassword();
    }
    
    function get_policeStations() {
    	$this->model->get_policeStations();
    }
    
    function get_cities() {
    	$this->model->get_cities();
    }
    function get_crimeType() {
    	$this->model->get_crimeType();
    }
    
	function send_contact_us_email() {
    	$this->model->send_contact_us_email();
    }
    
    function logout() {
        $this->model->logout();
    }

}