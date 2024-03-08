<?php
class Hotel_Service extends Controller{

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('user_type');
	}
	
	function update_hotel_user_details(){
		$this->model->update_hotel_user_details();
	}
	
	function get_hotel_user_profile_details(){
		$this->model->get_hotel_user_profile_details();
	}
	
	function update_hotel_user_profile(){
		$this->model->update_hotel_user_profile();
	}
	
	function save_new_guest(){
		$this->model->save_new_guest();
	}
	
	function get_hotel_guestlists_day(){
		$this->model->get_hotel_guestlists_day();
	}
	
	function update_date_deparature(){
		$this->model->update_date_deparature();
	}
	/*
	public function change_password(){
		$this->model->change_password();
	}
	*/
}