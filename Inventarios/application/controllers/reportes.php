<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cargar modelos necesarios
        $this->load->model('Inventario_model', 'inventario_model');
        $this->load->model('Ventas_model', 'ventas_model');
        $this->load->model('Compras_model', 'compras_model');
        $this->load->library('pdf'); // Cargar la librería PDF
    }
    public function reportes() {
	
        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('reportes');
        $this->load->view('inc/footer');
    }

    

    public function generar()
{
    if ($this->session->userdata('rol') == 'ADMINISTRADOR') {
        // Verificar si algún botón fue presionado
        if ($this->input->post('reporte_inventario')) {
            $this->reporte_inventario_pdf(); // Generar el reporte de inventario
        } elseif ($this->input->post('reporte_ventas')) {
            $this->reporte_ventas_pdf(); // Generar el reporte de ventas
        } elseif ($this->input->post('reporte_compras')) {
            $this->reporte_compras_pdf(); // Generar el reporte de compras
        } else {
            // Si no se presionó ningún botón, redirigir con un mensaje
            redirect('reportes/reportes', 'refresh');
        }
    } else {
        // Si el usuario no es administrador, redirigir al panel de usuarios
        redirect('usuarios/panel', 'refresh');
    }
}


    private function reporte_inventario_pdf()
    {
        
        $inventarios = $this->inventario_model->obtenerInventarios();
        
        // Crear el PDF
        $this->pdf = new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Inventario");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210, 210, 210);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120, 10, 'REPORTE DE INVENTARIO', 0, 0, 'C', 1);
        $this->pdf->Ln(10);

        // Encabezados de la tabla
        $this->pdf->Cell(10, 5, 'ID', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(50, 5, 'Nombre', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(60, 5, 'Descripción', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(20, 5, 'Cantidad', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(20, 5, 'Precio', 'TBLR', 0, 'L', 0);
        $this->pdf->Ln(5);

        // Cuerpo de la tabla
        $this->pdf->SetFont('Arial', '', 9);
        foreach ($inventarios as $inventario) {
            $this->pdf->Cell(10, 5, $inventario->idProducto, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(50, 5, $inventario->nombre, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(60, 5, $inventario->descripcion, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(20, 5, $inventario->cantidad, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(20, 5, $inventario->precio, 'TBLR', 0, 'L', 0);
            $this->pdf->Ln(5);
        }

        // Salida del PDF
        $this->pdf->Output("reporte_inventario.pdf", "D");
    }

    private function reporte_ventas_pdf()
    {
        // Obtener la lista de ventas
        $ventas = $this->ventas_model->listar_ventas();
        
        // Crear el PDF
        $this->pdf = new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Ventas");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210, 210, 210);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120, 10, 'REPORTE DE VENTAS', 0, 0, 'C', 1);
        $this->pdf->Ln(10);

        // Encabezados de la tabla
        $this->pdf->Cell(10, 5, 'ID', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(30, 5, 'Cliente', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(30, 5, 'Fecha', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(20, 5, 'Total', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(20, 5, 'Estado', 'TBLR', 0, 'L', 0);
        $this->pdf->Ln(5);

        // Cuerpo de la tabla
        $this->pdf->SetFont('Arial', '', 9);
        foreach ($ventas as $venta) {
            $this->pdf->Cell(10, 5, $venta->idVenta, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(30, 5, $venta->cliente_id, 'TBLR', 0, 'L', 0); // Asume que cliente_id es suficiente para identificar
            $this->pdf->Cell(30, 5, $venta->fecha, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(20, 5, $venta->total, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(20, 5, $venta->estado, 'TBLR', 0, 'L', 0);
            $this->pdf->Ln(5);
        }

        // Salida del PDF
        $this->pdf->Output("reporte_ventas.pdf", "D");
    }

    private function reporte_compras_pdf()
    {
        // Obtener la lista de compras
        $compras = $this->compras_model->listar_compras();
        
        // Crear el PDF
        $this->pdf = new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Reporte de Compras");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210, 210, 210);
        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120, 10, 'REPORTE DE COMPRAS', 0, 0, 'C', 1);
        $this->pdf->Ln(10);

        // Encabezados de la tabla
        $this->pdf->Cell(10, 5, 'ID', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(30, 5, 'Proveedor', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(30, 5, 'Fecha', 'TBLR', 0, 'L', 0);
        $this->pdf->Cell(20, 5, 'Total', 'TBLR', 0, 'L', 0);
        $this->pdf->Ln(5);

        // Cuerpo de la tabla
        $this->pdf->SetFont('Arial', '', 9);
        foreach ($compras as $compra) {
            $this->pdf->Cell(10, 5, $compra->idCompras, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(30, 5, $compra->proveedor_id, 'TBLR', 0, 'L', 0); // Asume que proveedor_id es suficiente para identificar
            $this->pdf->Cell(30, 5, $compra->fecha, 'TBLR', 0, 'L', 0);
            $this->pdf->Cell(20, 5, $compra->total, 'TBLR', 0, 'L', 0);
            $this->pdf->Ln(5);
        }

        // Salida del PDF
        $this->pdf->Output("reporte_compras.pdf", "D");
    }
}
