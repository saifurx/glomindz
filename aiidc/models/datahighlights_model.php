<?php
class Datahighlights_Model extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function get_data_highlight_array(){
		$result=array();
		$count=0;
		$query ="SELECT id, name, zone FROM district_master order by zone, name";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		foreach ($data as $row){
			$data_highlight_array= array();
			$blocks=$this->get_dist_blocks($row['id']);
			$top_rm =$this->get_raw_material($row['id']);
			$top_hr =$this->get_human_resource($row['id']);
			$data_highlight_array[0]=$row['id'];
			$data_highlight_array[1]=$row['name'];
			$data_highlight_array[2]=$row['zone'];
			$data_highlight_array[3]=$blocks;
			$data_highlight_array[4]=$top_rm;
			$data_highlight_array[5]=$top_hr;
			$result[$count]=$data_highlight_array;
			$count=$count+1;
		}
		echo json_encode($result);
	}

	public function get_dist_blocks($dist_id) {
		$blocks='';
		$query ="SELECT block_name FROM block_info WHERE dist_id = $dist_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		foreach ($data as $row){
			$blocks=$blocks.$row['block_name'].'!!';
		}
		return $blocks;
	}
	public function get_raw_material($dist_id) {
		$rm_name='';
		$query ="SELECT rm.name as rm_name, rm.type_id, brm.rm_id, SUM( IF( brm.score >=112, 80, (IF( brm.score >=85 AND brm.score <112, 50, IF( brm.score >0 AND brm.score <85, 40, 0 ) ) ) ) )dist_consolodated_score
		FROM block_rm brm, block_info bi,rm_master rm , district_master dm
		WHERE brm.block_id = bi.id
		AND bi.dist_id = $dist_id
		and rm.id=brm.rm_id
		and bi.dist_id = dm.id
		GROUP BY bi.dist_id, brm.rm_id
		ORDER BY dist_consolodated_score desc, rm.name limit 0,5";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		foreach ($data as $row){
			$rm_name=$rm_name.$row['rm_name'].'!!';
		}
		return $rm_name;
	}

	public function get_human_resource($dist_id) {
		$hr_name='';
		$query ="SELECT dm.name , dm.zone, hrm.name as hr_name,hrm.type_id, bhr.hr_id, SUM( IF( bhr.score >=112, 80, (IF( bhr.score >=85 AND bhr.score <112, 50, IF( bhr.score >0 AND bhr.score <85, 40, 0 ) ) ) ) )dist_consolodated_score
		FROM block_hr bhr, block_info bi,hr_master hrm , district_master dm
		WHERE bhr.block_id = bi.id
		AND bi.dist_id = $dist_id
		and hrm.id=bhr.hr_id
		and bi.dist_id = dm.id
		GROUP BY bi.dist_id, bhr.hr_id
		ORDER BY dist_consolodated_score desc, hrm.name limit 0,5";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		foreach ($data as $row){
			$hr_name=$hr_name.$row['hr_name'].'!!';
		}
		return $hr_name;
	}
}