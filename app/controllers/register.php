<?php

class Register extends CI_Controller
{
    private $errorMessage = 1;
    function index()
    {
        echo "Qualcosa e' successa! :)";
        
        $this->load->model('user');
        
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|callback_check_database');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('passwordagain', 'Password Again', 'trim|required|xss_clean|callback_same_password');
        if($this->form_validation->run() && $this->input->post('passwordagain'))
        {
            
            $this->user->register($this->input->post('email'), $this->input->post('password'));
            
        }
        echo $this->errorMessage;

    }
    
    function check_database($email)
    {
        $res = $this->user->existingUser($email);
        if($res)
        {
            $this->errorMessage = 2;
            return false;
        }
        return true;
    }
    
    function same_password($passwordagain)
    {
        if( $this->input->post('password') == $passwordagain)
            return true;
       
        if($this->errorMessage == 2) $this->errorMessage = 4;
        else $this->errorMessage = 3;
        return false;
    }



}