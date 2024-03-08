<?php

class User_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function login(){
        $passwd = Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
        $user = $_POST['user'];
        $location = 'GHY';//$_POST['location'];
        $ip_address ='127.1.1.1';// $_POST['ip_address'];
        $table_user_master = TABLE_PREFIX . '_user_master';
        $query = "SELECT id, name, user_type, email, mobile FROM $table_user_master WHERE (email = '$user' OR mobile='$user') AND password = '$passwd' and status=1";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
		
        $sth->execute();
        $data = $sth->fetch();
        $count = $sth->rowCount();
        if ($count == 1) {
            $access_id = $this->write_access_log($user, $location, $ip_address);
            if ($access_id > 0) {
                Session::init();
                Session::set('user_id', $data['id']);
                Session::set('user_type', $data['user_type']);
                Session::set('email', $data['email']);
                Session::set('mobile', $data['mobile']);
                Session::set('name', $data['name']);
                Session::set('loggedIn', true);
                Session::set('location', $location);
                Session::set('ip_address', $ip_address);
                if ($data['user_type'] == 'admin') {
                    header('location: ' . URL.'employee/stocks/');
                }
            } else {
                header('Location: ' . URL . '?loginFailed');
            }
        } else {
            header('location: ' . URL . '?loginFailed');
        }
    }

    function write_access_log($user_id, $location, $ip_address) {
        $data['user_id'] = $user_id;
        $data['location'] = $location;
        $data['ip_address'] = $ip_address;
        $data['status'] = 1;
        $TABLE_USER_ACCESS_LOG=TABLE_PREFIX.'_user_access_log';
        $this->db->insert($TABLE_USER_ACCESS_LOG, $data);
        $id = $this->db->lastInsertId();
        return $id;
    }

    
    function logout() {
        Session::init();
        //echo 'fsdfsd'.Session::get('loggedIn');	
        $this->write_access_log(Session::get('user_id'), Session::get('location'), Session::get('ip_address'), 0);
        Session::destroy();
        header('Location: ' . URL);
        exit;
    }

}

?>