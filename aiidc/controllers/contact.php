<?php

class Contact extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->view->render('contact/index');

	}
	function send_contact_us_email(){

		$email='Conatact us from \n Name :'.$_POST['name'].'\n Email :'.$_POST['email'].'\n Telephone :'.$_POST['tel'].'\n Message :'.$_POST['message'];


		$to  = 'kbordoloi@gmail.com, support@glomindz.com'; // note the comma
		$subject = 'Resource Map Assam: Contact Us';
		$headers = "From:admin@assamresources.com";
		$result = mail($to, $subject, $email,$headers);

		header("location: ../");

	}
	public function spamcheck($field)
	{
		$field=filter_var($field, FILTER_SANITIZE_EMAIL);
		if(filter_var($field, FILTER_VALIDATE_EMAIL))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}