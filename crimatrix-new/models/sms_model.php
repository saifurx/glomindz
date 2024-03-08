<?php

class Sms_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function save_vehicle_theft($data) {
        $error = '';
        $rc_no = $data['rc_no'];
        $sth = $this->db->prepare("SELECT * FROM " . TABLE_SMS_VEHCILE_THEFT . " where rc_no='$rc_no' and status='Theft'");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count == 0) {

            $data['status'] = 'Theft';

            $this->db->insert(TABLE_SMS_VEHCILE_THEFT, $data);
            $id = $this->db->lastInsertId();
            if ($id <= 0) {
                $error = 'Sorry. We could not process your report at this moment.';
            }
        } else {
            $error = 'Already reported';
        }
        $data['error'] = $error;
        return $data;
    }

    public function found_vehicle_theft($rc_no) {
        $return = array();
        $error = '';
        $sth = $this->db->prepare("SELECT * FROM " . TABLE_SMS_VEHCILE_THEFT . " where rc_no='$rc_no' and status='Theft'");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count == 1) {
            $id = $result[0]['id'];
            $sth = $this->db->prepare("UPDATE " . TABLE_SMS_VEHCILE_THEFT . " SET status='Found' WHERE id=$id");
            $sth->execute();

            $return['vehicle_type'] = $result[0]['vehicle_type'];
            $return['color'] = $result[0]['color'];
            $return['rc_no'] = $result[0]['rc_no'];
            $return['theft_location'] = $result[0]['theft_location'];
            $return['theft_time'] = $result[0]['theft_time'];
        } else {
            $error = "No record found for RC no $rc_no";
        }
        $return['error'] = $error;
        $return['status'] = 'Found';
        $return['rc_no'] = $rc_no;
        return $return;
    }

    public function cancel_vehicle_theft($rc_no) {
        $return = array();
        $error = '';

        $sth = $this->db->prepare("SELECT * FROM " . TABLE_SMS_VEHCILE_THEFT . " where rc_no='$rc_no' and status='Theft'");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count == 1) {
            $id = $result[0]['id'];
            $sth = $this->db->prepare("UPDATE " . TABLE_SMS_VEHCILE_THEFT . " SET status='Cancel' WHERE id=$id");
            $sth->execute();

            $return['vehicle_type'] = $result[0]['vehicle_type'];
            $return['color'] = $result[0]['color'];
            $return['rc_no'] = $result[0]['rc_no'];
            $return['theft_location'] = $result[0]['theft_location'];
            $return['theft_time'] = $result[0]['theft_time'];
        } else {
            $error = "No record found for RC no $rc_no";
        }
        $return['error'] = $error;
        $return['status'] = 'Cancel';
        $return['rc_no'] = $rc_no;
        return $return;
    }

    public function save_other_sms($mobilenumber, $message, $receivedon) {
        $this->db->insert(TABLE_SMS_RECEIVED, array(
            'mobilenumber' => $mobilenumber,
            'message' => $message,
            'receivedon' => $receivedon
        ));

        $id = $this->db->lastInsertId();
        return $id;
    }

    public function get_mobile_no_list() {
        $result = '';
        $sth = $this->db->prepare("SELECT mobile FROM " . TABLE_POLICE_MASTER . " where sms_users=1");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();

        foreach ($data as $msg) {
            //	echo $msg['message'];

            $result = $result . '91' . $msg['mobile'] . ',';
        }
        $result = substr($result, 0, -1);
        return $result;
    }

    public function is_police($mobile_no) {
        $mobile_no = substr($mobile_no, 2, 10);
        $flag = false;
        $query = "SELECT * FROM " . TABLE_POLICE_MASTER . " where mobile='$mobile_no'";
        $sth = $this->db->prepare($query);
        //echo $query;
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $result = $sth->fetchAll();
        $count = $sth->rowCount();
        if ($count > 0) {
            $flag = true;
        }
        return $flag;
    }

}