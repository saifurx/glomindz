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
        $location = $_POST['location'];
        $ip_address = $_POST['ip_address'];
        //$query = "SELECT id, profile_id,name, user_type, email, mobile,status,role FROM " . TABLE_USER_MASTER . " WHERE (email = '$user' OR mobile='$user') AND password = '$passwd'";
        
        $query = "SELECT um.id, um.profile_id, um.name, um.user_type, um.email,
        um.mobile, um.status, um.role, pm.ps_id FROM ".TABLE_USER_MASTER." um, ".TABLE_POLICE_MASTER." pm
        WHERE (um.email = '$user' OR um.mobile='$user') AND um.password = '$passwd' AND um.profile_id = pm.id";
        $sth = $this->db->prepare($query);
        $sth->execute();
        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count == 1) {
            Session::init();
            Session::set('user_id', $data['id']);
            Session::set('user_type', $data['user_type']);
            Session::set('profile_id', $data['profile_id']);
            Session::set('email', $data['email']);
            Session::set('mobile', $data['mobile']);
            Session::set('name', $data['name']);
            Session::set('status', $data['status']);
            Session::set('role', $data['role']);
            Session::set('ps_id', $data['ps_id']);
            Session::set('location', $location);
            Session::set('ip_address', $ip_address);
            $access_id =1;// $this->write_access_log($data['id'], $location, $ip_address, 1);
            //echo $data['user_type'];
            if ($access_id > 0) {
                Session::set('loggedIn', true);

                if ($data['user_type'] == 'hotel') {
                    if ($data['status'] == 1) {
                        header('location: ' . URL . 'hotel');
                    } else {
                        header('location: ' . URL . 'hotel/profile');
                    }
                }
                if ($data['user_type'] == 'police') {
                    if ($data['status'] == 1) {
                        header('location: ' . URL . 'police');
                    } else {
                        header('location: ' . URL . 'police/profile');
                    }
                }
            } else {
                header('Location: ' . URL . '?loginFailed');
            }
        } else {
            header('location: ' . URL . '?loginFailed');
        }
    }

    function write_access_log($user_id, $location, $ip_address, $status) {
        $data['user_id'] = $user_id;
        $data['location'] = $location;
        $data['ip_address'] = $ip_address;
        $data['status'] = $status;
        //print_r($data);
        $this->db->insert(TABLE_USER_ACCESS_LOG, $data);
        $id = $this->db->lastInsertId();
        return $id;
    }

    function get_all_ps() {
        $query = "SELECT ps.* from " . TABLE_PS_MASTER . " ps, " . TABLE_CITY_MASTER . " city WHERE city.id = ps.city_id ORDER BY ps.name";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    function get_all_city() {
    	$query = "SELECT * from " .TABLE_CITY_MASTER." ORDER BY name";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    public function register_user() {
        // if('hotel') save in hotel else save in police with status 0
        $table = '';
        $user_type = $this->clear_input_string($_POST['user_type']);

        if ($user_type == 'hotel') {
            $table = TABLE_HOTEL_MASTER;
        } else if ($user_type == 'police') {
            $table = TABLE_POLICE_MASTER;
        }
        $result = '';
        $data = array();
        $data['name'] = $this->clear_input_string($_POST['name']);
        $data['email'] = $this->clear_input_string($_POST['email']);
        $data['mobile'] = $this->clear_input_string($_POST['mobile']);
        $password = $this->generate_password();
        $count = $this->check_user($table, $data['email'], $data['mobile']);
        if ($count == 0) {
            $this->db->insert($table, $data);
            $id = $this->db->lastInsertId();
            if ($id > 0) {

                $arr = array();
                $arr['profile_id'] = $id;
                $arr['name'] = $data['name'];
                $arr['email'] = $data['email'];
                $arr['mobile'] = $data['mobile'];
                $arr['user_type'] = $user_type;
                $arr['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
                $arr['status'] = 0;

                $this->db->insert(TABLE_USER_MASTER, $arr);
                $this->sendSMS_("Welcome to Crimatrix. Your password is $password. Please Sign in to complete your profile.", $data['mobile']);
                $this->send_registration_mail($data['name'], $data['email'], $password);
                $result = 1;
            } else {
                $result = -1;
            }
        } else {
            $result = 0;
        }
        return $result;
    }

    function generate_password() {
        $chars = "0123456789";
        return substr(str_shuffle($chars), 0, 6);
    }

    function check_user($table, $email, $mobile) {
        //check for email
        $query = "SELECT id FROM $table where email = '$email'";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $count_email = $sth->rowCount();
        //check for mobile
        $query = "SELECT id FROM $table where mobile = $mobile";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $count_mobile = $sth->rowCount();
        return $count_email + $count_mobile;
    }

    function logout() {
        Session::init();
        //echo 'fsdfsd'.Session::get('loggedIn');
        $this->write_access_log(Session::get('user_id'), Session::get('location'), Session::get('ip_address'), 0);
        Session::destroy();
        header('Location: ' . URL);
        exit;
    }

    function send_registration_mail($name, $email, $passwd) {

        $mailcheck = $this->spamcheck($email);
        if ($mailcheck == FALSE) {
            return "Invalid input";
        } else {
            $to = $email . ', support@glomindz.com'; // note the comma
            $subject = $name.' successfully registered on Crimatrix';
            $message = "Dear $name,  \n\n\You have successfully registered your hotel on Crimatrix. Please Sign in with your registered email or mobile and complete your hotel profile.\n\nYour password is $passwd\n\nOur team will call you on your registered mobile number for verification within 24hrs and activate your profile.\n\nYou can start submitting your guest list only after activation.";
            $message=$message."Thanks and Regards\nCrimatrix Team\nsupport@glomindz.com\n9706913741(Kallol Pratim)";
            $headers = "From:support@crimatrix.com";
            return mail($to, $subject, $message, $headers);
        }
    }

    public function spamcheck($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function recover_password() {
        $email = $this->clear_input_string($_POST['email']);
        $query = "SELECT id,name FROM " . TABLE_USER_MASTER . " where email = '$email'";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $count_email = $sth->rowCount();
        $password = $this->generate_password();
        if ($count_email == 1) {
            
            $password_hash = Hash::create('md5', $password, HASH_PASSWORD_KEY);
            $query = "UPDATE " . TABLE_USER_MASTER . " SET password='$password_hash' where email = '$email'";
            $sth = $this->db->prepare($query);
            $sth->execute();
            $this->send_reset_password_mail($data[0]['name'], $email, $password);
            echo 'Password Reset! Please check your email';
        } else {

            echo 'Email is not registered with crimatrix';
        }
    }

    function send_reset_password_mail($name, $email, $password) {
        $mailcheck = $this->spamcheck($email);
        if ($mailcheck == FALSE) {
            return "Invalid input";
        } else {


            $to = $email . ', support@glomindz.com'; // note the comma
            $subject = 'Crimatrix: Password Reset';
            $message = "Dear $name,  \n\n\t Your password account has been reset to $password.Please login with your registred email or mobile.\n\n\nThanks and Regards\nCrimatrix Team\nsupport@glomindz.com\n9706913741(Kallol Pratim)";
            $headers = "From:support@crimatrix.com";
            return mail($to, $subject, $message, $headers);
        }
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
}

?>