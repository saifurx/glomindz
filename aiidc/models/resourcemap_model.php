<?php

class ResourceMap_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function districtList()
	{
		$sth = $this->db->prepare('SELECT id, name, latitude, longitude FROM district_master order by name');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function raw_material_type()
	{
		$sth = $this->db->prepare('SELECT distinct type FROM  rm_master order by type');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function human_resource_catagory()
	{
		$sth = $this->db->prepare('SELECT  distinct type FROM  hr_master order by type');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function getRawMaterialList()
	{
		$type=$_POST['type'];
		$sth = $this->db->prepare("SELECT id, name FROM  rm_master where type='$type' order by name");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function getHumanResourceList()
	{
		$type=$_POST['type'];
		$sth = $this->db->prepare("SELECT id, name, type FROM  hr_master where type='$type' order by name");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function getInfraStructureList()
	{
		$type=$_POST['type'];
		$sth = $this->db->prepare("SELECT id, name FROM  infra_master where type='$type' order by name");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function getBlockList()
	{
		$dist_id=$_POST['dist'];
		$sth = $this->db->prepare("SELECT id, block_name FROM  block_info where dist_id='$dist_id' order by block_name");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function get_raw_material_data($dist_id,$rm_items_id){

		
		$query='';
		if($dist_id==0){
			$query="select dm.id dist_id, dm.name district_name, bi.id block_id, bi.block_name block_name, brm.rm_id rm_id, rm.name rm_name, rm.type rm_type_category,
			case brm.occurrence when 1 then 'Yes' Else 'No' end rm_occurrence,
			rad.name availibility, rpu.name present_usage, brm.score rm_score,rpu.id present_usage_id
			from block_rm brm, block_info bi, rm_availibility_def rad, rm_present_usage_def rpu, rm_master rm, district_master dm
			where brm.block_id = bi.id
			and bi.dist_id = dm.id
			and brm.rm_id = rm.id
			and brm.availibility = rad.id
			and brm.present_usage = rpu.id
			and brm.rm_id = $rm_items_id
			order by rm_score DESC,district_name,block_name";
		}else{
			$query="select dm.id dist_id, dm.name district_name, bi.id block_id, bi.block_name block_name, brm.rm_id rm_id, rm.name rm_name, rm.type rm_type_category,
			case brm.occurrence when 1 then 'Yes' Else 'No' end rm_occurrence,
			rad.name availibility, rpu.name present_usage, brm.score rm_score,rpu.id present_usage_id,dm.latitude,dm.longitude
			from block_rm brm, block_info bi, rm_availibility_def rad, rm_present_usage_def rpu, rm_master rm, district_master dm
			where brm.block_id = bi.id
			and bi.dist_id = dm.id
			and brm.rm_id = rm.id
			and brm.availibility = rad.id
			and brm.present_usage = rpu.id
			and brm.rm_id = $rm_items_id
			and bi.dist_id = $dist_id order by rm_score DESC,district_name,block_name";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);

	}
	
	public function get_human_resource_data($dist_id,$hr_items_id){

		$query='';
		if($dist_id==0){
			$query="select dm.id dist_id, dm.name district_name, bi.id block_id, bi.block_name block_name, bhr.hr_id hr_id, hrm.name hrm_name, hrm.type hrm_type_category,
					case bhr.occurrence when 1 then 'Yes' Else 'No' end hrm_occurrence,hrad.name availibility, hrpu.name present_usage, bhr.score hr_score,hrpu.id present_usage_id
					from block_hr bhr, block_info bi, hr_commercial_viability_def hrad, hr_present_usage_def hrpu, hr_master hrm, district_master dm
					where bhr.block_id = bi.id
					and bi.dist_id = dm.id
					and bhr.hr_id = hrm.id
					and bhr.commercial_viability = hrad.id
					and bhr.present_usage = hrpu.id
					and bhr.hr_id = $hr_items_id
					order by hr_score DESC,district_name,block_name";
		}
		else{
					$query="select dm.id dist_id, dm.name district_name, bi.id block_id, bi.block_name block_name, bhr.hr_id hr_id, hrm.name hrm_name, hrm.type hrm_type_category,
					case bhr.occurrence when 1 then 'Yes' Else 'No' end hrm_occurrence,hrad.name availibility, hrpu.name present_usage, bhr.score hr_score,hrpu.id present_usage_id,dm.latitude,dm.longitude
					from block_hr bhr, block_info bi, hr_commercial_viability_def hrad, hr_present_usage_def hrpu, hr_master hrm, district_master dm
					where bhr.block_id = bi.id
					and bi.dist_id = dm.id
					and bhr.hr_id = hrm.id
					and bhr.commercial_viability = hrad.id
					and bhr.present_usage = hrpu.id
					and bhr.hr_id = $hr_items_id
					and bi.dist_id = $dist_id order by hr_score DESC,district_name,block_name";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);

	}
	
	public function get_infra_structure_data($dist_id,$infra_id){
		
		$query='';
		if($dist_id==0){
			$query="SELECT dm.id dist_id, dm.name district_name, bi.id block_id, bi.block_name block_name,binf.infra_id infra_id,binf.score binf_score, 
				infm.name infm_name, infm.type infm_type_category, CASE binf.availability WHEN 1 THEN  'Yes' ELSE  'No'	END binf_availability, infad.name accessibility,infp.name condition_def, binf.score binf_score, infp.id condition_id,dm.latitude,dm.longitude 	
				FROM block_infra binf,block_info bi,infra_accessibility_def infad,infra_condition_def infp, infra_master infm, district_master dm
				WHERE binf.block_id = bi.id
				AND bi.dist_id = dm.id
				AND binf.infra_id = infm.id
				AND binf.accessibility = infad.id
				AND binf.infra_condition = infp.id
				AND binf.infra_id = $infra_id
				order by dm.id,binf_score,block_name";
		}
		else{
			$query="SELECT dm.id dist_id, dm.name district_name, bi.id block_id, bi.block_name block_name,binf.infra_id infra_id,binf.score binf_score, 
				infm.name infm_name, infm.type infm_type_category, CASE binf.availability WHEN 1 THEN  'Yes' ELSE  'No'	END binf_availability, infad.name accessibility,infp.name condition_def, binf.score binf_score, infp.id condition_id ,dm.latitude,dm.longitude	
				FROM block_infra binf,block_info bi,infra_accessibility_def infad,infra_condition_def infp, infra_master infm, district_master dm
				WHERE binf.block_id = bi.id
				AND bi.dist_id = dm.id
				AND binf.infra_id = infm.id
				AND binf.accessibility = infad.id
				AND binf.infra_condition = infp.id
				AND binf.infra_id = $infra_id
				AND dm.id = $dist_id
				order by binf_score,block_name";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
		
	}
	
	public function infra_structure_type()
	{
		$sth = $this->db->prepare('SELECT distinct type FROM  infra_master order by type');
		$sth->execute();
		return $sth->fetchAll();
	}

	public function get_block_profile_data($block_id){
		
		$query="SELECT *  FROM block_info binf, block_rm brm, rm_master rm where brm.block_id=$block_id and brm.rm_id=rm.id and binf.id=brm.block_id order by rm.id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	

}