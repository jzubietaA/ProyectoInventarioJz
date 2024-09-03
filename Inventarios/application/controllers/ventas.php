<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ventas_model');  // Carga el modelo
        $this->load->library('upload'); // Cargar la librería de subida de archivos
    }

    
    public function detalleVenta()
	{
		if($this->session->userdata('rol')=='ADMINISTRADOR')
		{ 
			$data['infoProducto']=$this->ventas_model->listaproducto();
			
			$this->load->view('inc/head');
            $this->load->view('inc/menu');
			$this->load->view('ventasForm',$data);
			$this->load->view('inc/footer');
		}
		else
		{
			redirect('usuario/menu','refresh');
		}
	}

	public function detalleVentabd()
	{
		$data['cliente_id']=$_POST['cliente_id'];
		$data['fecha']=$_POST['fecha'];
		$data['total']=$_POST['total'];
        $data['usuario_id']=$_POST['usuario_id'];
		$data['fecha_creacion']=$_POST['fecha_creacion'];
		$data['fecha_actualizacion']=$_POST['fecha_actualizacion'];
		$id=$_POST['idproducto'];

		$this->ventas_model->insertarVenta($id,$data);
		redirect('usuario/index','refresh');

	}
    
}
?>