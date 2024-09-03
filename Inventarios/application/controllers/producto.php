<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('producto_model');  // Carga el modelo
        $this->load->library('upload'); // Cargar la librería de subida de archivos
    }

    public function menu() {
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('menu');
        $this->load->view('inc/footer');
    }

    public function agregarproducto() {
        // Obtener categorías para el formulario
        $data['categorias'] = $this->producto_model->obtener_categorias();

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('agregarProducto', $data);
        $this->load->view('inc/footer');
    }

    public function agregarbd() {
        // Configuración de la subida de archivo
        $config['upload_path'] = './uploads/productos/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 2048; // Tamaño máximo en KB

        $this->upload->initialize($config);

        // Manejo de la subida de foto
        if ($this->upload->do_upload('foto')) {
            $foto_data = $this->upload->data();
            $foto = $foto_data['file_name'];
        } else {
            $foto = ''; // Usa una imagen por defecto si no se sube una foto
        }

        $data = array(
            'nombre' => strtoupper($this->input->post('nombre')),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'categoria_id' => $this->input->post('categoria_id'),
            'foto' => $foto,
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fecha_actualizacion' => date('Y-m-d H:i:s'),
            'estado' => '1'  // Producto habilitado por defecto
        );

        $this->producto_model->agregarproducto($data);
        redirect('producto/listaproducto', 'refresh');
    }

    public function listaproducto() {
        $lista = $this->producto_model->listaproducto();
        $data['productos'] = $lista;

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaProductos', $data);
        $this->load->view('inc/footer');
    }

    public function deshabilitados() {
        $lista = $this->producto_model->listadeshabilitados();
        $data['productos'] = $lista; // Cambié 'producto' a 'productos' para mantener la consistencia

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('deshabilitados', $data);
        $this->load->view('inc/footer');
    }

    public function deshabilitarbd() {
        $id = $this->input->post('id');
        $data = array('estado' => '0');

        $this->producto_model->modificarproducto($id, $data);
        redirect('producto/listaproducto', 'refresh');
    }

    public function habilitarbd() {
        $id = $this->input->post('id');
        $data = array('estado' => '1');

        $this->producto_model->modificarproducto($id, $data);
        redirect('producto/deshabilitados', 'refresh');
    }

    public function modificar()
	{
		$id=$_POST['id'];
		$data['infoproducto']=$this->producto_model->recuperarproducto($id);

		$this->load->view('inc/head');
		$this->load->view('inc/menu');
		$this->load->view('productoModificar',$data);
		$this->load->view('inc/footer');
		
	}
    

    public function modificarbd()
    {
        $id = $this->input->post('id');
        
        // Datos a actualizar
        $data = array(
            'nombre' => strtoupper($this->input->post('nombre')),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'categoria_id' => $this->input->post('categoria_id'),
            'fecha_actualizacion' => date('Y-m-d H:i:s')
        );

        // Configuración de la subida de imagen
        $config['upload_path'] = './uploads/productos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $id . '.jpg'; // Suponiendo que el nombre del archivo será el ID con extensión .jpg
        $this->load->library('upload', $config);

        // Si se ha subido un nuevo archivo
        if (!empty($_FILES['foto']['name'])) {
            $direccion = $config['upload_path'] . $config['file_name'];
            
            // Eliminar la imagen anterior si existe
            if (file_exists($direccion)) {
                unlink($direccion);
            }

            // Subir la nueva imagen
            if (!$this->upload->do_upload('foto')) {
                $data['error'] = $this->upload->display_errors(); // Guardar errores si ocurre un problema
            } else {
                $data['foto'] = $config['file_name']; // Actualizar el nombre del archivo en la base de datos
            }
        } else {
            // Si no se sube una nueva imagen, conserva la imagen actual
            $data['foto'] = $this->input->post('foto_actual');
        }

        // Actualizar el producto en la base de datos
        $this->producto_model->modificarproducto($id, $data);

        // Redirigir a la lista de productos
        redirect('producto/listaproducto', 'refresh');
    }


        public function eliminarbd() {
            $id = $this->input->post('id');
            $this->producto_model->eliminarProducto($id);
            redirect('producto/listaproducto', 'refresh');
    }
    
}
?>
