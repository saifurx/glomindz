<?php

class Police_Service extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('user_type');

        if ($logged == false || $role != 'police') {
            Session::destroy();
            header('location: ' . URL);
            exit;
        }
    }
    
    function createPoliceUser(){
    	$this->model->createPoliceUser();
    }
	function createSMSUser(){
    	$this->model->createSMSUser();
    }
    function getAllPoliceUser(){
    	$this->model->getAllPoliceUser();
    }
    
	function getAllHotelUser(){
    	$this->model->getAllHotelUser();
    }
    
    function change_account_status() {
    	$this->model->change_account_status();
    }
    
    function approve_sms_user() {
    	$this->model->approve_sms_user();
    }
    
    function reset_password() {
    	$this->model->reset_password();
    }
    
    function get_user_details() {
    	$this->model->get_user_details();
    }
    
    function update_police_user_details(){
    	$this->model->update_police_user_details();
    }
    
    function update_hotel_user_details(){
    	$this->model->update_hotel_user_details();
    }
    
    function get_police_user_profile_details(){
    	$this->model->get_police_user_profile_details();
    }
    
    function get_submited_hotels_by_date() {
    	$this->model->get_submited_hotels_by_date();
    }
    
    function get_not_submited_hotels_by_date() {
    	$this->model->get_not_submited_hotels_by_date();
    }
    
    function show_guest_list() {
    	$this->model->show_guest_list();
    }
    
    function search_guest(){
    	$this->model->search_guest();
    }
    
	function hotel_guset_details(){
    	$this->model->hotel_guset_details();
    }
    
	function getAllSMSUser(){
    	$this->model->getAllSMSUser();
    }
}