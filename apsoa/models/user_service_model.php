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
      // echo "test"; 
        $username=$_POST['username'];
        $password = Hash::create('md5', $this->clear_input_string($_POST['password']), HASH_PASSWORD_KEY);
    	$username = $this->clear_input_string($username); //username is mobile or email
    	//$location = $_POST['location'];
    	//$ip_address = $_POST['ip_address'];
    	$query = "SELECT * FROM " . TABLE_USER_MASTER . " WHERE (email = '$username' OR mobile='$username') AND password = '$password'";
       // echo $query;
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
    		$access_id = 1;//$this->write_access_log($data['id'], $location, $ip_address, $data['status']);
    		if($access_id > 0){
    			Session::set('loggedIn', true);
    			if ($data['user_type'] == 'police'){
    				//header('location:'.URL.'hotel');
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
    
    function logout() {
        Session::init();
        Session::destroy();
        header('Location: ' . URL);
        exit;
    }
}

?>