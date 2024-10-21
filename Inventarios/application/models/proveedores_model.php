<?php
class Proveedores_model extends CI_Model {

    // Agrega un nuevo producto
    public function agregarproveedor($data) {
        $this->db->insert('proveedores', $data);
    }

    // Lista productos habilitados
    public function listaproveedores() {
        $this->db->select('*');
        $this->db->from('proveedores');
        $this->db->where('estado', '1');
        return $this->db->get();  // Devuelve un objeto de tipo CI_DB_result
    }

    // Modifica un producto existente
    public function modificarproveedores($idProveedor, $data) {
        $this->db->where('idproveedor', $idProveedor);
        $this->db->update('proveedores', $data);
    }

    // Lista productos deshabilitados
    public function listadeshabilitados() {
        $this->db->select('*');
        $this->db->from('proveedores');
        $this->db->where('estado', '0');
        return $this->db->get(); // Devuelve un objeto de tipo CI_DB_result
    }

    // Recupera un producto por ID
	public function recuperarproveedor($idProveedor)
	{
		$this->db->select('*');
		$this->db->from('proveedores');
		$this->db->where('idproveedor',$idProveedor);
		return $this->db->get(); 
	}

    // Elimina un producto
    public function eliminarproveedor($idProveedor) {
        $this->db->where('idproveedor', $idProveedor);
        $this->db->delete('proveedores');
    }
}
?>