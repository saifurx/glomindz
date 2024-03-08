<?php
class Invoices extends Controller {

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
	public function get_invoices(){
		$this->view->invoice_data = $this->model->get_invoices();
	}
	public function save_invoice(){
		$this->model->save_invoice();
	}
	function get_ordered_product_list($order_id){
		$this->model->get_ordered_product_list($order_id);
	}
	function get_ordered_product_list_print_invoice($order_id){
		$this->model->get_ordered_product_list_print_invoice($order_id);
	}
	function get_order_products_footer($order_id){
		$this->model->get_order_products_footer($order_id);
	}
	function get_pending_orders(){
		$this->model->get_pending_orders();
	}
	public function search_invoices($search_query){
		$this->model->search_invoices($search_query);
	}
	function update_stock_master_from_sale($order_id){
		$this->model->update_stock_master_from_sale($order_id);
	}
}