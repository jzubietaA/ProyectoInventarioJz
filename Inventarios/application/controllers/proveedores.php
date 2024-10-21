<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

    public function agregarproveedor() {
	
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('agregarProveedor');
        $this->load->view('inc/footer');
    }

    public function agregarbd()
    {
        
        $data['nombreEmpresa']=$_POST['nombreEmpresa'];
        $data['email']=$_POST['email'];
        $data['celular']=$_POST['celular'];
        $data['direccion'] = $_POST['direccion'];

        $lista=$this->proveedores_model->agregarproveedor($data);
        redirect('proveedores/listaProveedores', 'refresh');
    }

    
    public function listaproveedores()
	{
		if($this->session->userdata('acceso'))
		{
			$lista=$this->proveedores_model->listaproveedores();
			$data['proveedores']=$lista;

			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('listaProveedores',$data);
			$this->load->view('inc/footer');		
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
		
	}
    public function deshabilitados()
	{
		$lista=$this->proveedores_model->listadeshabilitados();
		$data['proveedores']=$lista;

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('proveedoresDeshabilitado',$data);
		$this->load->view('inc/footer');
		
	}
    public function deshabilitarbd()
	{
		$idProveedor=$_POST['idproveedor'];
		$data['estado']='0';

		$this->proveedores_model->modificarproveedores($idProveedor,$data);
		redirect('proveedores/listaproveedores','refresh');
	}

	public function habilitarbd()
	{
		$idProveedor=$_POST['idproveedor'];
		$data['estado']='1';

		$this->proveedores_model->modificarproveedores($idProveedor,$data);
		redirect('proveedores/deshabilitados','refresh');
	}
    public function modificar()
	{
		$idProveedor=$_POST['idproveedor'];
		$data['infoproveedor']=$this->proveedores_model->recuperarproveedor($idProveedor);

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('proveedorModificar',$data);
		$this->load->view('inc/footer');
		
	}

	public function modificarbd()
	{
		$idProveedor = $this->input->post('idproveedor');
		$data['nombreEmpresa']=$_POST['nombreEmpresa'];
        $data['email']=$_POST['email'];
        $data['celular']=$_POST['celular'];
        $data['direccion'] = $_POST['direccion'];

		$lista=$this->proveedores_model->modificarproveedores($idProveedor,$data);
		redirect('proveedores/listaProveedores','refresh');
       
	}
    public function eliminarbd()
	{
		$idProveedor=$_POST['idproveedor'];
		$this->proveedores_model->eliminarproveedor($idProveedor);
		redirect('proveedores/listaproveedores','refresh');
	}
	

}
?>