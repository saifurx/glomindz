<?php

class Accounts_Service_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_transction() {
        $table_transaction = TABLE_PREFIX . "_transaction_master";
        $table_department = TABLE_PREFIX . "_department_master";
        $query = "SELECT * FROM $table_transaction t1, $table_department t2 where t1.dept_id=t2.id order by t1.last_update";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }
    
    

}