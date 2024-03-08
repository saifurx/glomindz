<?php
class Police extends Controller{

	function __construct() {
		parent::__construct();
                Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('user_type');
		
		if ($logged == false || $role != 'police') {
			Session::destroy();
			header('location: '.URL);
			exit;
		}
	}
	
	function index(){
		$this->view->render('police/index');
	}
	
	public function crime_map_cricle(){
		$this->view->render('police/crime_map_cricle');
	}
	
	public function hotels_n_lodges(){
		$this->view->render('police/hotels_n_lodges');
	}
	
	public function ps_hotel_list(){
		$this->view->render('police/ps_hotel_list');
	}
	
	public function watch_list(){
		$this->view->render('police/watch_list');
	}
	
	public function arrests(){
		$this->view->render('police/arrests');
	}
	
	public function police_users()	{
		$this->view->render('police/police_users');
	}
		
	public function hotels_users()	{
		$this->view->render('police/hotels_users');
	}
	
	public function crime()	{
		$this->view->render('police/crime');
	}
	
	public function profile(){
		$this->view->render('police/profile');
	}
	
    public function police_profile(){
		$this->view->render('police/police_profile');
	}
	
    public function print_guest_list(){
        $this->view->guest_listdate=$_GET['guest_list_date'];
        $this->view->hotel_id=$_GET['hotel_id'];
    	$this->view->hotel_name=$_GET['hotel_name'];
		 $this->view->render('police/hotel_guest_list');
	}
}	