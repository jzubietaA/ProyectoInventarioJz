<?php
class Clientes_model extends CI_Model {

	public function agregarcliente($data)
	{
		$this->db->insert('clientes',$data);
	}
	public function listacliente()
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}
	public function modificarcliente($idCliente,$data)
	{
		$this->db->where('idcliente',$idCliente);
		$this->db->update('',$data);
	}
	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}
	public function recuperarcliente($idCliente)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('idcliente',$idCliente);
		return $this->db->get(); //devuelve el resultado
	}
	public function eliminarCliente($idCliente)
	{
		$this->db->where('idcliente',$idCliente);
		$this->db->delete('clientes');
	}
	
}
?>