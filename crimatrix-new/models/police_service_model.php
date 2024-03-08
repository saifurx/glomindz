<?php

class Police_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
        header("Content-type: application/json");
        header("X-XSS-Protection: 1; mode=block");
    }
    
    function generate_password(){
    	$chars = "0123456789";
    	return substr(str_shuffle($chars), 0, 6);
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
    
    function createPoliceUser(){
    	$password = $this->generate_password();
    	$data = array();
    	$data['name'] = $this->clear_input_string($_POST['name']);
    	$data['email'] = $this->clear_input_string($_POST['email']);
    	$data['mobile'] = $this->clear_input_string($_POST['mobile']);
    	$data['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
    	$data['user_type'] = 'police';
    	$data['role'] = 'admin';
    	if (isset($_POST['web_user'])){$data['status'] = 1;} else {$data['status'] = 0;}

    	$count_email = $this->check_email(TABLE_USER_MASTER, $data['email']);
    	$count_mobile = $this->check_mobile(TABLE_USER_MASTER, $data['mobile']);
    	if($count_email == 0 && $count_mobile == 0){
    		$this->db->insert(TABLE_USER_MASTER, $data);
    		$id = $this->db->lastInsertId();
    		echo $id;
    	}
	    else{
	    	$id = 0;
	    	echo $id;
	    }
    }
    
    function createSMSUser(){
    	$data = array();
    	$data['name'] = $this->clear_input_string($_POST['name']);
    	$data['mobile'] = $this->clear_input_string($_POST['mobile']);
    	$data['designation'] = $this->clear_input_string($_POST['designation']);
    	$data['city_id'] = $this->clear_input_string($_POST['city_id']);
    	$data['ps_id'] = $this->clear_input_string($_POST['ps_id']);
    	
    	$count_mobile = $this->check_mobile(TABLE_SMS_USER_MASTER, $data['mobile']);
    	
    	if($count_mobile == 0){
    		$this->db->insert(TABLE_SMS_USER_MASTER, $data);
    		$id = $this->db->lastInsertId();
    		echo 1;
    	}
    	else{
    		echo 0;
    	}
    }
    
    function getAllPoliceUser(){
    	//$search = $_POST['search'];
    	$ps_id = $_POST['ps_id'];
    	if($ps_id == 0 || $ps_id == 9999){
    		$query = "SELECT um.*, pm.designation, pm.ps_id, pm.city_id, pm.sms_user, psm.name as ps_name
			FROM ".TABLE_USER_MASTER." um, ".TABLE_POLICE_MASTER." pm, ".TABLE_PS_MASTER." psm
			WHERE um.id = pm.user_id AND user_type = 'police' AND pm.ps_id = psm.id";
    	}
    	else{
    		$query = "SELECT um.*, pm.designation, pm.ps_id, pm.city_id, pm.sms_user, psm.name as ps_name
			FROM ".TABLE_USER_MASTER." um, ".TABLE_POLICE_MASTER." pm, ".TABLE_PS_MASTER." psm
			WHERE um.id = pm.user_id AND user_type = 'police' AND pm.ps_id = psm.id AND pm.ps_id = $ps_id";
    	}
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    function getAllHotelUser(){
    	//$search = $_POST['search'];
    	$ps_id = $_POST['ps_id'];
    	if($ps_id == 0 || $ps_id == 9999){
    		$query = "SELECT um.*, hm.contact_person, hm.address, hm.locality, hm.pin, hm.no_of_rooms, hm.licence_no, psm.name as ps_name
				FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm
				WHERE um.id = hm.user_id AND user_type = 'hotel' AND hm.ps_id = psm.id";
    	}
    	else{
    		$query = "SELECT um.*, hm.contact_person, hm.address, hm.locality, hm.pin, hm.no_of_rooms, hm.licence_no, psm.name as ps_name
				FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm
				WHERE um.id = hm.user_id AND user_type = 'hotel' AND hm.ps_id = psm.id AND hm.ps_id = $ps_id";
    	}
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    //enable, disable web-user
    function change_account_status() {
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$user_id = $_POST['user_id'];
    	$status = $_POST['status'];
    	$user_type = $_POST['user_type'];
    	$updateData = array(
    			'status' => $status
    	);
    
    	$this->db->update(TABLE_USER_MASTER, $updateData, "id = {$user_id} and user_type='$user_type'");
    	//$this->send_change_account_status_mail($name, $email, $status);
    	echo $status;
    }
    
    
    function approve_sms_user() {
    	$name = $_POST['name'];
    	$mobile = $_POST['mobile'];
    	$user_id = $_POST['user_id'];
    	$status = $_POST['status'];
    	$user_type = $_POST['user_type'];
    	
    	$msg = '';
    	if ($status == 1) {
    		$msg = "Your mobile number is registered for Crimatrix notification";
    	} else if ($status == 0) {
    		$msg = "Your mobile number is registered for Crimatrix notification has been disabled.";
    	}
    	$updateData = array(
    			'status' => $status
    	);
    	$this->db->update(TABLE_SMS_USER_MASTER, $updateData, "id = $user_id");
    	//$this->sendSMS_($msg, $mobile);
    	echo $status;
    }

    function reset_password() {
    	$user_id = $_POST['user_id'];
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$mobile = $_POST['mobile'];
    	$user_type = $_POST['user_type'];
    	$password = $this->generate_password();

    	$updateData = array();
    	$updateData['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
    	
    	$this->db->update(TABLE_USER_MASTER, $updateData, "id = {$user_id} and user_type='$user_type'");
    	//$this->send_reset_password_mail($name, $email, $password);
    	//$this->sendSMS_('Your password account has been reset to ' . $password, $mobile);
    	echo $user_id;
    }
    
    function get_user_details() {
    	$user_id = $_POST['user_id'];
    	$user_type = $_POST['user_type'];
    	$query = "";
    	if ($user_type == 'hotel') {
    		$query = "SELECT um.*, hm.contact_person, hm.address, hm.locality, hm.pin, hm.no_of_rooms, hm.licence_no, psm.name as ps_name
				FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm
				WHERE um.id = $user_id AND um.id = hm.user_id AND user_type = 'hotel' AND hm.ps_id = psm.id";
    	}
    	if ($user_type == 'police') {
    		$query = "SELECT um.*, pm.user_id, pm.designation, pm.ps_id, psm.name as ps_name, pm.city_id,cm.name as city_name
			FROM ".TABLE_USER_MASTER." um, ".TABLE_POLICE_MASTER." pm, ".TABLE_PS_MASTER." psm, ".TABLE_CITY_MASTER." cm
			WHERE um.id = $user_id AND um.user_type = 'police' AND um.id = pm.user_id AND pm.ps_id = psm.id AND pm.city_id = cm.id";
    	}
    	// echo $query;
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    function update_police_user_details(){
    	$user_id = $_POST['user_id'];
    	$data = array();
    	$data['name'] = $this->clear_input_string($_POST['name']);
    	$data['email'] = $this->clear_input_string($_POST['email']);
    	$data['mobile'] = $this->clear_input_string($_POST['mobile']);
    	$user_type = 'police';

    	$count_email = $this->check_email(TABLE_USER_MASTER, $data['email']);
    	$count_mobile = $this->check_mobile(TABLE_USER_MASTER, $data['mobile']);
    	if(($count_email == 0 || $count_email == $user_id) &&($count_mobile == 0 || $count_mobile == $user_id)){
    		$this->db->update(TABLE_USER_MASTER, $data, "id = {$user_id} and user_type='$user_type'");
    		
    		$arr = array();
    		$arr['user_id'] = $user_id;
    		$arr['designation'] = $this->clear_input_string($_POST['designation']);
    		$arr['city_id'] = $this->clear_input_string($_POST['city_id']);
    		$arr['ps_id'] = $this->clear_input_string($_POST['ps_id']);
    		$this->db->update(TABLE_POLICE_MASTER, $arr, "user_id = $user_id");
    		
    		if(isset($_POST['data_url'])){
    			
    		}
    		echo 1;
    	}
    	else{
    		echo 0;
    	}
    }
    
    function update_hotel_user_details(){
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
    
    function get_police_user_profile_details(){
    	$user_id = $_POST['user_id'];
    	$data = array();
    	$query = "SELECT um.*, pm.designation, pm.city_id, pm.ps_id 
    			FROM ".TABLE_USER_MASTER." um, ".TABLE_POLICE_MASTER." pm
				WHERE um.id = pm.user_id AND um.id = $user_id";
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    function get_submited_hotels_by_date() {
    	$date = $_POST['date'];
    	$ps_id = $_POST['ps_id'];
    	$query ='';
    	if ($ps_id == 0 || $ps_id == 9999) {
    		$query = "SELECT DISTINCT(hg.hotel_id), hm.* FROM " . TABLE_HOTEL_GUSTLIST . " hg, " . TABLE_HOTEL_MASTER . " hm WHERE hg.guestlist_date = '$date' AND hg.hotel_id = hm.id";
    	} else {
    		$query = "SELECT DISTINCT(hg.hotel_id), hm.* FROM " . TABLE_HOTEL_GUSTLIST . " hg, " . TABLE_HOTEL_MASTER . " hm WHERE gh.guestlist_date = '$date' AND hg.hotel_id = hm.id AND hm.ps_id = $ps_id";
    	}
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();    	
    	echo json_encode($data);
    }
    
    public function get_not_submited_hotels_by_date(){
    	$result = array();
    	$today = $_POST['date'];
    	$ps_id = $_POST['ps_id'];
    	$sth = $this->db->prepare("SELECT distinct(hotel_id) FROM " . TABLE_HOTEL_GUSTLIST . " t1 where guestlist_date='$today'");
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$hotel_ids = $sth->fetchAll();
    	$count = 0;
    	foreach ($hotel_ids as $id) {
    		$result[$count] = $id['hotel_id'];
    		$count = $count + 1;
    	}
    	$ids = join(',', $result);
    	if ($count == 0) {
    		if ($ps_id == 0 || $ps_id == 9999) {
    			$query = "SELECT um . * , hm.contact_person, hm.address, hm.locality, hm.ps_id, hm.city_id, hm.pin, hm.pin, hm.licence_no, psm.name AS ps_name
						FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm 
    					WHERE um.id = hm.user_id AND um.user_type =  'hotel' AND hm.ps_id = psm.id ORDER BY um.name";
    		} else {
    			$query ="SELECT um . * , hm.contact_person, hm.address, hm.locality, hm.ps_id, hm.city_id, hm.pin, hm.pin, hm.licence_no, psm.name AS ps_name
						FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm 
    					WHERE um.id = hm.user_id AND um.user_type =  'hotel' AND hm.ps_id = psm.id AND ps_id = $ps_id ORDER BY um.name"; 
    		}
    	}
    	else{
    		if ($ps_id == 0) {
    			$query ="SELECT um . * , hm.contact_person, hm.address, hm.locality, hm.ps_id, hm.city_id, hm.pin, hm.pin, hm.licence_no, psm.name AS ps_name
						FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm 
    					WHERE um.id = hm.user_id AND um.id NOT IN ($ids) AND um.user_type =  'hotel' AND hm.ps_id = psm.id ORDER BY um.name"; 
    		} else {
    			$query = "SELECT um . * , hm.contact_person, hm.address, hm.locality, hm.ps_id, hm.city_id, hm.pin, hm.pin, hm.licence_no, psm.name AS ps_name
						FROM ".TABLE_USER_MASTER." um, ".TABLE_HOTEL_MASTER." hm, ".TABLE_PS_MASTER." psm 
    					WHERE um.id = hm.user_id AND um.id NOT IN ($ids) AND um.user_type =  'hotel' AND hm.ps_id = psm.id AND ps_id = $ps_id ORDER BY um.name";
    		}
    	}
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    function show_guest_list(){
    	$user_id = $_POST['user_id'];
    	$date = $_POST['date'];
    	$query="SELECT * FROM ".TABLE_HOTEL_GUSTLIST." WHERE hotel_id = $user_id AND guestlist_date <= '$date' AND date_deparature>='$date' ORDER BY id DESC";
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

    function search_guest(){
    	$search = $_POST['search'];
    	$query = "SELECT * FROM ".TABLE_HOTEL_GUSTLIST." WHERE name LIKE '%$search%' OR mobile = '$search'";
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
    	echo json_encode($result);
    }

    function hotel_guset_details(){
    	$id = $_POST['id'];
    	$query = "SELECT * FROM ".TABLE_HOTEL_GUSTLIST." WHERE id = $id";
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
    		$file_url = 'assets/uploded_img/hotel_guest/'.$file;
    		$is_file_exist = file_exists($file_url);
    		if (!$is_file_exist) {
    			$image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
    		} else {
    			$image_url = URL . $file_url;
    		}
    		$row['image_url'] = $image_url;
    		$result[$guest_id] = $row;
    	}
    	echo json_encode($result);
    }

    function getAllSMSUser(){
    	$ps_id = $_POST['ps_id'];
    	if ($ps_id == 0 || $ps_id == 9999) {
    		$query = "SELECT smsum . * , psm.name as ps_name, cm.name as city_name
			FROM ".TABLE_SMS_USER_MASTER." smsum, ".TABLE_PS_MASTER." psm, ".TABLE_CITY_MASTER." cm
			WHERE smsum.ps_id = psm.id AND smsum.city_id = cm.id";
    	}
    	else{
    		$query = "SELECT smsum . * , psm.name as ps_name, cm.name as city_name
			FROM ".TABLE_SMS_USER_MASTER." smsum, ".TABLE_PS_MASTER." psm, ".TABLE_CITY_MASTER." cm
			WHERE smsum.ps_id = psm.id AND smsum.city_id = cm.id AND smsum.ps_id = $ps_id";
    	}
    	$sth = $this->db->prepare($query);
    	$sth->setFetchMode(PDO::FETCH_ASSOC);
    	$sth->execute();
    	$data = $sth->fetchAll();
    	echo json_encode($data);
    }
    
    
}

?>