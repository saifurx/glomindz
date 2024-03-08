<?php 	
	date_default_timezone_set('Asia/Calcutta');
	if(!empty($_SERVER['HTTPS'])){
	 	define('protocol', 'https');
	}
	else{
		define('protocol', 'http');
	}
	//define('URL', protocol.'://localhost/crimatrix_home/');
	define('URL', protocol.'://crimatrix.com/');
?>