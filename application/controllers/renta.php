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
		$this->load->view('rentaAutos',$data);
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

	public function calcularFecha($date1, $date2){
		date('Y-m-d', strtotime(str_replace('/','-', $date1)));
		date('Y-m-d', strtotime(str_replace('/','-', $date2)));
		$diff = $date1->diff($date2);
		// will output 2 days
		echo $diff->days . ' days ';
	}

	public function getModelosId($id){
        //regresa un valor a la peticion
       echo json_encode($this->mRenta->getModelosId($id)->result());
	}
	
	public function getMarcasId($id){
        //regresa un valor a la peticion
		echo json_encode($this->mRenta->getAutosChidos($id)->result());
	}
	
	public function getAutosId($id){
		echo json_encode($this->mRenta->getInfoAuto($id)->result());
	}
}