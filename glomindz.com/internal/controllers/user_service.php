<?php
class User_Service extends Controller{


	function __construct() {
		parent::__construct();
	}


	function run()
	{
		$this->model->run();
	}
	public function send_contact_us_email()
	{
		$this->model->send_contact_us_email();

	}
}