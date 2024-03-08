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

	function add_user($table_user,$data){
		$passwd =$data['password'];
		$data['password']=Hash::create('md5', $passwd, HASH_PASSWORD_KEY);
		$count =$this->check_user($table_user,$data['email'],$data['mobile']);
		if($count==0){
			$this->db->insert($table_user,$data);
			$data['id'] = $this->db->lastInsertId();
			$this->send_user_add_mail($data['name'],$data['email'],$passwd);
			$data['error']='';
		}else{
			$data['error']= $data['name'].' user already available';
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
	function check_user($table,$email,$mobile){
		$query="SELECT id FROM $table where email = '$email' OR mobile = $mobile";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		$count =  $sth->rowCount();
		return $count;
	}

	public function recover_password(){

		$email = $_POST['email'];
		$sth = $this->db->prepare("SELECT id,name FROM `users` WHERE email='$email' and status=1");
		$sth->execute();
		$data=$sth->fetchAll();
		$count =  $sth->rowCount();
		if ($count > 0) {
			$passwd =$this->rand_string();
			$id = $data[0]['id'];
			$name = $data[0]['name'];
			$this->update_password($name,$email,$passwd,$id);

		}else{

			echo 'User is not registered with us or disabled!';
		}
	}

	function rand_string() {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789&$@#";
		return substr(str_shuffle($chars),0,8);
	}

	function send_password_reset_email($name,$email,$passwd){

		$mailcheck = $this->spamcheck($email);
		if ($mailcheck==FALSE)
		{
			return "Invalid input";
		}
		else
		{
			$to  = $email. ', support@glomindz.com'; // note the comma
			$subject = 'SPL: Password reset';
			$message = "Dear $name,  \n Your password has been reset.\nPlease visit http://glomindz.com/demo/spl  to login.\n Your user Name and password are:\nUser Name: $email\nPassword:$passwd";
			$headers = "From:support@glomindz.com";
			return	mail($to, $subject, $message,$headers);
		}
	}

	function send_user_add_mail($name,$email,$passwd){

		$mailcheck = $this->spamcheck($email);
		if ($mailcheck==FALSE)
		{
			return "Invalid input";
		}
		else
		{
			$to  = $email. ', support@glomindz.com'; // note the comma
			$subject = 'SPL: new user';
			$message = "Dear $name,  \n You are added as a user for ".URL."\n your \nEmail  : $email\nPassword   :  $passwd";
			$headers = "From:support@glomindz.com";
			return	mail($to, $subject, $message,$headers);
		}
	}
	public function spamcheck($field)
	{
		$field=filter_var($field, FILTER_SANITIZE_EMAIL);
		if(filter_var($field, FILTER_VALIDATE_EMAIL))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}