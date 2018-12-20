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
        $this->db->join('employer','job.employer_id = employer.id');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function profile_edit()
    {
        $email = 'wakram999@gmail.com';
        $this->db->select('*');
        $this->db->from('applicant');
        $this->db->join('address','applicant.id = address.applicant_id');
        $this->db->where('applicant.email',$email);
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
        $this->db->where('email',$email);
        $query = $this->db->get('applicant');
        $result = $query->result_array();
        $this->applicant_id = $result[0]['id'];

        $this->db->where('applicant_id',$this->applicant_id);
        $this->db->update('address',$this);
    }
}