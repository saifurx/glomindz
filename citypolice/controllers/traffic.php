<?php

class Traffic extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function accidentdata() {
		$this->view->render('traffic/accidentdata');
	}
	
	function fine_collected() {
		$this->view->render('traffic/fine_collected');
	}
}