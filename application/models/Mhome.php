<?php
class Mhome extends CI_Model {

        public function __construct()
        {

        }

        public function get_last_propiedades()
        {
            $this->db->select('sai_propiedades.id_propiedad, sai_propiedades.fecha_creacion, sai_tipo_propiedades.tipo_nombre, sai_barrios.barrio_nombre, sai_propiedades.precio, sai_objetivos.objetivo_nombre, sai_clientes.nombres');
    		$this->db->from('sai_propiedades');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_propiedades.id_tipo');
            $this->db->join('sai_barrios','sai_barrios.id_barrio = sai_propiedades.id_barrio');
            $this->db->join('sai_objetivos','sai_objetivos.id_objetivo = sai_propiedades.id_objetivo');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_propiedades.id_propietario');
            $this->db->order_by('sai_propiedades.id_propiedad', 'DESC');
            $this->db->limit(10);  // Produces: LIMIT 10
            return $query = $this->db->get()->result_array();
        }

        public function get_last_clientes()
        {
            $this->db->select('sai_clientes.id_cliente, sai_clientes.fecha_creacion, sai_clientes.nombres, sai_clientes.telefono, sai_clientes.presupuesto, sai_tipo_propiedades.tipo_nombre, sai_tipo_clientes.tipo_cliente_nombre, sai_estado_clientes.estado_cliente_nombre');
    		$this->db->from('sai_clientes');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_clientes.id_tipo');
            $this->db->join('sai_tipo_clientes','sai_tipo_clientes.id_tipo_cliente = sai_clientes.id_tipo_cliente');
            $this->db->join('sai_estado_clientes','sai_estado_clientes.id_estado_cliente = sai_clientes.id_estado_cliente');
            $this->db->order_by('sai_clientes.id_cliente', 'DESC');
            $this->db->limit(10);  // Produces: LIMIT 10
            return $query = $this->db->get()->result_array();
        }
}
