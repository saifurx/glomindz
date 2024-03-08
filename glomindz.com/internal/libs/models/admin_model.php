<?php

class Admin_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function get_all_products(){
		$table_product=TABLE_PREFIX."_product_master";
		$table_price=TABLE_PREFIX."_price_master";
		$table_package=TABLE_PREFIX."_package_master";
		$query="SELECT * FROM $table_product product, $table_price price,  $table_package package  where product.id=price.product_id and price.status=1 and price.package_id = package.id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}

	public function get_all_packages(){
		$table=TABLE_PREFIX."_package_master";
		$sth = $this->db->prepare("SELECT * FROM $table");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		return $data;
	}
	public function print_invoice_data($order_id){
		$table_invoice=TABLE_PREFIX."_invoice_master";
		$table_customer_address=TABLE_PREFIX."_customer_address";
		$table_customer_master=TABLE_PREFIX."_customer_database";
		$table_order_master=TABLE_PREFIX."_order_master";
		$data=array();
		$data['error']='';
		$query="SELECT *,customer.company as company,orders.booking_station FROM $table_invoice invoice, $table_customer_address address,$table_customer_master customer,$table_order_master orders where invoice.order_id=$order_id and invoice.customer_address_id=address.id and customer.id=address.company_id and orders.id=$order_id and orders.id=invoice.order_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		return $data;
	}
	public function get_stock_master(){
		$data=array();
		$data['error']='';

		$table_stock_master=TABLE_PREFIX."_stock_master";
		$table_product=TABLE_PREFIX."_product_master";
		$table_price=TABLE_PREFIX."_price_master";
		$table_package=TABLE_PREFIX."_package_master";
		$table="$table_stock_master stock, $table_product product, $table_package package";
		$select="SELECT stock.id stock_id, product.short_code, product.name,package.type,package.volume,package.quantity_in_box,stock.available_unit, stock.exp_date, stock.mfg_date,stock.batch_id,stock.batch_no,stock.location,stock.transaction_type	FROM";
		$where="where stock.product_id=product.id and stock.package_id=package.id";

		$query=$select.' '.$table.' '.$where.' order by stock.last_update desc';
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function insert_order_temp(){
		$table_order_master=TABLE_PREFIX."_order_master";
		$data = array();
		Session::init();
		$data['user_id'] = Session::get('user_id');
		$this->db->insert($table_order_master,$data);
		return $this->db->lastInsertId();

	}
	function get_discounts($customer_id){

		$table_customer=TABLE_PREFIX."_customer_database";
		$table_discount=TABLE_PREFIX."_customer_discount_master";
		$query="SELECT discount.id, discount.name, discount.percentage FROM $table_customer customer,$table_discount discount where customer.id=$customer_id and customer.customer_type=discount.customer_type";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	function get_taxes($customer_id){
		$table=TABLE_PREFIX."_tax_master";
		$sth = $this->db->prepare("SELECT * FROM $table");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function get_customer_order_id($order_id){
		$table_customer=TABLE_PREFIX."_customer_database";
		$table_order_master=TABLE_PREFIX."_order_master";
		$data=array();
		$data['error']='';
		$customer_id=1;//$_POST['customer_id'];
		$query="SELECT * FROM $table_customer customer,$table_order_master order_master where customer.id=order_master.customer_id and order_master.id=$order_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		return $data[0];
	}
	public function print_stn_data($stn_id){
		$table_invoice=TABLE_PREFIX."_stn_master";
		$data=array();
		$data['error']='';
		//$query="SELECT * FROM $table_invoice invoice, $table_customer_address address where invoice.order_id=$stn_id and invoice.customer_address_id=address.id";
		$query= "SELECT * FROM `spl_stn_master` WHERE id = $stn_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		return $data;
	}
}