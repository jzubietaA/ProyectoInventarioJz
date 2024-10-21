<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario_model extends CI_Model {
    
    // Constructor
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Obtener todos los productos
    public function obtenerInventarios() {
        $query = $this->db->get('productos'); // Cambia 'productos' por el nombre de tu tabla
        return $query->result();
    }

    // Agregar un nuevo producto
    public function agregarProducto($data) {
        return $this->db->insert('productos', $data);
    }

    // Obtener un producto por ID
    public function obtenerProducto($id) {
        $query = $this->db->get_where('productos', ['idProducto' => $id]); // Cambia 'idProducto' por tu campo ID
        return $query->row();
    }

    // Actualizar un producto
    public function actualizarProducto($id, $data) {
        $this->db->where('idProducto', $id);
        return $this->db->update('productos', $data);
    }

    // Eliminar un producto
    public function eliminarProducto($id) {
        $this->db->where('idProducto', $id);
        return $this->db->delete('productos');
    }
}
