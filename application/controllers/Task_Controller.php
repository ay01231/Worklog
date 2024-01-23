<?php
class Task_Controller extends CI_Controller
{
    public function index()
    {
        // response -> html? view
        // echo 'Hello World!';

        $this->load->model('Task_model');
        $lastTask = $this->Task_model->getLastTask();

        // ini buat debug
        // var_dump($lastTask);
        // die();

        $this->load->view("task/index", [
            // kiri: nama variable
            // kanan: kontennya (str, int, array, object)
            'title' => 'My Blog ini custom',
            'konten' => $lastTask->task_name,
        ]);
    }
}
