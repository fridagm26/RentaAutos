<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Marca_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
        $this->load->database();
	}

	
    //ACABA VAN LAS FUNCIONES
    public function altaMarca($nombre){
        $data= array('nombreMarca'=>$nombre);
        $this->db->insert('marca',$data);
    }

    public function getMarca(){
        return $this->db->where('status',1)->get('marca')->result();
    }

    public function eliminarMarca($idMarca){
        $this->db->set(array(
            'status'=>0
        ));
        $this->db->where('idMarca', $idMarca);

        if($this->db->update("marca"))
            { 
                return 1; 
            } 
            else 
            { 
                return 0;
            }
    }

}