<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Modelo_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
	}

	
    //ACABA VAN LAS FUNCIONES
    public function getMarcas(){
        return $this->db->where('status',1)->get('marca')->result();
    }

    public function altaModelo($data){
        $modelo = array(
            'nombreModelo'=>$data['nombreModelo'],
            'disponibilidad'=>$data['disponibilidad'],
            'totales'=>$data['totales'],
            'idMarca'=>$data['idMarca']
        );
        $this->db->insert('modelos',$modelo);
    }

}