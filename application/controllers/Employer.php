<?php
class Employer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Employer_model');
    }
    public function add_job()
    {
        if($this->input->post('addJob')) {
            $title = $this->input->post('title');
            $location = $this->input->post('location');
            $role = $this->input->post('role');
            $edu_qualification = $this->input->post('edu_qualification');
            $experience = $this->input->post('experience');

            if($title != '' && $location != '' && $role != '' && $edu_qualification != '' && $experience != '')
            {
                $this->Employer_model->insert_job();
            }
            else {
                $data['error'] = "<p style='color:red'><small>Please fill the required fields</small></p>";
            }
        }
        $this->load->view("pages/add_job",@$data);
    }

    public function employer_home()
    {
        $data['jobs'] = $this->Employer_model->home_jobs();
        $this->load->view('pages/home_employer',@$data);
    }
}