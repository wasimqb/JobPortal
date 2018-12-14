<?php
class Users extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('User_model');
            $this->load->helper('url_helper');
        }

        public function view($type = 'user')
        {
            $data['user'] = $this->User_model->get_users();
            $data['title'] = 'User Details';

            $this->load->view('templates/header', $data);
            $this->load->view('Users/index', $data);
            $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $data['title'] = 'Create a user';

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('Users/create');
                $this->load->view('templates/footer');
            }
            else
            {
                $this->User_model->set_user();
                $data['user'] = $this->User_model->get_users();
                $data['title'] = 'User Details';
                $this->load->view('templates/header', $data);
                $this->load->view('Users/index', $data);
                $this->load->view('templates/footer');
            }
        }
}