<?php
class Applicant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Applicant_model');
    }

    public function applicant_home()
    {
        $data['jobs'] = $this->Applicant_model->home_jobs();
        $this->load->view('pages/home_applicant',$data);
    }

    public function profile_edit()
    {
        $data['applicant'] = $this->Applicant_model->profile_edit();
        $this->load->view('pages/profile_edit',@$data);
    }
    public function update_profile()
    {
        $this->Applicant_model->update_profile();
        $this->load->view('pages/profile_edit',@$data);
    }

}