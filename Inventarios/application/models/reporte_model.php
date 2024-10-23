<?php
class Reporte_model extends CI_Model {
    public function obtener_productos_filtrados($fecha_inicio, $fecha_fin, $nombre_producto = null, $categoria_id = null) {
        $this->db->select('p.*, c.nombre as nombre_categoria');
        $this->db->from('productos p');
        $this->db->join('categorias c', 'p.categoria_id = c.idCategoria');

        // Filtrar por fecha si no son nulos
        if ($fecha_inicio) {
            $this->db->where('p.fecha_creacion >=', $fecha_inicio);
        }
        if ($fecha_fin) {
            $this->db->where('p.fecha_creacion <=', $fecha_fin);
        }

        // Filtrar por nombre de producto
        if ($nombre_producto) {
            $this->db->like('p.nombre', $nombre_producto);
        }

        // Filtrar por categoría
        if ($categoria_id) {
            $this->db->where('p.categoria_id', $categoria_id);
        }

        // Filtrar solo productos con estado 1
        $this->db->where('p.estado', 1);

        $query = $this->db->get();
        return $query->result();
    }

    public function obtener_categorias() {
        $query = $this->db->get('categorias');
        return $query->result();
    }
}

?>