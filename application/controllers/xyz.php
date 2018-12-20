<?php
public function google_login()
    {
        $this->load->library('session');

        $clientId = '942388262528-7mjun0r2s4vn3200rtgbn9nvguees8hh.apps.googleusercontent.com'; //Google client ID
        $clientSecret = 'yoX79PUZnsHC5lup0pqtYQ5T'; //Google client secret
        $redirectURL = 'http://localhost:8100/index.php/login/google_login';
        // $simple_api_key = 'AIzaSyBtVoXWJKpALfaa34_DqKecnKjCDyYS2bw'; 

        //Call Google API
        
        $gClient = new Google_Client();
        $gClient->setApplicationName('Jobber');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectURL);
        // $gClient->setDeveloperKey($simple_api_key);
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
       $this->applicant_home($data);
       $this->session->unset_userdata("token");
    }
    




    public function google_login()
    {
        $this->load->library('session');

        $client = new Google_Client();
        $client->setAuthConfig('/var/www/jobPortal/application/controllers/client_secret.json');
        $client->addScope('https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.email https://www.googleapis.com/auth/plus.me');

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
            $plus = new Google_Service_PeopleService($client);
            $userData = $plus->people->get('wasim');
            $data['userData'] = $userData;
            echo json_encode($userData);
        } else {
            $redirect_uri = 'http://localhost:8100/index.php/login/callback';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }

    public function callback()
    {
        $client = new Google_Client();
        $client->setAuthConfigFile('/var/www/jobPortal/application/controllers/client_secret.json');
        $client->setRedirectUri('http://localhost:8100/index.php/login/callback');
        $client->addScope('https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.email');

        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://localhost:8100/index.php/login/callback';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }