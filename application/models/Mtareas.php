<?php
class Mtareas extends CI_Model {

        public function __construct()
        {

        }

        public function get_tareas()
        {
            date_default_timezone_set('America/Bogota');

            $this->db->select('*');
            $this->db->from('sai_tareas');
            $this->db->join('sai_users','sai_users.user_name = sai_tareas.user_name');
            return $query = $this->db->get()->result_array();
        }

        public function get_tareas_today()
        {
            date_default_timezone_set('America/Bogota');

            $this->db->select('*');
            $this->db->from('sai_tareas');
            $this->db->join('sai_users','sai_users.user_name = sai_tareas.user_name');
            $this->db->where('sai_tareas.tarea_fecha_fin',date('Y-m-d'));
            return $query = $this->db->get()->result_array();
        }

        public function get_tarea($str)
        {
            $this->db->select('*');
    		$this->db->from('sai_tareas');
            $this->db->join('sai_users','sai_users.user_name = sai_tareas.user_name');
            $this->db->where('sai_tareas.id_tarea',$str);
            return $query = $this->db->get()->row_array();
        }

        public function update_tarea()
        {
            $id_tarea = $this->input->post('id_tarea');

            $data = array(
            'tarea_fecha_inicio' => $this->input->post('tarea_fecha_inicio'),
            'tarea_descripcion' => $this->input->post('tarea_descripcion'),
            'tarea_fecha_fin' => $this->input->post('tarea_fecha_fin'),
            'user_name' => $this->input->post('user_name')
            );

            $this->db->where('id_tarea', $id_tarea);
            $this->db->update('sai_tareas', $data);
        }

        public function delete_tarea($id)
        {
            if ( ! $this->db->delete('sai_tareas', array('id_tarea' => $id)))
            {
                return $error = $this->db->error(); // Has keys 'code' and 'message'
            }
            else{
                return 1;
            }
        }

        public function insert_tarea()
        {
            $data = array(
            'id_tarea' => $this->input->post('id_tarea'),
            'tarea_fecha_inicio' => $this->input->post('tarea_fecha_inicio'),
            'tarea_descripcion' => $this->input->post('tarea_descripcion'),
            'tarea_fecha_fin' => $this->input->post('tarea_fecha_fin'),
            'user_name' => $this->input->post('user_name')
            );

            return $this->db->insert('sai_tareas', $data);
        }

        public function cronograma_tareas($fecha_desde, $fechas_hasta, $user_name)
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
}
