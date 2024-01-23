<?php
class Login_Controller extends CI_Controller
{
    function __construct(){
		parent::__construct();		
		$this->load->model('User_model');
	}

    public function index() {
        return $this->load->view('login/index');
    }

    function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => $password
        );

        $loginCheck = $this->User_model->loginCheck("users", $where) -> num_rows();
        if($loginCheck > 0) {
            $data_session = array(
                'username' => $username,
                'status' => "login"
            );

            $this->session->set_userdata($data_session);
            redirect(base_url("activity/index"));
        } else {
            echo("Username dan Password tidak terdaftar.");
        }
    }
}