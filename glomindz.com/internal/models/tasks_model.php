<?php

class Tasks_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function burndown() {
        Session::init();
        $user_id = Session::get('user_id');
        $table_burndown = TABLE_PREFIX . "_burndown_master";


        $data = array();
        $data['task_id'] = $_POST['task_id'];
        $data['user_id'] = $user_id;
        $data['time_took'] = $_POST['time'];
        $this->db->insert($table_burndown, $data);
        $id = $this->db->lastInsertId();
        echo $id;
    }

    public function create_task() {
        Session::init();
        $user_id = Session::get('user_id');
        $email = Session::get('email');
        $name = Session::get('name');
        $table_task = TABLE_PREFIX . "_task_master";
        $table_burndown = TABLE_PREFIX . "_burndown_master";
        $data = array();
        $data['project_id'] = $_POST['project_id'];
        $data['project_deliverable_id'] = $_POST['project_deliverable_id'];
        $data['task'] = $_POST['task'];
        $data['priority'] = $_POST['priority'];
        $data['complexity'] = $_POST['complexity'];
        $data['optimum_man_hrs'] = $_POST['optimum_man_hrs'];
        $data['demand_man_hrs'] = $_POST['demand_man_hrs'];
        $data['estimate_man_hrs'] = $_POST['estimate_man_hrs'];
        $data['actual_man_hrs'] = $_POST['actual_man_hrs'];
        $data['status'] = 'Open';
        $data['assign_to'] = $_POST['assign_to'];
        $data['assign_by'] = $user_id;
        $this->db->insert($table_task, $data);
        $id = $this->db->lastInsertId();
        if ($id > 0) {
            $data_burnt = array();
            $data_burnt['task_id'] = $id;
            $data_burnt['user_id'] = $user_id;
            $data_burnt['time_took'] = 0;
            $this->db->insert($table_burndown, $data_burnt);
            $this->send_new_task_mail($email, $name, $data['task']);
        }
        echo $id;
    }

    public function update_task() {
        $table_task = TABLE_PREFIX . "_task_master";
        $id = $_POST['id'];
        $data = array();
        $data['project_id'] = $_POST['project_id'];
        $data['project_deliverable_id'] = $_POST['project_deliverable_id'];
        $data['task'] = $_POST['task'];
        $data['priority'] = $_POST['priority'];
        $data['estimate_man_hrs'] = $_POST['estimate_man_hrs'];
        $data['status'] = 'Open';
        $data['assign_to'] = $_POST['assign_to'];
        $where = "id = $id";
        $this->db->update($table_task, $data, $where);
        echo $id;
    }

    public function get_all_tasks() {
        $query;
        $table_mtm = TABLE_PREFIX . "_task_master";
        $table_mpm = TABLE_PREFIX . "_project_master";
        $table_mpd = TABLE_PREFIX . "_project_deleverables";
        $table_mum = TABLE_PREFIX . "_user_master";
        $role = Session::get("role");
        $user_id = Session::get("user_id");
       // echo $role;
        if ($role =='admin') {
            $query = "SELECT mtm.id, mtm.task, mtm.priority, mtm.complexity, mtm.optimum_man_hrs, mtm.demand_man_hrs,mtm.assign_to, mtm.assign_by, mtm.status, 
			mpd.name as project_deleverable, mpm.name as project_name,
			mum.name as assign_to, mum2.name as assign_by 
			FROM $table_mtm mtm, $table_mpd mpd,
			$table_mpm mpm, $table_mum mum, $table_mum mum2
			WHERE mtm.project_deliverable_id = mpd.id
			AND mtm.project_id = mpm.id
			AND mtm.assign_to = mum.id
			AND mtm.assign_by = mum2.id
			ORDER BY mtm.last_update";
        } else {
            $query = "SELECT mtm.id, mtm.task, mtm.priority, mtm.complexity, mtm.optimum_man_hrs, mtm.demand_man_hrs,mtm.assign_to, mtm.assign_by, mtm.status, 
			mpd.name as project_deleverable, mpm.name as project_name,
			mum.name as assign_to, mum2.name as assign_by 
			FROM $table_mtm mtm, $table_mpd mpd,
			$table_mpm mpm, $table_mum mum, $table_mum mum2
			WHERE mtm.project_deliverable_id = mpd.id
			AND mtm.project_id = mpm.id
			AND mtm.assign_to = mum.id
			AND mtm.assign_by = mum2.id
                        AND mtm.assign_to=$user_id
                        ORDER BY mtm.last_update";
        }
        //echo $query;
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    public function get_all_tasks_and_burned_time() {
        $table_mtm = TABLE_PREFIX . "_task_master";
        $table_mpm = TABLE_PREFIX . "_project_master";
        $table_mbm = TABLE_PREFIX . "_burndown_master";

        $query = "SELECT mtm.id, mtm.status, mtm.task, mtm.priority, mtm.complexity, mtm.estimate_man_hrs, mpm.name AS project_name, sum( mbm.time_took ) AS time_took
				FROM $table_mtm mtm, $table_mpm mpm, $table_mbm mbm
				WHERE mtm.project_id = mpm.id
				AND mbm.task_id = mtm.id
				AND mtm.status = 'Open'
				GROUP BY mbm.task_id";

        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    public function get_task_details($id) {
        $query;
        $table_mtm = TABLE_PREFIX . "_task_master";
        $table_mpm = TABLE_PREFIX . "_project_master";
        $table_mpd = TABLE_PREFIX . "_project_deleverables";
        $table_mum = TABLE_PREFIX . "_user_master";
            $query = "SELECT mtm.*, 
			mpd.name as project_deleverable, mpm.name as project_name,
			mum.name as assign_to, mum2.name as assign_by 
			FROM $table_mtm mtm, $table_mpd mpd,
			$table_mpm mpm, $table_mum mum, $table_mum mum2
			WHERE mtm.id = $id
			AND mtm.project_deliverable_id = mpd.id
			AND mtm.project_id = mpm.id
			AND mtm.assign_to = mum.id
			AND mtm.assign_by = mum2.id
			ORDER BY mtm.last_update";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    public function get_project_deliverables() {
        $project_id = $_POST['project_id'];
        $table_mpd = TABLE_PREFIX . "_project_deleverables";

        $query = "SELECT id, name FROM $table_mpd WHERE project_id = $project_id";
        $sth = $this->db->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }
    
    public function close_task() {
        $table_task = TABLE_PREFIX . "_task_master";
        $id = $_POST['task_id'];
        $data = array();
        $data['status'] = 'Closed';
        $where = "id = $id";
        $this->db->update($table_task, $data, $where);
        echo $id;
    }

    public function send_new_task_mail($email, $name, $task) {
        $to = $email . ', support@glomindz.com'; // note the comma
        $subject = $name . ' successfully registered on Crimatrix';
        $message = "Dear $name,  \n\n\A task has been created for you. \t\n Task Name: $task";
        $headers = "From:support@crimatrix.com";
        return mail($to, $subject, $message, $headers);
    }

}