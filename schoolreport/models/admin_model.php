<?php

class Admin_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function save_new_student(){
		$arr = array();
        $arr['name'] = $_POST['name'];
        $arr['mobile_no'] = $_POST['mobile_no'];
		$arr['email'] = $_POST['email'];
		$password = $this->generate_password();
		$arr['user_type'] = 'general';
		$arr['status'] = '1';
        
		$this->db->insert('sr_user_master', $arr);
        $id = $this->db->lastInsertId();
         if ($id > 0) {
		$student_id=0;
		$data_url = $_POST['data_url'];

		$data = array();
		$data['profile_id'] = $id;
		$data['name']= $arr['name'];
		$data['mobile_no']= $arr['mobile_no'];
		$data['email']= $arr['email'];
		$data['f_name']=$_POST['f_name'];
		$data['m_name']=$_POST['m_name'];
		$data['class']=$_POST['class'];
		$data['section']=$_POST['section'];
		$data['roll_no']=$_POST['roll_no'];
		$data['address']=$_POST['address'];
		$this->db->insert('sr_student_master', $data);
		$student_id=$this->db->lastInsertId();
		if($student_id>0 && $data_url !=''){
			$file = $student_id.'.jpg';
			$img = substr($_POST['data_url'], strpos($_POST['data_url'], ",") + 1);
			$decodedData = base64_decode($img);
			$success = file_put_contents('assets/upload_img/student/'.$file, $decodedData);
			
			//resize main image
			$source_path = "assets/upload_img/student/".$file;
			$destination="assets/upload_img/student/".$file;
			$newwidth = 350;
			$this->resizeImg($newwidth,$source_path,$destination);
			//create thumb 
			$source_path = "assets/upload_img/student/".$file;
			$destination="assets/upload_img/student/thumb/".$file;
			$newwidth = 50;
			$this->resizeImg($newwidth,$source_path,$destination);
			$data['img'] = 'assets/upload_img/student/thumb/'.$student_id.'.jpg';
		}
		else{
			$data['img'] = 'assets/apps/img/profile_thumb_m.jpg';
		}
		
		$data['id'] = $student_id;
		echo json_encode($data);
         } 
         	else {
                //echo $id;
            
            }
	}	
	
	public function save_new_faculty(){
		$faculty_arr = array();
        $faculty_arr['name'] = $_POST['name'];
        $faculty_arr['mobile_no'] = $_POST['mobile_no'];
		$faculty_arr['email'] = $_POST['email'];
		$password = $this->generate_password();
		$faculty_arr['user_type'] = 'teacher';
		$faculty_arr['status'] = '1';
        
		$this->db->insert('sr_user_master', $faculty_arr);
        $id = $this->db->lastInsertId();
         if ($id > 0) {
		$teacher_id=0;
		$data_url = $_POST['data_url'];

		$faculty_data = array();
		$faculty_data['profile_id'] = $id;
		$faculty_data['faculty_code']= $_POST['faculty_code'];
		$faculty_data['name']= $faculty_arr['name'];
		$faculty_data['email']= $faculty_arr['email'];
		$faculty_data['mobile_no']= $faculty_arr['mobile_no'];
		$faculty_data['qualification']=$_POST['qualification'];
		$faculty_data['designnation']=$_POST['designnation'];
		$faculty_data['address']=$_POST['address'];
		$this->db->insert('sr_teacher_master', $faculty_data);
		$teacher_id=$this->db->lastInsertId();
		if($teacher_id>0 && $data_url !=''){
			$file = $teacher_id.'.jpg';
			$img = substr($_POST['data_url'], strpos($_POST['data_url'], ",") + 1);
			$decodedData = base64_decode($img);
			$success = file_put_contents('assets/upload_img/faculty/'.$file, $decodedData);
			
			//resize main image
			$source_path = "assets/upload_img/faculty/".$file;
			$destination="assets/upload_img/faculty/".$file;
			$newwidth = 350;
			$this->resizeImg($newwidth,$source_path,$destination);
			//create thumb 
			$source_path = "assets/upload_img/faculty/".$file;
			$destination="assets/upload_img/faculty/thumb/".$file;
			$newwidth = 50;
			$this->resizeImg($newwidth,$source_path,$destination);
			$data['img'] = 'assets/upload_img/faculty/thumb/'.$teacher_id.'.jpg';
		}
		else{
			$data['img'] = 'assets/apps/img/profile_thumb_m.jpg';
		}
		
		$faculty_data['id'] = $teacher_id;
		echo json_encode($faculty_data);
         } 
         	else {
                //echo $id;
            
            }
	}	
	
 function generate_password() {
        $chars = "0123456789";
        return substr(str_shuffle($chars), 0, 6);
    }
	
	function resizeImg($newwidth,$source_path,$destination) {
		$image = imagecreatefromjpeg($source_path);
		$width = imagesx($image);
		$height = imagesy($image);
		$newheight=($height/$width)*$newwidth;
		$tmp=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($tmp,$image,0,0,0,0,$newwidth,$newheight, $width,$height);
		imagejpeg($tmp,$destination,100);
		imagedestroy($image);
		imagedestroy($tmp);
	}
	
	
public function get_all_faculty_data($search_query) {
        $table_tm ="sr_teacher_master";
		$table_um = 'sr_user_master';
		$query = '';
        $result = array();
        if ($search_query == '0') {
            $query = "SELECT tm.*, um.status  FROM $table_tm tm, $table_um um  WHERE tm.profile_id=um.id";
        } else {
            $query = "SELECT tm.*, um.status  FROM $table_tm tm, $table_um um  WHERE tm.profile_id=um.id and tm.name like '%$search_query%'";
        }
        //echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }
	
public function get_all_student_data($search_query) {
        $table_sm ="sr_student_master";
		$table_um = 'sr_user_master';
		$query = '';
        $result = array();
        if ($search_query == '0') {
            $query = "SELECT sm.*, um.status  FROM $table_sm sm, $table_um um  WHERE sm.profile_id=um.id";
        } else {
            $query = "SELECT sm.*, um.status  FROM $table_sm sm, $table_um um  WHERE  sm.profile_id=um.id and sm.name like '%$search_query%'";
        }
        //echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }
    
	public function get_student_info(){
		$id = $_POST['id'];
		$sth = $this->db->prepare("SELECT * FROM  sr_student_master  WHERE sr_student_master.id= $id ");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function get_faculty_info(){
		$id = $_POST['id'];
		$sth = $this->db->prepare("SELECT * FROM  sr_teacher_master  WHERE sr_teacher_master.id= $id ");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function update_student(){
		$id = $_POST['id'];
    	$data = array();
		$data['name'] = $_POST['name'];
		$data['f_name'] = $_POST['f_name'];
		$data['m_name'] = $_POST['m_name'];
		$data['class'] = $_POST['class'];
		$data['section'] = $_POST['section'];
		$data['roll_no'] = $_POST['roll_no'];
		$data['address'] = $_POST['address'];
		$this->db->update('sr_student_master',$data, "id = {$id}");
			
		echo $id;
    }
    
    public function update_faculty(){
    	$id = $_POST['id'];
    	$data = array();
    	$data['faculty_code'] = $_POST['faculty_code'];
    	$data['name'] = $_POST['name'];
    	$data['qualification'] = $_POST['qualification'];
    	$data['designnation'] = $_POST['designnation'];
    	$data['address'] = $_POST['address'];
    	$this->db->update('sr_teacher_master',$data, "id = {$id}");
    		
    	echo $id;
    }
	
    
	
	/*public function change_account_status() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$status = $_POST['status'];
		$user_type = $_POST['user_type'];
	
		$updateData = array(
				'status' => $status
		);
	
		$this->db->update('sr_user_master', $updateData, "id = {$id} and user_type='$user_type'");
		 
		echo $status;
	}*/
	
	
}