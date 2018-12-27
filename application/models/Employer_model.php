<?php
class Employer_model extends CI_Model
{
    public $title;
    public $location;
    public $role;
    public $edu_qualification;
    public $experience;
    public $employer_id;

    public function insert_job()
    {
        $this->title = $this->input->post('title');
        $this->location = $this->input->post('location');
        $this->role = $this->input->post('role');
        $this->edu_qualification = $this->input->post('edu_qualification');
        $this->experience = $this->input->post('experience');

        $email = "wakram999@gmail.com";
        $this->db->where('email',$email);
        $query = $this->db->get('employer');
        $result = $query->result_array();
        $this->employer_id = $result[0]['employer_id'];

        $this->db->insert('job',$this);
    }
    
    public function home_jobs()
    {
        $email = "wakram999@gmail.com";
        $this->db->where('email',$email);
        $query = $this->db->get('employer');
        $result = $query->result_array();
        $id = $result[0]['employer_id'];

        $this->db->where('employer_id',$id);
        $query = $this->db->get('job');
        $result = $query->result_array();
        return $result;
    }

    public function job_description_employer($id)
    {
        $job_id = $id;
        $this->db->where('job_id',$job_id);
        $query = $this->db->get('job');
        $result = $query->result_array();
        return $result;
    }

    public function applicant_details($id)
    {
        $job_id = $id;
        $query = $this->db->query("select * from applicant join address on applicant.applicant_id = address.applicant_id
                        where applicant.applicant_id IN (select applicant_id from applied_jobs where job_id=".$job_id.")");
        $result = $query->result_array();
        return $result;
    }
}