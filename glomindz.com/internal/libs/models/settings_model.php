<?php

class Settings_Model extends Model {

	public function __construct() {
		parent::__construct();
	}
	function get_all_data($table) {
		$query="SELECT * FROM $table";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	function add_master_data($table,$data) {
		$count =$this->check_name($table,$data['name']);
		if($count<=0){
			$this->db->insert($table,$data);
			$data['id'] = $this->db->lastInsertId();
			$data['error']='';
		}else{
			$data['error']= $data['name'].' name already available';
		}
		echo json_encode($data);
	}
	function change_status($table,$id,$status) {
		$query="UPDATE $table  SET status=$status where id=$id";
		$sth = $this->db->prepare($query);
		$sth->execute();
		echo $status.'::'.$query;
	}

	function check_name($table,$name){

		$query="SELECT id FROM $table where name = '$name'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		$count =  $sth->rowCount();
		return $count;
	}


}