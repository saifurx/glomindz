<?php

class Criminals extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function criminal_gallery() {
		$this->view->render('criminals/criminal_gallery');
	}
	
}
