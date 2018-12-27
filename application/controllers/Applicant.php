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
        $data['error'] = '';
        $data['jobs'] = $this->Applicant_model->home_jobs();
        $this->load->view('pages/home_applicant', $data);
    }

    public function profile_edit()
    {
        $data['error'] = '';
        $data['applicant'] = $this->Applicant_model->profile_edit();
        $this->load->view('pages/profile_edit', @$data);
    }
    public function update_profile()
    {
        $data['error'] = '';
        $data['error_resume']='';
        $password = $this->input->post('password');
        $password2 = $this->input->post('confirm_password');
        if ($password == $password2) {
            $this->Applicant_model->update_profile();
            $data['error'] = "<p style='color:green'><small>Updated Successfully</small></p>";
        } else {
            $data['error'] = "<p style='color:red'><small>Password Doesn't match</small></p>";
        }
        $data['applicant'] = $this->Applicant_model->profile_edit();
        $this->load->view('pages/profile_edit', @$data);
    }

    public function resume_upload()
    {
        $data['error'] = '';
        $data['error_resume'] = '';
        $config['upload_path'] = './files/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 100000;
        $this->load->library('upload', $config);
        
        $resume_data = $this->Applicant_model->load_resume();
        $data['resume_data'] = $resume_data;

        if ($this->input->post('upload')) {
            if (!$this->upload->do_upload('resume')) {
                $data['error_resume'] = $this->upload->display_errors();
                $data['applicant'] = $this->Applicant_model->profile_edit();
                $this->load->view('pages/profile_edit', @$data);
                return;
            } else {
                $upload_data = $this->upload->data();
                $data['upload_data'] = $upload_data;
                $data['error_resume'] = "<p style='color:green'><small>Uploaded Successfully</small></p>";
                $applicant = $this->Applicant_model->profile_edit();
                $data['applicant'] = $applicant;
                $values = array(
                    'resume_name' => $upload_data['file_name'],
                    'path' => $upload_data['full_path'],
                    'applicant_id' => $applicant[0]['applicant_id']
                );
                $this->Applicant_model->upload_resume($values);
                $this->load->view('pages/profile_edit', @$data);
                return;
            }
        }
        $data['applicant'] = $this->Applicant_model->profile_edit();
        $this->load->view('pages/profile_edit', @$data);
    }

    public function view_job($id,$error='')
    {
        $data['error'] = $error;
        $job_details = $this->Applicant_model->view_job($id);
        $data['job'] = $job_details;
        $data['employer'] = $this->Applicant_model->find_employer($job_details[0]['employer_id']);
        $this->load->view('pages/job_description',@$data);
    }

    public function apply($id)
    {
        if($this->input->post('apply')) {
            $job_id = $id;
            $applicant = $this->Applicant_model->find_applicant_by_email();
            $applicant_id = $applicant[0]['applicant_id'];
            $values = array(
                'applicant_id'=>$applicant_id,
                'job_id'=>$job_id
            );
            $query = $this->db->get('applied_jobs');
            $result = $query->result_array();
            foreach($result as $row) {
                if($result[0]['applicant_id'] == $applicant_id && $result[0]['job_id'] == $job_id) {
                    $data['error'] = "<p style='color:green'><small>Already Applied</small></p>";
                } else {
                    $this->db->insert('applied_jobs',$values);
                    $data['error'] = "<p style='color:green'><small>Successfully Applied</small></p>";
                }
            }
        }
        elseif($this->input->post('save')) {
            $job_id = $id;
            $applicant = $this->Applicant_model->find_applicant_by_email();
            $applicant_id = $applicant[0]['applicant_id'];
            $values = array(
                'applicant_id'=>$applicant_id,
                'job_id'=>$job_id
            );
            $query = $this->db->get('saved_jobs');
            $result = $query->result_array();
            foreach($result as $row) {
                if($row['applicant_id'] == $applicant_id && $row['job_id'] == $job_id) {
                    $data['error'] = "<p style='color:green'><small>Already saved</small></p>";
                } else {
                    $this->db->insert('saved_jobs',$values);
                    $data['error'] = "<p style='color:green'><small>Successfully saved</small></p>";
                }
            }
            $data['job_id'] = $job_id; 
        }
        $this->view_job($job_id,$data['error']);
        // redirect("index.php/applicant/view_job/".$job_id);
    }

    public function view_profile_jobs()
    {
        $saved_jobs = $this->Applicant_model->load_saved_jobs();
        $applied_jobs = $this->Applicant_model->load_applied_jobs();
        $data['applied_jobs'] = $applied_jobs;
        $data['saved_jobs'] = $saved_jobs;
        $this->load->view('pages/view_profile_jobs',@$data);
    }

    public function search()
    {
        $data['jobs'] = array();
        $data['error'] = '';
        $result = $this->Applicant_model->find_applicant_by_email();
        $applicant_id = $result[0]['applicant_id'];
        if($this->input->post('submit')) {
            $return_value = $this->Applicant_model->search(); 
            if($return_value == "error") {
                $data['error'] = "<p style='color:red'>No Search Result</p>";
            } else {
                $data['jobs'] = $return_value;
            }
            $this->load->view('pages/home_applicant', @$data);
        }
    }
}
