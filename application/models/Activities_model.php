<?php

class Activities_model extends CI_Model
{
    public $id;
    public $aktivitas;
    public $tanggal;
    public $waktu_mulai;
    public $waktu_akhir;
    public $users_id;

    public function saveActivity()
    {
        $this->aktivitas = $this->input->post('aktivitas');
        $this->tanggal = $this->input->post('tanggal');
        $this->waktu_mulai = $this->input->post('waktu_mulai');
        $this->waktu_akhir = $this->input->post('waktu_akhir');
        $this->users_id = $this->input->post('users_id');

        $this->db->insert('activities', $this);
    }

    //function get all activities data from activities table
    public function getAllActivities()
    {
        // $aktivitas = $this->get->post('aktivitas');

        $query = $this->db->get('activities');
        return $query->result();
    }

    public function getActivitiesbyID($id)
    {

        $this->db->where('id', $id);
        $act = $this->db->get('activities');
        $data = $act->result_array();

        return $data[0];
    }

    public function getActivitiesByUsersID($users_id)
    {

        $this->db->where('users_id', $users_id);
        $act = $this->db->get('activities');
        $data = $act->result();
        $sqlCountHours = "SELECT
                                round(sum(IF(TIMEDIFF(waktu_akhir, waktu_mulai) < 0, -ABS(HOUR(TIMEDIFF(waktu_akhir, waktu_mulai)) + MINUTE(TIMEDIFF(waktu_akhir, waktu_mulai)) / 60), HOUR(TIMEDIFF(waktu_akhir, waktu_mulai)) + MINUTE(TIMEDIFF(waktu_akhir, waktu_mulai)) / 60)), 1) AS total_time
                            FROM activities
                            WHERE users_id = ?;";
        $getCountHours = $this->db->query($sqlCountHours, array($users_id))->result_array();
        // var_dump($getCountHours);
        return [
            'data' => $data,
            'totalHours' => $getCountHours[0]
        ];
    }

    public function update_activity($id, $activities)
    {
        // Update the activity in the database based on $activity_id
        // Use $this->db->update() or another suitable method
        $this->db->where('id', $id);
        $this->db->update('activities', $activities);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function get_all_activities_by_user_id_and_date($users_id, $date)
    {
        $where = array('users_id' => $users_id, 'tanggal' => $date);
        $this->db->where($where);
        $query = $this->db->get('activities');

        $sqlCountHours = "SELECT
                                round(sum(IF(TIMEDIFF(waktu_akhir, waktu_mulai) < 0, -ABS(HOUR(TIMEDIFF(waktu_akhir, waktu_mulai)) + MINUTE(TIMEDIFF(waktu_akhir, waktu_mulai)) / 60), HOUR(TIMEDIFF(waktu_akhir, waktu_mulai)) + MINUTE(TIMEDIFF(waktu_akhir, waktu_mulai)) / 60)), 1) AS total_time
                            FROM activities
                            WHERE users_id = ? and tanggal = ?;";
        $getCountHours = $this->db->query($sqlCountHours, array($users_id, $date))->result_array();

        return [
            'data' => $query->result(),
            'totalHours' => $getCountHours[0]
        ];
    }
}
