<?php
class User_Service extends Controller {

    function __construct() {
        parent::__construct();
    }

    function login() 
    {
        $this->model->login();
    }
    
	function logout() {
        $this->model->logout();
    }
}