<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index()
	{
		$this->view->render('login/index');
	}
	function register()
	{
		$this->view->districtList=$this->model->districtList();
		$this->view->render('login/register');
	}
	
	
	function run()
	{
		$this->model->run();
	}

	public function saveUser()
	{
		$data = array();
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['password'] = Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
		$data['district_id'] = $_POST['dist_id'];
		$data['mobile'] = $_POST['mobile'];
		$data['block_id'] ='0';
		$data['role'] = 'default';
		$data['status'] ='0';
		
		$this->model->saveUser($data);
	}
	public function forget(){

		$this->view->render('login/forget');
	}
	public function changePassword(){

		$this->model->changePassword();
	}
	
}