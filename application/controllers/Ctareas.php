<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctareas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mtareas');
        $this->load->model('musers');
        $this->load->model('mopciones');
    }

    public function index()
    {
        $data['title'] = "Tareas";

        $data['tareas'] = $this->mtareas->get_tareas();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tareas/vtareas',$data);
        $this->load->view('templates/footer');
    }

    public function view_tarea($str)
    {
        $data['title'] = "Ver Tarea";

        $data['tarea'] = $this->mtareas->get_tarea($str);
        $data['usuarios'] = $this->musers->get_users();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tareas/vtareas_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_tarea()
    {
        $this->mtareas->update_tarea();
        redirect('ctareas');
    }

    public function delete_tarea()
    {
        $s = $this->input->post('id_tarea');
        $res = $this->mtareas->delete_tarea($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_tarea()
    {
        $data['title'] = "Crear Tarea";

        $data['usuarios'] = $this->musers->get_users();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tareas/vtareas_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_tarea()
    {
        $this->mtareas->insert_tarea();
        redirect('ctareas');
    }

    // ----------- Cronograma ----------- //

    public function cronograma_tareas()
    {
        $data['title'] = "Cronograma de Tareas";

        $data['tusers'] = $this->musers->get_users();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tareas/vtareas_cronog_form', $data);
        $this->load->view('templates/footer');
    }

    public function cronograma_tareas_result()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache"); 
        
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['user_name'] = $this->input->post('user_name');

        $data['tareas'] = $this->mtareas->cronograma_tareas($data['fecha_desde'], $data['fecha_hasta'], $data['user_name']);

        $data['title'] = "Cronograma de Tareas";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tareas/vtareas_cronog_result',$data);
        $this->load->view('templates/footer');
    }
}
