<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Musers extends CI_model{

    public function register_user($user)
    {
        $this->db->insert('sai_users', $user);
    }

    public function login_user($name,$pass)
    {
        $this->db->select('*');
        $this->db->from('sai_users');
        $this->db->where('user_name',$name);
        $this->db->where('user_password',$pass);
    
        if($query=$this->db->get())
        {
            return $query->row_array();
        }
        else{
            return false;
        }
    }

    public function name_check($name)
    {
        $this->db->select('*');
        $this->db->from('sai_users');
        $this->db->where('user_name',$name);
        $query=$this->db->get();
    
        if($query->num_rows()>0){
            return false;
        }else{
            return true;
        }
    }
}
