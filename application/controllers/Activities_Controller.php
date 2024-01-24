<?php

class Activities_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Activities_model');
    }

    public function index()
    {
        $this->load->model('Activities_model');

        // username dari loginpage -> manggil model user
        // butuh panggil daftar aktivitas -> manggil model aktivitas ✅
        // butuh panggil view list -> manggil view list ✅

        // butuh button add new -> adanya di view ❌
        // butuh halaman detail -> view dari halaman detail ❌

        // kalau usernamenya ada dan statusnya login -> ngelihat halaman
        // else -> redirect ke login

        $username = $this->session->userdata('username');
        $status = $this->session->userdata('status');
        $userId = $this->session->userdata('id');
        if ($status == 'login' && $username != null && $userId != null) {
            // $activities = $this->Activities_model->getAllActivitiesByUserID($userId);
            $activities = $this->Activities_model->getAllActivities();
            $this->load->view('activities/list', [

                // kiri: nama variable
                // kanan: variable dari db -> variable
                'activities' => $activities,
                'username' => $username,
            ]);
        } else {
            redirect(base_url('login'));
        }
    }


    public function add_activities()
    {
        // $attributes = array(
        //     'class' => 'activities/index' // Add your desired class for styling
        // );
        // echo form_open('activity/save', $attributes);


        return $this->load->view('activities/add_activities');
    }
    public function date_not_exceeding_today($tanggal)
    {
        $today = date('mm/dd/yy'); // Get today's date in YYYY-MM-DD format
        $input_date = date('mm/dd/yy', strtotime($tanggal)); // Convert input date to YYYY-MM-DD format

        if ($input_date > $today) {
            $this->form_validation->set_message('date_not_exceeding_today', 'Tanggal harus kurang dari atau sama dengan hari ini.');
            return false;
        } else {
            return true;
        }
    }

    public function time_not_valid()
    {
        $tanggal = $this->input->post('tanggal'); // Get the valid date from input
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_akhir = $this->input->post('waktu_akhir');


        $from_time = strtotime($tanggal . ' ' . $waktu_mulai);
        $to_time = strtotime($tanggal . ' ' . $waktu_akhir);

        if ($to_time < $from_time) {
            $this->form_validation->set_message('time_not_valid', 'waktu akhir tidak valid');
            return false;
        } else {
            return true;
        }
    }

    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // response -> html? view
        // echo 'Hello World!';
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|callback_date_not_exceeding_today');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu_Akhir', 'trim|required|callback_time_not_valid');

        // var_dump($this->form_validation->run());
        // die();
        if ($this->form_validation->run() == FALSE) {
            // $data['errors'] = $this->form_validation->error_array();
            // $this->load->view('form_view', $data);
            // var_dump($this->form_validation->error_array());
            // die();
            $this->load->view('activities/add_activities');
        } else {
            // Validation passed, process form data
            $tanggal = $this->input->post('tanggal'); // Get the valid date from input
            // $waktu_mulai = $this->input->post('waktu_mulai');
            // $waktu_akhir = $this->input->post('waktu_akhir');

            // ... your code to handle the valid date and other submitted data ...
            $this->load->model('Activities_model');
            $this->Activities_model->saveActivity();

            $this->session->set_flashdata('success_message', 'Data berhasil disimpan!');
            // redirect('activities/index');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function getActivityById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('activities')->row();
    }


    public function edit_activities($id)
    {
        // function untuk halaman edit -> ambil datanya dulu
        $activity = $this->Activities_model->getActivitiesbyID($id);
        $this->load->view('activities/edit_activities', ['activity' => $activity]);
    }

    public function edit($id)
    {
        // function untuk NGESAVE ke database 
        // var_dump('jancok');
        // die();
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|callback_date_not_exceeding_today');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu_Akhir', 'trim|required|callback_time_not_valid');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('activities/edit_activities');
        } else {
            $activity = $this->Activities_model->getActivitiesbyId($id);

            $tanggal = $this->input->post('tanggal');
            $this->load->model('Activities_model');
            $this->Activities_model->updateActivity();

            $this->session->set_flashdata('success_message', 'Data berhasil diedit!');

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function update()
    {
        // Set rules untuk validasi
        $this->form_validation->set_rules('aktivitas', 'AKtivitas', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|callback_date_not_exceeding_today');
        $this->form_validation->set_rules('waktu_mulai', 'Waktu_mulai', 'trim|required');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu_Akhir', 'trim|required|callback_time_not_valid');

        $id = $this->input->post('activity_id');
        $activities = $this->db->get_where('activities', ['id' => $id])->row_array();
        // var_dump($activities);
        // die();


        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, tampilkan halaman edit lagi
            $this->load->view('activities/edit_activities');
        } else {
            // Validasi berhasil, lakukan penyimpanan data yang diedit
            // $this->Activites_model->update_data($id);

            $data = [
                'aktivitas' => $this->input->post('aktivitas', true),
                'id' => $id,
                'tanggal' => $this->input->post('tanggal', true),
                'waktu_mulai' => $this->input->post('waktu_mulai', true),
                'waktu_akhir' => $this->input->post('waktu_akhir', true),
            ];

            $where = array(
                'id' => $id
            );

            $this->Activities_model->update_data($where, $data, 'activities');

            // Redirect atau tampilkan pesan sukses
            redirect('activities/index');
        }
    }
}
