<?php

class Sms extends Controller {

    public function __construct() {
        parent::__construct();
        Session::init();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function is_police($mobilenumber) {
        $police_user = $this->model->is_police($mobilenumber);
        return $police_user;
    }

    public function keywordresponse() {

        $mobilenumber = $_GET['mobilenumber'];
        $receivedon = $_GET['receivedon'];
        $message = $_GET['message'];

        $this->model->save_other_sms($mobilenumber, $message, $receivedon);
        $police_user = $this->model->is_police($mobilenumber);
        $msg = explode(" ", $message);

        if (strcasecmp($msg[0], 'VT') == 0) {

            if (strcasecmp($msg[1], 'CANCEL') == 0) {
                if ($police_user) {
                    $data = array();
                    $data['mobilenumber'] = $mobilenumber;
                    $data['message'] = $message;
                    $data['received_on'] = $receivedon;
                    $data['rc_no'] = strtoupper(preg_replace('/[^A-Za-z0-9]/', '',$msg[2]));
                    $result = $this->model->cancel_vehicle_theft($data['rc_no']);
                    $this->forwardMsg($result, $mobilenumber);
                } else {
                    $reply_msg = 'You are not authorized';
                    $this->sendSMS($reply_msg, $mobilenumber);
                }
            } else if (strcasecmp($msg[1], 'FOUND') == 0) {
                if ($police_user) {
                    $data = array();
                    $data['mobilenumber'] = $mobilenumber;
                    $data['message'] = $message;
                    $data['received_on'] = $receivedon;
                    $data['rc_no'] = strtoupper(preg_replace('/[^A-Za-z0-9]/', '',$msg[2]));
                    $result = $this->model->found_vehicle_theft($data['rc_no']);
                    $this->forwardMsg($result, $mobilenumber);
                } else {
                    $reply_msg = 'You are not authorized';
                    $this->sendSMS($reply_msg, $mobilenumber);
                }
            } else {

                $message = substr($message, 2);
                
                $vehcile_theft_msg = explode(",", $message);
                //print_r($vehcile_theft_msg);
                $result = count($vehcile_theft_msg);
                if ($result < 3) {
                    $reply_msg = "Please send SMS in correct format.e.g: VT Scorpio, AS01AV5489, Black, Beltola, 08:00pm(Error:$result)";
                    $this->sendSMS($reply_msg, $mobilenumber);
                } else {

                    $data = array();
                    $data['user_mobile_no'] = $mobilenumber;
                    $data['vehicle_type'] = strtoupper($vehcile_theft_msg[0]);
                    $data['rc_no'] = strtoupper(preg_replace('/[^A-Za-z0-9]/', '',$vehcile_theft_msg[1]));
                    $data['color'] = strtoupper($vehcile_theft_msg[2]);
                    $data['theft_location'] = strtoupper($vehcile_theft_msg[3]);
                    $data['theft_time'] = strtoupper($vehcile_theft_msg[4]);
                    $data['date_of_occurence'] = $receivedon;
                    $result = $this->model->save_vehicle_theft($data);
                     //print_r($result);
                    $this->forwardMsg($result, $mobilenumber);
                }
            }
        } else {
            $reply_msg = 'Please send SMS in correct format.e.g: VT Scorpio, AS01AV5489, Black, Beltola, 08:00pm';
            $this->sendSMS($reply_msg, $mobilenumber);
        }
    }

    public function forwardMsg($data, $mobilenumber) {
        $error = $data['error'];
        $status = $data['status'];
        if (trim($status) == trim('Theft')) {
            if ($error == '' || $error == null) {

                $reply_msg = "Vehicle theft report for " . $data['rc_no'] . " has been registered. Lodge a FIR with Engine and chassis number at the nearest police station.";
                $this->sendSMS($reply_msg, $mobilenumber);
                $result_sms = "Vehicle Theft " . $data['color'] . "," . $data['vehicle_type'] . "," . $data['rc_no'] . "," . $data['theft_location'] . ',' . $data['theft_time'];
                $mobile_no_list = $this->model->get_mobile_no_list();
                $this->sendSMS($result_sms, $mobile_no_list);
            } else {

                $this->sendSMS($error, $mobilenumber);
            }
        } else if (trim($status) == trim('Found')) {
            if ($error == '' || $error == null) {
                $reply_msg = 'You have reported found vehicle for RC no :' . $data['rc_no'];
                $this->sendSMS($reply_msg, $mobilenumber);
                $result_sms = "Vehicle Found " . $data['vehicle_type'] . "," . $data['color'] . "," . $data['rc_no'];
                $mobile_no_list = $this->model->get_mobile_no_list();
                $this->sendSMS($result_sms, $mobile_no_list);
            } else {
                $this->sendSMS($error, $mobilenumber);
            }
        } else if (trim($status) == trim('Cancel')) {
            if ($error == '' || $error == null) {
                $reply_msg = 'You have cancelled vehicle theft reporting for RC no ' . $data['rc_no'];
                $this->sendSMS($reply_msg, $mobilenumber);
                $result_sms = "Vehicle Theft Cancel " . $data['vehicle_type'] . "," . $data['color'] . "," . $data['rc_no'];
                $mobile_no_list = $this->model->get_mobile_no_list();
                $this->sendSMS($result_sms, $mobile_no_list);
            } else {

                $this->sendSMS($error, $mobilenumber);
            }
        }
    }

    function sendSMS($sms_format, $mobile_no_list) {
        $user = "glomindz"; //your username
        $password = "Gl0mindz@0123"; //your password
        $mobilenumbers = $mobile_no_list; //enter Mobile numbers comma seperated
        $message = $sms_format; //enter Your Message
        $senderid = "GHYPOL"; //Your senderid
        $messagetype = "N"; //Type Of Your Message
        $DReports = "Y"; //Delivery Reports
        $url = "http://www.smscountry.com/SMSCwebservice_Bulk.aspx";
        $message = urlencode($message);
        $ch = curl_init();
        if (!$ch) {
            die("Couldn't initialize a cURL handle");
        }
        $ret = curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "User=$user&passwd=$password&mobilenumber=$mobilenumbers&message=$message&sid=$senderid&mtype=$messagetype&DR=$DReports");
        $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        //If you are behind proxy then please uncomment below line and provide your proxy ip with port.
        // $ret = curl_setopt($ch, CURLOPT_PROXY, "PROXY IP ADDRESS:PORT");

        $curlresponse = curl_exec($ch); // execute
        if (curl_errno($ch))
        //echo 'curl error : '. curl_error($ch);
            if (empty($ret)) {
                // some kind of an error happened
                die(curl_error($ch));
                curl_close($ch); // close cURL handler
            } else {
                $info = curl_getinfo($ch);
                curl_close($ch); // close cURL handler
                //echo "<br>";
                //echo "Message Sent Succesfully" ;
            }
    }

}