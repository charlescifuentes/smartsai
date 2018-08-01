<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Creportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mopciones');
        $this->load->model('mclientes');
        $this->load->model('mreportes');
        $this->load->model('mpropiedades');
    }

    /* ------------------ Reporte Clientes --------------------------------- */

    public function report_clientes()
    {
        $data['title'] = "Formulario Reporte de Clientes";

        $data['tclientes'] = $this->mopciones->get_tipos_cliente();
        $data['tpropiedades'] = $this->mopciones->get_tipos_propiedad();
        $data['nom_clientes'] = $this->mclientes->get_clientes();


        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/clientes/vreportes_clientes_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_clientes_result()
    {
        $data['id_tipo_cliente'] = $this->input->post('tipo_cliente');
        $data['id_interes'] = $this->input->post('interes');
        $data['presupuesto_desde'] = $this->input->post('presupuesto_desde');
        $data['presupuesto_hasta'] = $this->input->post('presupuesto_hasta');
        $data['cliente_nombre'] = $this->input->post('cliente_nombre');
        $data['cli_activo'] = $this->input->post('cli_activo');

        $data['results'] = $this->mreportes->clientes_report($data['id_tipo_cliente'], $data['id_interes'], $data['presupuesto_desde'], $data['presupuesto_hasta'], $data['cliente_nombre'], $data['cli_activo']);

        $data['title'] = "Reporte de Clientes Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/clientes/vreportes_clientes_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_clientes($id_tipo_cliente, $id_interes, $presupuesto_desde, $presupuesto_hasta, $cliente_nombre, $cli_activo)
    {
        $data['id_tipo_cliente'] = $id_tipo_cliente;
        $data['id_interes'] = $id_interes;
        $data['presupuesto_desde'] = $presupuesto_desde;
        $data['presupuesto_hasta'] = $presupuesto_hasta;
        $data['cliente_nombre'] = $cliente_nombre;
        $data['cli_activo'] = $cli_activo;

        $data['results'] = $this->mreportes->clientes_report($data['id_tipo_cliente'], $data['id_interes'], $data['presupuesto_desde'], $data['presupuesto_hasta'], $data['cliente_nombre'], $data['cli_activo']);

        $data['title'] = "Reporte de Clientes Impresi�n";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/clientes/vreportes_clientes_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Propiedades --------------------------------- */

    public function report_propiedades()
    {
        $data['title'] = "Formulario Reporte de Propiedades";

        $data['tpropiedades'] = $this->mopciones->get_tipos_propiedad();
        $data['ciudades'] = $this->mopciones->get_ciudades();
        $data['barrios'] = $this->mopciones->get_barrios();
        $data['objetivos'] = $this->mopciones->get_objetivos();
        $data['propiedades'] = $this->mpropiedades->get_propiedades();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/propiedades/vreportes_propiedades_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_propiedades_result()
    {
        $data['id_tipo_propiedad'] = $this->input->post('tipo_propiedad');
        $data['id_ciudad'] = $this->input->post('ciudad');
        $data['id_barrio'] = $this->input->post('barrio');
        $data['precio_desde'] = $this->input->post('precio_desde');
        $data['precio_hasta'] = $this->input->post('precio_hasta');
        $data['id_objetivo'] = $this->input->post('objetivo');
        $data['prop_activo'] = $this->input->post('prop_activo');

        $data['results'] = $this->mreportes->propiedades_report($data['id_tipo_propiedad'], $data['id_ciudad'], $data['id_barrio'], $data['precio_desde'], $data['precio_hasta'], $data['id_objetivo'], $data['prop_activo']);

        $data['title'] = "Reporte de Propiedades Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/propiedades/vreportes_propiedades_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_propiedades($id_tipo_propiedad, $id_ciudad, $id_barrio, $precio_desde, $precio_hasta, $id_objetivo, $prop_activo)
    {
        $data['id_tipo_propiedad'] = $id_tipo_propiedad;
        $data['id_ciudad'] = $id_ciudad;
        $data['id_barrio'] = $id_barrio;
        $data['precio_desde'] = $precio_desde;
        $data['precio_hasta'] = $precio_hasta;
        $data['id_objetivo'] = $id_objetivo;
        $data['prop_activo'] = $prop_activo;

        $data['results'] = $this->mreportes->propiedades_report($data['id_tipo_propiedad'], $data['id_ciudad'], $data['id_barrio'], $data['precio_desde'], $data['precio_hasta'], $data['id_objetivo'], $data['prop_activo']);

        $data['title'] = "Reporte de Propiedades Impresi�n";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/propiedades/vreportes_propiedades_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Ingresos Detallado --------------------------------- */

    public function report_ingresos_detalle()
    {
        $data['title'] = "Formulario Reporte de Ingresos Detallado";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos/detallado/vreportes_ingresos_detalle_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_ingresos_detalle_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = $this->input->post('tipo_ingreso');

        $data['results'] = $this->mreportes->ingresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Detallado Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos/detallado/vreportes_ingresos_detalle_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_ingresos_detalle($fecha_desde, $fecha_hasta, $tipo_ingreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = $tipo_ingreso;

        $data['results'] = $this->mreportes->ingresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Detallado Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos/detallado/vreportes_ingresos_detalle_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Ingresos Resumido --------------------------------- */

    public function report_ingresos_resumen()
    {
        $data['title'] = "Formulario Reporte de Ingresos Resumidos";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos/resumido/vreportes_ingresos_resumen_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_ingresos_resumen_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = $this->input->post('tipo_ingreso');

        $data['results'] = $this->mreportes->ingresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Resumidos";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos/resumido/vreportes_ingresos_resumen_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_ingresos_resumen($fecha_desde, $fecha_hasta, $tipo_ingreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = $tipo_ingreso;

        $data['results'] = $this->mreportes->ingresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Resumidos - Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos/resumido/vreportes_ingresos_resumen_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Egresos Detallado --------------------------------- */

    public function report_egresos_detalle()
    {
        $data['title'] = "Formulario Reporte de Egresos Detallado";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos/detallado/vreportes_egresos_detalle_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_egresos_detalle_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_egreso'] = $this->input->post('tipo_egreso');

        $data['results'] = $this->mreportes->egresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Detallado Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos/detallado/vreportes_egresos_detalle_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_egresos_detalle($fecha_desde, $fecha_hasta, $tipo_egreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_egreso'] = $tipo_egreso;

        $data['results'] = $this->mreportes->egresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Detallado Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos/detallado/vreportes_egresos_detalle_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Egresos Resumido --------------------------------- */

    public function report_egresos_resumen()
    {
        $data['title'] = "Formulario Reporte de Egresos Resumidos";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos/resumido/vreportes_egresos_resumen_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_egresos_resumen_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_egreso'] = $this->input->post('tipo_egreso');

        $data['results'] = $this->mreportes->egresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Resumidos";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos/resumido/vreportes_egresos_resumen_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_egresos_resumen($fecha_desde, $fecha_hasta, $tipo_egreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_egreso'] = $tipo_egreso;

        $data['results'] = $this->mreportes->egresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Resumidos - Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos/resumido/vreportes_egresos_resumen_print',$data);
        $this->load->view('templates/footer');
    }
}
