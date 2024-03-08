<?php

class User_Service_Model extends Model {

	public function __construct() {
		parent::__construct();
		header("Content-type: application/json");
		header("X-XSS-Protection: 1; mode=block");
	}

	function generate_password(){
		$chars = "0123456789";
		return substr(str_shuffle($chars), 0, 6);
	}



	function login(){
		 
		$password = Hash::create('md5', $this->clear_input_string($_POST['password']), HASH_PASSWORD_KEY);
		$username = $this->clear_input_string($_POST['username']); //username is mobile or email
		//$location = $_POST['location'];
		//$ip_address = $_POST['ip_address'];
		$query = "SELECT * FROM " . TABLE_USER_MASTER . " WHERE (email = '$username' OR mobile='$username') AND password = '$password'";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetch();
		$count = $sth->rowCount();
		//echo $query;
		if ($count == 1) {
			Session::init();
			Session::set('user_id', $data['id']);
			Session::set('user_type', $data['user_type']);
			Session::set('email', $data['email']);
			Session::set('mobile', $data['mobile']);
			Session::set('name', $data['name']);
			Session::set('status', $data['status']);
			Session::set('role', $data['role']);
			Session::set('logedin', 'true');
			$access_id =1;// $this->write_access_log($data['id'], $location, $ip_address, $data['status']);
			if($access_id > 0){
				Session::set('loggedIn', true);
				if ($data['user_type'] == 'support'){
					//header('location:'.URL.'hotel');
					if ($data['status'] == 1) {
						header('location: ' . URL . 'admin/');
					} else {
						header('location: ' . URL . 'admin/profile');
					}
				}

			}
			else{
				header('Location:'.URL.'index/singin?loginFailed');
			}
		}
		else{
			header('location:'.URL.'index/signin?loginFailed');
		}
	}

	function recover_password() {
		echo 1;
	}

	function changePassword() {
		Session::init();
		$user_id = Session::get("user_id");
		$password = $_POST['password'];
		$updateData = array();
		$updateData['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
		$this->db->update(TABLE_USER_MASTER, $updateData, "id = $user_id");
		echo 1;
	}

	 
	public function send_contact_us_email(){
		$data = array();
		$data['name'] = $this->clear_input_string($_POST['name']);
		$data['email'] = $this->clear_input_string($_POST['email']);
		$data['tel'] = $this->clear_input_string($_POST['tel']);
		$data['comment'] = $this->clear_input_string($_POST['message']);
		$this->db->insert(TABLE_CITIZEN_CONTACT, $data);
		$id = $this->db->lastInsertId();
		if($id>0){
			$to = 'support@glomindz.com';
			$subject = 'Crimatrix: Contact us';
			$message = $data['message'];
			$headers = "From:".$data['email'];
			mail($to, $subject, $message, $headers);
		}
		echo 0;
	}

	function logout() {
		Session::init();
		Session::destroy();
		header('Location: ' . URL);
		exit;
	}
}

?>