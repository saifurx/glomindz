<?php

class Orders extends Controller {

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

	public function add_cart(){
		$this->model->add_cart();
	}

	public function save_order(){
		$this->model->save_order();
	}
	public function save_modified_order(){
		$this->model->save_modified_order();
	}

	public function delete_product_from_cart($id){
		$this->model->delete_product_from_cart($id);
	}

	public function cancel_order($order_id){
		$this->model->cancel_order($order_id);
	}
	public function get_product_list($order_id){
		$this->model->get_product_list($order_id);
	}
	public function search_order($search_query){
		$this->model->search_order($search_query);
	}
}