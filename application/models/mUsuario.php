<?php

class mUsuario extends CI_Model {
	
	public function __construct() {
        parent::__construct();
    }
    
    /* public function usuario($param){
        $campos = array(
            'nombre' => $param['nombre'],
            'apellidos' => $param['apellidos'],
            'edad' => $param['edad']
        );
        $this->db->insert('usuarios', $campos);
        
    } */

    public function getModulos(){
        return $this->db->where('status',1)->get('modulos')->result();
        
    }
    public function getMarcas(){
        $marcas = $this->db->select('*')->from('marca')->where('status',1)->get();
        return $marcas;
   }

    public function getModelos(){
        $modelos = $this->db->select('*')->from('modelos')->where('status', 1)->get();
        return $modelos;
    }

    public function getModelosId($id){
        $modelos = $this->db->select('*')->from('modelos')->where('status', 1)->where('idMarca', $id)->get();
        return $modelos;
    }

}