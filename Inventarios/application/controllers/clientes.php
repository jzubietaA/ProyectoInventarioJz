<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    

    public function agregarcliente() 
    {
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('agregarCliente');  // Asegúrate de que esta vista existe
        $this->load->view('inc/footer');
    }
    public function agregarbd()
    {
        // Procesar los datos válidos
        $data['nombre']=$_POST['nombreCliente'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
        $data['email']=$_POST['emailCliente'];
        $data['celular']=$_POST['celularCliente'];
        $data['direccion'] = $_POST['direccionCliente'];

        $lista=$this->clientes_model->agregarcliente($data);
        redirect('clientes/listacliente', 'refresh');
    }

    
    public function listacliente()
	{
		if($this->session->userdata('acceso'))
		{
			$lista=$this->clientes_model->listacliente();
			$data['clientes']=$lista;

			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('listaCliente',$data);
			$this->load->view('inc/footer');		
		}
		else
		{
			redirect('usuarios/index','refresh');
		}
		
	}
    public function deshabilitados()
	{
		$lista=$this->usuario_model->listadeshabilitados();
		$data['usuario']=$lista;

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('deshabilitados',$data);
		$this->load->view('inc/footer');
		
	}
    public function deshabilitarbd()
	{
		$idCliente=$_POST['idcliente'];
		$data['estado']='0';

		$this->usuario_model->modificarcliente($idCliente,$data);
		redirect('clientes/listaCliente','refresh');
	}

	public function habilitarbd()
	{
		$idCliente=$_POST['idcliente'];
		$data['estado']='1';

		$this->clientes_model->modificarcliente($idCliente,$data);
		redirect('clientes/deshabilitados','refresh');
	}
    public function modificar()
	{
		$idCliente=$_POST['idcliente'];
		$data['infocliente']=$this->clientes_model->recuperarcliente($idCliente);

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('modificarCliente',$data);
		$this->load->view('inc/footer');
		
	}

	public function modificarbd()
	{
		$data['nombre']=$_POST['nombreCliente'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
        $data['email']=$_POST['emailCliente'];
        $data['celular']=$_POST['celularCliente'];
        $data['direccion'] = $_POST['direccionCliente'];

		$lista=$this->clientes_model->modificarclientes($idCliente,$data);
		redirect('clientes/listaclientes','refresh');
       
        
	}
    public function eliminarbd()
	{
		$idCliente=$_POST['idcliente'];
		$this->clientes_model->eliminarcliente($idCliente);
		redirect('clientes/listacliente','refresh');
	}
	

}
?>