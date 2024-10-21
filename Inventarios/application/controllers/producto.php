<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {
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
        $config['upload_path'] = './uploads/productos/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // Tamaño máximo en KB (2 MB)
        $config['encrypt_name'] = TRUE; // Para evitar problemas con caracteres
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('foto')) {
            // Subida exitosa, guarda el nombre del archivo
            $file_data = $this->upload->data();
            $data['foto'] = $file_data['file_name'];
        } else {
            // Si no se sube la imagen, deja el campo vacío o maneja un error
            $data['foto'] = ''; // O maneja el error $this->upload->display_errors();
        }
    
        // Recoge otros datos del formulario
        $data['nombre'] = $this->input->post('nombre');
        $data['descripcion'] = $this->input->post('descripcion');
        $data['precio'] = $this->input->post('precio');
        $data['stock'] = $this->input->post('stock');
        $data['categoria_id'] = $this->input->post('categoria_id');
        $data['estado'] = 1; // Activo
    
        // Inserta el producto en la base de datos
        $this->producto_model->agregarproducto($data);
    
        // Redireccionar o mostrar un mensaje de éxito
        redirect('producto/listaproducto');
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
        $idProducto = $this->input->post('idproducto');
        $data = array('estado' => '0');

        $this->producto_model->modificarproducto($idProducto, $data);
        redirect('producto/listaproducto', 'refresh');
    }

    public function habilitarbd() {
        $idProducto = $this->input->post('idproducto');
        $data = array('estado' => '1');

        $this->producto_model->modificarproducto($idProducto, $data);
        redirect('producto/deshabilitados', 'refresh');
    }

    public function modificar() {
        $idProducto = $this->input->post('idproducto'); 
        $data['infoproducto'] = $this->producto_model->recuperarproducto($idProducto);
    
        // Obtener categorías para el formulario de modificación
        $data['categorias'] = $this->producto_model->obtener_categorias(); 
    
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('productoModificar', $data);
        $this->load->view('inc/footer');

    }
    

    public function modificarbd()
    {
        $idProducto = $this->input->post('idproducto');
        
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
        $config['file_name'] = $idProducto . '.jpg'; // Suponiendo que el nombre del archivo será el ID con extensión .jpg
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
        $this->producto_model->modificarproducto($idProducto, $data);

        // Redirigir a la lista de productos
        redirect('producto/listaproducto', 'refresh');
    }
    
    public function eliminarbd() {
        $idProducto = $this->input->post('idproducto');
        $this->producto_model->eliminarProducto($idProducto);
        redirect('producto/listaproducto', 'refresh');
    }   
}
?>
