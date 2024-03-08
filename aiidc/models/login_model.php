<?php
class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function run()
	{
		$sth = $this->db->prepare("SELECT id, role,name,district_id FROM aidc_users WHERE status=1 and
				email = :email AND password = :password");
		$sth->execute(array(
				':email' => $_POST['email'],
				':password' => Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY)
		));

		$data = $sth->fetch();
		$count =  $sth->rowCount();
		//	echo Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
		if ($count > 0) {
			Session::init();
			Session::set('id', $data['id']);
			Session::set('role', $data['role']);
			Session::set('name', $data['name']);
			Session::set('email', $_POST['email']);

			Session::set('district_id', $data['district_id']);
			Session::set('loggedIn', true);
			//echo $data['role'];
			header("location: ../admin/edit_block");
		} else {
			Session::init();
			Session::set('error', 'Email or password is incorrect!');
			header('location: ../login');
		}
	}

	public function saveUser($data){
		$id =0;
		$error ='';
		$email=$_POST['email'];
		$sth = $this->db->prepare("SELECT * FROM aidc_users WHERE email = '$email'");
		$sth->execute();

		//echo "SELECT * FROM aidc_users WHERE email = '$email'";
		$result = $sth->fetch();
		$count =  $sth->rowCount();
		//echo $count;
		if($count==0){
			try {
				$this->db->insert('aidc_users',$data);
				$id =$this->db->lastInsertId();
			}catch (PDOException $e){
				$error =$e->getMessage();
			}
		}
		if($id!=0){
			$error =$this->sendRegistrationMail($data['email']);
		}
		$data['id'] =$id;
		$data['error'] =$error;
		echo json_encode($data);

	}
	public function changePassword(){

		$sth = $this->db->prepare("SELECT id, role,name FROM aidc_users WHERE
				email = :email");
		$sth->execute(array(
				'email' => $_POST['email']
		));

		$data = $sth->fetch();
		$count =  $sth->rowCount();
		if ($count > 0) {
			$passwd =$this->passwordGenerator(8);
			$sth = $this->db->prepare("UPDATE aidc_users SET password=:password WHERE email=:email");
			$sth->execute(array(
					'password' => Hash::create('md5', $passwd, HASH_PASSWORD_KEY),
					'email' => $_POST['email']
			));
			if($this->sendChangesPasswordMail($_POST['email'],$passwd)){
				echo 'Check your mail for temp password.';
			}else {
				echo 'There is a error.Please try later.';
			}

		}else {
			echo 'Email is not registered with us.';
		}
	}
	public function sendChangesPasswordMail($email,$password){
		$mailcheck = $this->spamcheck($email);
		if ($mailcheck==FALSE)
		{
			return "Invalid input";
		}
		else
		{
			$subject = 'Password Changed AIDC Resource map online Portal.';
			$message = "Dear\n\n\tYour temporary password is :$password .\nPlease change your password after first login.";
			$headers = "From:diccass@gmail.in";

			return	mail($email, $subject, $message,$headers);


		}
	}
	public	function sendRegistrationMail($email){

		$mailcheck = $this->spamcheck($email);
		if ($mailcheck==FALSE)
		{
			return "Invalid input";
		}
		else
		{
			$email=$email.';support@glomindz.com';
			$subject = 'Welcome to  AIIDC Resource map online Portal.';
			$message = 'Dear/n/tYou have successfully registered with us with the following email :'.$email.'\nYour email will be activated by administrator within 24 hrs.\nThanks';
			$headers = "From:support@assamresources.com";

			return	mail($email, $subject, $message,$headers);


		}
	}
	public function spamcheck($field)
	{
		//filter_var() sanitizes the e-mail
		//address using FILTER_SANITIZE_EMAIL
		$field=filter_var($field, FILTER_SANITIZE_EMAIL);

		//filter_var() validates the e-mail
		//address using FILTER_VALIDATE_EMAIL
		if(filter_var($field, FILTER_VALIDATE_EMAIL))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	function passwordGenerator($length = null)
	{
		$pass = md5(time());
		if($length != null) {
			$pass = substr($pass, 0, $length);
		}
		return $pass;
	}
	public function districtList()
	{
		$sth = $this->db->prepare('SELECT id, name FROM district_master');
		$sth->execute();
		return $sth->fetchAll();
	}

}