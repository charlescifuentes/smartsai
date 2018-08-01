<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Copciones extends CI_Controller {

    public function __construct()
    {
                parent::__construct();
                $this->load->model('mopciones');
    }

    /* --------------------- Tipos de propiedades---------------------------------------------------- */
    public function tipos_propiedad()
    {
        $data['title'] = "Tipos";

        $data['tipos'] = $this->mopciones->get_tipos_propiedad();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_propiedad/vopciones_tipos',$data);
        $this->load->view('templates/footer');
    }

    public function view_tipo_propiedad($str)
    {
        $data['title'] = "Ver Tipo Propiedad";

        $data['tipo'] = $this->mopciones->get_tipo_propiedad($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_propiedad/vopciones_tipos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_tipo_propiedad()
    {
        $this->mopciones->update_tipo_propiedad();
        redirect('copciones/tipos_propiedad');
    }

    public function delete_tipo_propiedad()
    {
        $s = $this->input->post('tipo');
        $res = $this->mopciones->delete_tipo_propiedad($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_tipo_propiedad()
    {
        $data['title'] = "Crear Tipo";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_propiedad/vopciones_tipos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_tipo_propiedad()
    {
        $this->mopciones->insert_tipo_propiedad();
        redirect('copciones/tipos_propiedad');
    }

    /* --------------------- Barrios -------------------------------------------------- */
    public function barrios()
    {
        $data['title'] = "Barrios";

        $data['barrios'] = $this->mopciones->get_barrios();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/barrios/vopciones_barrios',$data);
        $this->load->view('templates/footer');
    }

    public function view_barrio($str)
    {
        $data['title'] = "Ver Barrios";

        $data['barrio'] = $this->mopciones->get_barrio($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/barrios/vopciones_barrios_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_barrio()
    {
        $this->mopciones->update_barrio();
        redirect('copciones/barrios');
    }

    public function delete_barrio()
    {
        $s = $this->input->post('barrio');
        $res = $this->mopciones->delete_barrio($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_barrio()
    {
        $data['title'] = "Crear Barrio";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/barrios/vopciones_barrios_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_barrio()
    {
        $this->mopciones->insert_barrio();
        redirect('copciones/barrios');
    }

    /* --------------------- Objetivos ------------------------------------------------ */

    public function objetivos()
    {
        $data['title'] = "Objetivos";

        $data['objetivos'] = $this->mopciones->get_objetivos();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/objetivos/vopciones_objetivos',$data);
        $this->load->view('templates/footer');
    }

    public function view_objetivo($str)
    {
        $data['title'] = "Ver Objetivos";

        $data['objetivo'] = $this->mopciones->get_objetivo($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/objetivos/vopciones_objetivos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_objetivo()
    {
        $this->mopciones->update_objetivo();
        redirect('copciones/objetivos');
    }

    public function delete_objetivo()
    {
        $s = $this->input->post('objetivo');
        $res = $this->mopciones->delete_objetivo($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_objetivo()
    {
        $data['title'] = "Crear Objetivo";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/objetivos/vopciones_objetivos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_objetivo()
    {
        $this->mopciones->insert_objetivo();
        redirect('copciones/objetivos');
    }

    /* --------------------- Tipos de Clientes ------------------------------------------------ */

    public function tipos_cliente()
    {
        $data['title'] = "Tipos de Clientes";

        $data['tipos'] = $this->mopciones->get_tipos_cliente();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_cliente/vopciones_tipos',$data);
        $this->load->view('templates/footer');
    }

    public function view_tipo_cliente($str)
    {
        $data['title'] = "Ver Tipo Cliente";

        $data['tipo'] = $this->mopciones->get_tipo_cliente($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_cliente/vopciones_tipos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_tipo_cliente()
    {
        $this->mopciones->update_tipo_cliente();
        redirect('copciones/tipos_cliente');
    }

    public function delete_tipo_cliente()
    {
        $s = $this->input->post('tipo');
        $res = $this->mopciones->delete_tipo_cliente($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_tipo_cliente()
    {
        $data['title'] = "Crear Tipo";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_cliente/vopciones_tipos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_tipo_cliente()
    {
        $this->mopciones->insert_tipo_cliente();
        redirect('copciones/tipos_cliente');
    }

    /* --------------------- Ciudades ------------------------------------------------- */

    public function ciudades()
    {
        $data['title'] = "Ciudades";

        $data['ciudades'] = $this->mopciones->get_ciudades();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/ciudades/vopciones_ciudades',$data);
        $this->load->view('templates/footer');
    }

    public function view_ciudad($str)
    {
        $data['title'] = "Ver Ciudad";

        $data['ciudad'] = $this->mopciones->get_ciudad($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/ciudades/vopciones_ciudades_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_ciudad()
    {
        $this->mopciones->update_ciudad();
        redirect('copciones/ciudades');
    }

    public function delete_ciudad()
    {
        $s = $this->input->post('ciudad');
        $res = $this->mopciones->delete_ciudad($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_ciudad()
    {
        $data['title'] = "Crear Ciudad";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/ciudades/vopciones_ciudades_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_ciudad()
    {
        $this->mopciones->insert_ciudad();
        redirect('copciones/ciudades');
    }

    /* --------------------- Tipos de Ingresos ------------------------------------------------ */

    public function tipos_ingreso()
    {
        $data['title'] = "Tipos de Ingresos";

        $data['tipos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_ingreso/vopciones_tipos',$data);
        $this->load->view('templates/footer');
    }

    public function view_tipo_ingreso($str)
    {
        $data['title'] = "Ver Tipo Ingreso";

        $data['tipo'] = $this->mopciones->get_tipo_ingreso($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_ingreso/vopciones_tipos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_tipo_ingreso()
    {
        $this->mopciones->update_tipo_ingreso();
        redirect('copciones/tipos_ingreso');
    }

    public function delete_tipo_ingreso()
    {
        $s = $this->input->post('tipo');
        $res = $this->mopciones->delete_tipo_ingreso($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_tipo_ingreso()
    {
        $data['title'] = "Crear Tipo";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_ingreso/vopciones_tipos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_tipo_ingreso()
    {
        $this->mopciones->insert_tipo_ingreso();
        redirect('copciones/tipos_ingreso');
    }

    /* --------------------- Tipos de Egresos ------------------------------------------------ */

    public function tipos_egreso()
    {
        $data['title'] = "Tipos de Egresos";

        $data['tipos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_egreso/vopciones_tipos',$data);
        $this->load->view('templates/footer');
    }

    public function view_tipo_egreso($str)
    {
        $data['title'] = "Ver Tipo Egreso";

        $data['tipo'] = $this->mopciones->get_tipo_egreso($str);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_egreso/vopciones_tipos_view',$data);
        $this->load->view('templates/footer');
    }

    public function update_tipo_egreso()
    {
        $this->mopciones->update_tipo_egreso();
        redirect('copciones/tipos_egreso');
    }

    public function delete_tipo_egreso()
    {
        $s = $this->input->post('tipo');
        $res = $this->mopciones->delete_tipo_egreso($s);

        if($res == 1){
            echo json_encode($res);
        }else{
            echo json_encode($res);
        }
    }

    public function create_tipo_egreso()
    {
        $data['title'] = "Crear Tipo";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('opciones/tipos_egreso/vopciones_tipos_create',$data);
        $this->load->view('templates/footer');

    }

    public function insert_tipo_egreso()
    {
        $this->mopciones->insert_tipo_egreso();
        redirect('copciones/tipos_egreso');
    }
}
