<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

    public function listaproducto()
    {
        $this->db->select('*'); // select *
		$this->db->from('productos'); //tabla
		return $this->db->get(); //devolución del resultado de la consulta
    }

    public function insertarVenta($data)
    {
        
        $this->db->trans_start();//inicio
		$this->db->insert('ventas',$data);
		$idVenta=$this->db->insert_id();

		$data2['idproducto']=$producto_id;
		$data2['idventa']=$venta_id;
		$this->db->insert('detalleVentas',$data2);

		$this->db->trans_complete();//final

		if($this->db->trans_status()===FALSE)
		{
			return false;
		}
        
    }
   
}
