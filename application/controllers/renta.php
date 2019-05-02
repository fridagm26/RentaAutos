<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/

class Renta extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modulos_model');
	}
	public function index()
	{
		$data['modulos'] = $this->Modulos_model->getModulos();
		$this->load->view('renta/rentaAutos',$data);
	}
	
	public function guardar(){

		$param[''] = $this->input->post('disp');
		$param[''] = $this->input->post('txtFI');
		$param[''] = $this->input->post('txtFF');
		$param[''] = $this->input->post('txtsi');
		$param[''] = $this->input->post('txtno');
        $param[''] = $this->input->post('edad');
        

		$this->Modulos_model->guardar($param);
	}
}