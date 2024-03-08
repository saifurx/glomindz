<?php

class Model {

	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		$sth= $this->db->prepare("SET SESSION time_zone = '+5:30'");
		$sth->execute();
	}
        

}