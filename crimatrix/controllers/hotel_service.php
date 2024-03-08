<?php
class Hotel_Service extends Controller{

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('user_type');
		
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}
	
	public function change_password(){
		$this->model->change_password();
	}
	
	public function save_new_guest(){
		$this->model->save_new_guest();
	}	

	public function get_user_profile_details(){
		$this->model->get_user_profile_details();
	}
		
	public function update_user_profile_info(){
		$this->model->update_user_profile_info();
	}
	
	public function get_hotel_guestlists_day(){
		$this->model->get_hotel_guestlists_day();
	}

	public function update_date_deparature(){
		$this->model->update_date_deparature();
	}
	
	function get_guestlist_submit_calendar(){
		$this->model->get_guestlist_submit_calendar();
	}
	
	function test_data_url(){
		$this->model->test_data_url();
	}
	
	function get_hotel_ps_name(){
		$this->model->get_hotel_ps_name();
	}
}