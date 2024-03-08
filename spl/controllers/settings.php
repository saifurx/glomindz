<?php

class Settings extends Controller {

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

	function get_taxes() {
		$table_taxes=TABLE_PREFIX."_tax_master";
		$this->model->get_all_data($table_taxes);
	}
	function add_tax() {
		$table_taxes=TABLE_PREFIX."_tax_master";
		$data_product = array();
		$data_product['name'] = $_POST['name'];
		$data_product['catagory'] = $_POST['catagory'];
		$data_product['percentage'] = $_POST['percentage'];
		$this->model->add_master_data($table_taxes,$data_product);
	}

	function get_discounts() {
		$table_discounts=TABLE_PREFIX."_customer_discount_master";
		$this->model->get_all_data($table_discounts);
	}
	function add_discount() {
		$table_discounts=TABLE_PREFIX."_customer_discount_master";
		$data = array();
		$data['name'] = $_POST['name'];
		$data['remarks'] = $_POST['remarks'];
		$data['customer_type'] = $_POST['customer_type'];
		$data['percentage'] = $_POST['percentage'];
		$this->model->add_master_data($table_discounts,$data);

	}

	function get_packages() {
		$table_package=TABLE_PREFIX."_package_master";
		$this->model->get_all_data($table_package);
	}

	function get_users() {
		$table_user=TABLE_PREFIX."_user_master";
		$this->model->get_all_data($table_user);
	}
	function add_package() {
		$table_package=TABLE_PREFIX."_package_master";
		$data = array();
		$data['volume'] = $_POST['volume'];
		$data['unit_type'] = $_POST['unit_type'];
		$data['quantity_in_box'] = $_POST['quantity_in_box'];
		$data['type'] = $_POST['type'];
		$this->model->add_master_data($table_package,$data);
	}

	function add_user() {
		$table_user=TABLE_PREFIX."_user_master";
		$data = array();
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['password'] = $this->generate_password();
		$data['mobile'] = $_POST['mobile'];
		$data['role'] = $_POST['role'];
		$data['status'] =1;
		$this->model->add_user($table_user,$data);

	}
	function generate_password() {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&$@#";
		return substr(str_shuffle($chars),0,8);
	}
	function change_status(){
		$table=$_POST['table_name'];
		if($table == 1){
			$table='tax_master';
		}
		if($table == 2){
			$table='customer_discount_master';
		}
		if($table == 3){
			$table='user_master';
		}
		$table=TABLE_PREFIX.'_'.$table;
		$id = $_POST['id'];
		$status = $_POST['status'];
		if($status == 1){
			$status=0;
		}
		else if($status == 0){
			$status=1;
		}
		$this->model->change_status($table,$id,$status);
	}
}