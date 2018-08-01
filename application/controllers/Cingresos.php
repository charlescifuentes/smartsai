<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cingresos extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mingresos');
                $this->load->model('mopciones');
                $this->load->model('mclientes');
    }

    public function index()
    {
        $data['title'] = "Ingresos";

        $data['ingresos'] = $this->mingresos->get_ingresos();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('ingresos/vingresos',$data);
        $this->load->view('templates/footer');
    }

    public function view($str)
    {
        $data['title'] = "Ver Ingreso";

        $data['ingreso'] = $this->mingresos->get_ingreso($str);
        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();
        $data['clientes'] = $this->mclientes->get_clientes();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('ingresos/vingresos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->mingresos->update_ingreso();
        redirect('cingresos');
    }

    public function create()
    {
        $data['title'] = "Registrar Ingreso";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();
        $data['clientes'] = $this->mclientes->get_clientes();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('ingresos/vingresos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert()
    {
        $this->mingresos->insert_ingreso();
        redirect('cingresos');
    }

    public function delete()
    {
        $s = $this->input->post('ingreso');
        $res = $this->mingresos->delete_ingreso($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }
}