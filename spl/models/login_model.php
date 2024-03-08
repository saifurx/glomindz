<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function run()
	{
		$table=TABLE_PREFIX."_user_master";
		$passwd =Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY);
		$email = $_POST['email'];
		$query ="SELECT * FROM $table WHERE email = '$email' AND password = '$passwd' and status=1";

		$sth = $this->db->prepare($query);
		$sth->execute();

		$data = $sth->fetch();

		$count =  $sth->rowCount();
		if ($count == 1) {
			Session::init();
			Session::set('user_id', $data['id']);
			Session::set('role', $data['role']);
			Session::set('email', $_POST['email']);
			Session::set('name', $data['name']);
			Session::set('loggedIn', true);
			//if($data['role']=='admin'){
			header("location: ../admin");
				
			//}

		} else {
			header('location: '.URL.'?loginFailed');
		}

	}

	public function check_email(){

		$email = $_POST['email_id'];
		$sth = $this->db->prepare("SELECT name FROM `hotels_master` WHERE email='$email'");
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function recover_password(){
		$table=TABLE_PREFIX."_user_master";
		$email = $_POST['email'];
		$query ="SELECT id,name FROM $table WHERE email='$email' and status=1";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data=$sth->fetchAll();
		$count =  $sth->rowCount();
		if ($count == 1) {
			$passwd =$this->rand_string();
			$id = $data[0]['id'];
			$name = $data[0]['name'];
			echo $this->update_password($name,$email,$passwd,$id);

		}else{

			echo 'User is not registered with us or disabled!';
		}
	}
	function update_password($name,$email,$passwd,$id) {
		$table=TABLE_PREFIX."_user_master";
		$sth = $this->db->prepare("UPDATE $table SET password=:password WHERE id=:id");
		$sth->execute(array(
				'password' => Hash::create('md5', $passwd, HASH_PASSWORD_KEY),
				'id' => $id
		));

		$this->send_password_reset_email($name,$email,$passwd);

		return  'Please check your email for new password.';
	}
	function rand_string() {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$@%&";
		return substr(str_shuffle($chars),0,5);
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
			$message = "Dear $name,  \n Your password has been reset. Your user Name and password are:\nUser Name: $email\nPassword:$passwd";
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