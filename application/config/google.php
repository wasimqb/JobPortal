<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '942388262528-215lq0oi8gn6c850gh83ijqht3mam654.apps.googleusercontent.com';
$config['google']['client_secret']    = 'aoSoCB16xkBQdi4Z4QcNR_Fp';
$config['google']['redirect_uri']     = 'http://localhost:8100/index.php/login/applicant_home';
$config['google']['application_name'] = 'Login to Jobber.com';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();