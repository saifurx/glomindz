<?php
class Analytics_Model extends Model {

	function __construct() {
		parent::__construct();
	}

	public function monthly_product_demands(){
		$table_order_item=TABLE_PREFIX.'_order_item_list ol';
		$table_order_master=TABLE_PREFIX."_order_master om";
		$table_price=TABLE_PREFIX."_price_master price";
		$table_product=TABLE_PREFIX."_product_master pm ";
		$table_package=TABLE_PREFIX."_package_master pcgm";

		$today30=date('Y-m-d', strtotime($today. ' - 30 days'));

		$tables =$table_order_item.', '.$table_order_item.', '.$table_package.', '.$table_product.', '.$table_price;
		$where ="where om.id=ol.order_id and ol.price_id=price.id and price.product_id=pm.id and price.package_id=pcgm.id and om.status='Open'";


	}
	public function top_10_orderd_products(){
		$query ="select SUM(sl.quantity) as total_quantity,pm.name as product_name  from spl_stock_ledger sl LEFT JOIN spl_product_master pm ON sl.product_id=pm.id where sl.transaction_type='Sale' group by sl.product_id";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	public function monthly_sales_report(){
		$table_sales_ledger=TABLE_PREFIX."_sale_ledger sl";
		$table_order_master=TABLE_PREFIX."_order_master om";
		$query="SELECT DATE_FORMAT(sl.last_update,'%M %d') AS order_date,SUM(sl.bill_amount) as total_sale FROM  $table_sales_ledger,$table_order_master WHERE sl.order_id=om.id and om.status='Closed' and sl.last_update >= DATE_SUB( NOW( ) , INTERVAL 30 DAY ) group by DATE(sl.last_update) order by sl.last_update";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
	
	public function get_stock_report(){
		$location=$_POST['location'];
		$product_id=$_POST['product'];
		$package_id=$_POST['package_id'];
		$from_date=$_POST['from_date'];
		$to_date=$_POST['to_date'];
	
		$table_stock_ledger=TABLE_PREFIX."_stock_ledger sl";
		$table_package_master=TABLE_PREFIX."_package_master pm";
		if($package_id == 0){
			$query="SELECT *,DATE_FORMAT(sl.last_update,'%d %M %Y') AS last_update FROM $table_stock_ledger, $table_package_master
			WHERE  DATE(sl.last_update) BETWEEN '$from_date' AND '$to_date' AND sl.location='$location' AND sl.product_id=$product_id AND sl.package_id=pm.id ORDER BY sl.last_update ASC";
		}
		else{
			$query="SELECT *,DATE_FORMAT(sl.last_update,'%d %M %Y') AS last_update FROM $table_stock_ledger, $table_package_master
			WHERE  DATE(sl.last_update) BETWEEN '$from_date' AND '$to_date' AND sl.location='$location' AND sl.product_id=$product_id AND sl.package_id=$package_id AND sl.package_id=pm.id ORDER BY sl.last_update ASC";
		}
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
		
	}
	
	public function get_sale_report(){
		$location=$_POST['location'];
		$product=$_POST['product'];
		$package_id=$_POST['package_id'];
		$from_date=$_POST['from_date'];
		$to_date=$_POST['to_date'];
		
		$table_sale_ledger=TABLE_PREFIX."_sale_ledger sl";
		
		$query="";
		$sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);

	}
        public function get_sale_report_details(){
		$from_date=$_POST['from_date'];
		$to_date=$_POST['to_date'];
		
		$table_sale_ledger=TABLE_PREFIX."_sale_ledger sl";
                $table_invoice_master=TABLE_PREFIX."_invoice_master im";
                
                $table_customer_master=TABLE_PREFIX."_customer_database cm";
                $table_order_master=TABLE_PREFIX."_order_master om";
		
		$query="Select sl.*,cm.company,im.id as invoice_id,DATE(im.last_update) as date,om.reference from $table_sale_ledger,$table_customer_master,$table_invoice_master,$table_order_master where om.id =sl.order_id AND sl.customer_id =cm.id AND im.order_id=sl.order_id AND DATE(sl.last_update) between '$from_date' AND '$to_date'";
                //echo $query;
                $sth = $this->db->prepare($query);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);

	}
	

}