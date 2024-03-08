<?php
class Payment_Service extends Controller{

	function __construct() {
		parent::__construct();
	}
	
	function get_all_payment(){
		$this->model->get_all_payment();
	}
	
	function add_payment(){
		$this->model->add_payment();
	}
}