<?php
class Task_Controller extends CI_Controller
{
    public function index()
    {


        $this->load->model('Task_model');
        $lastTask = $this->Task_model->getLastTask();



        $this->load->view("task/index", [

            'title' => 'Form',
            'konten' => $lastTask->task_name,
        ]);
    }
}
