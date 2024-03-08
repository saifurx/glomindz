<?php
class Login extends Controller{


	function __construct() {
		parent::__construct();
	}


	function run()
	{
		$this->model->run();
	}
	function register_user()
	{
		$this->view->render('index/register_user');

	}
	function forget_password()
	{
		$this->view->render('index/forget_password');
	
	}
	public function check_email(){
	
		$this->model->check_email();
	}
	public function save_user(){
	
		$this->model->save_user();
	}
	
	public function recover_password(){
	
		$this->model->recover_password();
	}
}