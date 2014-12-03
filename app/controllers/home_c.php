<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home_c extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('home_m');
    }
	public function index()
	{
		// load model gusetbook
		
	   if(!$this->session->userdata('logged_in'))
        {
            redirect('login');
        }
	
		// get data
		$data['contacts'] = $this->home_m->GetContacts();
		$data['numerocontatti'] = count($data['contacts']);

		// show view
		$this->load->view('home_v', $data);
	}

	/* inseriamo un nuovo contatto */
	public function newContact()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'nome', 'trim|required|htmlspecialchars');
		$this->form_validation->set_rules('cognome', 'cognome', 'trim|htmlspecialchars');
		$this->form_validation->set_rules('email', 'email', 'valid_email');
		$this->form_validation->set_rules('viaIndirizzo', 'viaIndirizzo', 'trim|htmlspecialchars');
		$this->form_validation->set_rules('viaCitta', 'viaCitta', 'trim|htmlspecialchars');
		$this->form_validation->set_rules('viaCap', 'viaCap', 'trim|htmlspecialchars');
		$this->form_validation->set_rules('numeroCasa', 'NumeroCasa', 'trim|htmlspecialchars|numeric');
		$this->form_validation->set_rules('numeroCell', 'numeroCell', 'trim|htmlspecialchars|numeric');
		
		if($this->form_validation->run()==TRUE){
			// insert comment
			$this->load->model('home_m');
			$this->home_m->AddContact(
							$this->input->post('nome'), 
							$this->input->post('cognome'), 
							$this->input->post('email'),
							$this->input->post('viaIndirizzo'),
							$this->input->post('viaCitta'),
							$this->input->post('viaCap'),
							$this->input->post('numeroCasa'),
							$this->input->post('numeroCell')
							);
			// redirect
			redirect('home_c');
			}
		else{
			// error validation
			echo validation_errors();
			}
		}
    public function removeContact()
	{
	    $result = $this->home_m->DeleteContactById($this->input->post('id'));
	    if($result >0 ) echo 1;
	    else echo $this->input->post('id');
	}
}