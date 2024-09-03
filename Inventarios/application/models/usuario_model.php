<?php
class Usuario_model extends CI_Model {

    public function validar($acceso,$contrasenia)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('acceso',$acceso);
		$this->db->where('contrasenia',$contrasenia);
		return $this->db->get(); //devuelve el resultado
		
	}
	public function agregarusuario($data)
	{
		$this->db->insert('usuarios',$data);
	}
	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('estado','1');
		return $this->db->get(); //devuelve el resultado
	}
	public function modificarusuario($idUsuario,$data)
	{
		$this->db->where('idUsuario',$idUsuario);
		$this->db->update('usuarios',$data);
	}
	public function listadeshabilitados()
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('estado','0');
		return $this->db->get(); //devuelve el resultado
	}
	public function recuperarusuario($idUsuario)
	{
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->get(); //devuelve el resultado
	}
	public function eliminarusuario($idUsuario)
	{
		$this->db->where('idusuario',$idUsuario);
		$this->db->delete('usuarios');
	}
	
}
?>


    
