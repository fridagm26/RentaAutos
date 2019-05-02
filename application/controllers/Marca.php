<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('Marca_model');
		$this->load->model('Modulos_model');
	}
	public function index()
	{
		$data['modulos'] = $this->Modulos_model->getModulos();
        $this->load->view('marca',$data);
    }
    
    public function guardarMarca(){
        $nombre = $this->input->post('txtNombreMarca');
        $this->Marca_model->altaMarca($nombre);
        $this->load->view('marca');
    }

    public function mostrarMarca(){
        echo json_encode($this->Marca_model->getMarca());
    }
	
}