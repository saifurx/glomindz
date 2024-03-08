<?php

class ResourceMap extends Controller {

	function __construct() {
		parent::__construct();
	}
	// menu level functions

	function raw_material() {
		$this->view->districtList=$this->model->districtList();
		$this->view->rm_type=$this->model->raw_material_type();
		$this->view->render('resourcemap/raw_material');

	}
	function human_resource() {
		$this->view->districtList=$this->model->districtList();
		$this->view->hr_catagory=$this->model->human_resource_catagory();
		$this->view->render('resourcemap/human_resource');

	}
	function general_infrastructure() {
		$this->view->districtList=$this->model->districtList();
		$this->view->infra_structure_type=$this->model->infra_structure_type();
		$this->view->render('resourcemap/general_infrastructure');

	}
	function growth_prospects() {
		$this->view->render('resourcemap/growth_prospects');

	}
	function remarks() {
		$this->view->render('resourcemap/remarks');

	}
	
	//filter level functions

	function getRawMaterialList() {

		$this->model->getRawMaterialList();

	}
	
	function getHumanResourceList() {
	
		$this->model->getHumanResourceList();
	
	}
	function getInfraStructureList() {
	
		$this->model->getInfraStructureList();
	
	}
	function getBlockList() {
		$this->model->getBlockList();
	
	}
	//apply filter methods

	public function get_raw_material_data(){
		$dist_id=$_POST['dist_id'];
		$rm_items_id=$_POST['rm_items_id'];
		$this->model->get_raw_material_data($dist_id,$rm_items_id);
	}
	public function get_human_resource_data(){
		$dist_id=$_POST['dist_id'];
		$hr_items_id=$_POST['hr_items_id'];
		$this->model->get_human_resource_data($dist_id,$hr_items_id);
	}
	
	public function get_infra_structure_data(){
		$dist_id=$_POST['dist_id'];
		$infra_id=$_POST['infra_items_id'];
		$this->model->get_infra_structure_data($dist_id,$infra_id);
	}
	public function get_block_profile_data(){
		$block_id=$_POST['block_name'];
		$this->model->get_block_profile_data($block_id);
	}	
}