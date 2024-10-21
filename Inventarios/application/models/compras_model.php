<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Método para agregar una compra
    public function agregarCompra($data) {
        return $this->db->insert('compras', $data); // Nombre de tabla en minúsculas
    }

    // Método para obtener todos los productos
    public function obtenerProductos() {
        $query = $this->db->get('productos');
        return $query->result(); // Devuelve la lista de productos
    }

    // Método para obtener todos los proveedores
    public function obtenerProveedores() {
        $query = $this->db->get('proveedores');
        return $query->result(); // Devuelve la lista de proveedores
    }

    // Método para obtener la última compra realizada (el último ID insertado)
    public function obtenerUltimaCompra() {
        return $this->db->insert_id(); // Devuelve el ID de la última compra insertada
    }

    // Método para agregar un detalle de compra
    public function agregarDetalle($data) {
        return $this->db->insert('detallecompras', $data); // Nombre correcto de la tabla
    }

    // Método para obtener todos los detalles de una compra específica
    public function obtenerDetallesPorCompra($compra_id) {
        $this->db->select('*');
        $this->db->from('detallecompras'); // Nombre correcto de la tabla
        $this->db->where('compra_id', $compra_id); // Asegúrate de que el campo se llame 'compra_id'
        return $this->db->get()->result();
    }
    public function obtenerCompras() {
        $this->db->select('c.idCompras, p.nombreEmpresa, c.fecha, c.total, c.usuario_id, c.fecha_creacion, c.fecha_actualizacion, dc.idCompraDetalle, dc.producto_id, dc.cantidad, dc.precio_unitario, dc.sub_total');
        $this->db->from('compras c');
        $this->db->join('detallecompras dc', 'dc.compra_id = c.idCompras', 'left');
        $this->db->join('proveedores p', 'p.idProveedor = c.proveedor_id', 'left');
        $this->db->order_by('c.fecha', 'DESC'); // Ordenar de la más reciente a la más antigua
        $query = $this->db->get();
        return $query->result();
    }

    public function actualizarStockYPrecioPromedio($idProducto, $nuevoPrecio, $cantidadNueva) {
        // Obtener información actual del producto
        $this->db->select('precio, stock'); // Seleccionamos precio y stock
        $this->db->from('productos');
        $this->db->where('idProducto', $idProducto);
        $producto = $this->db->get()->row();
    
        if ($producto) {
            // Calcular nuevo precio promedio
            // Aquí asumo que el precio promedio es el precio actual del producto,
            // ya que el nuevo precio es el que se está agregando a stock
            $precioPromedioActual = $producto->precio; // Usar el precio actual del producto
            $nuevoPrecioPromedio = (($precioPromedioActual * $producto->stock) + ($nuevoPrecio * $cantidadNueva)) / ($producto->stock + $cantidadNueva);
    
            // Actualizar stock y precio promedio
            $data = [
                'stock' => $producto->stock + $cantidadNueva,
                'precio' => $nuevoPrecioPromedio // Actualizamos el precio a nuevo precio promedio
            ];
    
            $this->db->where('idProducto', $idProducto);
            return $this->db->update('productos', $data);
        }
        return false; // Producto no encontrado
    }
    

    
}
?>

