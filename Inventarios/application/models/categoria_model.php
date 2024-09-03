<?php
class Categoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtener_categorias() {
        $query = $this->db->get('categorias'); // Asumiendo que tienes una tabla 'categorias'
        return $query->result_array();
    }

    public function agregar_categoria($data) {
        $this->db->insert('categorias', $data);
    }
}
?>
