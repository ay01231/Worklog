<?php

class Activities_model extends CI_Model
{
    public $id;
    public $aktivitas;
    public $jenis_proyek;
    public $tanggal;
    public $waktu_mulai;
    public $waktu_akhir;

    public function saveActivity()
    {
        $this->aktivitas = $this->input->post('aktivitas');
        $this->tanggal = $this->input->post('tanggal');
        $this->waktu_mulai = $this->input->post('waktu_mulai');
        $this->waktu_akhir = $this->input->post('waktu_akhir');

        $this->db->insert('activities', $this);
    }
}
