<?php
class Analytics_Model extends Model {

	function __construct() {
		parent::__construct();
	}


	public function burntdown_chart(){
		$table_mbm=TABLE_PREFIX."_burndown_master";
		$table_mtm=TABLE_PREFIX."_task_master";
		
		$sth = $this->db->prepare("SELECT mtm.task, mbm.task_id, sum( mbm.time_took ) AS time_took
			FROM $table_mbm mbm, $table_mtm mtm
			WHERE mbm.task_id = mtm.id
			GROUP BY task_id");
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$data=$sth->fetchAll();
		echo json_encode($data);
	}
}