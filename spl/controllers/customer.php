<?php

class Customer extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false) {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}
	public function customer_order_id($customer_id){
		$this->model->customer_order_id($customer_id);
	}
	public function get_all_customers($search_query){

		$this->model->get_all_customers($search_query);
	}
	public function save_new_customer(){

		$this->model->save_new_customer();
	}

	public function get_customer_info($customer_id){

		$this->model->get_customer_info($customer_id);
	}
	public function update_customer(){
		$this->model->update_customer();
	}
	public function save_payment(){
		$this->model->save_payment();
	}
	public function get_payment_details($customer_id){
		$this->model->get_payment_details($customer_id);
	}


}