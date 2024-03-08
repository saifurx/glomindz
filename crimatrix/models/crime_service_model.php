<?php

class Crime_Service_Model extends Model{
	
	public function __construct(){
		parent::__construct();
		Session::init();
	}

	public function save_arrested_crimianl_data(){
		$user_id = Session::get('user_id');
		$data =array();
		$data['name'] = $_POST['name'];
		$data['father_name'] = $_POST['father_name'];
		$data['mobile_nos'] = $_POST['mobile_nos'];
		$data['case_ref_no'] = $_POST['case_ref_no'];
		$data['remarks'] = $_POST['remarks'];
		//$data['address'] = $_POST['address'];
		$data['ps_id'] = $_POST['ps_id'];
		//$data['arested_date'] = $_POST['arested_date'];
		$data['crime_type_id'] = $_POST['crime_type_id'];
		$data['longitude'] = $_POST['longitude'];
		$data['latitude'] = $_POST['latitude'];
		$data['user_id']= $user_id;
		$this->db->insert(TABLE_ARRESRTED_CRIMINAL, $data);
		$id =$this->db->lastInsertId();
		if($id > 0){
			$file = $id.'.jpg';
			$img = substr($_POST['data_url'], strpos($_POST['data_url'], ",") + 1);
			$decodedData = base64_decode($img);
			$success = file_put_contents('assets/uploded_img/arrested_criminal/'.$file, $decodedData);
			//resize main image
			$source_path = "assets/uploded_img/arrested_criminal/".$file;
			$destination="assets/uploded_img/arrested_criminal/".$file;
			$newwidth = 350;
			$this->resizeImg($newwidth,$source_path,$destination);
			//create thumb
			$source_path = "assets/uploded_img/arrested_criminal/".$file;
			$destination="assets/uploded_img/arrested_criminal/thumb/".$file;
			$newwidth = 50;
			$this->resizeImg($newwidth,$source_path,$destination);
		}
		echo $id;
		
	}
	
	function resizeImg($newwidth,$source_path,$destination) {
		$image = imagecreatefromjpeg($source_path);
		$width = imagesx($image);
		$height = imagesy($image);
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight, $width,$height);
		imagejpeg($tmp,$destination,100);
		imagedestroy($image);
		imagedestroy($tmp);
	}
	
	public function get_arrested_criminal(){
		$query = "SELECT ac.*, cm.name as crime_type FROM ".TABLE_ARRESRTED_CRIMINAL." ac ,".TABLE_CRIME_TYPE_MASTER." cm WHERE ac.crime_type_id = cm.id order by ac.last_update";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		//echo $query;
		$result = array();
		$image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
		foreach ($data as $row) {
			clearstatcache();
			$is_file_exist = false;
			$guest_id = $row['id'];
			$file = $guest_id . '.png';
			$file_url = 'assets/uploded_img/arrested_criminal/'. $file;
			$is_file_exist = file_exists($file_url);
			if (!$is_file_exist) {
				$image_url = URL.'assets/apps/img/profile_thumb_m.jpg';
			} else {
				$image_url = URL.$file_url;
			}
			$row['image_url'] = $image_url;
			$row['photo'] =0;
			$result[$guest_id] = $row;
		}
		header("Content-type: application/json");
		echo json_encode($result);
	}
	
	public function get_arrested_criminal_details(){
		$id = $_POST['id'];
		$query = "SELECT * FROM ".TABLE_ARRESRTED_CRIMINAL." WHERE id = $id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function update_arrested_criminal_details(){
		$id = $_POST['id'];
		$user_id = Session::get('user_id');
		$data =array();
		$data['name'] = $_POST['name'];
		$data['father_name'] = $_POST['father_name'];
		$data['mobile_nos'] = $_POST['mobile_nos'];
		$data['case_ref_no'] = $_POST['case_ref_no'];
		$data['remarks'] = $_POST['remarks'];
		$data['ps_id'] = $_POST['ps_id'];
		$data['crime_type_id'] = $_POST['crime_type_id'];
		$data['longitude'] = $_POST['longitude'];
		$data['latitude'] = $_POST['latitude'];
		$data['user_id']= $user_id;
		$this->db->update(TABLE_ARRESRTED_CRIMINAL, $data, "id = {$id}");
		echo $id;
	}
	
	public function get_vehicle_theft_alert($last_vt_id){
		$query ="SELECT id, DATE_FORMAT( last_update,  ' %h:%i %p  %d %M' ) AS received_on, vehicle_type, color, rc_no, theft_location, theft_time FROM ".TABLE_SMS_VEHCILE_THEFT." WHERE STATUS =  'Theft' and id > $last_vt_id ORDER BY last_update LIMIT 0 , 30";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function get_vehicle_theft(){
		$id=$_POST['id'];
		if($id == 0){
			$sth = $this->db->prepare("SELECT *,DATE_FORMAT( last_update,  ' %h:%i %p  %d %M' ) AS received_on FROM  ".TABLE_SMS_VEHCILE_THEFT."  ORDER BY id DESC LIMIT 0 , 1");
		}
		else{
			$sth = $this->db->prepare("SELECT *,DATE_FORMAT( last_update,  ' %h:%i %p  %d %M' ) AS received_on FROM  ".TABLE_SMS_VEHCILE_THEFT."  where id=$id");
		}
	
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function get_criminal_data(){
		$sth = $this->db->prepare("SELECT  id, age, case_ref_no, IFNULL(name,'') name, IFNULL(father_name,'') father_name, IFNULL(crime_type,'') crime_type, IFNULL(mobile,'') mobile, date_of_arrest FROM ".TABLE_ARRESRTED_CRIMINAL);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function get_vehcile_theft_details(){
		$crime_type_id = $_POST['crime_type_id'];
		$city_id = $_POST['city_id'];
		$ps_id = $_POST['ps_id'];
		 
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		 
		$query = "SELECT * FROM ".TABLE_SMS_VEHCILE_THEFT;//." WHERE last_update BETWEEN '$from_date' AND '$to_date'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	function get_crime_details(){
		$id = $_POST['id'];
		$query = "SELECT * FROM ".TABLE_SMS_VEHCILE_THEFT." WHERE id = $id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	function update_crime_details(){
		$mobile = Session::get('mobile');
		$id = $_POST['id'];
		$data =array();
		$data['crime_type_id'] = $_POST['crime_type_id'];
		$data['fir_no'] = $_POST['fir_no'];
		$data['case_ref'] = $_POST['case_ref'];
		$data['city_id'] = $_POST['city_id'];
		$data['ps_id'] = $_POST['ps_id'];
		$data['vehicle_type'] = $_POST['vehicle_type'];
		$data['color'] = $_POST['color'];
		$data['rc_no'] = $_POST['rc_no'];
		$data['theft_location'] = $_POST['theft_location'];
		$data['theft_time'] = $_POST['theft_time'];
		$data['status'] = $_POST['status'];
		$data['date_of_occurence'] = $_POST['date_of_occurence'];
		$data['user_mobile_no'] = $mobile;
		$this->db->update(TABLE_SMS_VEHCILE_THEFT, $data, "id = {$id}");
		echo $id;
	}
	
	function save_crime_details(){
		$user_id = Session::get('user_id');
		$data =array();
		$data['crime_type_id'] = $_POST['crime_type_id'];
		$data['fir_no'] = $_POST['fir_no'];
		$data['case_ref'] = $_POST['case_ref'];
		$data['city_id'] = $_POST['city_id'];
		$data['ps_id'] = $_POST['ps_id'];
		$data['crime_details'] = $_POST['crime_details'];
		$data['motive'] = $_POST['motive'];
		$data['victim_details'] = $_POST['victim_details'];
		$data['crime_location'] = $_POST['crime_location'];
		$data['status'] = $_POST['status'];
		$data['date_of_occurence'] = $_POST['date_of_occurence'];
		$data['user_id'] = $user_id;
		$this->db->insert(TABLE_CRIME_DETAILS, $data);
		$id =$this->db->lastInsertId();
		echo $id;
	}
	

	function get_crime_data(){
		$crime_type_id = $_POST['crime_type_id'];
		$city_id = $_POST['city_id'];
		$ps_id = $_POST['ps_id'];
		 
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];
		 
		$query = "SELECT * FROM ".TABLE_CRIME_DETAILS." WHERE date_of_occurence BETWEEN '$from_date' AND '$to_date'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function get_watchlist_data(){
		$query = "SELECT * FROM ".TABLE_WATCHLIST_MASTER;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		$result = array();
		$image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
		foreach ($data as $row) {
			clearstatcache();
			$is_file_exist = false;
			$guest_id = $row['id'];
			$file = $guest_id . '.jpg';
			$file_url = 'assets/uploded_img/watchlist/'. $file;
			$is_file_exist = file_exists($file_url);
			if (!$is_file_exist) {
				$image_url = URL.'assets/apps/img/profile_thumb_m.jpg';
			} else {
				$image_url = URL.$file_url;
			}
			$row['image_url'] = $image_url;
			$result[$guest_id] = $row;
		}
		header("Content-type: application/json");
		echo json_encode($result);
	}
	
}	