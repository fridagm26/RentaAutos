<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('modulo_modelo');
	}
	public function index()
	{
		$data['modulos'] = $this->modulo_modelo->obtenermodulos();
		/* $data('hola') */
		$this->load->view('inicio',$data);
	}
	
	public function hola()
	{
		$data['modulos'] = $this->modulo_modelo->obtenermodulos();
		$this->load->view('hola',$data);
	}
	public function world()
	{
		$data['modulos'] = $this->modulo_modelo->obtenermodulos();
		$this->load->view('world',$data);
	}

}
