<?php
class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }
 
    public function applicant_registration()
    {
        if ($this->input->post('register')) {
            $first_name=$this->input->post('first_name');
            $last_name=$this->input->post('last_name');
            $email=$this->input->post('email');
            $age=$this->input->post('age');
            $gender=$this->input->post('gender');
            $phone=$this->input->post('phone');
            $password=$this->input->post('password');
            $password2=$this->input->post('confirm_password');
            $edu_qualification=$this->input->post('edu_qualification');
            $addres1=$this->input->post('address1');
            $address2=$this->input->post('address2');
            $city=$this->input->post('city');
            $state=$this->input->post('state');
            $country=$this->input->post('country');
            $pincode=$this->input->post('pincode');

            $hashed_pass = hash('sha512', $password);
            $hash = md5(rand(0, 1000));
            $data['hash']=$hash;

            $que=$this->db->query("select * from applicant where email='".$email."'");
            $row = $que->num_rows();
            if ($first_name=='' || $last_name=='' || $email=='' || $age=='' || $gender=='' || $phone=='' || $password=='' || $password2=='' || $edu_qualification=='') {
                $data['error']="<p style='color:red'><small>Fill the required fields</small></p>";
            } elseif ($password!=$password2) {
                $data['password_error']="<p style='color:red'><small>The password doesn't match</small></p>";
            } elseif ($row) {
                $data['error']="<p style='color:red'><small>This user already exists</small></p>";
            } else {
                $que=$this->db->query("insert into applicant(firstname,lastname,age,gender,email,password,phone,edu_qualification,hash) values('$first_name','$last_name','$age','$gender','$email','$hashed_pass','$phone','$edu_qualification','$hash')");
                $this->db->where('email', $email);
                $query = $this->db->get('applicant');
                $data = $query->result_array();
                $address = array(
                        'addressLine1'=> $addres1,
                        'addressLine2'=> $address2,
                        'city'=>$city,
                        'state'=> $state,
                        'country'=> $country,
                        'pincode'=> $pincode,
                        'applicant_id'=> $data[0]['applicant_id']
                );
                $this->db->insert('address', $address);
                $this->send_confirmation($hash);
                return;
            }
        }
        $this->load->view('pages/applicant_registration', @$data);
    }
    public function confirmation_message()
    {
        $this->load->view('pages/confirmation_msg');
    }

    public function send_confirmation($hash)
    {
        $config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'wakram999@gmail.com',
                'smtp_pass' => 'ashiqkuttan',
                'mailtype'  => 'html',
                'charset'   => 'utf-8'
            );
        $this->load->library('email', $config);

        $this->email->initialize($config);

        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $message= /*-----------email body starts-----------*/
        'Thanks for signing up, '.$_POST['first_name'].' '.$_POST['last_name'].'!
        <br><br>
        Your account has been created. <br>
        Here are your login details.<br>
        ------------------------------------------------------<br>
        Email   : ' . $_POST['email'] . '<br>
        Password: ' . $_POST['password'] . '<br>
        ------------------------------------------------------<br>
                        <br>
        Please click this link to activate your account:<br>
            
        ' . base_url() . 'index.php/register/activate?' .
        'email=' . $_POST['email'] . '&hash=' . $hash ;
        /*-----------email body ends-----------*/

        $subject="Welcome to MySite!";	//subject
        $this->email->from('admin@jobber.com', 'Jobber');
        $this->email->to($_POST['email']);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            $this->confirmation_message();
        } else {
            show_error($this->email->print_debugger());
        }
    }
    public function activate()
    {
        $email = $_GET['email'];
        $hash = $_GET['hash'];

        $data = array(
                'is_verified' => 1
        );
        if ($this->db->update('applicant', $data, array('email'=>$email,'hash'=>$hash))) {
            $this->load->view('pages/confirmed');
        } else {
            echo "failed";
        }
    }
    public function applicant_login()
    {
        redirect('index.php/login/applicant_login');
    }

    public function employer_registration()
    {
        if ($this->input->post('register')) {
            $name=$this->input->post('name');
            $email=$this->input->post('email');
            $phone=$this->input->post('phone');
            $password=$this->input->post('password');
            $password2=$this->input->post('confirm_password');
            $location=$this->input->post('location');
            $about=$this->input->post('about');

            $hashed_pass = hash('sha512', $password);
    
            $que=$this->db->query("select * from employer where email='".$email."'");
            $row = $que->num_rows();
            if ($name=='' || $email==''|| $phone=='' || $password=='' || $password2=='' || $location=='' ||$about == '') {
                $data['error']="<p style='color:red'><small>Fill the required fields</small></p>";
            } elseif ($password!=$password2) {
                $data['password_error']="<p style='color:red'><small>The password doesn't match</small></p>";
            }
            //      elseif ($row) {
            //         $data['error']="<p style='color:red'><small>This user already exists</small></p>";}
            else {
                $que=$this->db->query("insert into employer(name,email,password,phone,location,about) values('$name','$email','$hashed_pass','$phone','$location','$about')");
                $this->employer_login();
                return;
                //     $this->db->where('email',$email);
                //     $query = $this->db->get('employer');
                //     $data = $query->result_array();
            }
        }
        $this->load->view('pages/employer_registration', @$data);
    }
    public function employer_login()
    {
        redirect('index.php/login/employer_login');
    }
}
