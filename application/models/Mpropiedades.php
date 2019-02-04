<?php
class Mpropiedades extends CI_Model {

        public function __construct()
        {

        }

        public function get_propiedades()
        {
            $this->db->select('sai_propiedades.id_propiedad, sai_propiedades.fecha_creacion, sai_tipo_propiedades.tipo_nombre, sai_ciudades.ciudad_nombre, sai_barrios.barrio_nombre, sai_propiedades.precio, sai_objetivos.objetivo_nombre, sai_clientes.id_cliente, sai_clientes.nombres, sai_propiedades.prop_activo ');
    		$this->db->from('sai_propiedades');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_propiedades.id_tipo');
            $this->db->join('sai_ciudades','sai_ciudades.id_ciudad = sai_propiedades.id_ciudad');
            $this->db->join('sai_barrios','sai_barrios.id_barrio = sai_propiedades.id_barrio');
            $this->db->join('sai_objetivos','sai_objetivos.id_objetivo = sai_propiedades.id_objetivo');
            $this->db->join('sai_clientes','sai_clientes.id_cliente = sai_propiedades.id_propietario');
            return $query = $this->db->get()->result_array();
        }

        public function get_propiedad($str)
        {
            $this->db->select('sai_propiedades.id_propiedad, sai_propiedades.fecha_creacion, sai_tipo_propiedades.id_tipo, sai_tipo_propiedades.tipo_nombre, sai_ciudades.id_ciudad, sai_ciudades.ciudad_nombre, sai_barrios.id_barrio, sai_barrios.barrio_nombre, sai_propiedades.direccion, sai_propiedades.precio, sai_propiedades.caracteristicas, sai_propiedades.observaciones, sai_objetivos.id_objetivo, sai_objetivos.objetivo_nombre, pr.id_cliente AS id_propietario, pr.nombres AS nombres_propietario, arr.id_cliente AS id_arrendatario, arr.nombres AS nombres_arrendatario, sai_propiedades.prop_activo');
    		$this->db->from('sai_propiedades');
    		$this->db->join('sai_tipo_propiedades','sai_tipo_propiedades.id_tipo = sai_propiedades.id_tipo');
            $this->db->join('sai_ciudades','sai_ciudades.id_ciudad = sai_propiedades.id_ciudad');
            $this->db->join('sai_barrios','sai_barrios.id_barrio = sai_propiedades.id_barrio');
            $this->db->join('sai_objetivos','sai_objetivos.id_objetivo = sai_propiedades.id_objetivo');
            $this->db->join('sai_clientes AS pr','pr.id_cliente = sai_propiedades.id_propietario');
            $this->db->join('sai_clientes AS arr','arr.id_cliente = sai_propiedades.id_arrendatario');
            $this->db->where('id_propiedad',$str);
            return $query = $this->db->get()->row_array();
        }

        public function update_propiedad()
        {
            $id_propiedad = $this->input->post('id_propiedad');

            $data = array(
            'id_tipo' => $this->input->post('id_tipo'),
            'fecha_creacion' => $this->input->post('fecha_creacion'),
            'id_ciudad' => $this->input->post('id_ciudad'),
            'id_barrio' => $this->input->post('id_barrio'),
            'direccion' => $this->input->post('direccion'),
            'precio' => $this->input->post('precio'),
            'caracteristicas' => $this->input->post('caracteristicas'),
            'observaciones' => $this->input->post('observaciones'),
            'id_objetivo' => $this->input->post('id_objetivo'),
            'id_propietario' => $this->input->post('id_propietario'),
            'id_arrendatario' => $this->input->post('id_arrendatario'),
            'documento' => $this->input->post('documento'),
            'prop_activo' => $this->input->post('activo')
            );

            $this->db->where('id_propiedad', $id_propiedad);
            $this->db->update('sai_propiedades', $data);
        }

        public function delete_propiedad($id)
        {
            if ( ! $this->db->delete('sai_propiedades', array('id_propiedad' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_propiedad()
        {
            $data = array(
            'id_tipo' => $this->input->post('id_tipo'),
            'fecha_creacion' => $this->input->post('fecha_creacion'),
            'id_ciudad' => $this->input->post('id_ciudad'),
            'id_barrio' => $this->input->post('id_barrio'),
            'direccion' => $this->input->post('direccion'),
            'precio' => $this->input->post('precio'),
            'caracteristicas' => $this->input->post('caracteristicas'),
            'observaciones' => $this->input->post('observaciones'),
            'id_objetivo' => $this->input->post('id_objetivo'),
            'id_propietario' => $this->input->post('id_propietario'),
            'id_arrendatario' => $this->input->post('id_arrendatario'),
            'documento' => $this->input->post('documento'),
            'prop_activo' => $this->input->post('activo')
            );

            return $this->db->insert('sai_propiedades', $data);
        }
}
