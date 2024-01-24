<?php

class Activities_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Activities_model');
    }

    function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }

    // function untuk menampilkan list aktivitas
    public function index()
    {
        $this->load->model('Activities_model');
        parse_str($_SERVER['QUERY_STRING'], $_GET);

        $username = $this->session->userdata('username');
        $status = $this->session->userdata('status');
        $userId = $this->session->userdata('id');
        if ($status == 'login' && $username != null && $userId != null) {
            if (array_key_exists('date', $_GET) && $_GET['date'] != "" && $this->validateDate($_GET['date'])) {
                $activities = $this->Activities_model->get_all_activities_by_user_id_and_date($userId, $_GET['date']);
            } else {
                $activities = $this->Activities_model->getActivitiesByUsersID($userId);
            }
            // var_dump($activities);
            // die();
            $this->load->view('activities/list', [
                'activities' => $activities,
                'username' => $username,
                'selectedDate' => array_key_exists('date', $_GET) ? $_GET['date'] : ''
            ]);
        } else {
            redirect(base_url('login'));
        }
    }

    // function untuk menampilkan form pembuatan aktivitas
    public function add_activities()
    {
        $users_id = $this->session->userdata("id");

        return $this->load->view('activities/add_activities', [
            'users_id' => $users_id
        ]);
    }

    // function validasi jika tanggal diinput > tanggal hari ini
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

    // function validasi jika from_time > to_time
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

    // function untuk simpan data aktivitas
    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|callback_date_not_exceeding_today');
        $this->form_validation->set_rules('waktu_akhir', 'Waktu_Akhir', 'trim|required|callback_time_not_valid');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('activities/add_activities');
        } else {
            // Validation passed, process form data
            $this->load->model('Activities_model');
            $this->Activities_model->saveActivity();

            $this->session->set_flashdata('success_message', 'Data berhasil disimpan!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    // function untuk get halaman edit aktivitas
    public function edit_activities($id)
    {
        $activity = $this->Activities_model->getActivitiesbyID($id);
        $this->load->view('activities/edit_activities', ['activity' => $activity]);
    }

    // function untuk update data aktivitas
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
