<?php

class Update_block extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false) {
			Session::destroy();
			header('location: login');
			exit;
		}
	}
	function update_gen_info(){
		$this->model->update_gen_info();
	}
	function update_raw_material(){
		$this->model->update_raw_material();
	}
	function update_human_resource(){
		$this->model->update_human_resource();
	}
	function update_gen_infra(){
		$this->model->update_gen_infra();
	}
	function update_growth_possibilities(){
		$this->model->update_growth_possibilities();
	}
	//update from temp
	function block_rm_update(){
		$this->model->block_rm_update();
	}
	function temp_block_rm_update_regect(){
		$this->model->temp_block_rm_update_regect();
	}
	function block_hr_update(){
		$this->model->block_hr_update();
	}
	function temp_block_hr_update_regect(){
		$this->model->temp_block_hr_update_regect();
	}
	function block_infra_update(){
		$this->model->block_infra_update();
	}
	function temp_block_infra_update_regect(){
		$this->model->temp_block_infra_update_regect();
	}
	function block_growth_possibilites_update(){
		$this->model->block_growth_possibilites_update();
	}
	function temp_block_growth_possibilites_update_regect(){
		$this->model->temp_block_growth_possibilites_update_regect();
	}
}