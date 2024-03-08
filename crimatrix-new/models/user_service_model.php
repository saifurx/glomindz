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
    
    function write_access_log($user_id, $location, $ip_address, $status) {
    	$data['user_id'] = $user_id;
    	$data['location'] = $location;
    	$data['ip_address'] = $ip_address;
    	$data['status'] = $status;
    	$this->db->insert(TABLE_USER_ACCESS_LOG, $data);
    	$id = $this->db->lastInsertId();
    	return $id;
    }
    
    function check_email($table, $email) {
    	//check for email
    	$query = "SELECT id FROM $table where email = '$email'";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	$count_email = $sth->rowCount();
    	return $count_email;
    }
    function check_mobile($table, $mobile) {
    	//check for mobile
    	$query = "SELECT id FROM $table where mobile = $mobile";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	$count_mobile = $sth->rowCount();
    	return $count_mobile;
    }
    
    function register_hotel_user(){
    	$password = $this->generate_password();
    	$data = array();
    	$data['name'] = $this->clear_input_string($_POST['name']);
    	$data['email'] = $this->clear_input_string($_POST['email']);
    	$data['mobile'] = $this->clear_input_string($_POST['mobile']);
    	$data['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
    	$data['user_type'] = 'hotel';
    	$data['role'] = 'admin';
    	$data['status'] = '0';
    	
    	$count_email = $this->check_email(TABLE_USER_MASTER, $data['email']);
    	$count_mobile = $this->check_mobile(TABLE_USER_MASTER, $data['mobile']);
    	if($count_email == 0 && $count_mobile == 0){
    		$this->db->insert(TABLE_USER_MASTER, $data);
    		$id = $this->db->lastInsertId();
    		if($id > 0){
    			$arr = array(
    				'user_id' => $id
    			);
    			$this->db->insert(TABLE_HOTEL_MASTER, $arr);
    			$this->sendSMS_("Welcome to Crimatrix. Your password is $password. Please Sign in to complete your profile.", $data['mobile']);
    			$this->send_registration_mail($data['name'], $data['email'], $password);
    		}
    		echo $id;
    	}
    	else{
    		$id = 0;
    		echo $id;
    	}
    }
    
    function login(){
    	$password = Hash::create('md5', $this->clear_input_string($_POST['password']), HASH_PASSWORD_KEY);
    	$username = $this->clear_input_string($_POST['username']); //username is mobile or email
    	$location = $_POST['location'];
    	$ip_address = $_POST['ip_address'];
    	$query = "SELECT * FROM " . TABLE_USER_MASTER . " WHERE (email = '$username' OR mobile='$username') AND password = '$password'";
    	$sth = $this->db->prepare($query);
    	$sth->execute();
    	$data = $sth->fetch();
    	$count = $sth->rowCount();
    	if ($count == 1) {
    		Session::init();
    		Session::set('user_id', $data['id']);
    		Session::set('user_type', $data['user_type']);
    		Session::set('email', $data['email']);
    		Session::set('mobile', $data['mobile']);
    		Session::set('name', $data['name']);
    		Session::set('status', $data['status']);
    		Session::set('role', $data['role']);
    		$access_id = $this->write_access_log($data['id'], $location, $ip_address, $data['status']);
    		if($access_id > 0){
    			Session::set('loggedIn', true);
    			if ($data['user_type'] == 'hotel'){
    				//header('location:'.URL.'hotel');
    				if ($data['status'] == 1) {
    					header('location: ' . URL . 'hotel');
    				} else {
    					header('location: ' . URL . 'hotel/profile');
    				}
    			}
    			if ($data['user_type'] == 'police'){
    				//header('location:'.URL.'police');
    				if ($data['status'] == 1) {
    					header('location: ' . URL . 'police');
    				} else {
    					header('location: ' . URL . 'police/profile');
    				}
    			}
    		} 
    		else{
    			header('Location:'.URL.'?loginFailed');
    		}
    	}
    	else{
    		header('location:'.URL.'?loginFailed');
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
    
    function get_policeStations() {
    	$query = "SELECT ps.* from " . TABLE_PS_MASTER . " ps, " . TABLE_CITY_MASTER . " city WHERE city.id = ps.city_id ORDER BY ps.name";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    function get_cities() {
    	$query = "SELECT * from " .TABLE_CITY_MASTER." ORDER BY name";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
	function get_crimeType() {
    	$query = "SELECT * from " .TABLE_CRIME_TYPE_MASTER." ORDER BY name";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
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