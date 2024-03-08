<?php
class User_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function clear_input_string($str) {

        return str_replace(array("'", "'", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
    }

	function login() {
	
		$passwd = Hash::create('md5', $this->clear_input_string($_POST['password']), HASH_PASSWORD_KEY);
		$user = $this->clear_input_string($_POST['user']);
		$query = "SELECT * FROM sr_user_master WHERE (email = '$user' OR mobile_no='$user') AND password = '$passwd'";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data = $sth->fetch();
	
		$count = $sth->rowCount();
		
		if ($count > 0) {
			Session::init();
			Session::set('id', $data['id']);
			Session::set('user_type', $data['user_type']);
			Session::set('email', $data['email']);
			Session::set('mobile_no', $data['mobile_no']);
			Session::set('name', $data['name']);
			Session::set('status', $data['status']);
			if ($data['user_type'] == 'admin') {
				if ($data['status'] == 1) {
					    Session::set('loggedIn', true);
						header('location: ' . URL . 'admin');
				}  
			else {
						header('Location: ' . URL . '?loginFailed');
					}
			}
			
			if ($data['user_type'] == 'student') {
				if ($data['status'] == 1) {
					Session::set('loggedIn', true);
					header('location: ' . URL . 'student');
				} 
			else {
					header('location: ' . URL . '?loginFailed');
				}
			}
			
			
		}
		echo json_encode($data) ;
	}
	
	function logout() {
        Session::init();
        Session::destroy();
        header('Location: ' . URL);
        exit;
    }
}

