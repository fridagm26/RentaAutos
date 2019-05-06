<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Modelo_model');
		$this->load->model('Modulos_model');
	}
	public function index()
	{
		$data['modulos'] = $this->Modulos_model->getModulos();
        $this->load->view('modelo',$data);
    }

    public function mostrarMarcas(){
        echo json_encode($this->Modelo_model->getMarcas());
    }

    public function guardarModelo(){
        $data['nombreModelo'] = $this->input->post('txtNombreModelo');
        $data['disponibilidad'] = $this->input->post('txtDisponibilidad');
        $data['totales'] = $this->input->post('txtTotales');
        $data['idMarca'] = $this->input->post('idMarca');
        $this->Modelo_model->altaModelo($data);
    }

    public function mostrarModelos(){
        echo json_encode($this->Modelo_model->getModelos());
    }
    
    public function eliminarModelo(){
        $idModelo = $this->input->post('idModelo');
        echo $this->Modelo_model->eliminarModelo($idModelo);
    }
}