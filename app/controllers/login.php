<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            redirect('home_c', 'refresh');
        }
        $this->load->view('login_view');
    }
}
?>