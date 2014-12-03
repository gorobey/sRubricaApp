<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_m extends CI_Model{
	
	// CREATE
	public function AddContact($nome, $cognome, $email,$viaindirizzo, $indirizzoCitta, $indirizzoCap,  $numeroCasa, $numeroCell )
	{
    	$idutente= $this->session->userdata('logged_in')['id'];
    	$cognome= $cognome ? $cognome : null;
        $emai= $email ? $email : null;
        $viaindirizzo = $viaindirizzo? $viaindirizzo : null;
        $indirizzoCitta= $indirizzoCitta? $indirizzoCitta : null;
        $indirizzoCap= $indirizzoCap? $indirizzoCap : "null";
        $numeroCell= $numeroCell ? $numeroCell : "null";
        $numeroCasa= $numeroCasa ? $numeroCasa : "null";
        $data = array(
            'nome' => $nome,
            'cognome' => $cognome,
            'email' => $email,
            'viaindirizzo' => $viaindirizzo,
            'viacitta' => $indirizzoCitta ,
            'viacap' => (int) $indirizzoCap ,
            'numerocasa' => (int) $numeroCasa ,
            'numerocell' => (int) $numeroCell ,
            'idutente' => $idutente ,
            );
        $this->db->insert('contatto', $data);
        return $this->db->insert_id();  
//        $query= 'INSERT INTO contatto (nome, cognome, email, viaindirizzo, viacitta, viacap, numerocasa, numerocell, idutente) VALUES (\''. $nome .'\', \''. $cognome.'\', \''. $email.'\', \''. $indirizzoVia .'\', \''. $indirizzoCitta.'\', '. $indirizzoCap.',  '. $numeroCasa.', '. $numeroCell.', '. $idutente.')';
//        $toreturn = $this->db->query($query);
            
//    	return $toreturn;
    }


	// READ
	public function GetContacts($id=null){
		if(!is_null($id))
		{
			$this->db->where('id', $id);
		}
		$this->db->order_by('cognome', 'desc');
		$this->db->where('idutente', $this->session->userdata('logged_in')['id']);
		$query = $this->db->get('contatto');
		return $query->result();
		}
	
	// UPDATE
	function update($id, $data){
		$this->db->where('id', $id);
		$this->db->update('guestbook', $data);
		}


	// DELETE
	public function DeleteContactById($id){	
		$this->db->where('id', $id);
		$this->db->delete('contatto');
		return $this->db->affected_rows();
		}

}


