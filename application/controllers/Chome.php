<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhome');
        $this->load->model('mopciones');
        $this->load->model('mclientes');
        $this->load->model('mtareas');
    }

    public function index()
    {
        $data['title'] = "Panel de Control";

        $data['propiedades'] = $this->mhome->get_last_propiedades();
        $data['clientes'] = $this->mhome->get_last_clientes();
        $data['tareas'] = $this->mtareas->get_tareas_today();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }
}
