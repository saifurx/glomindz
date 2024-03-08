<?php
class Crime_Service extends Controller{

	function __construct() {
		parent::__construct();
		Session::init();
		
	}
	
	function add_arrested_criminal(){
		$this->model->add_arrested_criminal();
	}
	
	function get_arrested_criminal(){
		$this->model->get_arrested_criminal();
	}
	
	function search_arrested_criminal(){
		$this->model->search_arrested_criminal();
	}
	
	function arrested_criminal_details(){
		$this->model->arrested_criminal_details();
	}

}