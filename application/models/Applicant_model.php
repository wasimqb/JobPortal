<?php
class Applicant_model extends CI_Model
{
    public $first_name;
    public $last_name;
    public $phone;
    public $password;
    public $password2;
    public $edu_qualification;
    public $address1;
    public $address2;
    public $city;
    public $state;
    public $country;
    public $applicant_id;

    public function home_jobs()
    {
        $this->db->select('*');
        $this->db->from('job');
        $this->db->join('employer', 'job.employer_id = employer.employer_id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function profile_edit()
    {
        $email = 'wakram999@gmail.com';
        $this->db->select('*');
        $this->db->from('applicant');
        $this->db->join('address', 'applicant.applicant_id = address.applicant_id');
        $this->db->where('applicant.email', $email);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function update_profile()
    {
        $this->first_name = $this->input->post('first_name');
        $this->last_name = $this->input->post('last_name');
        $this->phone = $this->input->post('phone');
        $this->password = $this->input->post('password');
        $this->password2 = $this->input->post('confirm_password');
        $this->edu_qualification = $this->input->post('edu_qualification');
        $this->address1 = $this->input->post('address1');
        $this->address2 = $this->input->post('address2');
        $this->city = $this->input->post('city');
        $this->state = $this->input->post('state');
        $this->country = $this->input->post('country');

        $email = "wakram999@gmail.com";
        $this->db->where('email', $email);
        $query = $this->db->get('applicant');
        $result = $query->result_array();
        $this->applicant_id = $result[0]['applicant_id'];

        $this->db->query("update address set addressLine1 ='" . $this->address1 . "', addressLine2 ='" . $this->address2 . "', city ='" . $this->city . "',
        state ='" . $this->state . "', country ='" . $this->country . "' where applicant_id = " . $this->applicant_id);

        if ($this->password == '') {
            $this->db->query("update applicant set firstname ='" . $this->first_name . "', lastname ='" . $this->last_name . "',
            phone =" . $this->phone . ", edu_qualification ='" . $this->edu_qualification . "' where email = '" . $email . "'");
        } else {
            if ($this->password == $this->password2) {
                $this->db->query("update applicant set firstname ='" . $this->first_name . "', lastname ='" . $this->last_name . "',
            phone =" . $this->phone . ", edu_qualification ='" . $this->edu_qualification . "' where email = '" . $email . "'");
            }
        }
    }

    public function upload_resume($values)
    {
        $email = 'wakram999@gmail.com';
        $this->db->where('email',$email);
        $query = $this->db->get('applicant');
        $result = $query->result_array();
        $applicant_id = $result[0]['applicant_id'];

        $this->db->where('applicant_id',$applicant_id);
        $query = $this->db->get('resume');
        $row = $query->num_rows();
        if($row != 0) {
            $this->db->update('resume',$values);
        } else {
            $this->db->insert('resume',$values);
        }
    }

    public function load_resume()
    {
        $email = 'wakram999@gmail.com';
        $this->db->where('email',$email);
        $query = $this->db->get('applicant');
        $result = $query->result_array();
        $applicant_id = $result[0]['applicant_id'];

        $this->db->where('applicant_id',$applicant_id);
        $query = $this->db->get('resume');
        $result = $query->result_array();
        $resume_name = $result[0]['resume_name'];
        $path = $result[0]['path'];
        $resume_data = array(
            'resume_name'=>$resume_name,
            'path'=>$path
        );
        return $resume_data;
    }

    public function view_job($id)
    {
        $job_id = $id;
        $this->db->where('job_id',$job_id);
        $query = $this->db->get('job');
        $result = $query->result_array();
        return $result;
    }
    public function find_employer($id)
    {
        $this->db->where('employer_id',$id);
        $query = $this->db->get('employer');
        $result = $query->result_array();
        return $result;
    }

    public function find_applicant_by_email()
    {
        $email = "wakram999@gmail.com";
        $this->db->where('email',$email);
        $query = $this->db->get('applicant');
        $result = $query->result_array();
        return $result;
    }
    public function search()
    {
        if($this->input->post('filter') != '') {
            $filter = $this->input->post('filter');
        } else {
            $filter = 'title';
        }
        if($this->input->post('search') == '') {
            $this->db->select('*');
            $this->db->from('job');
            $this->db->join('employer', 'job.employer_id = employer.employer_id');
        } else {
            $search_value = $this->input->post('search');
            $this->db->select('*');
            $this->db->from('job');
            $this->db->join('employer', 'job.employer_id = employer.employer_id');
            if($filter == 'employer') {
                $this->db->where('employer.name',$search_value);
            } else{
                $this->db->where('job.'.$filter,$search_value);
            }
        }
        $query = $this->db->get();
        $result = $query->result_array();
        if(empty($result)) {
            return "error";
        } else{
            return $result;
        }
    }

    public function load_applied_jobs()
    {
        $query = $this->db->query("select job_id from applied_jobs where applicant_id = 66");
        $result = $query->result_array();
        $job_id = $result[0]['job_id'];
        $query = $this->db->query("select job.job_id,job.title,employer.name from employer,job where job.employer_id = employer.employer_id and job.job_id = ".$job_id);
        $result = $query->result_array();
        return $result;
    }

    public function load_saved_jobs()
    {
        $query = $this->db->query("select job_id from saved_jobs where applicant_id = 66");
        $result = $query->result_array();
        $job_id = $result[0]['job_id'];
        $query = $this->db->query("select job.job_id,job.title,employer.name from employer,job where job.employer_id = employer.employer_id and job.job_id = ".$job_id);
        $result = $query->result_array();
        return $result;
    }
}
