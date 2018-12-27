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
                $this->employer_home();
                return;
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

    public function job_description_employer($id)
    {
        $job_id = $id;
        $job_details = $this->Employer_model->job_description_employer($id);
        $data['job'] = $job_details;
        $applicant_details = $this->Employer_model->applicant_details($id);
        $data['applicants'] = $applicant_details;
        $this->load->view('pages/job_description_employer',@$data);
    }

    public function view_applicant()
    {
        $this->load->view('pages/view_applicant');
    }
}