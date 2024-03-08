<?php
class Analytics extends Controller {

	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');

		if ($logged == false) {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}
	public function burntdown_chart(){
		$this->model->burntdown_chart();
	}
}