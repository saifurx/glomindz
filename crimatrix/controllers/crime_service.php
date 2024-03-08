<?php
class Crime_Service extends Controller{

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
	
    public function save_arrested_crimianl_data(){
	    $this->model->save_arrested_crimianl_data();
    }
	
    public function get_arrested_criminal(){
    	$this->model->get_arrested_criminal();
    }
    
    public function get_arrested_criminal_details(){
    	$this->model->get_arrested_criminal_details();
    }
  
   	public function update_arrested_criminal_details(){
    	$this->model->update_arrested_criminal_details();
    }
    
    public function get_watchlist_data(){
    	$this->model->get_watchlist_data();
    }
    
    public function search_watchlist($search_str){
    	$this->model->search_watchlist($search_str);
    }
    
    public function new_watchlist(){
    	$this->model->new_watchlist();
    }
    
    
    public function get_vehicle_theft_alert($last_vt_id){
    	$this->model->get_vehicle_theft_alert($last_vt_id);
    }
    
    public function get_vehicle_theft(){
    	$this->model->get_vehicle_theft();
    }

    public function get_watchlist_alerts(){
    	$this->model->get_watchlist_alerts();
    }
    
    public function get_criminal_data($search_str){
    	$this->model->get_criminal_data($search_str);
    }
    
	public function get_vehcile_theft_details(){
    	$this->model->get_vehcile_theft_details();
    }
    
    function get_crime_details(){
    	$this->model->get_crime_details();
    }
    
    function update_crime_details(){
    	$this->model->update_crime_details();
    }
    
    function save_crime_details(){
    	$this->model->save_crime_details();
    }

    function get_crime_data(){
    	$this->model->get_crime_data();
    }
}