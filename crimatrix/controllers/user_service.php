<?php

class User_Service extends Controller {

    function __construct() {
        parent::__construct();
    }

    function login() {
        $this->model->login();
    }

    function register_user() {
        $result = $this->model->register_user();
        $html = array();
        if ($result == 1) {
            $html[0] = 'Congratulations! You Have Successfully</br> Registered. We will verify and activate <br/>your account within 24hrs';
        } else if ($result == 0) {
            $html[0] = 'You already registered! <br/><a href="#forgetpasswdModal" role="button" data-toggle="modal" class="">Forgot Password ?</a>';
        } else {
            $html[0] = 'Oh! You got an error!';
        }
        echo json_encode($html);
    }

    function get_all_ps() {
        $this->model->get_all_ps();
    }

    function send_contact_us_email() {
        $this->model->send_contact_us_email();
    }

    function recover_password() {
        $this->model->recover_password();
    }

    function logout() {
        $this->model->logout();
    }

}