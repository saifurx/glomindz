<?php

		$url = 'https://api.elasticemail.com/v2/email/send';
		$message = "Sender Mobile: ".$_POST['name']. "<br>"."Sender Mobile: ".$_POST['mobile']. "<br>" .$_POST['message']."<br>".$_POST['email'];

		//echo $message;
		try{
		     $post = array('from' => 'support@glomindz.com',
				'fromName' => 'Crimatrix',
				'apikey' => '4b90ddf7-2d32-4f95-8476-44cde6d2e6a4',
				'subject' => 'Crimatrix:Contact us',
				'to' => 'sarfaraz.hassan@glomindz.com',
				'cc' => 'rupam.g@glomindz.com, saifur.rahman@glomindz.com',
				'bodyHtml' => '<h1>Contact us by:</h1><br>'.$message,
				'bodyText' => $message,
				'isTransactional' => false);

				$ch = curl_init();
				curl_setopt_array($ch, array(
		            CURLOPT_URL => $url,
								CURLOPT_POST => true,
								CURLOPT_POSTFIELDS => $post,
		            CURLOPT_RETURNTRANSFER => true,
		            CURLOPT_HEADER => false,
								CURLOPT_SSL_VERIFYPEER => false
		        ));

		        $result=curl_exec ($ch);
		        curl_close ($ch);
		        echo json_encode($result);
		}
		catch(Exception $ex){
			echo json_encode($ex->getMessage());
		}
?>
