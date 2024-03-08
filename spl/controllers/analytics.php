<?php
class Analytics extends Controller {

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

	public function top_10_orderd_products(){
		$this->model->top_10_orderd_products();
	}
	public function monthly_sales_report(){
		$this->model->monthly_sales_report();
	}
	
	public function get_sale_report(){
		$this->model->get_sale_report();
	}
	
	public function get_stock_report(){
		$this->model->get_stock_report();
	}
        public function get_sale_report_details(){
		$this->model->get_sale_report_details();
	}
}