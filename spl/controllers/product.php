<?php

class Product extends Controller {

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

	public function get_short_code(){
		$this->model->get_short_code();
	}
	
	public function save_new_product(){

		$this->model->save_new_product();
	}
	public function update_price(){

		$this->model->update_price();
	}
}