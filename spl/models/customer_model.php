<?php

class Customer_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all_customers($search_query){
		$table=TABLE_PREFIX."_customer_database";
		if($search_query=='0'){
			$query="SELECT id, customer_type, rating, company as name,name as contact, mobile FROM $table  order by company desc";
		}

		else{
			$query="SELECT id, customer_type, rating, company as name,name as contact, mobile FROM $table where name like '$search_query%' or company like '$search_query%' order by company desc limit 0,30";
		}
		$sth = $this->db->prepare($query);
		$sth->execute();
		$result =array();
		$data=$sth->fetchAll();
		foreach ($data as $row){
			$customer_id =$row['id'];
			$row['outstanding']=$this->get_customer_outstanding($customer_id);
			array_push($result, $row);
		}
		echo json_encode($result);
	}

	public function save_new_customer(){
		Session::init();
		$user_id = Session::get('user_id');
		$table=TABLE_PREFIX."_customer_database";
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
		$data['user_id'] = $user_id;
		$data['rating'] = 'New Customer';
		$this->db->insert($table,$data);
		$customer_id = $this->db->lastInsertId();

		if($customer_id >0){

			$address_table=TABLE_PREFIX."_customer_address";

			$address_bill = array();
			$address_bill['company_id'] = $customer_id;
			$address_bill['address_type'] = 'Billing';
			$address_bill['address'] = $_POST['address_bill'];
			$address_bill['locality'] = $_POST['locality_bill'];
			$address_bill['city'] = $_POST['city_bill'];
			$address_bill['state'] = $_POST['state_bill'];
			$address_bill['country'] = $_POST['country_bill'];
			$address_bill['pin'] = $_POST['pin_bill'];
			$address_bill['tel'] = $_POST['tel_bill'];
			$address_bill['fax'] = $_POST['fax_bill'];

			$this->db->insert($address_table,$address_bill);

		}
		echo json_encode($data);
	}
	public function get_customer_info($customer_id){

		$table_master=TABLE_PREFIX."_customer_database";
		$table_address=TABLE_PREFIX."_customer_address";
		$query="SELECT *,a.id as customer_address_id FROM $table_master m,$table_address a where m.id=$customer_id and m.id=a.company_id and a.address_type='Billing'";
		//echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();

		echo json_encode($data);
	}
	public function update_customer(){
		Session::init();
		$user_id = Session::get('user_id');
		$customer_id = $_POST['customer_id'];
		$table=TABLE_PREFIX."_customer_database";
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

		$where="id=$customer_id";
		//$this->db->update($table,$data,$where);
		$this->db->update($table, $data, "`id` = {$_POST['customer_id']}");
		if($customer_id >0){
			$address_table=TABLE_PREFIX."_customer_address";
			$address_bill = array();
			$address_bill['company_id'] = $customer_id;
			$address_bill['address_type'] = 'Billing';
			$address_bill['address'] = $_POST['address_bill'];
			$address_bill['locality'] = $_POST['locality_bill'];
			$address_bill['city'] = $_POST['city_bill'];
			$address_bill['state'] = $_POST['state_bill'];
			$address_bill['country'] = $_POST['country_bill'];
			$address_bill['pin'] = $_POST['pin_bill'];
			$address_bill['tel'] = $_POST['tel_bill'];
			$address_bill['fax'] = $_POST['fax_bill'];
			$customer_address_id=$_POST['customer_address_id'];
			
			$where="id=$customer_address_id";
			
			$this->db->update($address_table,$address_bill,$where);

		}
		echo json_encode($data);
	
	}

	public function save_payment(){

		$today= date("Y-m-d");
		$table=TABLE_PREFIX."_customer_payments";
		$user_id = Session::get('user_id');
		$order_id =0;
		if(isset($_POST['order_id'])){
			$order_id=$_POST['order_id'];
		}
		$data =array();
		$data['customer_id'] = $_POST['customer_id'];
		$data['order_id'] = $order_id;
		$data['amount'] = $_POST['amount'];
		$data['payment_date'] = $today;
		$data['payment_mode'] = $_POST['prefered_payment'];
		$data['instrument_number'] = $_POST['instrument_no'];
		$data['instrument_date'] = $_POST['instrument_date'];
		$data['user_id'] = $user_id;
		$data['cumulative_amount'] = $this->get_customer_cumulative_payment($_POST['customer_id'])+floatval($_POST['amount']);
		$this->db->insert($table,$data);

	}
	function get_customer_outstanding($customer_id){
		$total_sales =$this->get_customer_cumulative_sales_amount($customer_id);
		$total_payments=$this->get_customer_cumulative_payment($customer_id);
		$out_standing = $total_sales-$total_payments;
		//$label_str='<div class="label-success">Total Payments :</div>&nbsp;'.$total_payments.'&nbsp; INR<div class="label-important">&nbsp;Total Sales :</div>&nbsp;'.$total_sales.'&nbsp;INR<div class="label-info">&nbsp;Balance :</div>&nbsp;'.$out_standing.'&nbsp;INR';
		$result=array();
		$result['total_sales']=$total_sales;
		$result['total_payments']=$total_payments;
		$result['out_standing']=$out_standing;
		return $result;

	}
	public function get_customer_cumulative_sales_amount($customer_id){

		$table_sale_ledger=TABLE_PREFIX.'_sale_ledger';
		$query="SELECT cumulative_bill_amount FROM $table_sale_ledger where customer_id=$customer_id order by last_update desc limit 0,1";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data=$sth->fetch();
		$count =  $sth->rowCount();
		$cumulative_amount=0;
		if ($count == 1) {
			$cumulative_amount=floatval($data['cumulative_bill_amount']);
		}
		return $cumulative_amount;
	}
	public function get_customer_cumulative_payment($customer_id){

		$table_customer_payments=TABLE_PREFIX."_customer_payments";
		$query="SELECT cumulative_amount FROM $table_customer_payments where customer_id=$customer_id order by last_update desc limit 0,1";
		$sth = $this->db->prepare($query);
		$sth->execute();
		$data=$sth->fetch();
		$count =  $sth->rowCount();
		$cumulative_amount=0;
		if ($count == 1) {
			$cumulative_amount=floatval($data['cumulative_amount']);
		}
		return $cumulative_amount;
	}
	public function customer_order_id($customer_id){
		$table_sales_ledger=TABLE_PREFIX."_sale_ledger";
		$table_order_master=TABLE_PREFIX."_order_master";
		$query="SELECT odr.id,sl.bill_amount FROM $table_order_master odr,$table_sales_ledger sl where odr.customer_id=$customer_id and odr.status='Closed' and sl.customer_id=odr.customer_id and odr.id=sl.order_id";
		//	echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_payment_details($customer_id){
		$table_sales_ledger=TABLE_PREFIX."_sale_ledger";
		$table_customer_payments=TABLE_PREFIX."_customer_payments";
		$query="SELECT * FROM $table_customer_payments pay where pay.customer_id=$customer_id order by pay.last_update desc";
		//echo $query;
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

}