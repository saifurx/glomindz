<?php

class Email extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        date_default_timezone_set('Asia/Kolkata');
    }
}    