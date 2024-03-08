<?php

class Settings_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	function save_new_deliverable($table,$data) {
		$count =$this->check_name($table,$data['name']);
		if($count<=0){
			$this->db->insert($table,$data);
			$data['id'] = $this->db->lastInsertId();
			$data['error']=0;
		}else{
			$data['error']= $data['name'].'name already available';
		}
		echo json_encode($data);
	}
	
	function save_new_project_deliverable($table,$data){
		$this->db->insert($table,$data);
		$data['id'] = $this->db->lastInsertId();
		echo json_encode($data);
	}
	function get_deliverables($table){
		$sth = $this->db->prepare("SELECT * FROM $table");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	function get_project_deliverables(){
		
		$table_project_deleverables=TABLE_PREFIX."_project_deleverables";
		$table_project_master=TABLE_PREFIX."_project_master";
		$table_deliverable_master=TABLE_PREFIX."_deliverable_master";
		
		$sth = $this->db->prepare("SELECT mpd.*, mpm.name as project_name, mdm.name as d_name FROM
				$table_project_deleverables mpd,
				$table_project_master mpm,
				$table_deliverable_master mdm
				WHERE mpd.project_id = mpm.id
				AND mpd.deleverables_id = mdm.id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	function edit_deliverables($id,$table){
		$sth = $this->db->prepare("SELECT * FROM $table WHERE id = $id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	function update_deliverable($table,$data,$where){
		$this->db->update($table,$data,$where);
		echo 1;
	}
	
	function get_all_users($table){
		$sth = $this->db->prepare("SELECT * FROM $table");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	function save_new_user($table, $data){
		$count =$this->check_name($table,$data['name']);
		if($count<=0){
			$this->db->insert($table,$data);
			$data['id'] = $this->db->lastInsertId();
			$data['error']=0;
		}else{
			$data['error']= $data['name'].'name already available';
		}
		echo json_encode($data);
	}
	
	function change_status($table,$id,$status) {
		$resp=1;
		try{
			$query="UPDATE $table  SET status=$status where id=$id";
			$sth = $this->db->prepare($query);
			$sth->execute();
		}catch (Exception $exp){
			$resp=$exp;
		}
		echo $resp;
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