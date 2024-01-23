<?php

class User_model extends CI_Model
{
    public $id;
    public $username;
    public $password;

    function loginCheck($table, $where) {
        return $this->db->get_where($table, $where);
    }
}
