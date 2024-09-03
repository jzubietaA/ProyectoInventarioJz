<?php
class Producto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Agrega un nuevo producto
    public function agregarproducto($data) {
        $this->db->insert('productos', $data);
    }

    // Lista productos habilitados
    public function listaproducto() {
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->where('estado', '1');
        return $this->db->get();  // Devuelve un objeto de tipo CI_DB_result
    }

    // Modifica un producto existente
    public function modificarproducto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('productos', $data);
    }

    // Lista productos deshabilitados
    public function listadeshabilitados() {
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->where('estado', '0');
        return $this->db->get(); // Devuelve un objeto de tipo CI_DB_result
    }

    // Recupera un producto por ID
	public function recuperarproducto($id)
	{
		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('id',$id);
		return $this->db->get(); //devuelve el resultado
	}

    // Elimina un producto
    public function eliminarProducto($id) {
        $this->db->where('id', $id);
        $this->db->delete('productos');
    }

    // Obtiene categorías (asumiendo que tienes una tabla 'categorias')
    public function obtener_categorias() {
        $this->db->select('id, nombre');
        $this->db->from('categorias');
        return $this->db->get()->result(); // Devuelve un array de objetos
    }
    

}
?>
