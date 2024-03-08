<?php

class External_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
		header("Access-Control-Allow-Origin: http://guwahaticitypolice.com");
		header("Access-Control-Allow-Origin: http://tempweb2255.nic.in");
    }

    function save_new_guest() {
        $licence_key = $this->clear_input_string($_POST['licence_key']);
        $hotel_id = $_POST['hotel_id'];

        $guest_id = 0;
        $result = 0;
        // echo $licence_key;
        if ($licence_key === 'YRSGHY1000') {
            $today = date('Y-m-d', time());
            $check_out_date = date('Y-m-d', strtotime($today . ' + 90 day'));
            $data = array();
            $data['room_no'] = $_POST['room_no'];
            $data['name'] = $_POST['name'];
            $data['age'] = $_POST['age'];
            $data['sex'] = $_POST['sex'];
            $data['mobile'] = $_POST['mobile_no'];
            $data['comming_from'] = $_POST['coming_from'];
            $data['going_to'] = $_POST['going_to'];
            $data['id_type'] = $_POST['id_type'];
            $data['id_no'] = $_POST['id_no'];
            $data['nationality'] = $_POST['nationality'];
            $data['date_arrival'] = $_POST['check_in_date'];
            $data['check_in_time'] = $_POST['check_in_time'];
            $data['date_deparature'] = $check_out_date;
            $data['check_out_status'] = 0;
            $data['address'] = $_POST['address'];
            $data['vehicle_no'] = $_POST['vehicle_no'];
            $data['profession'] = $_POST['profession'];
            $data['purpose'] = $_POST['purpose'];
            $data['hotel_id'] = $hotel_id;
            $data['remarks'] = $_POST['remarks'];
            $data['upload_type'] = $licence_key;
            $data['guestlist_date'] = $today;

            $this->db->insert(TABLE_HOTEL_GUSTLIST, $data);
            $result = $this->db->lastInsertId();
            if(isset($_POST['image'])){
         	   $this->save_guest_image($_POST['image'],$result);
            }
            
        } else {
            $result = -1;
        }

        echo $result;
    }
	function save_guest_image($data_url,$guest_id){
			$file = $guest_id.'.jpg';
			$img = substr($data_url, strpos($data_url, ",") + 1);
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
			//return $img;
}
    function login() {
        $result = 0;
        $licence_key = '';
        $passwd = '';
        $user = '';
        $location = 'Guwahati'; //$_POST['location'];
        $ip_address = 'localhost'; //$_POST['ip_address'];

        if (isset($_POST['licence_key'])) {
            $licence_key = $this->clear_input_string($_POST['licence_key']);
        } else {
            $result = 'Empty Licence Key';
        }

        if (isset($_POST['user'])) {
            $user = $this->clear_input_string($_POST['user']);
        } else {
            $result = 'User name Empty';
        }

        if (isset($_POST['password'])) {
            $passwd = $this->clear_input_string($_POST['password']);
            $passwd = Hash::create('md5', $passwd, HASH_PASSWORD_KEY);
        } else {
            $result = 'Empty Password';
        }


        if ($licence_key === 'YRSGHY1000') {
            $query = "SELECT profile_id FROM crimatrix_user_master um WHERE um.email =  '$user' OR um.mobile =  '$user' AND um.password = 
 	 '$passwd' AND um.status =1 AND um.user_type =  'hotel'";

            $sth = $this->db->prepare($query);
            $sth->setFetchMode(PDO::FETCH_ASSOC);
            $sth->execute();
            $data = $sth->fetch();

            //print_r($data['id']);
            $count = $sth->rowCount();
            if ($count == 1) {
                $result = $data['profile_id'];
            }
        } else {
            $result = 'Invalid Licence Key';
        }
        echo $result;
    }

    function check_out_guest() {
        $check_out_date = $_POST['check_out_date'];
        $check_out_time = $_POST['check_out_time'];
        $id = 0;
        $today = date('Y-m-d', time());
        if (isset($_POST['crimatrix_guest_id'])) {
            $id = $this->clear_input_string($_POST['crimatrix_guest_id']);
        } else {
            $id = 'Empty crimatrix_guest_id';
        }

        $date_deparature = $today; //$_POST['date_deparature'];
        $query = "UPDATE " . TABLE_HOTEL_GUSTLIST . " SET date_deparature='$date_deparature' , check_out_status=1  where id=$id";
        $sth = $this->db->prepare($query);
        $sth->execute();
        echo $id;
    }

    function clear_input_string($str) {
        return str_replace(array("'", "'", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
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

	/*** Guwahati City Police ***/
	
	public function gcpContact(){
		$data = array();
    	$data['name'] = $this->clear_input_string($_POST['name']);
    	$data['email'] = $this->clear_input_string($_POST['email']);
    	$data['mobile'] = $this->clear_input_string($_POST['mobile']);
    	$data['message'] = $this->clear_input_string($_POST['message']);
	    //$to = 'crimebranch.ghycity@assampolice.gov.in,ssp-guwahati@assampolice.gov.in,support@glomindz.com,kamal.dev@glomindz.com';
		$to = 'kamal.dev@glomindz.com,kamaldev.bhuyan@gmail.com';
		$subject = 'Guwahati City Police: Contact Us';
	    $message = $data['message'];
	    $headers = "From:".$data['email'];
	    
		mail($to, $subject, $message, $headers);
		//header("Content-type: application/json");
		echo json_encode($data);
	}
	function clear_input_string($str) {

        return str_replace(array("'", "'", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
    }
    function sendGCPTip(){
		$msg ="GCP TIP: ".$_POST['tip']." By: ".$_POST['tipperInfo'];			
		$sendTo = $_POST['sendto'];
        $this->sendSMS_($msg , $sendTo);
		echo $_POST['tip'].$_POST['tipperInfo'].$_POST['sendto'];
    }
}

?>
