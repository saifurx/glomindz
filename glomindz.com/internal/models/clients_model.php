<?php

class Clients_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function create_client(){
		Session::init();
		$user_id = Session::get('user_id');
		$table=TABLE_PREFIX."_customer_master";
		$table_customer_address=TABLE_PREFIX."_customer_address";
		
		$data = array();
		$data['name'] = $_POST['name'];
		$data['company'] = $_POST['company'];
		$data['customer_type'] = $_POST['customer_type'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile'];
		$data['tel'] = $_POST['tel'];
		$data['fax'] = $_POST['fax'];
		$data['pan'] = $_POST['pan'];
		$data['vat'] = $_POST['vat'];
		$data['cst'] = $_POST['cst'];
		$data['cst_valid'] = $_POST['cst_valid'];
		$data['bank_name'] = $_POST['bank_name'];
		$data['bank_branch'] = $_POST['bank_branch'];
		$data['bank_city'] = $_POST['bank_city'];
		$data['bank_swift_code'] = $_POST['bank_swift_code'];
		$data['bank_ac_no'] = $_POST['bank_ac_no'];
		$data['rating'] = $_POST['rating'];
		$data['user_id'] = $user_id;
		$this->db->insert($table,$data);
		$id = $this->db->lastInsertId();
		if($id > 0 ){
			$address = array();
			$address['company_id'] = $id;
			$address['address_type'] = $_POST['address_type'];
			$address['address'] = $_POST['address'];
			$address['locality'] = $_POST['locality'];
			$address['city'] = $_POST['city'];
			$address['state'] = $_POST['state'];
			$address['country'] = $_POST['country'];
			$address['pin'] = $_POST['pin'];
			$address['tel'] = $_POST['address_tel'];
			$address['pin'] = $_POST['pin'];
			$address['fax'] = $_POST['address_fax'];		
			$this->db->insert($table_customer_address,$address);
			$last_id = $this->db->lastInsertId();
		}		
		echo $last_id;
	}
	
	public function get_all_client(){
		$table=TABLE_PREFIX."_customer_master";
		$sth = $this->db->prepare("SELECT * FROM $table");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function get_client_details($id){
		$table=TABLE_PREFIX."_customer_master";
		$table_customer_address=TABLE_PREFIX."_customer_address";
		$query="SELECT * , mecm.id as mecm_id, meca.id as meca_id, meca.tel as meca_tel, meca.fax as meca_fax FROM $table mecm, $table_customer_address meca WHERE mecm.id= $id AND meca.company_id = mecm.id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data = $sth->fetchAll();
		echo json_encode($data);
	}
	
	public function update_client(){
		Session::init();
		$user_id = Session::get('user_id');
		$table=TABLE_PREFIX."_customer_master";
		$table_customer_address=TABLE_PREFIX."_customer_address";
		
		$id = $_POST['id'];
		$data = array();
		$data['name'] = $_POST['name'];
		$data['company'] = $_POST['company'];
		$data['customer_type'] = $_POST['customer_type'];
		$data['email'] = $_POST['email'];
		$data['mobile'] = $_POST['mobile'];
		$data['tel'] = $_POST['tel'];
		$data['fax'] = $_POST['fax'];
		$data['pan'] = $_POST['pan'];
		$data['vat'] = $_POST['vat'];
		$data['cst'] = $_POST['cst'];
		$data['cst_valid'] = $_POST['cst_valid'];
		$data['bank_name'] = $_POST['bank_name'];
		$data['bank_branch'] = $_POST['bank_branch'];
		$data['bank_city'] = $_POST['bank_city'];
		$data['bank_swift_code'] = $_POST['bank_swift_code'];
		$data['bank_ac_no'] = $_POST['bank_ac_no'];
		$data['rating'] = $_POST['rating'];
		$data['user_id'] = $user_id;
		$where ="id=$id";
		$this->db->update($table,$data,$where);
		if($id > 0 ){
			$address = array();
			$address['address_type'] = $_POST['address_type'];
			$address['address'] = $_POST['address'];
			$address['locality'] = $_POST['locality'];
			$address['city'] = $_POST['city'];
			$address['state'] = $_POST['state'];
			$address['country'] = $_POST['country'];
			$address['pin'] = $_POST['pin'];
			$address['tel'] = $_POST['address_tel'];
			$address['pin'] = $_POST['pin'];
			$address['fax'] = $_POST['address_fax'];
			$where_address ="company_id=$id";
			$this->db->update($table_customer_address,$address,$where_address);
		}		
		echo $id;
	}
}