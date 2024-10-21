<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Método para agregar una venta
    public function agregarVenta($data) {
        return $this->db->insert('ventas', $data); // Inserta la venta en la tabla 'ventas'
    }

    // Método para obtener todos los productos
    public function obtenerProductos() {
        $query = $this->db->get('productos'); // Asegúrate de que el nombre de tu tabla sea correcto
        return $query->result(); // Devuelve la lista de productos
    }

    // Método para obtener todos los clientes
    public function obtenerClientes() {
        $query = $this->db->get('clientes'); // Asegúrate de que el nombre de tu tabla sea correcto
        return $query->result(); // Devuelve la lista de clientes
    }

    // Método para obtener la última venta realizada
    public function obtenerUltimaVenta() {
        return $this->db->insert_id(); // Devuelve el ID de la última venta insertada
    }
   

    // Método para obtener todas las ventas con los detalles de los productos vendidos
    public function obtenerVentasConDetalles() {
        $this->db->select('v.idVenta, v.fecha, v.total, c.nombre AS cliente, p.nombre AS producto, dv.cantidad, dv.precio_unitario');
        $this->db->from('ventas v');
        $this->db->join('detalleventas dv', 'v.idVenta = dv.venta_id');
        $this->db->join('productos p', 'dv.producto_id = p.idProducto');
        $this->db->join('clientes c', 'v.cliente_id = c.idCliente');
        $this->db->order_by('v.fecha', 'DESC');
        $query = $this->db->get();
        return $query->result(); // Devolver el resultado como un array de objetos
    }
}
?>
