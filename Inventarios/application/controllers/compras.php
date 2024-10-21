<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Compras_model'); // Cargar el modelo de compras
        $this->load->library('form_validation'); // Cargar la librería de validación de formularios
    }

    // Método para mostrar el formulario de agregar compra
    public function agregarCompras() {
        // Obtener datos de productos y proveedores desde el modelo
        $data['productos'] = $this->Compras_model->obtenerProductos();
        $data['proveedores'] = $this->Compras_model->obtenerProveedores();

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('comprasForm', $data); // Asegúrate de que esta vista exista
        $this->load->view('inc/footer');
    }
    public function listaCompras() {
        $data['compras'] = $this->Compras_model->obtenerCompras();
        
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaCompras', $data); // Asegúrate de crear la vista 'lista_compras'
        $this->load->view('inc/footer');
    }
    
    public function procesarCompra() {
        // Iniciar transacción
        $this->db->trans_start();
    
        // Registrar compra en la tabla de compras
        $compraData = array(
            'proveedor_id' => $this->input->post('proveedor_id'),
            'fecha' => $this->input->post('fecha'),
            'total' => $this->input->post('total'),
            'fecha_creacion' => date('Y-m-d H:i:s'),
            'fecha_actualizacion' => date('Y-m-d H:i:s')
        );
        $this->Compras_model->agregarCompra($compraData);
        $compra_id = $this->db->insert_id(); // Obtener ID de la compra
    
        // Procesar los detalles de la compra
        $detalles = $this->input->post('detalle');
        foreach ($detalles as $detalle) {
            $detalleData = array(
                'compra_id' => $compra_id,
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'precio_unitario' => $detalle['precio_unitario'],
                'sub_total' => $detalle['subtotal']
            );
            $this->Compras_model->agregarDetalle($detalleData);
    
            // Actualizar el stock y precio promedio del producto
            $this->Compras_model->actualizarStockYPrecioPromedio($detalle['producto_id'], $detalle['cantidad'], $detalle['precio_unitario']);
        }
    
        // Finalizar transacción
        $this->db->trans_complete();
    
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Hubo un problema al registrar la compra.');
        } else {
            $this->session->set_flashdata('success', 'Compra registrada exitosamente.');
        }
    
        // Redirigir
        redirect('compras/listaCompras');
    }
    
    
}





