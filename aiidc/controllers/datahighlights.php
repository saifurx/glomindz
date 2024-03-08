<?php

class DataHighlights extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->render('datahighlights/index');
	}	
	public function get_data_highlight_array() {
		$this->model->get_data_highlight_array();
	}
	public function get_dist_blocks() {
		$this->model->get_dist_blocks();
	}
	public function get_raw_material() {
		$this->model->get_raw_material();
	}
	public function get_human_resource() {
		$this->model->get_human_resource();
	}
	 
}