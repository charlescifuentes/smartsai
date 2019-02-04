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

    public function modal_cliente() 
    {
        $s = $this->input->post('id_cliente');
        $res = $this->mreportes->cliente_modal($s);

        echo json_encode($res);
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

    /* ------------------ Reporte Ingresos Fijos Detallado --------------------------------- */

    public function report_ingresosf_detalle()
    {
        $data['title'] = "Formulario Reporte de Ingresos Fijos Detallado";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_fijos/detallado/vreportes_ingresosf_detalle_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_ingresosf_detalle_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = $this->input->post('tipo_ingreso');

        $data['results'] = $this->mreportes->ingresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Fijos Detallado Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_fijos/detallado/vreportes_ingresosf_detalle_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_ingresosf_detalle($fecha_desde, $fecha_hasta, $tipo_ingreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = $tipo_ingreso;

        $data['results'] = $this->mreportes->ingresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Fijos Detallado Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_fijos/detallado/vreportes_ingresosf_detalle_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Ingresos Fijos Resumido --------------------------------- */

    public function report_ingresosf_resumen()
    {
        $data['title'] = "Formulario Reporte de Ingresos Fijos Resumidos";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_fijos/resumido/vreportes_ingresosf_resumen_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_ingresosf_resumen_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = $this->input->post('tipo_ingreso');

        $data['results'] = $this->mreportes->ingresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Fijos Resumidos";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_fijos/resumido/vreportes_ingresosf_resumen_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_ingresosf_resumen($fecha_desde, $fecha_hasta, $tipo_ingreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = $tipo_ingreso;

        $data['results'] = $this->mreportes->ingresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Fijos Resumidos - Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_fijos/resumido/vreportes_ingresosf_resumen_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Ingresos Variables Detallado --------------------------------- */

    public function report_ingresosv_detalle()
    {
        $data['title'] = "Formulario Reporte de Ingresos Variables Detallado";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_variables/detallado/vreportes_ingresosv_detalle_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_ingresosv_detalle_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = $this->input->post('tipo_ingreso');

        $data['results'] = $this->mreportes->ingresosv_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Variables Detallado Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_variables/detallado/vreportes_ingresosv_detalle_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_ingresosv_detalle($fecha_desde, $fecha_hasta, $tipo_ingreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = $tipo_ingreso;

        $data['results'] = $this->mreportes->ingresosv_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Variables Detallado Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_variables/detallado/vreportes_ingresosv_detalle_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Ingresos Variables Resumido --------------------------------- */

    public function report_ingresosv_resumen()
    {
        $data['title'] = "Formulario Reporte de Ingresos Variables Resumido";

        $data['tingresos'] = $this->mopciones->get_tipos_ingreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_variables/resumido/vreportes_ingresosv_resumen_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_ingresosv_resumen_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = $this->input->post('tipo_ingreso');

        $data['results'] = $this->mreportes->ingresosv_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Variables Resumido";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_variables/resumido/vreportes_ingresosv_resumen_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_ingresosv_resumen($fecha_desde, $fecha_hasta, $tipo_ingreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = $tipo_ingreso;

        $data['results'] = $this->mreportes->ingresosv_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);

        $data['total_valor_ingresos'] = 0;

        $data['title'] = "Reporte de Ingresos Variables Resumido - Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/ingresos_variables/resumido/vreportes_ingresosv_resumen_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Egresos Fijos Detallado --------------------------------- */

    public function report_egresosf_detalle()
    {
        $data['title'] = "Formulario Reporte de Egresos Fijos Detallado";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_fijos/detallado/vreportes_egresosf_detalle_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_egresosf_detalle_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_egreso'] = $this->input->post('tipo_egreso');

        $data['results'] = $this->mreportes->egresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Fijos Detallado Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_fijos/detallado/vreportes_egresosf_detalle_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_egresosf_detalle($fecha_desde, $fecha_hasta, $tipo_egreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_egreso'] = $tipo_egreso;

        $data['results'] = $this->mreportes->egresos_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Fijos Detallado Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_fijos/detallado/vreportes_egresosf_detalle_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Egresos Fijos Resumido --------------------------------- */

    public function report_egresosf_resumen()
    {
        $data['title'] = "Formulario Reporte de Egresos Fijos Resumidos";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_fijos/resumido/vreportes_egresosf_resumen_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_egresosf_resumen_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_egreso'] = $this->input->post('tipo_egreso');

        $data['results'] = $this->mreportes->egresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Fijos Resumidos";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_fijos/resumido/vreportes_egresosf_resumen_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_egresosf_resumen($fecha_desde, $fecha_hasta, $tipo_egreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_egreso'] = $tipo_egreso;

        $data['results'] = $this->mreportes->egresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Fijos Resumidos - Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_fijos/resumido/vreportes_egresosf_resumen_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Egresos Variables Detallado --------------------------------- */

    public function report_egresosv_detalle()
    {
        $data['title'] = "Formulario Reporte de Egresos Variables Detallado";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_variables/detallado/vreportes_egresosv_detalle_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_egresosv_detalle_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_egreso'] = $this->input->post('tipo_egreso');

        $data['results'] = $this->mreportes->egresosv_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Variables Detallado Resultado";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_variables/detallado/vreportes_egresosv_detalle_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_egresosv_detalle($fecha_desde, $fecha_hasta, $tipo_egreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_egreso'] = $tipo_egreso;

        $data['results'] = $this->mreportes->egresosv_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Variables Detallado Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_variables/detallado/vreportes_egresosv_detalle_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte Egresos Variables Resumido --------------------------------- */

    public function report_egresosv_resumen()
    {
        $data['title'] = "Formulario Reporte de Egresos Variables Resumidos";

        $data['tegresos'] = $this->mopciones->get_tipos_egreso();

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_variables/resumido/vreportes_egresosv_resumen_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_egresosv_resumen_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_egreso'] = $this->input->post('tipo_egreso');

        $data['results'] = $this->mreportes->egresosv_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Variables Resumidos";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_variables/resumido/vreportes_egresosv_resumen_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_egresosv_resumen($fecha_desde, $fecha_hasta, $tipo_egreso)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_egreso'] = $tipo_egreso;

        $data['results'] = $this->mreportes->egresosv_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Egresos Variables Resumidos - Impresión";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/egresos_variables/resumido/vreportes_egresosv_resumen_print',$data);
        $this->load->view('templates/footer');
    }

    /* ------------------ Reporte de Estado de Resultados --------------------------------- */

    public function report_pyg_resumen()
    {
        $data['title'] = "Formulario Estado de Resultados";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/estado_resultados/vreportes_pyg_form', $data);
        $this->load->view('templates/footer');
    }

    public function report_pyg_result()
    {
        $data['fecha_desde'] = $this->input->post('fecha_desde');
        $data['fecha_hasta'] = $this->input->post('fecha_hasta');
        $data['tipo_ingreso'] = 'null';
        $data['tipo_egreso'] = 'null';

        $data['ingresos'] = $this->mreportes->ingresos_pyg_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);
        $data['prestamos'] = $this->mreportes->prestamos_pyg_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);
        $data['egresos'] = $this->mreportes->egresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_ingresos'] = 0;
        $data['total_valor_prestamos'] = 0;
        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Estado de Resultados";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/estado_resultados/vreportes_pyg_result',$data);
        $this->load->view('templates/footer');
    }

    public function impr_rep_pyg($fecha_desde, $fecha_hasta)
    {
        $data['fecha_desde'] = $fecha_desde;
        $data['fecha_hasta'] = $fecha_hasta;
        $data['tipo_ingreso'] = 'null';
        $data['tipo_egreso'] = 'null';

        $data['ingresos'] = $this->mreportes->ingresos_pyg_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);
        $data['prestamos'] = $this->mreportes->prestamos_pyg_report($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_ingreso']);
        $data['egresos'] = $this->mreportes->egresos_report_resumen($data['fecha_desde'], $data['fecha_hasta'], $data['tipo_egreso']);

        $data['total_valor_ingresos'] = 0;
        $data['total_valor_prestamos'] = 0;
        $data['total_valor_egresos'] = 0;

        $data['title'] = "Reporte de Estado de Resultados";

        $this->load->view('templates/header',$data);
        $this->load->view('templates/menu');
        $this->load->view('reportes/estado_resultados/vreportes_pyg_print',$data);
        $this->load->view('templates/footer');
    }
}
