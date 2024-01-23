<?php

class Activities_model extends CI_Model
{
    public $id;
    public $jenis_proyek;
    public $deskripsi;
    public $tanggal;
    public $waktu_mulai;
    public $waktu_akhir;

    public function saveActivity()
    {
        $this->jenis_proyek = $this->input->post('jenis_proyek');
        $this->deskripsi = $this->input->post('deskripsi');
        $this->deskripsi = $this->input->post('deskripsi');
        $this->tanggal = $this->input->post('tanggal');
        $this->waktu_mulai = $this->input->post('waktu_mulai');
        $this->waktu_akhir = $this->input->post('waktu_akhir');

        $this->db->insert('activities', $this);
    }
}
