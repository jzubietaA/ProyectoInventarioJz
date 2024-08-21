<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index() 
    {
        $this->load->view('inc/master_login/head');
        $this->load->view('inc/master_login/menu');
        $this->load->view('loginform');
        $this->load->view('inc/master_login/footer');
    }

    public function menu() 
    {
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('menu');
        $this->load->view('inc/footer');
    }

    public function agregarusuario() 
    {
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('user_add');  // Asegúrate de que esta vista existe
        $this->load->view('inc/footer');
    }

    public function validarusuario() 
    {
        $acceso = $_POST['acceso'];
        $contrasenia = md5($_POST['contrasenia']);
        echo $acceso;
		echo $contrasenia;

        $consulta = $this->usuario_model->validar($acceso, $contrasenia);
        echo $consulta->num_rows();

        if ($consulta->num_rows() > 0)
        {
            foreach ($consulta->result() as $row)
            {
                $this->session->set_userdata('idUsuario', $row->idUsuario);
                $this->session->set_userdata('acceso', $row->acceso);
                $this->session->set_userdata('rol', $row->rol);

                redirect('usuario/menu', 'refresh');
            }
        } 
        else 
        {
            redirect('usuario/index', 'refresh');
        }
    }

    public function logout() 
    {
        $this->session->sess_destroy();
        redirect('usuario/index', 'refresh');
    }

    public function agregarbd()
    {
        $data['nombres'] = strtoupper($_POST['nombres']);
        $data['primerApellido'] = strtoupper($_POST['primerApellido']);
        $data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
        $data['acceso'] = strtoupper($_POST['acceso']);
        $data['contrasenia'] = strtoupper(md5($_POST['contrasenia']));
        $data['rol'] = strtoupper($_POST['rol']);

        $this->usuario_model->agregarusuario($data);
        redirect('usuario/listausuario', 'refresh');
    }
    public function listausuario()
	{
		if($this->session->userdata('acceso'))
		{
			$lista=$this->usuario_model->listausuarios();
			$data['usuario']=$lista;

			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('listaUsuario',$data);
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
		$idUsuario=$_POST['idusuario'];
		$data['estado']='0';

		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('usuario/listausuario','refresh');
	}

	public function habilitarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['estado']='1';

		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('usuario/deshabilitados','refresh');
	}
    public function modificar()
	{
		$idUsuario=$_POST['idusuario'];
		$data['infouser']=$this->usuario_model->recuperarusuario($idUsuario);

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('formmodificar',$data);
		$this->load->view('inc/footer');
		
	}

	public function modificarbd()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['nombres']=strtoupper($_POST['nombres']);
		$data['primerApellido']=strtoupper($_POST['primerApellido']);
		$data['segundoApellido']=strtoupper($_POST['segundoApellido']);
        $data['acceso']=strtoupper($_POST['acceso']);
        $data['contrasenia']=strtoupper($_POST['contrasenia']);
		$data['rol']=strtoupper($_POST['rol']);

		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('usuario/listausuario','refresh');
	}
    public function eliminarbd()
	{
		$idUsuario=$_POST['idusuario'];
		$this->usuario_model->eliminarusuario($idUsuario);
		redirect('usuario/listausuario','refresh');
	}

}
?>

