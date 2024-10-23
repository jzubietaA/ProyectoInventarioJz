<?php
class Reporte extends CI_Controller {
    public function reportes(){
        $this->load->model('Reporte_model');
        $fecha_inicio = $this->input->get('fecha_inicio');
        $fecha_fin = $this->input->get('fecha_fin');
        $nombre_producto = $this->input->get('nombre_producto');
        $categoria_id = $this->input->get('categoria_id');

        $data['productos'] = $this->Reporte_model->obtener_productos_filtrados($fecha_inicio, $fecha_fin, $nombre_producto, $categoria_id);
        $data['categorias'] = $this->Reporte_model->obtener_categorias(); // Obtener categorías para el filtro
       

        $this->load->view('inc/head');
        $this->load->view('inc/menu');
        $this->load->view('reportes', $data);
        $this->load->view('inc/footer');
        
    }
}
?>