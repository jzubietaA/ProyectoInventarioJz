<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Inventario_model');
    }

    // Mostrar la lista de inventarios
    public function inventario() {
        $data['inventarios'] = $this->Inventario_model->obtenerInventarios();

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('inventarioViews',$data);
        $this->load->view('inc/footer');
    }

    

    // Agregar un nuevo producto
    public function agregar() {
        if ($this->input->post()) {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'),
                'cantidad' => $this->input->post('cantidad'),
                'precio' => $this->input->post('precio'),
                'fecha_creacion' => date('Y-m-d H:i:s')
            ];
            $this->Inventario_model->agregarProducto($data);
            redirect('inventario');
        }
        $this->load->view('inventario/agregar');
    }

    // Editar un producto
    public function editar($id) {
        $producto = $this->Inventario_model->obtenerProducto($id);
        if ($this->input->post()) {
            $data = [
                'nombre' => $this->input->post('nombre'),
                'descripcion' => $this->input->post('descripcion'),
                'cantidad' => $this->input->post('cantidad'),
                'precio' => $this->input->post('precio'),
                'fecha_actualizacion' => date('Y-m-d H:i:s')
            ];
            $this->Inventario_model->actualizarProducto($id, $data);
            redirect('inventario');
        }
        $data['producto'] = $producto;
        $this->load->view('inventario/editar', $data);
    }

    // Eliminar un producto
    public function eliminar($id) {
        $this->Inventario_model->eliminarProducto($id);
        redirect('inventario');
    }
}
