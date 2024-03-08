<?php

class Model {

	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

	public function clear_input_string($str){
		$search = array('@<script[^>]*?>.*?</script>@si',  //Strip out javascript
				'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
				'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
				'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA
		);
		$str = preg_replace($search, '', $str);
		$str = str_replace(array("'", "'", "'", '"'), array("&#39;", "&quot;", "&#39;", "&quot;"), $str);
		return $str;
	}
}