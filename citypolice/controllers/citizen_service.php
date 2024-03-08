<?php

class Citizen_service extends Controller {

	function __construct() {
		parent::__construct();
	}
	function know_ur_ps() {
		$this->view->render('citizen_service/know_ur_ps');
	}
	
	function list_of_ngo(){
		$this->view->render('citizen_service/list_of_ngo');
	}	
	
	function district_juvenile_protection_unit(){
		$this->view->render('citizen_service/district_juvenile_protection_unit');
	}

	function passport_status_info(){
		$this->view->render('citizen_service/passport_status_info');
	}
	
	function rewards_for_giving_info(){
		$this->view->render('citizen_service/rewards_for_giving_info');
	}
	
	function downloads(){
		$this->view->render('citizen_service/downloads');
	}
}