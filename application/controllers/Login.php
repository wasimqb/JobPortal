<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function applicant_login()
    {
        $this->load->library('session');
        if ($this->input->post('login')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $hashed_pass = hash('sha512', $password);

            $condition = array(
                'email'=> $email,
                'is_verified'=> 1
            );
            $this->db->where('email',$email);
            $que = $this->db->get('applicant');
            $row = $que->num_rows();
            if ($row) {
                $this->session->set_userdata('user', $email);
                $this->applicant_home();
                return;
            } else {
                $data['error'] = "<p style='color:red'><small>Invalid Login Credentials</small></p>";
            }
        } 
        $this->load->view('pages/applicant_login', @$data);
    }
    public function applicant_home()
    {
        $this->load->view('pages/home_applicant', @$data);
    }
    public function applicant_register()
    {
        redirect('index.php/register/applicant_registration');
    }

    public function employer_login()
    {
        $this->load->library('session');
        if ($this->input->post('login')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $hashed_pass = hash('sha512', $password);

            $this->db->where('email',$email);
            $que = $this->db->get('employer');
            $row = $que->num_rows();
            if ($row) {
                $this->session->set_userdata('user', $email);
                $this->employer_home();
                return;
            } else {
                $data['error'] = "<p style='color:red'><small>Invalid Login Credentials</small></p>";
            }
        } 
        $this->load->view('pages/employer_login', @$data);
    }
    public function employer_home()
    {
        $this->load->view('pages/home_employer', @$data);
    }
    public function employer_register()
    {
        redirect('index.php/register/employer_registration');
    }
}
