<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetalleVentas_model extends CI_Model {

    // Método para agregar un detalle de venta
    public function agregarDetalle($data) {
        return $this->db->insert('detalleVentas', $data);
    }

    // Método para obtener todos los detalles de una venta específica (opcional)
    public function obtenerDetallesPorVenta($venta_id) {
        $this->db->select('*');
        $this->db->from('detalleVentas');
        $this->db->where('venta_id', $venta_id);
        return $this->db->get()->result();
    }

    // Método para obtener todos los detalles (opcional)
    public function obtenerTodosDetalles() {
        return $this->db->get('detalleVentas')->result();
    }

    // Método para eliminar un detalle de venta (opcional)
    public function eliminarDetalle($detalle_id) {
        return $this->db->delete('detalleVentas', array('id' => $detalle_id));
    }
}
