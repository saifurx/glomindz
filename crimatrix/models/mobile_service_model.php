<?php

class Mobile_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    function generate_password() {
        $chars = "0123456789";
        return substr(str_shuffle($chars), 0, 6);
    }

    function clear_input_string($str) {

        return str_replace(array("'", "'", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
    }

    function mlogin() {
        $result_array = array();
        // $user ='9854087006';
        // $passwd ='88f2dccb02b2a20615211e5492f85204';// Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
        $passwd = Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
        $user = $_POST['mobile'];
        $location = 'guwahati'; //$_POST['location'];
        $ip_address = 'mobile'; // $_POST['ip_address'];
        $query = "SELECT um.id, um.profile_id, um.name, um.email, um.mobile, pm.designation, um.password FROM crimatrix_user_master um, crimatrix_police_master pm WHERE um.email =  '$user' OR um.mobile =  '$user' AND um.password =  '$passwd' AND um.status =1 AND um.user_type =  'police' AND um.profile_id = pm.id";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        // echo $query;
        $data = $sth->fetchAll();

        //print_r($data['id']);
        $count = $sth->rowCount();
        // echo $count;
        if ($count == 1) {
            $result_array['user'] = $data;
            $result_array['police_station'] = $this->get_all_police_station();
            $result_array['crime_types'] = $this->get_crime_types();

            echo json_encode($result_array);
        } else {

            echo 0;
        }
    }

    function get_all_police_station() {
        $query = "SELECT ps.id,ps.name from " . TABLE_PS_MASTER . " ps, " . TABLE_CITY_MASTER . " city WHERE city.id = ps.city_id ORDER BY ps.name";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    function get_crime_types() {

        $query = "SELECT c.id,c.name from " . TABLE_CRIME_TYPE_MASTER . " c";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }

    function search_criminal() {
        //  $passwd = $_POST['password'];
        //  $user_id = $_POST['user_id'];
        $result = array();

        $search_str = $_POST['search_str'];
        $query = "SELECT cm.*, ps.name AS police_station, pm.name AS police_officer, pm.designation AS police_officer_deisg from " . TABLE_ARRESRTED_CRIMINAL . " cm, " . TABLE_PS_MASTER . " ps," . TABLE_POLICE_MASTER . " pm WHERE cm.ps_id = ps.id and cm.user_id=pm.id and cm.name like '%$search_str%' ORDER BY cm.name";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        //echo $query;
        $result['criminals'] = $data;
        echo json_encode($result);
    }

    function get_arrested_criminals() {

        $result = array();

        $query = "SELECT cm. * , ps.name AS police_station, pm.name AS police_officer, pm.designation AS police_officer_deisg FROM crimatrix_arrested_criminal_profile cm, crimatrix_ps_master ps, crimatrix_police_master pm WHERE cm.ps_id = ps.id AND cm.user_id = pm.id ORDER BY cm.last_update LIMIT 0 , 10";
        // echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $result['criminals'] = $data;
        echo json_encode($result);
    }

    function save_criminial_profile() {

        $passwd = $_POST['password'];
        //$user_id = $_POST['user_id'];
        $image_str = $_POST['image'];

        $data = array();
        $data['name'] = $_POST['name'];
        $data['father_name'] = $_POST['father_name'];
        $data['mobile_nos'] = $_POST['mobile_nos'];
        $data['case_ref_no'] = $_POST['case_ref_no'];
        $data['remarks'] = $_POST['remarks'];
        $data['address'] = $_POST['address'];
        $data['crime_type_id'] = $_POST['crime_type_id'];
        $data['crime_type'] = $_POST['crime_type'];
        $data['police_station'] = $_POST['ps'];
        $data['ps_id'] = $_POST['ps_id'];
        $data['arested_date'] = $_POST['arested_date'];
        $data['longitude'] = $_POST['longitude'];
        $data['latitude'] = $_POST['latitude'];
        $data['user_id'] = $_POST['user_id'];
        //$data['photo'] = $image_str;
        $this->db->insert(TABLE_ARRESRTED_CRIMINAL, $data);
        $id = $this->db->lastInsertId();
        // $data['id']=$id;
        if ($id > 0) {
            $this->save_capture_image($id, $image_str);
        }

        //  $result_array['criminal']=$data;
        echo $id;
    }

    public function save_capture_image($criminal_profile_id, $image_str) {

        $file = $criminal_profile_id . '.png';
        $path = 'assets/uploded_img/arrested_criminal/' . $file;

        $decodedData = base64_decode($image_str);
        $success = file_put_contents($path, $decodedData);
    }

    function resizeImg($newwidth, $source_path, $destination) {
        $image = imagecreatefrompng($source_path);
        $width = imagesx($image);
        $height = imagesy($image);
        $newheight = ($height / $width) * $newwidth;
        $tmp = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagepng($tmp, $destination, 100);
        imagedestroy($image);
        imagedestroy($tmp);
    }

    function validate_user($user_id, $password) {
        $query = "SELECT * from " . TABLE_USER_MASTER . " WHERE id = $user_id and password='$password'";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $count = $sth->rowCount();
        return $count;
    }

    function forget_password() {
        $mobile = $this->clear_input_string($_POST['mobile']);
        $query = "SELECT id,name FROM " . TABLE_USER_MASTER . " where mobile = '$mobile'";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        $password = $this->generate_password();
        if ($count == 1) {

            $password_hash = Hash::create('md5', $password, HASH_PASSWORD_KEY);
            $query = "UPDATE " . TABLE_USER_MASTER . " SET password='$password_hash' where mobile = '$mobile'";
            $sth = $this->db->prepare($query);
            $sth->execute();
            $this->sendSMS_("Your password is reset to $password.", $mobile);
            echo 1;
        } else {

            echo 0;
        }
    }

}

?>
