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
        $this->employer_id = $result[0]['id'];

        $this->db->insert('job',$this);
    }
    
    public function home_jobs()
    {
        $email = "wakram999@gmail.com";
        $this->db->where('email',$email);
        $query = $this->db->get('employer');
        $result = $query->result_array();
        $id = $result[0]['id'];

        $this->db->where('employer_id',$id);
        $query = $this->db->get('job');
        $result = $query->result_array();
        return $result;
    }
}