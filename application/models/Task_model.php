<?php

class Task_model extends CI_Model
{
    // kasih kolom
    public $id;
    public $taskName;

    public function getLastTask()
    {
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('task');
        return $query->row();
    }
}
