<?php

class Police_Service_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function show_guest_list() {
        $hotel_id = $_POST['hotel_id'];
        $guest_list_date = $_POST['date'];
        $query = "SELECT hg.*,hm.name hotel_name, hm.locality hotel_location FROM " . TABLE_HOTEL_GUSTLIST . " hg," . TABLE_HOTEL_MASTER . " hm where hg.hotel_id=hm.id AND hg.guestlist_date <='$guest_list_date' and hg.date_deparature >='$guest_list_date' and hg.hotel_id=$hotel_id order by hg.last_update_time";

        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $result = array();
        $image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
        foreach ($data as $row) {
            clearstatcache();
            $is_file_exist = false;
            $guest_id = $row['id'];
            $file = $guest_id . '.jpg';
            $file_url = 'assets/uploded_img/hotel_guest/thumb/' . $file;
            $is_file_exist = file_exists($file_url);
            if (!$is_file_exist) {
                $image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
            } else {
                $image_url = URL . $file_url;
            }
            $row['image_url'] = $image_url;
            $result[$guest_id] = $row;
        }
        header("Content-type: application/json");
        echo json_encode($result);
    }

    public function get_submited_hotels_by_date() {
        $date = $_POST['date'];
        $location = $_POST['location'];
        $query;
        if ($location == 0) {
            $query = "SELECT DISTINCT(hg.hotel_id), hm.* FROM " . TABLE_HOTEL_GUSTLIST . " hg, " . TABLE_HOTEL_MASTER . " hm WHERE hg.guestlist_date = '$date' AND hg.hotel_id = hm.id";
        } else {
            $query = "SELECT DISTINCT(hg.hotel_id), hm.* FROM " . TABLE_HOTEL_GUSTLIST . " hg, " . TABLE_HOTEL_MASTER . " hm WHERE hg.guestlist_date = '$date' AND hg.hotel_id = hm.id AND hm.ps_id = $location";
        }
        //echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function get_not_submited_hotels_by_date() {
        $result = array();
        //$today=date('Y-m-d', time());
        $today = $_POST['date'];
        $location = $_POST['location'];
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
            if ($location == 0) {
                $query = "SELECT id, name, contact_person,  mobile, email, locality FROM " . TABLE_HOTEL_MASTER . "  order by name";
            } else {
                $query = "SELECT id, name, contact_person,  mobile, email, locality FROM " . TABLE_HOTEL_MASTER . " where  ps_id=$location order by name";
            }
        } else {
            if ($location == 0) {
                $query = "SELECT id, name, contact_person,  mobile, email, locality FROM " . TABLE_HOTEL_MASTER . " where id NOT IN ($ids) order by name";
            } else {
                $query = "SELECT id, name, contact_person,  mobile, email, locality FROM " . TABLE_HOTEL_MASTER . " where id NOT IN ($ids)  and ps_id=$location order by name";
            }
        }
        //echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function guestlist_search_result() {
        $today = date('Y-m-d', time());
        $today90 = date('Y-m-d', strtotime($today . ' - 190 days'));
        $search_string = $_POST['search'];


        $query = "SELECT hg.*,hm.name hotel_name, hm.locality hotel_location, DATE_FORMAT(hg.guestlist_date,'%b %d') guestlist_date FROM " . TABLE_HOTEL_GUSTLIST . " hg," . TABLE_HOTEL_MASTER . " hm where hg.hotel_id=hm.id AND (hg.nationality like '%$search_string%' OR hg.name like '%$search_string%' OR hg.mobile like '%$search_string%' OR hg.vehicle_no like '%$search_string%')  order by hg.last_update_time limit 0,30";
        // echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $result = array();
        $image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
        foreach ($data as $row) {
            clearstatcache();
            $is_file_exist = false;
            $guest_id = $row['id'];
            $file = $guest_id . '.jpg';
            $file_url = 'assets/uploded_img/hotel_guest/thumb/' . $file;
            $is_file_exist = file_exists($file_url);
            if (!$is_file_exist) {
                $image_url = URL . 'assets/apps/img/profile_thumb_m.jpg';
            } else {
                $image_url = URL . $file_url;
            }
            $row['image_url'] = $image_url;
            $result[$guest_id] = $row;
        }
        header("Content-type: application/json");
        echo json_encode($result);
    }

    public function get_all_hotels_email() {
        $sth = $this->db->prepare("SELECT email FROM " . TABLE_HOTEL_MASTER);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    function send_hotel_alert_email() {
        $email = $_POST['alert'];
        $message = $_POST['message'];
        $to_hotels = $_POST['to_hotels'];
        $to = 'support@glomindz.com,' . $email;

        $data = array();
        $data['user_id'] = Session::get("profile_id");
        $data['text'] = $message;
        $data['notification_for'] = $to_hotels;
        $data['valid_till'] = '2099-01-01';
        $this->db->insert(TABLE_NOTIFICAATIONS, $data);
        $id = $this->db->lastInsertId();
        $result = $this->send_hotel_alert($message, $to);
        header("Content-type: application/json");
        echo json_encode($result);
    }

    public function get_watchlist_data() {
        $sth = $this->db->prepare("SELECT  id, IFNULL(name,'') name, IFNULL(alias,'') alias, IFNULL(father_name,'') father_name, IFNULL(location,'') location, IFNULL(state,'') state, IFNULL(wanted_for,'') wanted_for, IFNULL(mobile,'') mobile FROM " . TABLE_WATCHLIST_MASTER . " order by last_update");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    public function search_watchlist($search_str) {
        $where = " where name like '$search_str%' OR alias like '$search_str%'  OR wanted_for like '$search_str%' OR mobile like ='$search_str' ";
        $sth = $this->db->prepare("SELECT  id, IFNULL(name,'') name, IFNULL(alias,'') alias, IFNULL(father_name,'') father_name, IFNULL(location,'') location, IFNULL(state,'') state, IFNULL(wanted_for,'') wanted_for, IFNULL(mobile,'') mobile FROM " . TABLE_WATCHLIST_MASTER . " $where order by last_update");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();

        $image_url = '../assets/apps/img/profile_thumb_m.jpg';
        $result = array();
        foreach ($data as $row) {
            $id = $row['id'];
            $file = $id . '.jpg';
            $file_path = "../assets/uploded_img/watchlist/" . $file;

            if (file_exists('assets/uploded_img/watchlist/' . $file) == 1) {
                $image_url = $file_path;
            }
            $row['image_url'] = $image_url;
            $result[$id] = $row;
        }
        header("Content-type: application/json");
        echo json_encode($result);
    }

    public function new_watchlist() {
        $data = array();
        $data['name'] = $_POST['name'];
        $data['alias'] = $_POST['alias'];
        $data['wanted_for'] = $_POST['wanted_for'];
        $data['location'] = $_POST['location'];
        $data['mobile'] = $_POST['mobile'];
        $data['district'] = $_POST['district'];
        $this->db->insert('watch_list_master', $data);

        $id = $this->db->lastInsertId();

        if ($id != 0) {
            if (($_FILES["afile"]["error"] > 0) || ($_FILES["afile"]["type"] != "image/jpeg")) {
                echo "Error: " . $_FILES["afile"]["error"] . "<br>";
            } else {
                $file = $_FILES['afile']['tmp_name'];
                $file_path = "assets/uploded_img/watchlist/" . $id . ".jpg";
                $file_path_temp = "assets/uploded_img/" . $_FILES["afile"]["name"];
                move_uploaded_file($file, $file_path_temp);
                rename($file_path_temp, $file_path);
                $this->resizeImage($file_path, $id, 250, $file_path);
            }
        }
    }

    function resizeImage($source_path, $id, $newwidth, $destination) {
        $image = imagecreatefromjpeg($source_path);
        $width = imagesx($image);
        $height = imagesy($image);
        $newheight = ($height / $width) * $newwidth;
        $tmp = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($tmp, $image, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagejpeg($tmp, $destination, 100);
        imagedestroy($image);
        imagedestroy($tmp);
    }

    public function get_police_users($search_query) {
        $result = array();
        $query = '';
        $result = array();
        if ($search_query == '0') {
            //$query = "SELECT pm.*, um.status  FROM ".TABLE_POLICE_MASTER." pm,".TABLE_USER_MASTER." um WHERE pm.id=um.profile_id order by pm.last_update limit 0,30";
            $query = "SELECT pm.*, um.status FROM " . TABLE_POLICE_MASTER . " pm LEFT JOIN " . TABLE_USER_MASTER . " um ON pm.id = um.profile_id AND um.user_type =  'police' order by um.status,pm.name";
        } else {
            $query = "SELECT pm.*, um.status FROM " . TABLE_POLICE_MASTER . " pm LEFT JOIN " . TABLE_USER_MASTER . " um ON pm.id = um.profile_id AND um.user_type =  'police' where pm.name like '%$search_query%' OR pm.mobile ='$search_query%' order by um.status LIMIT 0 , 30";
            //  $query = "SELECT pm.*, um.status  FROM ".TABLE_POLICE_MASTER." pm,".TABLE_USER_MASTER." um WHERE pm.id=um.profile_id AND pm.name like '$search_query%' OR pm.mobile ='$search_query%' order by pm.last_update";
        }
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function get_registered_hotels($search_query) {
        $query = '';
        $result = array();
        if ($search_query == '0') {
            $query = "SELECT hm.*, um.status, ps.id as ps_id, ps.name as ps_name FROM " . TABLE_HOTEL_MASTER . " hm," . TABLE_USER_MASTER . " um, " . TABLE_PS_MASTER . " ps WHERE hm.id=um.profile_id AND um.user_type ='hotel' AND ps.id=hm.ps_id order by um.status";
        } else {
            $query = "SELECT hm.*, um.status  FROM " . TABLE_HOTEL_MASTER . " hm," . TABLE_USER_MASTER . " um  WHERE  hm.id=um.profile_id  and  um.user_type ='hotel'and hm.name like '%$search_query%' order by um.status";
        }

        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    public function change_account_status() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $profile_id = $_POST['profile_id'];
        $status = $_POST['status'];
        $user_type = $_POST['user_type'];

        $updateData = array(
            'status' => $status
        );

        $this->db->update(TABLE_USER_MASTER, $updateData, "profile_id = {$profile_id} and user_type='$user_type'");
        $this->send_change_account_status_mail($name, $email, $status);
        echo $status;
    }

    function generate_password() {
        $chars = "0123456789";
        return substr(str_shuffle($chars), 0, 6);
    }

    function reset_password() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $profile_id = $_POST['profile_id'];
        $user_type = $_POST['user_type'];
        $mobile = $_POST['mobile'];
        $password = $this->generate_password();
        $updateData = array();
        $updateData['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
        $this->db->update(TABLE_USER_MASTER, $updateData, "profile_id = {$profile_id} and user_type='$user_type'");
        $this->send_reset_password_mail($name, $email, $password);
        $this->sendSMS_('Your password account has been reset to ' . $password, $mobile);
        echo $profile_id;
    }

    function send_reset_password_mail($name, $email, $password) {
        $mailcheck = $this->spamcheck($email);
        if ($mailcheck == FALSE) {
            return "Invalid input";
        } else {

            $to = $email . ',support@glomindz.com'; // note the comma
            $subject = 'Crimatrix Password Reset';
            $message = "Dear $name,  \n\n\t Your password account has been reset to $password.Please login with your registred email or mobile.\n\n\nThanks and Regards\nCrimatrix Team\nContact: 9854087006(Saifur Rahman),8876698046(Sarfaraz Hassan),9435049599(Amitava Sinha,ASP Crime)";
            $headers = "From:support@crimatrix.com";
            return mail($to, $subject, $message, $headers);
        }
    }

    function send_change_account_status_mail($name, $email, $status) {
        $mailcheck = $this->spamcheck($email);
        if ($mailcheck == FALSE) {
            return "Invalid input";
        } else {

            if ($status == 1) {

                $to = $email . ', support@glomindz.com,amitavasinha@hotmail.com'; // note the comma
                $subject = 'Crimatrix Account Enabled';
                $message = "Dear $name,  \n\n\t Your account has been approved for crimatrix portal.Please login with your registred email or mobile.\n\n\nThanks and Regards\nCrimatrix Team\nContact: 9854087006(Saifur Rahman),8876698046(Sarfaraz Hassan),9435049599(Amitava Sinha,ASP Crime)";
                $headers = "From:support@crimatrix.com";
                return mail($to, $subject, $message, $headers);
            } else {
                $to = $email . ', support@glomindz.com'; // note the comma
                $subject = 'Crimatrix Account Disabled';
                $message = "Dear $name,  \n\n\t Your account has been disabled for crimatrix.\n\n\t Please login with your registred email or mobile and update your profile.After varification your profile by Crimatrix Team, you will be able to access to the crimatrix portal.\n\n\nThanks and Regards\nCrimatrix Team\nContact: 9854087006(Saifur Rahman),8876698046(Sarfaraz Hassan),9435049599(Amitava Sinha,ASP Crime)";
                $headers = "From:support@crimatrix.com";
                return mail($to, $subject, $message, $headers);
            }
        }
    }
    
    

    public function spamcheck($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function approve_sms_user() {
        $user_id = $_POST['profile_id'];
        $status = $_POST['status'];
        $mobile = $_POST['mobile'];
        $msg = '';
        if ($status == 1) {
            $msg = "Your mobile number is registered for Crimatrix notification";
        } else if ($status == 0) {
            $msg = "Your mobile number is registered for Crimatrix notification has been disabled.";
        }
        $updateData = array(
            'sms_users' => $status
        );
        $this->db->update(TABLE_POLICE_MASTER, $updateData, "id = $user_id");
        $this->sendSMS_($msg, $mobile);
        echo $status;
    }

    public function register_new_user() {
        //name	designation	current_posting	email	mobile	city	web_user	sms_users
        $status = 0;
        $data = array();
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['mobile'] = $_POST['mobile'];
        $data['designation'] = $_POST['designation'];
        $data['city_id'] = $_POST['city_id'];
        $data['ps_id'] = $_POST['ps_id'];

        if (isset($_POST['sms_users'])) {
            $data['sms_users'] = 1;
        } else {
            $data['sms_users'] = 0;
        }

        $this->db->insert(TABLE_POLICE_MASTER, $data);
        $profile_id = $this->db->lastInsertId();

        if (isset($_POST['web_user'])) {
            $data['web_user'] = 1;
        } else {
            $data['web_user'] = 0;
        }

        if ($data['web_user'] == 1) {
            $password = $this->generate_password();
            $arr = array();
            $arr['profile_id'] = $_POST['profile_id'];
            $arr['name'] = $data['name'];
            $arr['email'] = $data['email'];
            $arr['mobile'] = $data['mobile'];
            $arr['user_type'] = 'police';
            $arr['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
            $arr['status'] = 1;

            $count_email = $this->check_user_email(TABLE_USER_MASTER, $arr['email']);
            $count_mobile = $this->check_user_mobile(TABLE_USER_MASTER, $arr['mobile']);
            if ($count_email == 0 && $count_mobile == 0) {
                $this->db->insert(TABLE_USER_MASTER, $arr);
                $id = $this->db->lastInsertId();
                $this->send_new_police_web_user_mail($arr['name'], $arr['email'], $password);
                $this->sendSMS_("Welcome to Crimatrix. Your password is $password. Please Sign in to complete your profile.", $arr['mobile']);
            }
        }


        header("Content-type: application/json");
        $data['profile_id'] = $profile_id;
        echo json_encode($data);
    }
  function send_new_police_web_user_mail($name, $email, $password) {
        $mailcheck = $this->spamcheck($email);
        if ($mailcheck == FALSE) {
            return "Invalid input";
        } else {

            $to = $email . ',support@glomindz.com,amitavasinha@hotmail.com'; // note the comma
            $subject = 'Crimatrix New User';
            $message = "Dear $name,  \n\n\t Welcome to Crimatrix. Your password is $password. \n\tPlease Sign in with your registred email or mobile.\n\n\nThanks and Regards\nCrimatrix Team\nContact: 9854087006(Saifur Rahman),8876698046(Sarfaraz Hassan),9435049599(Amitava Sinha,ASP Crime)\n\thttp://crimatrix.com";
            $headers = "From:support@crimatrix.com";
            return mail($to, $subject, $message, $headers);
        }
    }
    function get_user_details() {
        $profile_id = $_POST['profile_id'];
        $user_type = $_POST['user_type'];
        $query = "";
        if ($user_type == 'hotel') {
            //$query = "SELECT um.id as user_id, um.profile_id as user_profile_id, hm.* FROM " . TABLE_HOTEL_MASTER . " hm, " . TABLE_USER_MASTER . " um left join hm.id=um.profile_id AND um.user_type='hotel' where hm.id = $profile_id";
            $query = "SELECT um.id as user_id, um.profile_id as user_profile_id, hm.* FROM " . TABLE_HOTEL_MASTER . " hm LEFT JOIN  " . TABLE_USER_MASTER . " um ON hm.id=um.profile_id AND um.user_type='hotel' where hm.id = $profile_id";
        } else if ($user_type == 'police') {
            $query = "SELECT um.id as user_id,um.user_type, um.profile_id as user_profile_id,  um.status, pm.* FROM " . TABLE_POLICE_MASTER . " pm left join  " . TABLE_USER_MASTER . " um ON pm.id=um.profile_id and um.user_type='police' where pm.id=$profile_id";
        }
        // echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    function update_user_details() {
        $profile_id = $_POST['profile_id'];
        $user_type = $_POST['user_type'];
        $data = array();

        if ($_POST['user_type'] == 'hotel') {
            $table = TABLE_HOTEL_MASTER;
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['mobile'] = $_POST['mobile'];
            $data['contact_person'] = $_POST['contact_person'];
            $data['licence_no'] = $_POST['licence_no'];
            $data['locality'] = $_POST['locality'];
            $data['ps_id'] = $_POST['ps_id'];
            $data['pin'] = $_POST['pin'];
            $data['no_of_rooms'] = $_POST['no_of_rooms'];
            $data['city'] = $_POST['city'];
            $data['address'] = $_POST['address'];
        } else if ($_POST['user_type'] == 'police') {
            $table = TABLE_POLICE_MASTER;
            $data['name'] = $_POST['name'];
            $data['email'] = $_POST['email'];
            $data['mobile'] = $_POST['mobile'];
            $data['designation'] = $_POST['designation'];
            $data['city_id'] = $_POST['city'];
            $data['ps_id'] = $_POST['ps_id'];
        }


        $updateData = array();
        $updateData['name'] = $_POST['name'];
        $updateData['email'] = $_POST['email'];
        $updateData['mobile'] = $_POST['mobile'];

        $count_email = $this->check_user_email($table, $updateData['email']);
        $count_mobile = $this->check_user_mobile($table, $updateData['mobile']);
        if (($count_email == 0 || $count_email == 1) && ($count_mobile == 0 || $count_mobile == 1)) {
            $this->db->update(TABLE_USER_MASTER, $updateData, "profile_id = {$profile_id} and user_type='$user_type'");
            $this->db->update($table, $data, "id = {$profile_id}");
            //$updateData['profile_id']=$profile_id;
            //echo json_encode($updateData);
            echo $profile_id;
        } else {
            echo 0;
        }
    }

    function check_user_email($table, $email) {
        //check for email
        $query = "SELECT id FROM $table where email = '$email'";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        return $count;
    }

    function check_user_mobile($table, $mobile) {
        //check for mobile
        $query = "SELECT id FROM $table where email = '$mobile";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        $count = $sth->rowCount();
        return $count;
    }

    function get_crime_types() {

        $query = "SELECT * FROM " . TABLE_CRIME_TYPE_MASTER . " ORDER BY name";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    function get_filter_police_users_by_ps_id() {
        $ps_id = $_POST['ps_id'];

        $query = "SELECT pm.*, um.status FROM " . TABLE_POLICE_MASTER . " pm LEFT JOIN " . TABLE_USER_MASTER . " um ON pm.id = um.profile_id AND um.user_type =  'police' AND pm.ps_id=$ps_id order by um.status,pm.name";

        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    function get_filter_police_users_by_city_id() {
        $city_id = $_POST['city_id'];
        $query = "SELECT * FROM " . TABLE_POLICE_MASTER . " WHERE city_id = $city_id ORDER BY name";

        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        header("Content-type: application/json");
        echo json_encode($data);
    }

    function add_web_user() {
        $id = 0;
        $password = $this->generate_password();
        $arr = array();
        $arr['profile_id'] = $_POST['profile_id'];
        $arr['name'] = $_POST['name'];
        $arr['email'] = $_POST['email'];
        $arr['mobile'] = $_POST['mobile'];
        $arr['user_type'] = $_POST['user_type'];
        $arr['password'] = Hash::create('md5', $password, HASH_PASSWORD_KEY);
        $arr['status'] = 1;

        $count_email = $this->check_user_email(TABLE_USER_MASTER, $arr['email']);
        $count_mobile = $this->check_user_mobile(TABLE_USER_MASTER, $arr['mobile']);
        if (($count_email == 0 || $count_email == 1) && ($count_mobile == 0 || $count_mobile == 1)) {
            $this->db->insert(TABLE_USER_MASTER, $arr);
            $id = $this->db->lastInsertId();
            $this->send_new_police_web_user_mail($arr['name'], $arr['email'], $password);
            $this->sendSMS_("Welcome to Crimatrix. Your password is $password. Please Sign in to complete your profile.", $arr['mobile']);
        }
        echo $id;
    }
    function get_police_user_profile_details(){
        
        echo 0;
    }
}

?>