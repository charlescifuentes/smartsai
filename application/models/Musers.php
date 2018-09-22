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

    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('sai_users');
        return $query = $this->db->get()->result_array();
    }

    public function get_user($str)
    {
        $this->db->select('*');
        $this->db->from('sai_users');
        $this->db->where('user_id',$str);
        return $query = $this->db->get()->row_array();
    }

    public function update_user()
    {
        $user_id = $this->input->post('user_id');

        $data = array(
            'user_name' => $this->input->post('user_name'),
            'user_email' => $this->input->post('user_email'),
            'user_data' => $this->input->post('user_data'),
            'user_mobile' => $this->input->post('user_mobile'),
            'user_rol' => $this->input->post('user_rol')
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('sai_users', $data);
    }

    public function delete_usuario($id)
    {
        if ( ! $this->db->delete('sai_users', array('user_id' => $id)))
        {
            return $error = $this->db->error(); // Has keys 'code' and 'message'
        }
        else{
            return 1;
        }
    }
}
