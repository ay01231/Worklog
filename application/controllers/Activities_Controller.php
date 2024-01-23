<?php
class Activities_Controller extends CI_Controller
{
    public function index()
    {
        return $this->load->view('activities/index');
    }

    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // response -> html? view
        // echo 'Hello World!';

        $this->load->model('Activities_model');
        $this->Activities_model->saveActivity();

        // ini buat debug
        // var_dump($lastTask);
        // die();

        // $this->load->view("task/index", [
        //     // kiri: nama variable
        //     // kanan: kontennya (str, int, array, object)
        //     'title' => 'My Blog ini custom',
        //     'konten' => $lastTask->task_name,
        // ]);
    }
}
