<?php

class Stocks extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false){
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}

	public function add_new_stock(){
		$this->model->add_new_stock();
	}
	public function recived_stock($stock_id){
		$this->model->recived_stock($stock_id);
	}
	function get_available_short_code($location){
		$this->model->get_available_short_code($location);
	}
	function show_product_details(){
		$this->model->show_product_details();
	}

	function get_available_packages(){
		$product_id =$_GET['product_id'];
		$location =$_GET['location'];
		$this->model->get_available_packages($product_id,$location);
	}

	function validate_batch(){
		$this->model->validate_batch();
	}

	function get_available_batches(){
		$product_id =$_GET['product_id'];
		$package_id =$_GET['package_id'];
		$location =$_GET['location'];
		$this->model->get_available_batches($product_id,$package_id,$location);
	}

	function search_stocks_by_product(){
		$this->model->search_stocks_by_product();
	}
	function save_stn(){
		$this->model->save_stn();
	}
	function get_stn_master(){
		$this->model->get_stn_master();
	}
	function get_stn_product_list($stn_id){
		$this->model->get_stn_product_list($stn_id);
	}

	function get_all_products(){
		$this->model->get_all_products();
	}
	function get_all_packages(){
		$this->model->get_all_packages();
	}
	function save_stock_correction(){
		$this->model->save_stock_correction();
	}
	function get_transfer_pending_stocks(){
		$this->model->get_transfer_pending_stocks();
	}
}