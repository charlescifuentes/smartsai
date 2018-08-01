<?php
class Mopciones extends CI_Model {

        public function __construct()
        {

        }

        public function get_tipos_propiedad()
        {
            $query = $this->db->get('sai_tipo_propiedades');
            return $query->result_array();
        }

        public function get_barrios()
        {
            $query = $this->db->select('*');
            $query = $this->db->from('sai_barrios');
            $query = $this->db->order_by('barrio_nombre','ASC');
            return $query = $this->db->get()->result_array();
        }

        public function get_objetivos()
        {
            $query = $this->db->get('sai_objetivos');
            return $query->result_array();
        }

        public function get_tipos_cliente()
        {
            $query = $this->db->get('sai_tipo_clientes');
            return $query->result_array();
        }

        public function get_ciudades()
        {
            $query = $this->db->get('sai_ciudades');
            return $query->result_array();
        }

        public function get_tipos_ingreso()
        {
            $query = $this->db->get('sai_tipo_ingresos');
            return $query->result_array();
        }

        public function get_tipos_egreso()
        {
            $query = $this->db->get('sai_tipo_egresos');
            return $query->result_array();
        }

        /* -------------------- Tipos de Propiedad------------------------------------------------- */
        public function get_tipo_propiedad($str)
        {
            $query = $this->db->get_where('sai_tipo_propiedades', array('id_tipo' => $str));
            return $query->row_array();
        }

        public function update_tipo_propiedad()
        {
            $id_tipo = $this->input->post('id_tipo');

            $data = array(
            'tipo_nombre' => $this->input->post('tipo_nombre')
            );

            $this->db->where('id_tipo', $id_tipo);
            $this->db->update('sai_tipo_propiedades', $data);
        }

        public function delete_tipo_propiedad($id)
        {
            if ( ! $this->db->delete('sai_tipo_propiedades', array('id_tipo' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_tipo_propiedad()
        {
            $data = array(
            'id_tipo' => $this->input->post('id_tipo'),
            'tipo_nombre' => $this->input->post('tipo_nombre')
            );

            return $this->db->insert('sai_tipo_propiedades', $data);
        }

        /* -------------------- Barrios ---------------------------------------------- */
        public function get_barrio($str)
        {
            $query = $this->db->get_where('sai_barrios', array('id_barrio' => $str));
            return $query->row_array();
        }

        public function update_barrio()
        {
            $id_tipo = $this->input->post('id_barrio');

            $data = array(
            'barrio_nombre' => $this->input->post('barrio_nombre')
            );

            $this->db->where('id_barrio', $id_tipo);
            $this->db->update('sai_barrios', $data);
        }

        public function delete_barrio($id)
        {
            if ( ! $this->db->delete('sai_barrios', array('id_barrio' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_barrio()
        {
            $data = array(
            'id_barrio' => $this->input->post('id_barrio'),
            'barrio_nombre' => $this->input->post('barrio_nombre')
            );

            return $this->db->insert('sai_barrios', $data);
        }

        /* -------------------- Objetivos --------------------------------------------- */
        public function get_objetivo($str)
        {
            $query = $this->db->get_where('sai_objetivos', array('id_objetivo' => $str));
            return $query->row_array();
        }

        public function update_objetivo()
        {
            $id_objetivo = $this->input->post('id_objetivo');

            $data = array(
            'objetivo_nombre' => $this->input->post('objetivo_nombre')
            );

            $this->db->where('id_objetivo', $id_objetivo);
            $this->db->update('sai_objetivos', $data);
        }

        public function delete_objetivo($id)
        {
            if ( ! $this->db->delete('sai_objetivos', array('id_objetivo' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_objetivo()
        {
            $data = array(
            'id_objetivo' => $this->input->post('id_objetivo'),
            'objetivo_nombre' => $this->input->post('objetivo_nombre')
            );

            return $this->db->insert('sai_objetivos', $data);
        }

        /* -------------------- Tipos de Propiedad------------------------------------------------- */
        public function get_tipo_cliente($str)
        {
            $query = $this->db->get_where('sai_tipo_clientes', array('id_tipo_cliente' => $str));
            return $query->row_array();
        }

        public function update_tipo_cliente()
        {
            $id_tipo = $this->input->post('id_tipo_cliente');

            $data = array(
            'tipo_cliente_nombre' => $this->input->post('tipo_cliente_nombre')
            );

            $this->db->where('id_tipo_cliente', $id_tipo);
            $this->db->update('sai_tipo_clientes', $data);
        }

        public function delete_tipo_cliente($id)
        {
            if ( ! $this->db->delete('sai_tipo_clientes', array('id_tipo_cliente' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_tipo_cliente()
        {
            $data = array(
            'id_tipo_cliente' => $this->input->post('id_tipo_cliente'),
            'tipo_cliente_nombre' => $this->input->post('tipo_cliente_nombre')
            );

            return $this->db->insert('sai_tipo_clientes', $data);
        }

        /* -------------------- Ciudades ---------------------------------------------- */
        public function get_ciudad($str)
        {
            $query = $this->db->get_where('sai_ciudades', array('id_ciudad' => $str));
            return $query->row_array();
        }

        public function update_ciudad()
        {
            $id_ciudad = $this->input->post('id_ciudad');

            $data = array(
            'ciudad_nombre' => $this->input->post('ciudad_nombre')
            );

            $this->db->where('id_ciudad', $id_ciudad);
            $this->db->update('sai_ciudades', $data);
        }

        public function delete_ciudad($id)
        {
            if ( ! $this->db->delete('sai_ciudades', array('id_ciudad' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_ciudad()
        {
            $data = array(
            'id_ciudad' => $this->input->post('id_ciudad'),
            'ciudad_nombre' => $this->input->post('ciudad_nombre')
            );

            return $this->db->insert('sai_ciudades', $data);
        }

        /* -------------------- Tipos de Ingresos ------------------------------------------------- */
        public function get_tipo_ingreso($str)
        {
            $query = $this->db->get_where('sai_tipo_ingresos', array('id' => $str));
            return $query->row_array();
        }

        public function update_tipo_ingreso()
        {
            $id = $this->input->post('id_tipo');

            $data = array(
            'nombre' => $this->input->post('tipo_nombre')
            );

            $this->db->where('id', $id);
            $this->db->update('sai_tipo_ingresos', $data);
        }

        public function delete_tipo_ingreso($id)
        {
            if ( ! $this->db->delete('sai_tipo_ingresos', array('id' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_tipo_ingreso()
        {
            $data = array(
            'id' => $this->input->post('id_tipo'),
            'nombre' => $this->input->post('tipo_nombre')
            );

            return $this->db->insert('sai_tipo_ingresos', $data);
        }

        /* -------------------- Tipos de Egresos ------------------------------------------------- */
        public function get_tipo_egreso($str)
        {
            $query = $this->db->get_where('sai_tipo_egresos', array('id' => $str));
            return $query->row_array();
        }

        public function update_tipo_egreso()
        {
            $id = $this->input->post('id_tipo');

            $data = array(
            'nombre' => $this->input->post('tipo_nombre')
            );

            $this->db->where('id', $id);
            $this->db->update('sai_tipo_egresos', $data);
        }

        public function delete_tipo_egreso($id)
        {
            if ( ! $this->db->delete('sai_tipo_egresos', array('id' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_tipo_egreso()
        {
            $data = array(
            'id' => $this->input->post('id_tipo'),
            'nombre' => $this->input->post('tipo_nombre')
            );

            return $this->db->insert('sai_tipo_egresos', $data);
        }
}
