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
		$this->load->view('renta/rentaAutos',$data);
	}
	
	public function guardar(){
<<<<<<< HEAD
        /*$data['modulos'] = $this->Modulos_model->getModulos();
        $this->load->view('usuario',$data);*/
=======
<<<<<<< HEAD

=======
>>>>>>> 729265ea13e9ab0dbeb21d6300a3fc4d3d402f1e
>>>>>>> f7a5608edb33b2dfae69d806f74f6b18f6989e37
		$param[''] = $this->input->post('disp');
		$param[''] = $this->input->post('txtFI');
		$param[''] = $this->input->post('txtFF');
		$param[''] = $this->input->post('txtsi');
		$param[''] = $this->input->post('txtno');
<<<<<<< HEAD
        $temp = $this->input->post('txtsi');
        if($temp == "Si") {
            $data['modulos'] = $this->Modulos_model->getModulos();
            $this->load->view('usuario',$data);
            $this->mRenta->guardar($param);
        }else echo"<script>alert('Requiere una licencia vigente')</script>";
=======
        $param[''] = $this->input->post('edad');
        

		$this->Modulos_model->guardar($param);
>>>>>>> f7a5608edb33b2dfae69d806f74f6b18f6989e37
	}
}