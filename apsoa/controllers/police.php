<?php

class Police extends Controller {

    function __construct() {
        parent::__construct();
        Session::init();
        Auth::handleLogin();
    }

    function index() {
        $this->view->title = 'Internal';

        $this->view->render('header');
        $this->view->render('police/index');
        $this->view->render('footer');
    }

    function members() {
        $this->view->title = 'Internal';

        $this->view->render('header');
        $this->view->render('police/police_users');
        $this->view->render('footer');
        
    }

}

