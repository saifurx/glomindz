<?php

class User_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function run() {
        $table = TABLE_PREFIX . "_user_master";
        $passwd = Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
        $email = $_POST['email'];
        $query = "SELECT * FROM $table WHERE email = '$email' AND password = '$passwd' and status=1";

        $sth = $this->db->prepare($query);
        $sth->execute();

        $data = $sth->fetch();

        $count = $sth->rowCount();
        if ($count > 0) {
            Session::init();
            Session::set('user_id', $data['id']);
            Session::set('role', $data['role']);
            Session::set('email', $_POST['email']);
            Session::set('name', $data['name']);
            Session::set('loggedIn', true);
            
            header("location: ../admin");
            
        } else {
            header('location: ' . URL . '?loginFailed');
        }
    }

    public function send_contact_us_email() {
        $table_contact=TABLE_PREFIX.'_contact_master';
        $data = array();
        $data['name'] = $this->clear_input_string($_POST['name']);
        $data['email'] = $this->clear_input_string($_POST['email']);
        $data['mobile'] = $this->clear_input_string($_POST['tel']);
        $data['comment'] = $this->clear_input_string($_POST['message']);
        $this->db->insert($table_contact, $data);
        $id = $this->db->lastInsertId();

        if ($id > 0) {
            $to = 'saifur.rahman@glomindz.com,sarfaraz.hassan@glomindz.com';
            $subject = 'Glomindz: Contact us';
            $message = $data['comment']."\n\n Contact Person\nMobile:\t". $data['mobile']."\nEmail:\t". $data['email'];
            $headers = "From:" . $data['email'];
            mail($to, $subject, $message, $headers);
        }
        echo $id;
    }

    function clear_input_string($str) {

        return str_replace(array("'", "'", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
    }

}