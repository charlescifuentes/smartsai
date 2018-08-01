<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cegresos extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('megresos');
                $this->load->model('mopciones');
                $this->load->model('mclientes');
    }

    public function index()
    {
        $data['title'] = "Egresos";

        $data['egresos'] = $this->megresos->get_egresos();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('egresos/vegresos',$data);
        $this->load->view('templates/footer');
    }

    public function view($str)
    {
        $data['title'] = "Ver Egreso";

        $data['egreso'] = $this->megresos->get_egreso($str);
        $data['tegresos'] = $this->mopciones->get_tipos_egreso();
        $data['clientes'] = $this->mclientes->get_clientes();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('egresos/vegresos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->megresos->update_egreso();
        redirect('cegresos');
    }

    public function create()
    {
        $data['title'] = "Registrar Egreso";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();
        $data['clientes'] = $this->mclientes->get_clientes();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('egresos/vegresos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert()
    {
        $this->megresos->insert_egreso();
        redirect('cegresos');
    }

    public function delete()
    {
        $s = $this->input->post('egreso');
        $res = $this->megresos->delete_egreso($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }
}