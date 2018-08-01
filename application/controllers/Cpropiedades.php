<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cpropiedades extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mpropiedades');
                $this->load->model('mopciones');
                $this->load->model('mclientes');

    }

    public function index()
    {
        $data['title'] = "Propiedades";

        $data['propiedades'] = $this->mpropiedades->get_propiedades();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('propiedades/vpropiedades',$data);
        $this->load->view('templates/footer');
    }

    public function view($str)
    {
        $data['title'] = "Ver Propiedad";

        $data['propiedad'] = $this->mpropiedades->get_propiedad($str);
        $data['tipos'] = $this->mopciones->get_tipos_propiedad();
        $data['ciudades'] = $this->mopciones->get_ciudades();
        $data['barrios'] = $this->mopciones->get_barrios();
        $data['objetivos'] = $this->mopciones->get_objetivos();
        $data['clientes'] = $this->mclientes->get_clientes();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('propiedades/vpropiedades_view',$data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $this->mpropiedades->update_propiedad();
        redirect('cpropiedades');
    }

    public function delete()
    {
        $s = $this->input->post('propiedad');
        $res = $this->mpropiedades->delete_propiedad($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create()
    {
        $data['title'] = "Crear Propiedad";

        $data['tipos'] = $this->mopciones->get_tipos_propiedad();
        $data['ciudades'] = $this->mopciones->get_ciudades();
        $data['barrios'] = $this->mopciones->get_barrios();
        $data['objetivos'] = $this->mopciones->get_objetivos();
        $data['clientes'] = $this->mclientes->get_clientes();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('propiedades/vpropiedades_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert()
    {
        $this->mpropiedades->insert_propiedad();
        redirect('cpropiedades');
    }
}
