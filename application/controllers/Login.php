<?php
require_once APPPATH . "libraries/google-api-php-client/vendor/autoload.php";
include_once APPPATH . "libraries/google-api-php-client/src/Google/Client.php";
include_once APPPATH . "libraries/google-api-php-client/src/Google/Service/Oauth2.php";
// include_once APPPATH . "libraries/facebook-php-sdk/src/facebook.php";

class Login extends CI_Controller
{
    public $user = '';
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
            $this->db->where($condition);
            $que = $this->db->get('applicant');
            $row = $que->num_rows();
            if ($email != '' || $password != '') {
                if ($row) {
                    $this->session->set_userdata('user', $email);
                    $this->applicant_home();
                    return;
                } else {
                    $data['error'] = "<p style='color:red'><small>Invalid Login Credentials</small></p>";
                }
            } else {
                $data['error'] = "<p style='color:red'><small>Fill the required fields</small></p>";
            }
        }
        $this->load->view('pages/applicant_login', @$data);
    }
    public function google_login()
    {
        $this->load->library('session');

        $clientId = '942388262528-patvolh6687vr83sm8l5qd2pc7lv341s.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'z9G0h0evUBOAFLDlxV26m4kw'; //Google client secret
        $redirectURL = 'http://localhost:8100/index.php/login/google_login';
        $simple_api_key = 'AIzaSyBtVoXWJKpALfaa34_DqKecnKjCDyYS2bw';

        //Call Google API
        
        $gClient = new Google_Client();
        $gClient->setApplicationName('Jobber');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        $gClient->setDeveloperKey($simple_api_key);
        $gClient->addScope('https://www.googleapis.com/auth/userinfo.email');

        // $google_oauthV2 = new Google_Oauth2Service($gClient);
        $google_oauthV2 = new Google_Service_Oauth2($gClient);

        if (isset($_GET['code'])) {
            $gClient->authenticate($_GET['code']);
            $this->session->set_userdata("token", $gClient->getAccessToken());
            header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $gClient->setAccessToken($_SESSION['token']);
        }

        if ($gClient->getAccessToken()) {
            $userData = $google_oauthV2->userinfo->get();
            $data['userData'] = $userData;
            $this->session->set_userdata("token", $gClient->getAccessToken());
        } else {
            $url = $gClient->createAuthUrl();
            header('Location: '.$url);
        }
        $this->applicant_home();
    }
    
    
    public function applicant_home()
    {
        redirect('index.php/applicant/applicant_home');
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

            $this->db->where('email', $email);
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

    // public function facebook_login()
    // {
    //     $this->load->library('Facebook', array('appId' => '2112236655489845', 'secret' => 'f00c2dd76b6a39095c720c5e7641a857'));
    //     // Get user's login information
    //     $this->user = $this->facebook->getUser();
    //     if ($this->user) {
    //         $data['user_profile'] = $this->facebook->api('/me/');
    //         // Get logout url of facebook
    //         // $data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'index.php/oauth_login/logout'));
    //         // Send data to profile page
    //         $this->load->view('pages/home_applicant', $data);
    //     } else {
    //         // Store users facebook login url
    //         $data['login_url'] = $this->facebook->getLoginUrl();
    //         $this->load->view('pages/home_applicant', $data);
    //     }
    // }
}
