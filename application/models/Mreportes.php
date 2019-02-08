<?php
class Mreportes extends CI_Model {

        public function __construct()
        {

        }

        /* ------------------ Reporte Clientes --------------------------------- */
        public function clientes_report($id_tipo_cliente, $id_interes, $presupuesto_desde, $presupuesto_hasta, $fecha_desde, $fecha_hasta, $cliente_nombre, $estado_cliente)
        {
            $this->db->select('sai_clientes.id_cliente, sai_clientes.fecha_creacion, sai_clientes.nombres, sai_clientes.telefono, sai_clientes.presupuesto, sai_clientes.anotaciones, sai_tipo_propiedades.tipo_nombre, sai_tipo_clientes.tipo_cliente_nombre, sai_estado_clientes.estado_cliente_nombre');
    		$this->db->from('sai_clientes');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_clientes.id_tipo');
            $this->db->join('sai_tipo_clientes','sai_tipo_clientes.id_tipo_cliente = sai_clientes.id_tipo_cliente');
            $this->db->join('sai_estado_clientes','sai_estado_clientes.id_estado_cliente = sai_clientes.id_estado_cliente');
            if($id_tipo_cliente != "null"){
                $this->db->where('sai_clientes.id_tipo_cliente', $id_tipo_cliente);
            }
            if($id_interes != "null"){
                $this->db->where('sai_clientes.id_tipo', $id_interes);
            }
            if($presupuesto_desde != "null"){
                $this->db->where('sai_clientes.presupuesto >=', $presupuesto_desde);
            }
            if($presupuesto_hasta != "null"){
                $this->db->where('sai_clientes.presupuesto <=', $presupuesto_hasta);
            }
            if($fecha_desde != "null"){
                $this->db->where('sai_clientes.fecha_creacion >=', $fecha_desde);
            }
            if($fecha_hasta != "null"){
                $this->db->where('sai_clientes.fecha_creacion <=', $fecha_hasta); 
            }
            if($cliente_nombre != "null"){
                $this->db->where('sai_clientes.id_cliente', $cliente_nombre);
            }
            if($estado_cliente != "null"){
                $this->db->where('sai_clientes.id_estado_cliente', $estado_cliente);
            }
            return $query = $this->db->get()->result_array();
        }

        public function cliente_modal($str)
        {
            $this->db->select('*');
    		$this->db->from('sai_clientes');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_clientes.id_tipo');
            $this->db->join('sai_tipo_clientes','sai_tipo_clientes.id_tipo_cliente = sai_clientes.id_tipo_cliente');
            $this->db->where('id_cliente',$str);
            return $query = $this->db->get()->row_array();
        }

        /* ------------------ Reporte Propiedades --------------------------------- */
        public function propiedades_report($id_tipo_propiedad, $id_ciudad, $id_barrio, $precio_desde, $precio_hasta, $id_objetivo, $prop_activo)
        {
            $this->db->select('sai_propiedades.id_propiedad, sai_propiedades.fecha_creacion, sai_tipo_propiedades.tipo_nombre, sai_ciudades.ciudad_nombre, sai_barrios.barrio_nombre, sai_propiedades.precio, sai_objetivos.objetivo_nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_propiedades.caracteristicas, sai_propiedades.prop_activo');
    		$this->db->from('sai_propiedades');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_propiedades.id_tipo');
            $this->db->join('sai_ciudades','sai_ciudades.id_ciudad = sai_propiedades.id_ciudad');
            $this->db->join('sai_barrios','sai_barrios.id_barrio = sai_propiedades.id_barrio');
            $this->db->join('sai_objetivos','sai_objetivos.id_objetivo = sai_propiedades.id_objetivo');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_propiedades.id_propietario');
            if($id_tipo_propiedad != "null"){
            $this->db->where('sai_propiedades.id_tipo', $id_tipo_propiedad);
            }
            if($id_ciudad != "null"){
            $this->db->where('sai_propiedades.id_ciudad', $id_ciudad);
            }
            if($id_barrio != "null"){
            $this->db->where('sai_propiedades.id_barrio', $id_barrio);
            }
            if($precio_desde != "null"){
            $this->db->where('sai_propiedades.precio >=', $precio_desde);
            }
            if($precio_hasta != "null"){
            $this->db->where('sai_propiedades.precio <=', $precio_hasta);
            }
            if($id_objetivo != "null"){
            $this->db->where('sai_propiedades.id_objetivo', $id_objetivo);
            }
            if($prop_activo != "null"){
            $this->db->where('sai_propiedades.prop_activo', $prop_activo);
            }
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte tareas --------------------------------- */
        public function tareas_report($fecha_desde, $fechas_hasta, $user_name)
        {
            $this->db->select('*');
    	    $this->db->from('sai_tareas');
            $this->db->join('sai_users','sai_users.user_name = sai_tareas.user_name');
            $this->db->where('sai_tareas.tarea_fecha_fin >=', $fecha_desde);
            $this->db->where('sai_tareas.tarea_fecha_fin <=', $fechas_hasta);
            if($user_name != "null"){
            $this->db->where('sai_tareas.user_name',$user_name);
            }
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Ingresos Fijos Detallado --------------------------------- */
        public function ingresos_report($fecha_desde, $fechas_hasta, $tipo_ingreso)
        {   
            $this->db->select('sai_ingresos.id AS id_ingreso, sai_ingresos.fecha, sai_tipo_ingresos.id AS id_tipo_ingreso, sai_tipo_ingresos.nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_ingresos.valor, sai_ingresos.observacion');
    	    $this->db->from('sai_ingresos');
            $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_ingresos.id_tercero');
            $this->db->where('sai_ingresos.fecha >=', $fecha_desde);
            $this->db->where('sai_ingresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_ingresos.nombre <>','Comisión por Venta de Propiedad');
            if($tipo_ingreso != "null"){
            $this->db->where('id_tipo_ingreso', $tipo_ingreso);
            }
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Ingresos Fijos Resumido --------------------------------- */
        public function ingresos_report_resumen($fecha_desde, $fechas_hasta, $tipo_ingreso)
        {   
            $this->db->select('sai_tipo_ingresos.nombre, SUM(sai_ingresos.valor) AS total');
    	    $this->db->from('sai_ingresos');
            $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
            $this->db->where('sai_ingresos.fecha >=', $fecha_desde);
            $this->db->where('sai_ingresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_ingresos.nombre <>','Comisión por Venta de Propiedad');
            if($tipo_ingreso != "null"){
            $this->db->where('id_tipo_ingreso', $tipo_ingreso);
            }
            $this->db->group_by('sai_tipo_ingresos.nombre');
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Ingresos Variables Detallado --------------------------------- */
        public function ingresosv_report($fecha_desde, $fechas_hasta, $tipo_ingreso)
        {   
            $this->db->select('sai_ingresos.id AS id_ingreso, sai_ingresos.fecha, sai_tipo_ingresos.id AS id_tipo_ingreso, sai_tipo_ingresos.nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_ingresos.valor, sai_ingresos.observacion');
    	    $this->db->from('sai_ingresos');
            $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_ingresos.id_tercero');
            $this->db->where('sai_ingresos.fecha >=', $fecha_desde);
            $this->db->where('sai_ingresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_ingresos.nombre =','Comisión por Venta de Propiedad');
            if($tipo_ingreso != "null"){
            $this->db->where('id_tipo_ingreso', $tipo_ingreso);
            }
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Ingresos Variables Resumido --------------------------------- */
        public function ingresosv_report_resumen($fecha_desde, $fechas_hasta, $tipo_ingreso)
        {   
            $this->db->select('sai_tipo_ingresos.nombre, SUM(sai_ingresos.valor) AS total');
    	    $this->db->from('sai_ingresos');
            $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
            $this->db->where('sai_ingresos.fecha >=', $fecha_desde);
            $this->db->where('sai_ingresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_ingresos.nombre =','Comisión por Venta de Propiedad');
            if($tipo_ingreso != "null"){
            $this->db->where('id_tipo_ingreso', $tipo_ingreso);
            }
            $this->db->group_by('sai_tipo_ingresos.nombre');
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Egresos Fijos Detallado --------------------------------- */
        public function egresos_report($fecha_desde, $fechas_hasta, $tipo_egreso)
        {   
            $this->db->select('sai_egresos.id AS id_egreso, sai_egresos.fecha, sai_tipo_egresos.id AS id_tipo_egreso, sai_tipo_egresos.nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_egresos.valor, sai_egresos.observacion');
    	    $this->db->from('sai_egresos');
            $this->db->join('sai_tipo_egresos','sai_tipo_egresos.id = sai_egresos.id_tipo_egreso');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_egresos.id_tercero');
            $this->db->where('sai_egresos.fecha >=', $fecha_desde);
            $this->db->where('sai_egresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_egresos.nombre <>','Distribución de Comisiones');
            if($tipo_egreso != "null"){
            $this->db->where('id_tipo_egreso', $tipo_egreso);
            }
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Egresos Fijos Resumido --------------------------------- */
        public function egresos_report_resumen($fecha_desde, $fechas_hasta, $tipo_egreso)
        {   
            $this->db->select('sai_tipo_egresos.nombre, SUM(sai_egresos.valor) AS total');
    	    $this->db->from('sai_egresos');
            $this->db->join('sai_tipo_egresos','sai_tipo_egresos.id = sai_egresos.id_tipo_egreso');
            $this->db->where('sai_egresos.fecha >=', $fecha_desde);
            $this->db->where('sai_egresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_egresos.nombre <>','Distribución de Comisiones');
            if($tipo_egreso != "null"){
            $this->db->where('id_tipo_egreso', $tipo_egreso);
            }
            $this->db->group_by('sai_tipo_egresos.nombre');
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Egresos Variables Detallado --------------------------------- */
        public function egresosv_report($fecha_desde, $fechas_hasta, $tipo_egreso)
        {   
            $this->db->select('sai_egresos.id AS id_egreso, sai_egresos.fecha, sai_tipo_egresos.id AS id_tipo_egreso, sai_tipo_egresos.nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_egresos.valor, sai_egresos.observacion');
    	    $this->db->from('sai_egresos');
            $this->db->join('sai_tipo_egresos','sai_tipo_egresos.id = sai_egresos.id_tipo_egreso');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_egresos.id_tercero');
            $this->db->where('sai_egresos.fecha >=', $fecha_desde);
            $this->db->where('sai_egresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_egresos.nombre =','Distribución de Comisiones');
            if($tipo_egreso != "null"){
            $this->db->where('id_tipo_egreso', $tipo_egreso);
            }
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte Egresos Variables Resumido --------------------------------- */
        public function egresosv_report_resumen($fecha_desde, $fechas_hasta, $tipo_egreso)
        {   
            $this->db->select('sai_tipo_egresos.nombre, SUM(sai_egresos.valor) AS total');
    	    $this->db->from('sai_egresos');
            $this->db->join('sai_tipo_egresos','sai_tipo_egresos.id = sai_egresos.id_tipo_egreso');
            $this->db->where('sai_egresos.fecha >=', $fecha_desde);
            $this->db->where('sai_egresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_egresos.nombre =','Distribución de Comisiones');
            if($tipo_egreso != "null"){
            $this->db->where('id_tipo_egreso', $tipo_egreso);
            }
            $this->db->group_by('sai_tipo_egresos.nombre');
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte de Estado de Resultados --------------------------------- */
        public function ingresos_pyg_report($fecha_desde, $fechas_hasta, $tipo_ingreso)
        {   
            $this->db->select('sai_tipo_ingresos.nombre, SUM(sai_ingresos.valor) AS total');
    	    $this->db->from('sai_ingresos');
            $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
            $this->db->where('sai_ingresos.fecha >=', $fecha_desde);
            $this->db->where('sai_ingresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_ingresos.nombre <>','Comisión por Venta de Propiedad');
            $this->db->where('sai_tipo_ingresos.nombre <>','Rojos Andrea (Préstamo personal a Inmobiliaria)');
            if($tipo_ingreso != "null"){
            $this->db->where('id_tipo_ingreso', $tipo_ingreso);
            }
            $this->db->group_by('sai_tipo_ingresos.nombre');
            return $query = $this->db->get()->result_array();
        }

        /* ------------------ Reporte de Estado de Resultados (Prestamo personal) --------------------------------- */
        public function prestamos_pyg_report($fecha_desde, $fechas_hasta, $tipo_ingreso)
        {   
            $this->db->select('sai_tipo_ingresos.nombre, SUM(sai_ingresos.valor) AS total');
    	    $this->db->from('sai_ingresos');
            $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
            $this->db->where('sai_ingresos.fecha >=', $fecha_desde);
            $this->db->where('sai_ingresos.fecha <=', $fechas_hasta);
            $this->db->where('sai_tipo_ingresos.nombre =','Rojos Andrea (Préstamo personal a Inmobiliaria)');
            if($tipo_ingreso != "null"){
            $this->db->where('id_tipo_ingreso', $tipo_ingreso);
            }
            $this->db->group_by('sai_tipo_ingresos.nombre');
            return $query = $this->db->get()->result_array();
        }
}
