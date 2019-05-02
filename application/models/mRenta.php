<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class mRenta extends CI_Model {
	
	public function __construct() {
        parent::__construct();
	}

	
	//ACABA VAN LAS FUNCIONES
	public function getModulos(){
        return $this->db->where('status',1)->get('modulos')->result();
        
    }
    public function guardar($param,$param2){
        
    }
}