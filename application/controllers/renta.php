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
        /*$data['modulos'] = $this->Modulos_model->getModulos();
        $this->load->view('usuario',$data);*/
		$param[''] = $this->input->post('disp');
		$param[''] = $this->input->post('txtFI');
		$param[''] = $this->input->post('txtFF');
		$param[''] = $this->input->post('txtsi');
		$param[''] = $this->input->post('txtno');
        $temp = $this->input->post('txtsi');
        if($temp == "Si") {
            $data['modulos'] = $this->Modulos_model->getModulos();
            $this->load->view('usuario',$data);
            $this->mRenta->guardar($param);
        }else echo"<script>alert('Requiere una licencia vigente')</script>";
	}
}