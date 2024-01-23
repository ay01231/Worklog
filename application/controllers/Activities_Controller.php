<?php

class Activities_Controller extends CI_Controller
{
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
