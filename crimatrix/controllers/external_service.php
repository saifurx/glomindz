<?php

class External_Service extends Controller {

    function __construct() {
        parent::__construct();
		header("Access-Control-Allow-Origin: http://guwahaticitypolice.com");
		header("Access-Control-Allow-Origin: http://tempweb2255.nic.in");
    }

    function save_new_guest() {

        $this->model->save_new_guest();
    }

    function check_out_guest() {

        $this->model->check_out_guest();
    }

    function login() {
        $this->model->login();
    }
	
	/*** Guwahati City Police ***/
	
	function gcpContact(){
		$this->model->gcpContact();
	}
	
	function sendGCPTip(){
		$this->model->sendGCPTip();
	}

}