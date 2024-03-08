<?php

class Profile extends Controller {

	function __construct() {
		parent::__construct();
	}

	function get_district_center($id) {
		$this->model->get_district_center($id);
	}

	function block_profile_details($data) {
		$this->view->block_id=$data;
		$this->view->render('profile/block_profile_details');
	}
	function block_profile_print($data) {
		$this->view->block_id=$data;
		$this->view->render('profile/block_profile_print',true);
	}
	function block_profile() {
		$this->view->dist_and_blocks = $this->model->dist_and_blocks();
		$this->view->render('profile/block_profile');
	}

	function district_profile_details($district_id) {
		$this->view->district_id=$district_id;
		$this->view->render('profile/district_profile_details');
	}
	function district_profile_print($district_id) {
		$this->view->district_id=$district_id;
		$this->view->render('profile/district_profile_print',true);
	}
	function district_profile() {
		$this->view->render('profile/district_profile');
	}

	public function get_all_block() {
		$this->model->get_all_block();
	}

	public function get_all_district(){
		$this->model->get_all_district();
	}

	public function get_general_info() {
		$this->model->get_general_info();
	}

	public function raw_materials() {
		$this->model->getRawmaterials();
	}

	function human_resource() {
		$this->model->gethuman_resource();
	}

	function dist_and_blocks() {
		$this->model->dist_and_blocks();
	}

	function general_infra() {
		$this->model->getGen_infra();
	}

	function growth_possiblities() {
		$this->model->getGrowth_possiblities();
	}
	//district
	function getDictpopulition() {
		$this->model->getDictpopulition();
	}
	function getDict_raw_material() {
		$this->model->getDict_raw_material();
	}
	function getDict_human_resource() {
		$this->model->getDict_human_resource();
	}
	function get_block_gm_comments(){
		$this->model->get_block_gm_comments();
	}
	function get_block_gm_comments_available_loc(){
		$this->model->get_block_gm_comments_available_loc();
	}
	function get_block_gm_comments_viable_mdsd(){
		$this->model->get_block_gm_comments_viable_mdsd();
	}
}