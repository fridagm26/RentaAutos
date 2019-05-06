<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAutos extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('mAutos');
        $this->load->model('Modulos_model');
    }
    
    public function index(){
        $data['modulos'] = $this->Modulos_model->getModulos();
        $data['marcas'] = $this->mAutos->getMarcas();
        $data['modelos'] = $this->mAutos->getModelos();
        $this->load->view('vAutos', $data);
    }

    public function getModelosId($id){
        //regresa un valor a la peticion
       echo json_encode($this->mAutos->getModelosId($id)->result());
    }

    public function altaAutos(){ 
        $parametro['year'] = $this->input->post('txtYear');
        $parametro['color'] = $this->input->post('txtColor');
        $parametro['precioDia'] = $this->input->post('txtPrecioDia');
        $parametro['placas'] = $this->input->post('txtPlacas');
        $parametro['idModelo'] = $this->input->post('slctModelo');
        $parametro['idMarca'] = $this->input->post('slctMarca');
        $parametro['status'] = 1;

        $this->mAutos->altaAutos($parametro);
    }
    
    public function mostrarModelos(){
        echo json_encode($this->mAutos->getModelo());
    }

    public function mostrarAutos(){
        echo json_encode($this->mAutos->getAutos());
    }

    public function eliminarAuto(){
        $idAuto = $this->input->post('idAuto');
        echo $this->mAutos->eliminarAuto($idAuto);
    }
}