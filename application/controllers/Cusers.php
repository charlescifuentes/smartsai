<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cusers extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('musers');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view("users/vlogin");
    }

    function login_user(){
        $user_login=array(
            'user_name'=>$this->input->post('user_name'),
            'user_password'=>md5($this->input->post('user_password'))
          );
       
        $data=$this->musers->login_user($user_login['user_name'],$user_login['user_password']);
        
        if($data)
        {
            $this->session->set_userdata('user_id',$data['user_id']);
            $this->session->set_userdata('user_email',$data['user_email']);
            $this->session->set_userdata('user_name',$data['user_name']);
            $this->session->set_userdata('user_data',$data['user_data']);
            $this->session->set_userdata('user_mobile',$data['user_mobile']);
            $this->session->set_userdata('user_rol',$data['user_rol']);
    
            redirect('chome');
        }
        else{
            $this->session->set_flashdata('error_msg', 'Usuario o Contraseña invalidos.');
            $this->load->view("users/vlogin");
        }
    }

    public function register_user()
    { 
        $user=array(
            'user_name'=>$this->input->post('user_name'),
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password')),
            'user_data'=>$this->input->post('user_data'),
            'user_mobile'=>$this->input->post('user_mobile')
        );
   
        $name_check=$this->musers->name_check($user['user_name']);
        
        if($name_check){
            $this->musers->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registro satisfactorio. Ahora ingrese a su cuenta.');
            redirect('cusers');
        }
        else{
            $this->session->set_flashdata('error_msg', '¡Este usuario ya está registrado.');
            redirect('cusers');
        }
    }

    function user_profile()
    {
        $this->load->view('users/vuser_profile');
    }

    public function user_logout()
    {
        $this->session->sess_destroy();
        redirect('cusers', 'refresh');
    }

    public function user_show()
    {
        $data['title'] = "Usuarios";

        $data['usuarios'] = $this->musers->get_users();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('users/vusuarios',$data);
        $this->load->view('templates/footer');
    }

    public function user_view($str)
    {
        $data['title'] = "Ver Usuarios";

        $data['usuario'] = $this->musers->get_user($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('users/vusuarios_view',$data);
        $this->load->view('templates/footer');
    }

    public function user_update()
    {
        $this->musers->update_user();
        redirect('cusers/user_show');
    }

    public function user_delete()
    {
        $s = $this->input->post('usuario');
        $res = $this->musers->delete_usuario($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function user_create()
    {
        $data['title'] = "Crear Usuario";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('users/vusuarios_create',$data);
        $this->load->view('templates/footer');

    }

    public function user_insert()
    {
        $user=array(
            'user_name'=>$this->input->post('user_name'),
            'user_email'=>$this->input->post('user_email'),
            'user_password'=>md5($this->input->post('user_password')),
            'user_data'=>$this->input->post('user_data'),
            'user_mobile'=>$this->input->post('user_mobile'),
            'user_rol'=>$this->input->post('user_rol')
        );
   
        $name_check=$this->musers->name_check($user['user_name']);
        
        if($name_check){
            $this->musers->register_user($user);
            $this->session->set_flashdata('success_msg', 'Registro satisfactorio. Ahora ingrese a su cuenta.');
            redirect('cusers/user_create');
        }
        else{
            $this->session->set_flashdata('error_msg', '¡Este usuario ya está registrado.');
            redirect('cusers/user_create');
        }
    }
}
