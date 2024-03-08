<?php
		$to = "kamal.dev@glomindz.com, support@glomindz.com";
		$subject = "Guwahati City Police: Contact Us";
		
	    $message = "Sender Mobile: ".$_POST['mobile']. "\r\n" .$_POST['message'];
	    $headers = "From:".$_POST['email'];
		
		mail($to, $subject, $message, $headers);
		
		echo 1;
?>

