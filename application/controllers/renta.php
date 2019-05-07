<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/

class Renta extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('mRenta');
        $this->load->model('Modulos_model');
	}
	public function index()
	{
		$data['modulos'] = $this->Modulos_model->getModulos();
		$data['marcas'] = $this->mRenta->getMarcas();
        $data['modelos'] = $this->mRenta->getModelos();
		$this->load->view('renta/rentaAutos',$data);
	}
	
	public function guardar(){
        $data['modulos'] = $this->Modulos_model->getModulos();
        $this->load->view('usuario',$data);
		$param[''] = $this->input->post('slctMarca');
		$param[''] = $this->input->post('slctModelo');
		$param[''] = $this->input->post('txtYear');
		$param[''] = $this->input->post('txtColor');
		$param[''] = $this->input->post('txtPrecioDia');
		$param[''] = $this->input->post('txtFI');
		$param[''] = $this->input->post('txtFF');
		
		

	}
}