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
            $activities = $this->Activities_model->getAllActivitiesByUserID($userId);
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
        $users_id = $this->session->userdata("id");
        // $attributes = array(
        //     'class' => 'activities/index' // Add your desired class for styling
        // );
        // echo form_open('activity/save', $attributes);

        return $this->load->view('activities/add_activities', [
            'users_id' => $users_id
        ]);
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
    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // response -> html? view
        // echo 'Hello World!';
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|callback_date_not_exceeding_today');

        // var_dump($this->form_validation->run());
        // die();
        if ($this->form_validation->run() == FALSE) {
            // $data['errors'] = $this->form_validation->error_array();
            // $this->load->view('form_view', $data);
            // var_dump($this->form_validation->error_array());
            // die();
            $this->load->view('activities/add_activities');
        } else {
            $users_id = $this->input->post('users_id');
            // Validation passed, process form data
            $tanggal = $this->input->post('tanggal'); // Get the valid date from input

            // ... your code to handle the valid date and other submitted data ...
            $this->load->model('Activities_model');
            $this->Activities_model->saveActivity();

            $this->session->set_flashdata('success_message', 'Data berhasil disimpan!');
            // redirect('activities/index');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}


// MVC -> Model✅ View Controller
// 1 model -> 1 controller
// controller -> x model