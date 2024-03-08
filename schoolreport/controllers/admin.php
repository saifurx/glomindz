<?php
class Admin extends Controller{

	function __construct() {
		parent::__construct();
                Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('user_type');
		
		if ($logged == false || $role != 'admin') {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}
	
	function index() {
		$this->view->render('admin/index');
	}
	
	function faculty() {
		$this->view->render('admin/faculty');
	}
	
	function fee_structure() {
		$this->view->render('admin/fee_structure');
	
	}
	
	function save_new_student(){
		$this->model->save_new_student();
	}
	
	function save_new_faculty(){
		$this->model->save_new_faculty();
	}
	
	function get_all_student_data($search_query){
		$this->model->get_all_student_data($search_query);
	}
	function get_all_faculty_data($search_query){
		$this->model->get_all_faculty_data($search_query);
	}
	
	function get_student_info(){
		$this->model->get_student_info();
	}
	
	function get_faculty_info(){
		$this->model->get_faculty_info();
	}
	
	function update_student(){
		$this->model->update_student();
	}
	
	function update_faculty(){
		$this->model->update_faculty();
	}
	
	
	
	/*function change_account_status(){
		$this->model->change_account_status();
	}*/
}