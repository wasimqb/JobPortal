<?php
class User_model extends CI_Model 
{
        public function __construct()
        {
                $this->load->database();
        }
        public function get_users($type = 'user')
        {
                    $query = $this->db->get('users');
                    return $query->result_array();
        }
        public function set_user()
        {
                $this->load->helper('url');

                //$type = url_title($this->input->post('title'), 'dash', TRUE);

                $data = array(
                        'name' => $this->input->post('name'),
                        //'slug' => $slug,
                        'address' => $this->input->post('address')
                );

                return $this->db->insert('users', $data);
        }
}
