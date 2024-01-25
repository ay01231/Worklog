<?php
class Login_Controller extends CI_Controller
{
    // first function to diexecute 
    function __construct()
    {
        parent::__construct();
        if (isset($this->session->userdata['username'])){
			redirect(base_url("activities/index"));
		}
        $this->load->model('User_model');
    }

    public function index()
    {
        return $this->load->view('login/index');
    }

    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );

        $userQuery = $this->User_model->loginCheck("users", $where);
        $loginCheck = $userQuery->num_rows() > 0 ? true : false;
        if ($loginCheck) {
            $user = $userQuery->result();
            $data_session = array(
                'username' => $user[0]->username,
                'id' => $user[0]->id,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect(base_url("activities/index"));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><span><strong>Username belum terdaftar atau password salah.</strong></span></div>');
            redirect(base_url("login"));
        }
    }

    // function logout(){
    //     $this->session->sess_destroy();
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><span><strong>Success.</strong> Berhasil Logout.</span></div>');
    //     redirect(base_url(""));
    // }
}
