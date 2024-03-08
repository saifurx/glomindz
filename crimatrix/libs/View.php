<?php

class View {

	function __construct() {
		//echo 'this is the view';
		ini_set( "display_errors", 0);
	}

	public function render($name, $noInclude = false)
	{
		if ($noInclude == true) {
			require 'views/' . $name . '.php';	
		}
		else {
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';	
		}
	}
        
	
}