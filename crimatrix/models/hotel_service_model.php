<?php

class Hotel_Service_Model extends Model{
	
	public function __construct(){
		parent::__construct();
		Session::init();
	}
	
	public function get_user_profile_details(){
		$id = $_POST['id'];
		$query = "SELECT hm.* FROM ".TABLE_HOTEL_MASTER." hm,".TABLE_USER_MASTER." um WHERE um.profile_id = hm.id AND um.id = $id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function update_user_profile_info(){
		$id = $_POST['id'];
		$user_id = Session::get('user_id');
		$data =array();
		$data['name'] = $_POST['name'];
		$data['contact_person'] = $_POST['contact_person'];
		$data['city'] = $_POST['city'];
		$data['ps_id'] = $_POST['ps_id'];
		$data['locality'] = $_POST['locality'];
		$data['pin'] = $_POST['pin'];
		$data['no_of_rooms'] = $_POST['no_of_rooms'];
		$data['licence_no'] = $_POST['licence_no'];
		$data['address'] = $_POST['address'];
		$this->db->update(TABLE_HOTEL_MASTER, $data, "id = {$id}");
		header("Content-type: application/json");
		echo json_encode($data);
	}
	
	public function change_password(){
		$newpassword =Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
		$user_id = Session::get('user_id');
		$query="UPDATE ".TABLE_USER_MASTER."  SET password='$newpassword' where id=$user_id";
		$sth = $this->db->prepare($query);
		$sth->execute();
                $id=$this->db->lastInsertId();
                echo $id;
	}
	
	public function save_new_guest(){
		$guest_id=0;
		$hotel_id=Session::get("profile_id");
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
		if($guest_id>0 && $data_url !=''){
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
		$data['id'] = $guest_id;
		header("Content-type: application/json");
		echo json_encode($data);
	}	

	
	public function get_hotel_guestlists_day(){
		$profile_id=Session::get("profile_id");
		$day=$_POST['day'];
		$query="SELECT * FROM ".TABLE_HOTEL_GUSTLIST." WHERE hotel_id = $profile_id AND guestlist_date <= '$day' AND date_deparature>='$day' ORDER BY id DESC";
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
	
	public function update_date_deparature(){
		$today=date('Y-m-d', time());
		$id = $_POST['id'];
		$date_deparature = $today;//$_POST['date_deparature'];
		$query="UPDATE ".TABLE_HOTEL_GUSTLIST." SET date_deparature='$date_deparature' , check_out_status=1  where id=$id";
		$sth = $this->db->prepare($query);
		$sth->execute();
		echo $id;
	}
		
	function get_guestlist_submit_calendar(){
		$hotel_id=Session::get('profile_id');
		$today=date('Y-m-d', time());
		$sth = $this->db->prepare("SELECT guestlist_date FROM crimatrix_hotel_guestlist WHERE hotel_id = $hotel_id  ORDER BY last_update_time LIMIT 0 , 60");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
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
	
	function get_hotel_ps_name(){
		$hotel_id = Session::get('profile_id');
		$query = "Select ps.name as ps_name From ".TABLE_PS_MASTER. " ps, ".TABLE_HOTEL_MASTER." hm Where hm.ps_id=ps.id AND hm.id = $hotel_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		header("Content-type: application/json");
		echo json_encode($data);
	}
}
?>