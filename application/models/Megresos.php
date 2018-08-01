<?php
class Megresos extends CI_Model {

        public function __construct()
        {

        }

        public function get_egresos()
        {
                $this->db->select('sai_egresos.id, sai_egresos.fecha, sai_tipo_egresos.nombre, sai_clientes.nombres, sai_egresos.valor, sai_egresos.observacion');
    	        $this->db->from('sai_egresos');
                $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_egresos.id_tercero');
                $this->db->join('sai_tipo_egresos','sai_tipo_egresos.id = sai_egresos.id_tipo_egreso');
                return $query = $this->db->get()->result_array();
        }

        public function get_egreso($str)
        {
                $this->db->select('sai_egresos.id AS id_egreso, sai_egresos.fecha, sai_tipo_egresos.id AS id_tipo_egreso, sai_tipo_egresos.nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_egresos.valor, sai_egresos.observacion');
    	        $this->db->from('sai_egresos');
                $this->db->join('sai_tipo_egresos','sai_tipo_egresos.id = sai_egresos.id_tipo_egreso');
                $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_egresos.id_tercero');
                $this->db->where('sai_egresos.id',$str);
                return $query = $this->db->get()->row_array();
        }

        public function update_egreso()
        {
            $id_egreso = $this->input->post('id_egreso');

            $data = array(
            'fecha' => $this->input->post('fecha'),
            'id_tipo_egreso' => $this->input->post('id_tipo'),
            'id_tercero' => $this->input->post('id_tercero'),
            'valor' => $this->input->post('valor'),
            'observacion' => $this->input->post('observacion')
            );

            $this->db->where('id', $id_egreso);
            $this->db->update('sai_egresos', $data);
        }

        public function insert_egreso()
        {
            $data = array(    
                'fecha' => $this->input->post('fecha'),
                'id_tipo_egreso' => $this->input->post('id_tipo'),
                'id_tercero' => $this->input->post('id_tercero'),
                'valor' => $this->input->post('valor'),
                'observacion' => $this->input->post('observacion')
            );

            return $this->db->insert('sai_egresos', $data);
        }

        public function delete_egreso($id)
        {
            if ( ! $this->db->delete('sai_egresos', array('id' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }
}