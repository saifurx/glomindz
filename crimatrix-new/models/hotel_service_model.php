<?php

class Hotel_Service_Model extends Model{
	
	public function __construct(){
		parent::__construct();
		Session::init();
	}

	function check_email($table, $email) {
		//check for email
		$query = "SELECT id FROM $table where email = '$email'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		$count_email = $sth->rowCount();
		if($count_email == 0){
			return $count_email;
		}
		else{
			return $data[0]['id'];
		}
	}
	
	function check_mobile($table, $mobile) {
		//check for mobile
		$query = "SELECT id FROM $table where mobile = $mobile";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		$count_mobile = $sth->rowCount();
		if($count_mobile == 0){
			return $count_mobile;
		}
		else{
			return $data[0]['id'];
		}
	}

	function get_hotel_user_profile_details(){
		$user_id = $_POST['user_id'];
		$data = array();
		$query = "SELECT um.*
    			FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm
	    		WHERE um.id = hm.user_id AND um.id = $user_id";
		
		$query = "SELECT um.*, hm.ps_id, hm.contact_person, hm.address, hm.locality, hm.pin, hm.no_of_rooms, hm.licence_no
				FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm
				WHERE um.id = $user_id AND um.id = hm.user_id AND user_type = 'hotel'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	
	function update_hotel_user_profile(){
		$user_id = $_POST['user_id'];
		$data = array();
		$data['name'] = $this->clear_input_string($_POST['name']);
		$data['email'] = $this->clear_input_string($_POST['email']);
		$data['mobile'] = $this->clear_input_string($_POST['mobile']);
		$user_type = 'hotel';
	
		$count_email = $this->check_email(TABLE_USER_MASTER, $data['email']);
		$count_mobile = $this->check_mobile(TABLE_USER_MASTER, $data['mobile']);
		 
		if(($count_email == 0 || $count_email == $user_id) &&($count_mobile == 0 || $count_mobile == $user_id)){
			$this->db->update(TABLE_USER_MASTER, $data, "id = {$user_id} and user_type='$user_type'");
			$arr = array();
			$arr['user_id'] = $user_id;
			$arr['address'] = $this->clear_input_string($_POST['address']);
			$arr['city_id'] = $this->clear_input_string($_POST['city_id']);
			$arr['ps_id'] = $this->clear_input_string($_POST['ps_id']);
			$arr['contact_person'] = $this->clear_input_string($_POST['contact_person']);
			$arr['licence_no'] = $this->clear_input_string($_POST['licence_no']);
			$arr['no_of_rooms'] = $this->clear_input_string($_POST['no_of_rooms']);
			$arr['pin'] = $this->clear_input_string($_POST['pin']);
			$arr['locality'] = $this->clear_input_string($_POST['locality']);
			$this->db->update(TABLE_HOTEL_MASTER, $arr, "user_id = $user_id");
	
			echo 1;
		}
		else{
			echo 0;
		}
	}
	
	function save_new_guest(){
		$guest_id=0;
		$hotel_id=Session::get("user_id");
		$today=date('Y-m-d', time());
		$check_out_date=date('Y-m-d', strtotime($today. ' + 90 day'));
		$check_in_time = date('g:i a');
		$data_url = $_POST['data_url'];
	
		$data = array();
		$data['room_no']=$_POST['room_no'];
		$data['name']=$_POST['name'];
		$data['mobile']=$_POST['mobile_no'];
		$data['comming_from']=$_POST['comming_from'];
		$data['going_to']=$_POST['going_to'];
		$data['id_type']=$_POST['id_type'];
		$data['id_no']=$_POST['id_no'];
		$data['sex']=$_POST['sex'];
		$data['age']=$_POST['age'];
		$data['nationality']=$_POST['nationality'];
		$data['vehicle_no']=$_POST['vehicle_no'];
		$data['date_arrival']= $_POST['guestlist_date'];
		$data['check_in_time'] = $check_in_time;
		$data['date_deparature']= $check_out_date;
		$data['hotel_id'] = $hotel_id;
		$data['guestlist_date']=$_POST['guestlist_date'];
		$data['upload_type']= 'direct_upload';
		$this->db->insert(TABLE_HOTEL_GUSTLIST, $data);
		$guest_id=$this->db->lastInsertId();
		
		if($guest_id > 0 && ( $data_url == 0 || $data_url != '' )){
			$file = $guest_id.'.jpg';
			$img = substr($_POST['data_url'], strpos($_POST['data_url'], ",") + 1);
			$decodedData = base64_decode($img);
			$success = file_put_contents('assets/uploded_img/hotel_guest/'.$file, $decodedData);
				
			//resize main image
			$source_path = "assets/uploded_img/hotel_guest/".$file;
			$destination="assets/uploded_img/hotel_guest/".$file;
			$newwidth = 350;
			$this->resizeImg($newwidth,$source_path,$destination);
			//create thumb
			$source_path = "assets/uploded_img/hotel_guest/".$file;
			$destination="assets/uploded_img/hotel_guest/thumb/".$file;
			$newwidth = 50;
			$this->resizeImg($newwidth,$source_path,$destination);
			$data['img'] = 'assets/uploded_img/hotel_guest/thumb/'.$guest_id.'.jpg';
			
		}
		else{
			$data['img'] = 'assets/apps/img/profile_thumb_m.jpg';
		}
		$data['dataurl'] = $data_url;
		$data['id'] = $guest_id;
		
		echo json_encode($data);
	}
	
	public function get_hotel_guestlists_day(){
		$user_id=Session::get("user_id");
		$day=$_POST['day'];
		$query="SELECT * FROM ".TABLE_HOTEL_GUSTLIST." WHERE hotel_id = $user_id AND guestlist_date <= '$day' AND date_deparature>='$day' ORDER BY id ";
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
			$file_url = 'assets/uploded_img/hotel_guest/thumb/'.$file;
			$is_file_exist = file_exists($file_url);
			if (!$is_file_exist) {
				$image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
			} else {
				$image_url = URL . $file_url;
			}
			$row['image_url'] = $image_url;
			$result[$guest_id] = $row;
		}
		header('Content-type: application/json');
		echo json_encode($result);
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
	
	public function update_date_deparature(){
		$today=date('Y-m-d', time());
		$id = $_POST['id'];
		$date_deparature = $today;//$_POST['date_deparature'];
		$query="UPDATE ".TABLE_HOTEL_GUSTLIST." SET date_deparature='$date_deparature' , check_out_status=1  where id=$id";
		$sth = $this->db->prepare($query);
		$sth->execute();
		echo $id;
	}
	
}
?>