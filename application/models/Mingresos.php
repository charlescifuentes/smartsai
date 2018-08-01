<?php
class Mingresos extends CI_Model {

        public function __construct()
        {

        }

        public function get_ingresos()
        {
                $this->db->select('sai_ingresos.id, sai_ingresos.fecha, sai_tipo_ingresos.nombre, sai_clientes.nombres, sai_ingresos.valor, sai_ingresos.observacion');
    	        $this->db->from('sai_ingresos');
                $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_ingresos.id_tercero');
                $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
                return $query = $this->db->get()->result_array();
        }

        public function get_ingreso($str)
        {
                $this->db->select('sai_ingresos.id AS id_ingreso, sai_ingresos.fecha, sai_tipo_ingresos.id AS id_tipo_ingreso, sai_tipo_ingresos.nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_ingresos.valor, sai_ingresos.observacion');
    	        $this->db->from('sai_ingresos');
                $this->db->join('sai_tipo_ingresos','sai_tipo_ingresos.id = sai_ingresos.id_tipo_ingreso');
                $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_ingresos.id_tercero');
                $this->db->where('sai_ingresos.id',$str);
                return $query = $this->db->get()->row_array();
        }

        public function update_ingreso()
        {
            $id_ingreso = $this->input->post('id_ingreso');

            $data = array(
            'fecha' => $this->input->post('fecha'),
            'id_tipo_ingreso' => $this->input->post('id_tipo'),
            'id_tercero' => $this->input->post('id_tercero'),
            'valor' => $this->input->post('valor'),
            'observacion' => $this->input->post('observacion')
            );

            $this->db->where('id', $id_ingreso);
            $this->db->update('sai_ingresos', $data);
        }

        public function insert_ingreso()
        {
            $data = array(    
                'fecha' => $this->input->post('fecha'),
                'id_tipo_ingreso' => $this->input->post('id_tipo'),
                'id_tercero' => $this->input->post('id_tercero'),
                'valor' => $this->input->post('valor'),
                'observacion' => $this->input->post('observacion')
            );

            return $this->db->insert('sai_ingresos', $data);
        }

        public function delete_ingreso($id)
        {
            if ( ! $this->db->delete('sai_ingresos', array('id' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }
}