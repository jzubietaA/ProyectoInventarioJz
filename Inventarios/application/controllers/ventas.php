<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Ventas_model'); // Cargar el modelo de ventas
        $this->load->model('DetalleVentas_model'); // Cargar el modelo de detalles de venta
        $this->load->model('Producto_model'); // Cargar el modelo de productos para actualizar el stock
    }

    // Método para mostrar el formulario de agregar venta
    public function agregarventa() {
        // Obtener datos de productos y clientes desde el modelo
        $data['productos'] = $this->Ventas_model->obtenerProductos();
        $data['clientes'] = $this->Ventas_model->obtenerClientes();

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('ventasForm', $data);  // Asegúrate de que esta vista existe
        $this->load->view('inc/footer');
    }
    public function listaVentas() {
        $data['ventas'] = $this->Ventas_model->obtenerVentasConDetalles();
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('listaVentas', $data); 
        $this->load->view('inc/footer');
        
    }

    // Método para procesar la venta
    public function procesarVenta() {
        // Recibir los datos del formulario
        $cliente_id = $this->input->post('cliente_id');
        $carrito = json_decode($this->input->post('carrito'), true); // Decodificar el carrito de JSON a array
        $totalVenta = 0;

        // Calcular el total de la venta
        foreach ($carrito as $producto) {
            $totalVenta += $producto['total'];
        }

        // Preparar datos para la venta
        $data_venta = array(
            'cliente_id' => $cliente_id,
            'fecha' => date('Y-m-d H:i:s'),
            'total' => $totalVenta,
            'usuario_id' => $this->session->userdata('usuario_id'), // Suponiendo que tienes un usuario logueado
            'fecha_creacion' => date('Y-m-d H:i:s'),
        );

        // Iniciar transacción
        $this->db->trans_start();

        // Registrar la venta
        $this->Ventas_model->agregarVenta($data_venta);
        $venta_id = $this->Ventas_model->obtenerUltimaVenta();

        // Registrar cada detalle de la venta y actualizar el stock de productos
        foreach ($carrito as $detalle) {
            $data_detalle = array(
                'venta_id' => $venta_id,
                'producto_id' => $detalle['productoId'],
                'cantidad' => $detalle['cantidad'],
                'precio_unitario' => $detalle['precioUnitario'],
            );
            $this->DetalleVentas_model->agregarDetalle($data_detalle);

            // Actualizar el stock del producto después de registrar el detalle
            $this->Producto_model->actualizarStock($detalle['productoId'], $detalle['cantidad']);
        }

        // Finalizar transacción
        $this->db->trans_complete();

        // Comprobar el estado de la transacción
        if ($this->db->trans_status() === FALSE) {
            // Manejar error
            $this->session->set_flashdata('error', 'Error al registrar la venta. Intente nuevamente.');
        } else {
            $this->session->set_flashdata('success', 'Venta registrada exitosamente.');
        }

        redirect('ventas/listaVentas'); // Redirigir a la lista de ventas
    }
}
?>