<?php

class Model {

	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$sth= $this->db->prepare("SET SESSION time_zone = '+5:30'");
		$sth->execute();
	}
        

  function sendSMS_($sms_format, $mobile_no_list) {
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