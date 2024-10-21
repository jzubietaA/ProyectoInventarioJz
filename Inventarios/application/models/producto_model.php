<?php
class Producto_model extends CI_Model {

    // Agrega un nuevo producto
    public function agregarproducto($data) {
        $this->db->insert('productos', $data);
    }

    // Lista productos habilitados
    public function listaproducto() {
        // Selecciona todos los campos de la tabla productos y el nombre de la categoría
        $this->db->select('productos.*, categorias.nombre AS nombre_categoria');
        $this->db->from('productos');
        // Realiza la unión con la tabla de categorías
        $this->db->join('categorias', 'productos.categoria_id = categorias.idcategoria');
        // Filtra por productos habilitados
        $this->db->where('productos.estado', '1');
        return $this->db->get()->result();  // Devuelve un array de objetos
    }

    // Modifica un producto existente
    public function modificarproducto($idProducto, $data) {
        $this->db->where('idproducto', $idProducto);
        $this->db->update('productos', $data);
    }

    // Lista productos deshabilitados
    public function listadeshabilitados() {
        $this->db->select('productos.*, categorias.nombre AS nombre_categoria');
        $this->db->from('productos');
        $this->db->join('categorias', 'productos.categoria_id = categorias.idcategoria');
        $this->db->where('productos.estado', '0');
        return $this->db->get()->result();  // Devuelve un array de objetos
    }

    // Recupera un producto por ID
    public function recuperarproducto($idProducto) {
        $this->db->select('productos.*, categorias.nombre AS nombre_categoria');
        $this->db->from('productos');
        $this->db->join('categorias', 'productos.categoria_id = categorias.idcategoria');
        $this->db->where('idproducto', $idProducto);
        return $this->db->get()->row();  // Devuelve un único objeto
    }

    // Elimina un producto
    public function eliminarProducto($idProducto) {
        $this->db->where('idproducto', $idProducto);
        $this->db->delete('productos');
    }

    // Obtener categorías
    public function obtener_categorias() {
        $query = $this->db->get('categorias');  // Cambia 'categorias' por el nombre de tu tabla de categorías
        return $query->result();  // Devuelve un array de objetos con las categorías
    }

    // Método para actualizar el stock del producto
    public function actualizarStock($producto_id, $cantidad_vendida) {
        // Primero obtenemos la cantidad actual del producto
        $this->db->select('stock');
        $this->db->where('idproducto', $producto_id);
        $query = $this->db->get('productos');
        $producto = $query->row();

        // Asegurarse de que el producto existe y que hay suficiente cantidad
        if ($producto && $producto->stock >= $cantidad_vendida) {
            // Calculamos la nueva cantidad en el inventario
            $nueva_cantidad = $producto->stock - $cantidad_vendida;

            // Actualizamos la cantidad del producto
            $this->db->where('idproducto', $producto_id);
            $this->db->update('productos', array('stock' => $nueva_cantidad));
        } else {
            // Manejo del caso donde no hay suficiente stock
            return false;  // Esto puede usarse para mostrar un mensaje de error
        }
        return true;
    }
}
?>
