<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
header('Refresh: 5; URL=https://enterprise.crimatrix.com/hotel/subcribe');


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	$mobile_no=Auth::user()->owner_mobile;
	$email=Auth::user()->email;
	$hotel_name=Auth::user()->name;
	$data =array();
	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();
	if (isset($_POST["ORDERID"]) && $_POST["ORDERID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB.
		$ORDER_ID = $_POST["ORDERID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID,"CHECKSUMHASH"=>$paytmChecksum);

		// Call the PG's getTxnStatus() function for verifying the transaction status.
		$responseParamList = getTxnStatus($requestParamList);

	}
	//print_r($responseParamList['TXNAMOUNT']);

	echo "<h2>Checksum matched and following are the transaction details:</h2>" . "<br/>";
	// && $responseParamList['TXNAMOUNT']==$_POST["TXN_AMOUNT"] && $responseParamList['ORDERID']==$_POST["ORDERID"]
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<h3>Transaction status is success</h3> Redirecting in 5 Sec" . "<br/>";
		$order_id=$_POST["ORDERID"];
		$data['transaction_amount']=$_POST["TXNAMOUNT"];
		$data['transaction_id']=$_POST["TXNID"];
		$data['payment_status']=1;
		$data['transaction_remark']=$_POST["RESPMSG"];
		$resp = DB::table('hotel_transaction_master')->where('order_id', $order_id)->update($data);

		$userinfo = array('email' => $email, 'name'=>$hotel_name);
		$msg="Thanks ".Auth::user()->name." Your transaction for subcribtion of crimatrix guestlist submission is successful.";
		sendSMS($msg,$mobile_no);
		$data_email = array(
			'hotel_name' => Auth::user()->name,
			'owner_mobile' => Auth::user()->owner_mobile,
			'payment_date' => date('y-m-d'),
			'amount' => $_POST["TXNAMOUNT"],
			'payment_status' => $_POST["RESPMSG"]

			);

		Mail::send('emails.payment_success', $data_email, function($message){
						$message->from('support@glomindz.com', 'Crimatrix');
						$message->to(Auth::user()->email)->cc('saifur.rahman@glomindz.com')->subject('Crimatrix Subcription Fee Payment successful');
		});
	}
	else {
		echo "<h3>Transaction status is failure</h3>Redirecting in 5 Sec" . "<br/>";
		$order_id=$_POST["ORDERID"];
		$data['transaction_amount']=$_POST["TXNAMOUNT"];
		$data['transaction_id']=$_POST["TXNID"];
		$data['payment_status']=0;
		$data['transaction_remark']=$_POST["RESPMSG"];
		$resp = DB::table('hotel_transaction_master')->where('order_id', $order_id)->update($data);
		$msg="Thanks ".Auth::user()->name."Your transaction for subcribtion of crimatrix guestlist submission is Failed.Please try agin later.";
		sendSMS($msg,$mobile_no);
		$data_email = array(
			'hotel_name' => Auth::user()->name,
			'owner_mobile' => Auth::user()->owner_mobile,
			'payment_date' => date('y-m-d'),
			'amount' => $_POST["TXNAMOUNT"],
			'payment_status' => $_POST["RESPMSG"]

			);
		//$userinfo = array('email' => $email, 'name'=>$hotel_name);
		Mail::send('emails.payment_failed', $data_email, function($message){
						$message->from('support@glomindz.com', 'Crimatrix');
						$message->to(Auth::user()->email)->cc('saifur.rahman@glomindz.com')->subject('Crimatrix Subcription Fee Payment Failed');
		});
	}


}
else {
	echo "<b>Checksum mismatched.</b> Redirecting in 5 Sec";
	//Process transaction as suspicious.

}
function sendSMS($sms_format, $mobile_no_list) {
//	echo $sms_format.$mobile_no_list;
	$authKey = "134784AHno1jVJyXGB585d4ff7";
	$mobileNumber = $mobile_no_list;
	$senderId = "CRMTRX";
	$message = urlencode($sms_format);
	$route = 4;
	$postData = array(
			'authkey' => $authKey,
			'mobiles' => $mobileNumber,
			'message' => $message,
			'sender' => $senderId,
			'route' => $route
	);
	$url="https://control.msg91.com/api/sendhttp.php";
	$ch = curl_init();
	curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			//,CURLOPT_FOLLOWLOCATION => true
	));
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$output = curl_exec($ch);
	if(curl_errno($ch))
	{
			echo 'error:' . curl_error($ch);
	}
	curl_close($ch);
	//echo $output;
}
?>
