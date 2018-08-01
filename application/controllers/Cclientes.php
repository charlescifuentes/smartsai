<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cclientes extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mclientes');
                $this->load->model('mopciones');
    }

    public function index()
    {
        $data['title'] = "Clientes";

        $data['clientes'] = $this->mclientes->get_clientes();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('clientes/vclientes',$data);
        $this->load->view('templates/footer');
    }

    public function view($str)
    {
        $data['title'] = "Ver Cliente";

        $data['cliente'] = $this->mclientes->get_cliente($str);
        $data['tpropiedades'] = $this->mopciones->get_tipos_propiedad();
        $data['tclientes'] = $this->mopciones->get_tipos_cliente();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('clientes/vclientes_view',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->mclientes->update_cliente();
        redirect('cclientes');
    }

    public function delete()
    {
        $s = $this->input->post('cliente');
        $res = $this->mclientes->delete_cliente($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create()
    {
        $data['title'] = "Crear Cliente";

        $data['tpropiedades'] = $this->mopciones->get_tipos_propiedad();
        $data['tclientes'] = $this->mopciones->get_tipos_cliente();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('clientes/vclientes_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert()
    {
        $this->mclientes->insert_cliente();
        redirect('cclientes');
    }
}
