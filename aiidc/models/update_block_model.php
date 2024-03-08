<?php

class Update_block_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
		Session::init();
	}

	public function update_gen_info(){
		
		$data = array();
		$data['id'] = $_POST['id'];
		$data['block_id'] = $_POST['id'];
		$data['block_name'] = $_POST['gendata01'];
		$data['identification_no'] = $_POST['gendata02'];
		$data['subdivision'] = $_POST['gendata03'];
		$data['dist_name'] = $_POST['gendata04'];
		$data['distance_hq'] = $_POST['gendata05'];
		$data['pop_total'] = $_POST['gendata06'];
		$data['pop_hindu'] = $_POST['gendata07'];
		$data['pop_muslim'] = $_POST['gendata08'];
		$data['pop_christian'] = $_POST['gendata09'];
		$data['pop_budhist'] = $_POST['gendata010'];
		$data['pop_others'] = $_POST['gendata011'];
		$data['cast_sc'] = $_POST['gendata012'];
		$data['cast_stp'] = $_POST['gendata013'];
		$data['cast_sth'] = $_POST['gendata014'];
		$data['cast_obc_mobc'] = $_POST['gendata015'];
		$data['cast_others'] = $_POST['gendata016'];
		$data['topography'] = $_POST['topography'];
		$data['nearby_river_1'] = $_POST['gendata018a'];
		$data['nearby_river_2'] = $_POST['gendata018b'];
		$data['nearby_river_3'] = $_POST['gendata018c'];
		$data['forest_nearby_yn'] = $_POST['gendata019'];
		$data['forest_name_1'] = $_POST['gendata019a'];
		$data['forest_name_2'] = $_POST['gendata019b'];
		$data['forest_name_3'] = $_POST['gendata019c'];
		$data['forest_distance_1'] = $_POST['gendata020a'];
		$data['forest_distance_2'] = $_POST['gendata020b'];
		$data['forest_distance_3'] = $_POST['gendata020c'];
		$data['forest_area_1'] = $_POST['gendata021a'];
		$data['forest_area_2'] = $_POST['gendata021b'];
		$data['forest_area_3'] = $_POST['gendata021c'];
		$data['last_update_user'] = Session::get('id');
		// @TODO: Do your error checking!
		$postData=array(
				'block_name' => $data['block_name'],
				'identification_no' => $data['identification_no'],
				'subdivision' => $data['subdivision'],
				'dist_name' => $data['dist_name'],
				'distance_hq' => $data['distance_hq'],
				'pop_total' => $data['pop_total'],
				'pop_hindu' => $data['pop_hindu'],
				'pop_muslim' => $data['pop_muslim'],
				'pop_christian' => $data['pop_christian'],
				'pop_budhist' => $data['pop_budhist'],
				'pop_others' => $data['cast_sc'],
				'cast_sc' => $data['cast_sc'],
				'cast_stp' => $data['cast_stp'],
				'cast_sth' => $data['cast_sth'],
				'cast_obc_mobc' => $data['cast_obc_mobc'],
				'cast_others' => $data['cast_others'],
				'topography' => $data['topography'],
				'nearby_river_1' => $data['nearby_river_1'],
				'nearby_river_2' => $data['nearby_river_2'],
				'nearby_river_3' => $data['nearby_river_3'],
				'forest_nearby_yn' => $data['forest_nearby_yn'],
				'forest_name_1' => $data['forest_name_1'],
				'forest_name_2' => $data['forest_name_2'],
				'forest_name_3' => $data['forest_name_3'],
				'forest_distance_1'=> $data['forest_distance_1'],
				'forest_distance_2' => $data['forest_distance_2'],
				'forest_distance_3' => $data['forest_distance_3'],
				'forest_area_1' => $data['forest_area_1'],
				'forest_area_2' => $data['forest_area_2'],
				'forest_area_3' => $data['forest_area_3'],
				'last_update_user'=> $data['last_update_user']
		);
		
		$this->db->update('block_info', $postData, "`id` = {$data['id']}");
		//$table ="temp_block_info";
		//$this->db->insert($table, $data);
	}
	function update_raw_material(){
		$data = array();
		$data['block_id'] = $_POST['model_input_block_id'];
		$data['rm_id'] = $_POST['model_input_rm_id'];
		$data['occurrence'] = $_POST['model_input_occurrence'];
		$data['availibility'] = $_POST['model_input_availibility'];
		$data['present_usage'] =$_POST['model_input_present_usage'];

		
		if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==1){
			$score=144;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==2){
			$score=136;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==3){
			$score=120;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==4){
			$score=152;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==5){
			$score=112;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==6){
			$score=128;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==7){
			$score=112;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==1 && $data['present_usage']==8){
			$score=0;
		}
		//
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==1){
			$score=96;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==2){
			$score=108;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==3){
			$score=102;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==4){
			$score=114;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==5){
			$score=78;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==6){
			$score=78;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==7){
			$score=78;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==2 && $data['present_usage']==8){
			$score=0;
		}
		//
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==1){
			$score=80;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==2){
			$score=90;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==3){
			$score=85;
		}
		
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==4){
			$score=95;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==5){
			$score=65;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==6){
			$score=65;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==7){
			$score=65;
		}
		else if($data['occurrence']==1 &&  $data['availibility']==3 && $data['present_usage']==8){
			$score=0;
		}
		//
		else if($data['availibility']==4){
			$score=0;
		}
		else{
			$score=0;
		}
		// @TODO: Do your error checking!
		$table ="temp_block_rm";
		$last_update_user_id=Session::get('id');
		$postData=array(
				'block_id' => $data['block_id'],
				'rm_id' => $data['rm_id'],
				'occurrence' => $data['occurrence'],
				'availibility' => $data['availibility'],
				'present_usage' => $data['present_usage'],
				'score' => $score,
				'last_update_user'=> $last_update_user_id
		);
		
		$this->db->insert($table, $postData);

	}

	function update_human_resource(){
		
		$data = array();
		$data['block_id'] = $_POST['model_hr_input_block_id'];
		$data['hr_id'] = $_POST['model_hr_input_hr_id'];
		$data['occurrence'] = $_POST['model_hr_input_occurrence'];
		$data['commercial_viability'] = $_POST['model_hr_commercial_viability'];
		$data['present_usage'] =$_POST['model_hr_input_present_usage'];

		// @TODO: Do your error checking!
		
		if($data['occurrence']==1 &&  $data['commercial_viability']==1 && $data['present_usage']==1){
			$score=96;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==1 && $data['present_usage']==2){
			$score=112;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==1 && $data['present_usage']==3){
			$score=88;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==1 && $data['present_usage']==4){
			$score=112;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==2 && $data['present_usage']==1){
			$score=72;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==2 && $data['present_usage']==2){
			$score=84;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==2 && $data['present_usage']==3){
			$score=66;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==2 && $data['present_usage']==4){
			$score=84;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==3 && $data['present_usage']==1){
			$score=60;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==3 && $data['present_usage']==2){
			$score=70;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==3 && $data['present_usage']==3){
			$score=55;
		}
		else if($data['occurrence']==1 &&  $data['commercial_viability']==3 && $data['present_usage']==4){
			$score=70;
		}
		else{
			$score=0;
		}
		$table ="temp_block_hr";
		$last_update_user_id=Session::get('id');
		$postData=array(
				'block_id' => $data['block_id'],
				'hr_id' => $data['hr_id'],
				'occurrence' => $data['occurrence'],
				'score' => $score,
				'commercial_viability' => $data['commercial_viability'],
				'present_usage' => $data['present_usage'],
				'last_update_user'=> $last_update_user_id
		);
		$this->db->insert($table, $postData);
	}

	function update_gen_infra(){
		$data = array();
		$data['block_id'] = $_POST['model_infra_input_block_id'];
		$data['infra_id'] = $_POST['model_infra_input_infra_id'];
		$data['availability'] = $_POST['model_infra_input_availability'];
		$data['accessibility'] = $_POST['model_infra_input_accessibility'];
		$data['infra_condition'] =$_POST['model_infra_input_condition'];

		// @TODO: Do your error checking!
		
		if($data['availability']==1 &&  $data['accessibility']==1 && $data['infra_condition']==1){
			$score=78;
		}
		else if($data['availability']==1 &&  $data['accessibility']==1 && $data['infra_condition']==2){
			$score=72;
		}
		else if($data['availability']==1 &&  $data['accessibility']==1 && $data['infra_condition']==3){
			$score=66;
		}
		
		else if($data['availability']==1 &&  $data['accessibility']==2 && $data['infra_condition']==1){
			$score=72;
		}
		else if($data['availability']==1 &&  $data['accessibility']==2 && $data['infra_condition']==2){
			$score=66;
		}
		else if($data['availability']==1 &&  $data['accessibility']==2 && $data['infra_condition']==3){
			$score=61;
		}
		
		else if($data['availability']==1 &&  $data['accessibility']==3 && $data['infra_condition']==1){
			$score=52;
		}
		else if($data['availability']==1 &&  $data['accessibility']==3 && $data['infra_condition']==2){
			$score=48;
		}
		else if($data['availability']==1 &&  $data['accessibility']==3 && $data['infra_condition']==3){
			$score=44;
		}
		else{
			$score=0;
		}
		$last_update_user_id=Session::get('id');
		$table ="temp_block_infra";
		$postData=array(
				'block_id' => $data['block_id'],
				'infra_id' =>$data['infra_id'],
				'availability' => $data['availability'],
				'accessibility' => $data['accessibility'],
				'infra_condition' => $data['infra_condition'],
				'score' => $score,
				'last_update_user'=> $last_update_user_id
		);
		$this->db->insert($table, $postData);
	}
	
	function update_growth_possibilities(){
		$data = array();
		$data['block_id'] = $_POST['model_growth_poss_input_block_id'];
		$data['manufacturing_service'] = $_POST['model_growth_poss_input_manufacturing_service'];
		$data['impediments_order'] = $_POST['model_growth_poss_input_impediments_order'];
		$data['remarks'] = $_POST['model_growth_poss_input_remarks'];
		
		if($data['manufacturing_service']==2){
			$data['possible_sectors']= " ";
		}
		if($data['manufacturing_service']==1){
			$data['possible_sectors'] = $_POST['model_growth_poss_input_possible_sectors'];
		}
		// @TODO: Do your error checking!
		$last_update_user_id=Session::get('id');
		$table ="temp_block_growth_possibilites";
		$postData=array(
				'block_id' => $data['block_id'],
				'manufacturing_service' => $data['manufacturing_service'],
				'possible_sectors' => $data['possible_sectors'],
				'impediments_order' => $data['impediments_order'],
				'remarks'=> $data['remarks'],
				'last_update_user'=> $last_update_user_id
		);
		$this->db->insert($table, $postData);
	}
	
	//update from temp to original tables
	
	function block_rm_update(){
		$data = array();
		$data['id'] = $_POST['id'];
		$data['block_id'] = $_POST['block_id'];
		$data['rm_id'] = $_POST['rm_id'];
		$data['occurrence'] = $_POST['new_occurrence'];
		$data['availibility'] = $_POST['new_availibility'];
		$data['present_usage'] =$_POST['new_present_usage'];
		$data['score'] =$_POST['new_score'];
		
		$postData=array(
				'block_id' => $data['block_id'],
				'rm_id' => $data['rm_id'],
				'occurrence' => $data['occurrence'],
				'availibility' => $data['availibility'],
				'present_usage'=> $data['present_usage'],
				'score' => $data['score']
		);
		
		$where ="`block_id` = {$data['block_id']} AND `rm_id` = {$data['rm_id']}";
		$this->db->update('block_rm', $postData, $where);
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Approved','approved_by' => $user_id,'approved_on'=> $approved_on);
		$this->db->update('temp_block_rm', $postData_temp, "`id` = {$data['id']}");
	}
	function temp_block_rm_update_regect(){
		$data = array();
		$data['id'] = $_POST['id'];
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Rejected','approved_by' => $user_id,'approved_on'=> $approved_on);
		$this->db->update('temp_block_rm', $postData_temp, "`id` = {$data['id']}");
	}
	
	function block_hr_update(){
		$data = array();
		$data['id'] = $_POST['id'];
		$data['block_id'] = $_POST['block_id'];
		$data['hr_id'] = $_POST['hr_id'];
		$data['occurrence'] = $_POST['new_occurrence'];
		$data['commercial_viability'] = $_POST['new_commercial_viability'];
		$data['present_usage'] =$_POST['new_present_usage'];
		$data['score'] =$_POST['new_score'];
	
		$postData=array(
				'block_id' => $data['block_id'],
				'hr_id' => $data['hr_id'],
				'occurrence' => $data['occurrence'],
				'commercial_viability' => $data['commercial_viability'],
				'present_usage'=> $data['present_usage'],
				'score' => $data['score']
		);
	
		$where ="`block_id` = {$data['block_id']} AND `hr_id` = {$data['hr_id']}";
		$this->db->update('block_hr', $postData, $where);
		
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Approved','approved_by' => $user_id, 'approved_on'=> $approved_on);
		$this->db->update('temp_block_hr', $postData_temp, "`id` = {$data['id']}");
	}
	function temp_block_hr_update_regect(){
		$data = array();
		$data['id'] = $_POST['id'];
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Rejected','approved_by' => $user_id,'approved_on'=> $approved_on);
		$this->db->update('temp_block_hr', $postData_temp, "`id` = {$data['id']}");
	}
	
	function block_infra_update(){
		$data = array();
		$data['id'] = $_POST['id'];
		$data['block_id'] = $_POST['block_id'];
		$data['infra_id'] = $_POST['infra_id'];
		$data['accessibility'] = $_POST['new_accessibility'];
		$data['availability'] = $_POST['new_availability'];
		$data['infra_condition'] =$_POST['new_infra_condition'];
		$data['score'] =$_POST['new_score'];
	
		$postData=array(
				'block_id' => $data['block_id'],
				'infra_id' => $data['infra_id'],
				'accessibility' => $data['accessibility'],
				'availability' => $data['availability'],
				'infra_condition'=> $data['infra_condition'],
				'score' => $data['score']
		);
	
		$where ="`block_id` = {$data['block_id']} AND `infra_id` = {$data['infra_id']}";
		$this->db->update('block_infra', $postData, $where);
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Approved','approved_by' => $user_id,'approved_on'=> $approved_on);
		$this->db->update('temp_block_infra', $postData_temp, "`id` = {$data['id']}");
	}
	function temp_block_infra_update_regect(){
		$data = array();
		$data['id'] = $_POST['id'];
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Rejected','approved_by' => $user_id,'approved_on'=> $approved_on);
		$this->db->update('temp_block_infra', $postData_temp, "`id` = {$data['id']}");
	}
	
	function block_growth_possibilites_update(){
		$data = array();
		$data['id'] = $_POST['id'];
		$data['block_id'] = $_POST['block_id'];
		$data['possible_sectors'] = $_POST['new_possible_sectors'];
		$data['manufacturing_service'] = $_POST['new_manufacturing_service'];
		$data['impediments_order'] = $_POST['new_impediments_order'];
		$data['remarks'] =$_POST['new_remarks'];
	
		$postData=array(
				'block_id' => $data['block_id'],
				'possible_sectors' => $data['possible_sectors'],
				'manufacturing_service' => $data['manufacturing_service'],
				'impediments_order' => $data['impediments_order'],
				'remarks'=> $data['remarks']
		);
		
		$where ="`block_id` = {$data['block_id']}";
		$this->db->update('block_growth_possibilites', $postData, $where);
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array(
				'status'=>'Approved',
				'approved_by' => $user_id,
				'approved_on'=> $approved_on
		);
		$this->db->update('temp_block_growth_possibilites', $postData_temp, "`id` = {$data['id']}");
	}
	function temp_block_growth_possibilites_update_regect(){
		$data = array();
		$data['id'] = $_POST['id'];
		$user_id=Session::get('id');
		$approved_on = date("Y/m/d");
		$postData_temp=array('status'=>'Rejected','approved_by' => $user_id,'approved_on'=> $approved_on);
		$this->db->update('temp_block_growth_possibilites', $postData_temp, "`id` = {$data['id']}");
	}
}