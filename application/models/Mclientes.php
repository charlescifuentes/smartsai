<?php
class Mclientes extends CI_Model {

        public function __construct()
        {

        }

        public function get_clientes()
        {
            $this->db->select('sai_clientes.id_cliente, sai_clientes.fecha_creacion, sai_clientes.nombres, sai_clientes.telefono, sai_clientes.presupuesto, sai_tipo_propiedades.tipo_nombre, sai_tipo_clientes.tipo_cliente_nombre, sai_estado_clientes.estado_cliente_nombre');
    		$this->db->from('sai_clientes');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_clientes.id_tipo');
            $this->db->join('sai_tipo_clientes','sai_tipo_clientes.id_tipo_cliente = sai_clientes.id_tipo_cliente');
            $this->db->join('sai_estado_clientes','sai_estado_clientes.id_estado_cliente = sai_clientes.id_estado_cliente');
            return $query = $this->db->get()->result_array();
        }

        public function get_cliente($str)
        {
            $this->db->select('*');
    		$this->db->from('sai_clientes');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_clientes.id_tipo');
            $this->db->join('sai_tipo_clientes','sai_tipo_clientes.id_tipo_cliente = sai_clientes.id_tipo_cliente');
            $this->db->join('sai_estado_clientes','sai_estado_clientes.id_estado_cliente = sai_clientes.id_estado_cliente');
            $this->db->where('id_cliente',$str);
            return $query = $this->db->get()->row_array();
        }

        public function update_cliente()
        {
            $id_cliente = $this->input->post('id_cliente');

            $data = array(
            'identificacion' => $this->input->post('identificacion'),
            'fecha_creacion' => $this->input->post('fecha_creacion'),
            'nombres' => $this->input->post('nombres'),
            'telefono' => $this->input->post('telefono'),
            'id_tipo' => $this->input->post('id_tipo'),
            'presupuesto' => $this->input->post('presupuesto'),
            'barrios_interes' => $this->input->post('barrios_interes'),
            'caracteristicas_interes' => $this->input->post('caracteristicas_interes'),
            'anotaciones' => $this->input->post('anotaciones'),
            'id_tipo_cliente' => $this->input->post('id_tipo_cliente'),
            'fecha_contactar' => $this->input->post('fecha_contactar'),
            'id_estado_cliente' => $this->input->post('id_estado_cliente')
            );

            $this->db->where('id_cliente', $id_cliente);
            $this->db->update('sai_clientes', $data);
        }

        public function delete_cliente($id)
        {
            if ( ! $this->db->delete('sai_clientes', array('id_cliente' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_cliente()
        {
            $data = array(
            'id_cliente' => $this->input->post('id_cliente'),
            'identificacion' => $this->input->post('identificacion'),
            'fecha_creacion' => $this->input->post('fecha_creacion'),
            'nombres' => $this->input->post('nombres'),
            'telefono' => $this->input->post('telefono'),
            'id_tipo' => $this->input->post('id_tipo'),
            'presupuesto' => $this->input->post('presupuesto'),
            'barrios_interes' => $this->input->post('barrios_interes'),
            'caracteristicas_interes' => $this->input->post('caracteristicas_interes'),
            'anotaciones' => $this->input->post('anotaciones'),
            'id_tipo_cliente' => $this->input->post('id_tipo_cliente'),
            'fecha_contactar' => $this->input->post('fecha_contactar'),
            'id_estado_cliente' => $this->input->post('id_estado_cliente')
            );

            return $this->db->insert('sai_clientes', $data);
        }
}
