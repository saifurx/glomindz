<?php

class Admin_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function districtList(){
		$sth = $this->db->prepare('SELECT id, name FROM district_master');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function topography(){
		$sth = $this->db->prepare('SELECT id, name FROM topography_def');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function userList()
	{
		$sth = $this->db->prepare('SELECT user.*, dist.name as loc FROM aidc_users user, district_master dist where user.district_id=dist.id');
		$sth->execute();
		return $sth->fetchAll();
	}


	public function approveUser()
	{

		try {
			$sth = $this->db->prepare('UPDATE aidc_users SET status=:status WHERE id = :id');
			$sth->execute(array(
					'status' => $_POST['status'],
					'id' => $_POST['id']
			));

		}catch (PDOException $e){
			echo $e->getMessage();
		}

		if($_POST['status']==1){
			$profile=$this->myprofile($_POST['id']);
			$this->send_approved_mail($profile['name'],$profile['email']);
		}else{
			$profile=$this->myprofile($_POST['id']);
			$this->send_disapprove_mail($profile['name'],$profile['email']);
		}
		echo $_POST['status'];
	}
	public function myprofile($profile_id){
		$sth = $this->db->prepare("SELECT * FROM aidc_users where id=$profile_id");
		$sth->execute();
		return $sth->fetchAll();

	}
	function send_approved_mail($name,$email){

		$to  = $email. ',support@glomindz.com '; // note the comma
		$subject = 'Welcome to Resource Mapping Survey of Assam(http://assamresources.com)';
		$message = "Dear $name,  \n Your Email has been approved for online data modification.\nPlease visit http://assamresources.com  to login with your registered emailand password.";
		$headers = "From:support@assamresources.com";
		return	mail($to, $subject, $message,$headers);

	}
	function send_disapprove_mail($name,$email){

		$to  = $email. ',support@glomindz.com '; // note the comma
		$subject = 'Welcome to Resource Mapping Survey of Assam(http://assamresources.com)';
		$message = "Dear $name,  \n Your Email has been disabled for online data modification.\nPlease contact adminstrator";
		$headers = "From:support@assamresources.com";
		return	mail($to, $subject, $message,$headers);

	}
	public function contactUsers()
	{
		$sth = $this->db->prepare('SELECT * FROM user_access_details');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function downloadUsers()
	{
		$sth = $this->db->prepare('SELECT * FROM user_access_details');
		$sth->execute();
		return $sth->fetchAll();
	}
	public function save_changed_password(){
		$profile_id=Session::get("id");
		$data =array();
		$data['password'] = $_POST['password'];
		$postData = array(
				'password' => Hash::create('md5', $data['password'], HASH_PASSWORD_KEY),
		);
		$this->db->update('aidc_users', $postData, "`id` = {$profile_id}");
	}
	//approve part

	public function get_rm(){
		$sth ='';
		$role =Session::get('role');
		$dist_id =Session::get('district_id');
		if($role=='admin'){
			$sth = $this->db->prepare("SELECT dm.name dist_name, tbrm.id, tbrm.block_id, tbrm.rm_id, tbrm.status, tbrm.last_update_date, au.name user_name,
					bi.block_name, rm.name rm_name, brm.occurrence current_occurrence, tbrm.occurrence new_occurrence,
					brm.availibility current_availibility, tbrm.availibility new_availibility, brm.present_usage current_present_usage,
					tbrm.present_usage new_present_usage, brm.score current_score, tbrm.score new_score
					FROM district_master dm, block_info bi, rm_master rm, block_rm brm, temp_block_rm tbrm, aidc_users au
					WHERE dm.id = bi.dist_id
					AND tbrm.status =  'Modified'
					AND bi.id = brm.block_id
					AND bi.id = tbrm.block_id
					AND brm.rm_id = rm.id
					AND brm.rm_id = tbrm.rm_id
					AND au.id = tbrm.last_update_user
					ORDER BY dm.name, bi.block_name, rm.name");
		}else{
			$sth = $this->db->prepare("SELECT dm.name dist_name, tbrm.id, tbrm.block_id, tbrm.rm_id, tbrm.status, tbrm.last_update_date, au.name user_name,
					bi.block_name, rm.name rm_name, brm.occurrence current_occurrence, tbrm.occurrence new_occurrence,
					brm.availibility current_availibility, tbrm.availibility new_availibility, brm.present_usage current_present_usage,
					tbrm.present_usage new_present_usage, brm.score current_score, tbrm.score new_score
					FROM district_master dm, block_info bi, rm_master rm, block_rm brm, temp_block_rm tbrm, aidc_users au
					WHERE dm.id = bi.dist_id
					AND tbrm.status =  'Modified'
					AND bi.id = brm.block_id
					AND bi.id = tbrm.block_id
					AND brm.rm_id = rm.id
					AND brm.rm_id = tbrm.rm_id
					AND au.id = tbrm.last_update_user
					AND dm.id=$dist_id
					ORDER BY dm.name, bi.block_name, rm.name");
		}
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_hr(){
		$sth ='';
		$role =Session::get('role');
		$dist_id =Session::get('district_id');
		if($role=='admin'){
			$sth = $this->db->prepare("select dm.name dist_name, tbhr.id, tbhr.block_id, tbhr.hr_id, tbhr.status,tbhr.last_update_date, au.name user_name,
				bi.block_name, hr.name hr_name, bhr.occurrence current_occurrence, tbhr.occurrence new_occurrence,
				bhr.commercial_viability current_commercial_viability,
				tbhr.commercial_viability new_commercial_viability, bhr.present_usage current_present_usage, tbhr.present_usage new_present_usage,
				bhr.score current_score, tbhr.score new_score
				from district_master dm, block_info bi, hr_master hr, block_hr bhr, temp_block_hr tbhr, aidc_users au
				where dm.id = bi.dist_id
				and tbhr.status =  'Modified'
				and bi.id = bhr.block_id
				and bi.id = tbhr.block_id
				and bhr.hr_id = hr.id
				and bhr.hr_id = tbhr.hr_id
				and au.id = tbhr.last_update_user
				order by dm.name, bi.block_name, hr.name");
		}else{
			$sth = $this->db->prepare("select dm.name dist_name, tbhr.id, tbhr.block_id, tbhr.hr_id, tbhr.status,tbhr.last_update_date, au.name user_name,
				bi.block_name, hr.name hr_name, bhr.occurrence current_occurrence, tbhr.occurrence new_occurrence,
				bhr.commercial_viability current_commercial_viability,
				tbhr.commercial_viability new_commercial_viability, bhr.present_usage current_present_usage, tbhr.present_usage new_present_usage,
				bhr.score current_score, tbhr.score new_score
				from district_master dm, block_info bi, hr_master hr, block_hr bhr, temp_block_hr tbhr, aidc_users au
				where dm.id = bi.dist_id
				and tbhr.status =  'Modified'
				and bi.id = bhr.block_id
				and bi.id = tbhr.block_id
				and bhr.hr_id = hr.id
				and bhr.hr_id = tbhr.hr_id
				and au.id = tbhr.last_update_user
				AND dm.id=$dist_id
				order by dm.name, bi.block_name, hr.name");
		}
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function get_gen_infra(){
		$sth ='';
		$role =Session::get('role');
		$dist_id =Session::get('district_id');
		if($role=='admin'){
			$sth = $this->db->prepare("select dm.name dist_name, tbinf.id, tbinf.block_id, tbinf.infra_id, tbinf.status,tbinf.last_update_date, au.name user_name,
				bi.block_name, im.name im_name, binf.availability current_availability, tbinf.availability new_availability,
				binf.accessibility current_accessibility, tbinf.accessibility new_accessibility, binf.infra_condition current_infra_condition, tbinf.infra_condition new_infra_condition, binf.score current_score, tbinf.score new_score
				from district_master dm, block_info bi,	infra_master im, block_infra binf, temp_block_infra tbinf, aidc_users au
				where dm.id = bi.dist_id
				and tbinf.status = 'Modified'
				and bi.id = binf.block_id
				and bi.id = tbinf.block_id
				and binf.infra_id = im.id
				and binf.infra_id = tbinf.infra_id
				and au.id = tbinf.last_update_user
				order by dm.name, bi.block_name, im.name");
		}else{
			$sth = $this->db->prepare("select dm.name dist_name, tbinf.id, tbinf.block_id, tbinf.infra_id, tbinf.status,tbinf.last_update_date, au.name user_name,
				bi.block_name, im.name im_name, binf.availability current_availability, tbinf.availability new_availability,
				binf.accessibility current_accessibility, tbinf.accessibility new_accessibility, binf.infra_condition current_infra_condition, tbinf.infra_condition new_infra_condition, binf.score current_score, tbinf.score new_score
				from district_master dm, block_info bi,	infra_master im, block_infra binf, temp_block_infra tbinf, aidc_users au
				where dm.id = bi.dist_id
				and tbinf.status = 'Modified'
				and bi.id = binf.block_id
				and bi.id = tbinf.block_id
				and binf.infra_id = im.id
				and binf.infra_id = tbinf.infra_id
				and au.id = tbinf.last_update_user
				AND dm.id=$dist_id
				order by dm.name, bi.block_name, im.name");
		}
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_growth_poss(){
		$sth ='';
		if($role=='admin'){
			$sth = $this->db->prepare('select dm.name dist_name, tbgp.id, tbgp.block_id, tbgp.status, tbgp.last_update_date, bi.block_name, au.name user_name,
				bgp.manufacturing_service current_manufacturing_service,tbgp.manufacturing_service new_manufacturing_service,bgp.possible_sectors current_possible_sectors, tbgp.possible_sectors new_possible_sectors,
				bgp.impediments_order current_impediments_order, tbgp.impediments_order new_impediments_order, bgp.remarks current_remarks, tbgp.remarks new_remarks
				from district_master dm, block_info bi,	block_growth_possibilites bgp, temp_block_growth_possibilites tbgp, aidc_users au
				where dm.id = bi.dist_id
				and tbgp.status = "Modified"
				and bi.id = bgp.block_id
				and bi.id = tbgp.block_id
				and au.id = tbgp.last_update_user
				order by dm.name, bi.block_name');
		}else{
			$sth = $this->db->prepare("select dm.name dist_name, tbgp.id, tbgp.block_id, tbgp.status, tbgp.last_update_date, bi.block_name, au.name user_name,
				bgp.manufacturing_service current_manufacturing_service,tbgp.manufacturing_service new_manufacturing_service,bgp.possible_sectors current_possible_sectors, tbgp.possible_sectors new_possible_sectors,
				bgp.impediments_order current_impediments_order, tbgp.impediments_order new_impediments_order, bgp.remarks current_remarks, tbgp.remarks new_remarks
				from district_master dm, block_info bi,	block_growth_possibilites bgp, temp_block_growth_possibilites tbgp, aidc_users au
				where dm.id = bi.dist_id
				and tbgp.status = 'Modified'
				and bi.id = bgp.block_id
				and bi.id = tbgp.block_id
				and au.id = tbgp.last_update_user
				AND dm.id=$dist_id
				order by dm.name, bi.block_name");
		}
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
}