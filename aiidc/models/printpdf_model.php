<?php

class PrintPdf_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function save_download_user(){
	
		$user_type=$_POST['optionsRadios'];
		if($user_type=='Other'){
			$user_type=$_POST['inputOther'];
		}
		
		$data = array();
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile_no'];
		$data['user_type']= $user_type;
		$access_type='guest';
		$remarks='GOOD';

		$table=' user_access_details';
		
		$this->db->insert($table, array(
				'name' => $data['name'],
				'email' => $data['email'],
				'mobile' => $data['mobile'],
				'user_type'=>$user_type,
				'access_type'=>$access_type,
				'remarks'=>$remarks
		));
		
	}
	public function get_dm_rm_for_pdf($dist_id, $rm_items_id){
		$query="SELECT dm.name dist_name, rm.name rm_name FROM district_master dm, rm_master rm WHERE dm.id=$dist_id AND rm.id=$rm_items_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;		
	}
	
	public function get_rm_for_allpdf($rm_items_id){
		$query="SELECT rm.name rm_name FROM rm_master rm WHERE rm.id =$rm_items_id LIMIT 0 , 1";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	
	public function get_raw_material_data_for_pdf($dist_id, $rm_items_id){
	
	
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
		rad.name availibility, rpu.name present_usage, brm.score rm_score,rpu.id present_usage_id
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
		return $data;
	}
	public function get_block_profile_info_data_for_pdf($id){
		$query="SELECT binf.id, binf.identification_no, binf.block_name, binf.subdivision, binf.dist_id, binf.dist_name, binf.distance_hq, binf.pop_total, binf.pop_hindu, binf.pop_muslim, binf.pop_christian, binf.pop_budhist, binf.pop_others, binf.cast_sc, binf.cast_stp, binf.cast_sth, binf.cast_obc_mobc, binf.cast_others, binf.topography, binf.nearby_river_1, binf.nearby_river_2, binf.nearby_river_3, binf.forest_nearby_yn, binf.forest_name_1, binf.forest_distance_1, binf.forest_area_1, binf.forest_name_2, binf.forest_distance_2, binf.forest_area_2, binf.forest_name_3, binf.forest_distance_3, binf.forest_area_3, binf.last_update_user, binf.last_update_date, tdef.name tdef_topography_name, dm.name dm_dist_name
		FROM block_info binf, topography_def tdef, district_master dm WHERE binf.id =$id AND binf.topography = tdef.id
		AND dm.id = binf.dist_id";  
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	
	public function get_block_profile_infra_data_for_pdf($id){
		$query="SELECT *  FROM block_infra binf LEFT JOIN  infra_master infm on binf.infra_id=infm.id where binf.block_id='$id' order by infm.id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	
	public function get_block_profile_raw_data_for_pdf($id){
		$query="SELECT *  FROM block_rm brm LEFT JOIN rm_master rm on brm.rm_id=rm.id where brm.block_id='$id' ORDER BY  rm.type, rm.name";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	
	public function get_block_profile_hr_data_for_pdf($id){
		$query="SELECT * FROM block_hr bhr, hr_master hrm WHERE bhr.hr_id=hrm.id AND bhr.block_id=$id ORDER BY  hrm.name";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	
	public function get_block_profile_growth_poss_data_for_pdf($id){
		$query="SELECT *  FROM  block_growth_possibilites  where block_id='$id'";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
//hr

	public function get_hr_data_for_pdf($dist_id, $hr_items_id){	
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
		return $data;
	}
	public function get_dm_hr_for_pdf($dist_id, $hr_items_id){
		$query="SELECT dm.name dist_name, hr.name hr_name FROM district_master dm, hr_master hr WHERE dm.id=$dist_id AND hr.id=$hr_items_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	
	public function get_hr_for_allpdf($hr_items_id){
		$query="SELECT hr.name hr_name FROM hr_master hr WHERE hr.id =$hr_items_id LIMIT 0 , 1";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}

	//gen_infra
	
	public function get_gen_infra_data($dist_id, $infra_items_id){
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
				AND binf.infra_id = $infra_items_id
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
				AND binf.infra_id = $infra_items_id
				AND dm.id = $dist_id
				order by binf_score,block_name";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		return $data;
	}
	public function get_dm_gen_for_pdf($dist_id, $infra_items_id){
	$query="SELECT dm.name dist_name, infra.name infra_name FROM district_master dm, infra_master infra WHERE dm.id=$dist_id AND infra.id=$infra_items_id";
	$sth = $this->db->prepare($query);
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	$sth->execute();
	$data = $sth->fetchAll();
	return $data;
	}
	
	public function get_gen_for_allpdf($infra_items_id){
	$query="SELECT infra.name infra_name FROM infra_master infra WHERE infra.id=$infra_items_id LIMIT 0 , 1";
	$sth = $this->db->prepare($query);
	$sth->setFetchMode(PDO::FETCH_ASSOC);
	$sth->execute();
	$data = $sth->fetchAll();
	return $data;
	}
	
}