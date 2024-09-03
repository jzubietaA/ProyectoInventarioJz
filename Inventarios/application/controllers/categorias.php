<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('producto_model');
        $this->load->model('categoria_model');
        $this->load->library('upload');
    }

    public function agregar_categoria() {
        // Cargar vista para agregar categoría
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('agregarCategoria');
        $this->load->view('inc/footer');
    }

    public function guardar_categoria() {
        $data = array(
            'nombre' => $this->input->post('nombre')
        );
        $this->categoria_model->agregar_categoria($data);
        redirect('producto/lista_categorias', 'refresh');
    }

    public function lista_categorias() {
        $data['categorias'] = $this->categoria_model->obtener_categorias();
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaCategorias', $data);
        $this->load->view('inc/footer');
    }

    public function lista_productos() {
        $data['productos'] = $this->producto_model->listaproducto();
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaProductos', $data);
        $this->load->view('inc/footer');
    }

    public function detalle_producto($id) {
        $data['producto'] = $this->producto_model->recuperarproducto($id);
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('detalleProducto', $data);
        $this->load->view('inc/footer');
    }
}
?>
