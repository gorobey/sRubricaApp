<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_m extends CI_Model{
	/**
	 * crud
	 */
	// CREATE
	public function AddContact($name, $surname, $email, $numeroCell, $numeroCasa, $indirizzoVia, $indirizzoCap, $indirizzoCitta){
		$data = array(
				'nome' 		=> $name,
				'cognome' 		=> $surname,
				'email' 	=> $surname,
				'viaIndirizzo' 		=> $indirizzoVia,
				'viaCitta' 		=> $indirizzoCitta,
				'viaCap' 		=> $indirizzoCap,
				'numeroCasa' 		=> $numeroCasa,
				'numeroCell' 		=> $numeroCell,	
				'idutente'=> $this->session->userdata('id')
				);
		$this->db->insert('contatto', $data);
		return $this->db->insert_id();
		}


	// READ
	public function GetContacts($id=null){
		if(!is_null($id))
		{
			$this->db->where('id', $id);
		}
		$this->db->order_by('cognome', 'desc');
		$this->db->where('idutente', $this->session->userdata('id'));
		$query = $this->db->get('contatto');
		return $query->result();
		}
	
	// UPDATE
	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('guestbook', $data);
		}


	// DELETE
	public function DeleteCommetById($id){	
		$this->db->where('id', $id);
		$this->db->delete('guestbook');
		return $this->db->affected_rows();
		}

}


/*
class Contacts extends IC_models
{
    public function creaContatto($nome, $cognome, $email, $viaIndirizzo, $viaCap, $viaCitta, $numeroCell, $numeroCasa)
    { 
        $query = "INSERT INTO(nome, cognome, email, viaindirizzo, viacap, viacitta, numerocell, numerocasa) VALUES 
        (
        '$nome',
        '". ($cognome!= null)? $cognome : "NULL" . "',
        '". ($email!= null)? $email : "NULL" . "'.
        ''". ($viaIndirizzo != null)? $viaIndirizzo : "NULL" . "',
        '". ($viaCitta != null)? $viaCitta : "NULL" . "',
        '". ($viaCap!= null)? $viaCap : "NULL" . "'
        '". ($numerocell != null)? $numeroCell : "NULL" . "',
        '". ($numeroCasa != null)? $numeroCasa : "NULL" . "',
        ";
        $this->db->query($query);
    }
    
    public function modificaContatto()
    {
        
    }
    
    public function eliminaContatto()
    {
    }
    
}*/

