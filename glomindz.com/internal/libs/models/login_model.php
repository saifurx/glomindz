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
		if ($count > 0) {
			Session::init();
			Session::set('user_id', $data['id']);
			Session::set('role', $data['role']);
			Session::set('email', $_POST['email']);
			Session::set('name', $data['name']);
			Session::set('loggedIn', true);
			if($data['role']=='admin'){
				header("location: ../admin");
			}

		} else {
			header('location: '.URL);
		}

	}
	public function save_user(){

		$data = array();
		$data['name'] = $_POST['hotel_name'];
		$data['contact_person'] = $_POST['contact_person'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile_no'];
		$data['licence_no'] = $_POST['license_no'];
		$data['no_of_rooms'] = $_POST['no_of_rooms'];
		$data['address'] = $_POST['address'];
		$data['locality'] = $_POST['locality'];
		$data['city'] = $_POST['city'];
		$data['pin'] = $_POST['pin'];
		$this->db->insert('hotels_master',$data);
		echo json_encode($this->db->lastInsertId());
	}
	public function check_email(){

		$email = $_POST['email_id'];
		$sth = $this->db->prepare("SELECT name FROM `hotels_master` WHERE email='$email'");
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
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
	function update_password($name,$email,$passwd,$id) {

		$sth = $this->db->prepare("UPDATE users SET password=:password WHERE id=:id");
		$sth->execute(array(
				'password' => Hash::create('md5', $passwd, HASH_PASSWORD_KEY),
				'id' => $id
		));

		$this->send_password_reset_email($name,$email,$passwd);

		echo  $passwd.$id;
	}
	function rand_string() {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
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
			$subject = 'Crimatrix: Password reset';
			$message = "Dear $name,  \n Your password has been reset.\nPlease visit http://crimatrix.com  to login.\n Your user Name and password are:\nUser Name: $email\nPassword:$passwd";
			$headers = "From:support@crimatrix.com";
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