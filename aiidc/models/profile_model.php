<?php

class Profile_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all_block(){
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
	
	public function get_all_district(){
		$query="SELECT dm.id dist_id, dm.name dist_name	FROM district_master dm ORDER BY dm.name";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function get_general_info(){
		$block_id= $_POST['block_id'];
		$sth = $this->db->prepare("SELECT binf.id, binf.identification_no, binf.block_name, binf.subdivision, binf.dist_id, binf.dist_name, binf.distance_hq, binf.pop_total, binf.pop_hindu, binf.pop_muslim, binf.pop_christian, binf.pop_budhist, binf.pop_others, binf.cast_sc, binf.cast_stp, binf.cast_sth, binf.cast_obc_mobc, binf.cast_others, binf.topography, binf.nearby_river_1, binf.nearby_river_2, binf.nearby_river_3, binf.forest_nearby_yn, binf.forest_name_1, binf.forest_distance_1, binf.forest_area_1, binf.forest_name_2, binf.forest_distance_2, binf.forest_area_2, binf.forest_name_3, binf.forest_distance_3, binf.forest_area_3, binf.last_update_user, binf.last_update_date, tdef.name tdef_topography_name, dm.name dm_dist_name
		FROM block_info binf, topography_def tdef, district_master dm WHERE binf.id =$block_id AND binf.topography = tdef.id
		AND dm.id = binf.dist_id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function getRawmaterials(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_rm brm LEFT JOIN rm_master rm on brm.rm_id=rm.id where brm.block_id='$block_id' ORDER BY  rm.type, rm.name");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}

	public function gethuman_resource(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_hr bhr LEFT JOIN  hr_master hrm on bhr.hr_id=hrm.id where bhr.block_id='$block_id' ORDER BY  hrm.type");
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
		$sth = $this->db->prepare("SELECT block_id, manufacturing_service, IFNULL(possible_sectors,'NA') possible_sectors, impediments_order, IFNULL(remarks,'NA')remarks FROM block_growth_possibilites WHERE block_id =$block_id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	//dist
	function getDictpopulition() {
		$dist_id=$_POST['dist_id'];
		$sth = $this->db->prepare("SELECT dist_name,sum(pop_total) as totalPop FROM `block_info` WHERE `dist_id`=$dist_id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	function getDict_raw_material() {
		$dist_id=$_POST['dist_id'];
		$query="SELECT rmm.name, rmm.type_id, brm.rm_id, SUM( IF( brm.score >=112, 80, (IF( brm.score >=85 AND brm.score <112, 50, IF( brm.score >0 AND brm.score <85, 40, 0 ) ) ) ) ) dist_consolodated_score, count(brm.rm_id) block_count FROM block_rm brm, block_info bi, rm_master rmm WHERE brm.block_id = bi.id AND bi.dist_id =$dist_id and rmm.id = brm.rm_id AND brm.score >0 GROUP BY bi.dist_id, brm.rm_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	function getDict_human_resource() {
		$dist_id=$_POST['dist_id'];
		$query="SELECT hrm.name, hrm.type_id, bhr.hr_id, SUM( IF( bhr.score >=88, 80, (IF( bhr.score >=66 AND bhr.score <88, 50, IF( bhr.score >0 AND bhr.score <66, 40, 0 ) ) ) ) ) dist_consolodated_score, count( bhr.hr_id ) block_count FROM block_hr bhr, block_info bi, hr_master hrm WHERE bhr.block_id = bi.id AND bi.dist_id =$dist_id AND hrm.id = bhr.hr_id AND bhr.score >0 GROUP BY bi.dist_id, bhr.hr_id";
		//$query="SELECT hrm.name,hrm.type_id, bhr.hr_id, SUM( IF( bhr.score >=112, 80, (IF( bhr.score >=85 AND bhr.score <112, 50, IF( bhr.score >0 AND bhr.score <85, 40, 0 ) ) ) ) ) dist_consolodated_score , count(bhr.hr_id) block_count FROM block_hr bhr, block_info bi,hr_master hrm WHERE bhr.block_id = bi.id AND bi.dist_id =$dist_id and hrm.id=bhr.hr_id AND bhr.score>0 GROUP BY bi.dist_id, bhr.hr_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	
	public function get_district_center($dist_id){
		$query="SELECT * FROM district_master where id=$dist_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	//gm comments
	function get_block_gm_comments(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_gm_comments bgmc where bgmc.block_id='$block_id'");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	function get_block_gm_comments_available_loc(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT *  FROM block_gm_comments bgmc, block_gm_comments_location bgmcl where bgmc.block_id=bgmcl.block_id and bgmc.block_id='$block_id'");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	function get_block_gm_comments_viable_mdsd(){
		$block_id=$_POST['block_id'];
		$sth = $this->db->prepare("SELECT mdsd.* ,tm.name FROM block_gm_comments_mdsd_trade mdsd,  mdsd_trade_master tm where mdsd.trade_id=tm.id and mdsd.block_id=$block_id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	function dist_and_blocks() {
		$sth = $this->db->prepare('SELECT DISTINCT dm.id dist_id, dm.name, binf.id, binf.block_name FROM district_master dm, block_info binf WHERE binf.dist_id = dm.id ORDER BY dm.id');
		$sth->execute();
		return $sth->fetchAll();
	}
	
}