<?php

class News_n_update extends Controller {
	
	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->view->render('news_n_update/index');
	}
}