<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctareas extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Tareas";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('tareas/vtareas',$data);
        $this->load->view('templates/footer');
    }
}
