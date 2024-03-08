<?php

class Mobile_Service extends Controller {

    function __construct() {
        parent::__construct();
    }

    function login() {
        $this->model->mlogin();
    }

    function get_all_police_station() {
        $this->model->get_all_police_station();
    }

    function search_criminal() {
        $this->model->search_criminal();
    }

    function save_criminial_profile(){
        $this->model->save_criminial_profile();
    }
    
    function forget_password() {
        $this->model->forget_password();
    }
    function get_crime_types() {
        $this->model->get_crime_types();
    }

}