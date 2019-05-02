<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/

class Inicio extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Modulos_model');
	}
	public function index()
	{
		$data['modulos'] = $this->Modulos_model->getModulos();
		$this->load->view('inicio',$data);
	}
	public function rentaAutos()
	{
		$data['modulos'] = $this->Modulos_model->getmodulos();
		$this->load->view('renta/rentaAutos',$data);
	}
	public function guardar(){
		echo "entro al metodo";
	}
}
