<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


$checkSum = "";
$paramList = array();

$ORDER_ID = $_POST["ORDER_ID"];
$CUST_ID = $_POST["CUST_ID"];
$INDUSTRY_TYPE_ID = 'Retail109';
$CHANNEL_ID = 'WEB';
$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
$EMAIL = $_POST["EMAIL"];
$MOBILE_NO = $_POST["MOBILE_NO"];
// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["EMAIL"] = $EMAIL;
$paramList["MOBILE_NO"] = $MOBILE_NO;
$paramList["CALLBACK_URL"] = "https://enterprise.crimatrix.com/hotel/paymentresponse";
//define('CALLBACK_URL','https://enterprise.crimatrix.com/hotel/paymentresponse');
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
//print_r($paramList);
?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
