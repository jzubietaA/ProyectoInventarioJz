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
		$this->load->library('form_validation');

		// Reglas de validación para los nombres
		$this->form_validation->set_rules('nombres', 'Nombre de usuario', 'required|min_length[4]|max_length[12]|regex_match[/^[a-zA-Z\s]+$/]', array(
			'required' => 'Se requiere el nombre',
			'min_length' => 'Por lo menos 4 caracteres',
			'max_length' => 'Máximo 12 caracteres',
			'regex_match' => 'El nombre solo puede contener letras y espacios'
		));

		// Reglas de validación para el primer apellido
		$this->form_validation->set_rules('primerApellido', 'Primer Apellido', 'required|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z\s]+$/]', array(
			'required' => 'Se requiere el primer apellido',
			'min_length' => 'Por lo menos 4 caracteres',
			'max_length' => 'Máximo 50 caracteres',
			'regex_match' => 'El primer apellido solo puede contener letras y espacios'
		));

		// Reglas de validación para el segundo apellido
		$this->form_validation->set_rules('segundoApellido', 'Segundo Apellido', 'required|min_length[4]|max_length[50]|regex_match[/^[a-zA-Z\s]+$/]', array(
			'required' => 'Se requiere el segundo apellido',
			'min_length' => 'Por lo menos 4 caracteres',
			'max_length' => 'Máximo 50 caracteres',
			'regex_match' => 'El segundo apellido solo puede contener letras y espacios'
		));

		// Reglas de validación para el correo electrónico
		$this->form_validation->set_rules('correoElectronico', 'Correo Electrónico', 'required|valid_email', array(
			'required' => 'Se requiere el correo electrónico',
			'valid_email' => 'El correo electrónico no es válido'
		));

		// Reglas de validación para el campo de acceso
		$this->form_validation->set_rules('acceso', 'Acceso', 'required|min_length[3]|max_length[20]', array(
			'required' => 'Se requiere el acceso',
			'min_length' => 'Por lo menos 3 caracteres',
			'max_length' => 'Máximo 20 caracteres'
		));

		// Reglas de validación para la contraseña
		$this->form_validation->set_rules('contrasenia', 'Contraseña', 'required|min_length[6]', array(
			'required' => 'Se requiere la contraseña',
			'min_length' => 'La contraseña debe tener al menos 6 caracteres'
		));

		// Reglas de validación para el rol
		$this->form_validation->set_rules('rol', 'Rol', 'required', array(
			'required' => 'Se requiere seleccionar un rol'
		));

		if ($this->form_validation->run() == FALSE) {
			// Cargar vistas si la validación falla
			$this->load->view('inc/head');
			$this->load->view('inc/menu');
			$this->load->view('user_add');  // Asegúrate de que esta vista existe
			$this->load->view('inc/footer');
		} else{
			// Procesar los datos válidos
			$data['nombres'] = strtoupper($_POST['nombres']);
        	$data['primerApellido'] = strtoupper($_POST['primerApellido']);
        	$data['segundoApellido'] = strtoupper($_POST['segundoApellido']);
        	$data['correoElectronico'] = ($_POST['correoElectronico']);
        	$data['acceso'] = ($_POST['acceso']);
        	$data['contrasenia'] =(md5($_POST['contrasenia']));
        	$data['rol'] = strtoupper($_POST['rol']);

        	$this->usuario_model->agregarusuario($data);
        	redirect('usuario/listausuario', 'refresh');
		}
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
        $data['acceso']=($_POST['acceso']);
        $data['contrasenia']=($_POST['contrasenia']);
		$data['rol']=strtoupper($_POST['rol']);
        $nombrearchivo=$idUsuario.".jpg";

        $config['upload_path']='./uploads/usuarios/';
		$config['file_name']=$nombrearchivo;
		$direccion="./uploads/usuarios/".$nombrearchivo;
		if(file_exists($direccion))
		{
			unlink($direccion);
		}
		$config['allowed_types']='jpg';
		$this->load->library('upload',$config);

		if(!$this->upload->do_upload())
		{
			$data['error']=$this->upload->display_errors();
		}
		else
		{
			$data['foto']=$nombrearchivo;
		}

		$this->usuario_model->modificarusuario($idUsuario,$data);
		redirect('usuario/listausuario','refresh');
        $this->upload->data();
        
	}
    public function eliminarbd()
	{
		$idUsuario=$_POST['idusuario'];
		$this->usuario_model->eliminarusuario($idUsuario);
		redirect('usuario/listausuario','refresh');
	}
	

}
?>

