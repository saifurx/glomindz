<?php

class Crime extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function vehicletheft() {
		$this->view->render('crime/vehicletheft');
	}
	
	function atm_frauds() {
		$this->view->render('crime/atm_frauds');
	}
	
	function non_banking_n_chit_fund_cases() {
		$this->view->render('crime/non_banking_n_chit_fund_cases');
	}
	
	function pending_cases() {
		$this->view->render('crime/pending_cases');
	}
}
