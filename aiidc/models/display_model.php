<?php

class Display_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_block() {
		$query="SELECT binfo.id, binfo.block_name,dm.name
				FROM block_info binfo,district_master dm
				where binfo.dist_id = dm.id
				ORDER BY dm.name";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_all_district() {
		$query="SELECT dm.id dist_id, dm.name dist_name	FROM district_master dm ORDER BY dm.name";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_general_info() {
		$block_id= $_POST['block_id'];
		$sth = $this->db->prepare(" SELECT binf. * ,tdef.name topography_name , dm.name dist_name FROM block_info binf, topography_def tdef,district_master dm where binf.id=$block_id and binf.topography=tdef.id and dm.id=binf.dist_id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function getRawmaterials(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_rm brm LEFT JOIN rm_master rm on brm.rm_id=rm.id where brm.block_id='$block_id' order by rm.id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}

	public function gethuman_resource(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_hr bhr LEFT JOIN  hr_master hrm on bhr.hr_id=hrm.id where bhr.block_id='$block_id'");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	public function getGen_infra(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_infra binf LEFT JOIN  infra_master infm on binf.infra_id=infm.id where binf.block_id='$block_id' order by infm.id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	public function getGrowth_possiblities(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM  block_growth_possibilites  where block_id='$block_id'");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
}