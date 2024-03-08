<?php

class Admin extends Controller {

	public function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}

	}

	public function index()
	{
		$this->view->userList =$this->model->userList();
		$this->view->render('admin/index');
	}
	public function change_password()
	{
		$this->view->render('admin/change_password');
	}
	public function edit_block(){
		$this->view->topography=$this->model->topography();
		$this->view->districtList=$this->model->districtList();
		$this->view->render('admin/edit_block');
	}
	public function analytics()
	{
		$this->view->contactUsers=$this->model->contactUsers();
		$this->view->downloadUsers=$this->model->downloadUsers();
		$this->view->render('admin/analytics');
	}
	public function remarks()
	{
		$this->view->districtList=$this->model->districtList();
		$this->view->render('admin/block_remarks');
	}
	public function approve()
	{

		$this->view->render('admin/approve');
	}
	public function modification()
	{
		$this->view->render('admin/modification');
	}
	public function logout(){

		Session::destroy();
		header('location: ' . URL.'login/' );
		exit;
	}

	// user funtions
	public function edit($id)
	{
		$this->view->profile = $this->model->myprofile($id);
		$this->view->render('admin/edit_user');
	}

	public function editSave()
	{
		$data = array();
		$data['name'] = $_POST['name'];
		$data['loc'] = $_POST['loc'];
		$data['mobile'] = $_POST['mobile'];
		$data['url'] = $_POST['url'];
		$data['id'] = $_POST['id'];
		$this->model->editSave($data);
		$this->view->profile = $this->model->myprofile($_POST['id']);
		$this->view->render('admin/myprofile');
	}

	public function approveUser(){
		$this->model->approveUser();
	}
	public function get_rm(){
		$this->model->get_rm();
	}
	public function get_hr(){
		$this->model->get_hr();
	}
	public function get_gen_infra(){
		$this->model->get_gen_infra();
	}
	public function get_growth_poss(){
		$this->model->get_growth_poss();
	}

	public function save_changed_password(){
		$this->model->save_changed_password();
	}
}