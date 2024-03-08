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

    public function get_police_users($search_query) {
        $this->model->get_police_users($search_query);
    }

    public function get_registered_hotels($search_query) {
        $this->model->get_registered_hotels($search_query);
    }

    public function change_account_status() {
        $this->model->change_account_status();
    }

    public function approve_sms_user() {
        $this->model->approve_sms_user();
    }

    public function reset_password() {
        $this->model->reset_password();
    }

    public function register_new_user() {
        $this->model->register_new_user();
    }

    public function get_submited_hotels_by_date() {
        $this->model->get_submited_hotels_by_date();
    }

    public function get_not_submited_hotels_by_date() {
        $this->model->get_not_submited_hotels_by_date();
    }

    public function guestlist_search_result() {
        $this->model->guestlist_search_result();
    }

    public function get_all_hotels_email() {
        $this->model->get_all_hotels_email();
    }

    public function send_hotel_alert_email() {
        $this->model->send_hotel_alert_email();
    }

    public function show_guest_list() {
        $this->model->show_guest_list();
    }

    public function get_watchlist_data() {
        $this->model->get_watchlist_data();
    }

    public function search_watchlist($search_str) {
        $this->model->search_watchlist($search_str);
    }

    function get_user_details() {
        $this->model->get_user_details();
    }

    function add_web_user() {
        $this->model->add_web_user();
    }    
    
    function update_user_details() {
        $this->model->update_user_details();
    }

    function get_crime_types() {
        $this->model->get_crime_types();
    }

    function get_filter_police_users_by_ps_id() {
    	$this->model->get_filter_police_users_by_ps_id();
    }
    
    function get_filter_police_users_by_city_id() {
    	$this->model->get_filter_police_users_by_city_id();
    }
    
	function get_ps_registered_hotels() {
    	$this->model->get_ps_registered_hotels();
    }
    
	function get_police_user_profile_details(){
    	$this->model->get_police_user_profile_details();
    }
	function update_police_profile(){
    	$this->model->update_police_profile();
    }
	function change_password(){
    	$this->model->change_password();
    }
}