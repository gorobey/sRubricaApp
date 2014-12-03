<?php
class User extends CI_Model
{
    /**
     * Permette di loggare un utente e riconsocere se si tratta di uno studente o un professore.
     */
    function login($email, $password)
    {
        $this -> db -> select('id, email, password');
        $this -> db -> from('utente');
        $this -> db -> where('email', $email);
        $this -> db -> where('password', MD5($password));
        $this -> db -> limit(1);
        
        $query = $this -> db -> get();
        
        if($query -> num_rows() == 1)
        {
         return $query->result();
        }
        else
        {
         return false;
        }
    }
    
 
    public function register_user($nome, $sex, $email, $password)
    {
        $data = array 
        (
            'nome' => $nome,
            'sex' => $sex,
            'email' => $email,
            'password' => $password
        );

        $this -> db -> insert('utente', $data);
        return true;
    }
}
