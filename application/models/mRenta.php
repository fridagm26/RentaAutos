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


    public function renta($param){
        $campos = array(
            'fechainicio' => $param['fechainicio'],
            'fechafin' => $param['fechafin'],
            'total' => $param['total'],
            'idUsuario' => $param['idUsuario']
            
        );
        $this->db->insert('rentas', $campos);
        redirect('renta', 'refresh');
    }


    public function getAutosChidos($id){
        $modelos = $this->db->select('*')->from('autos')
        ->join('modelos', 'autos.idModelo = modelos.idModelo')
        ->join('marca', 'autos.idMarca = marca.idMarca')
        ->where('autos.idModelo', $id)->get();
        return $modelos;
    }

    public function getInfoAuto($id){
        $modelos = $this->db->select('*')->from('autos')
        ->join('modelos', 'autos.idModelo = modelos.idModelo')
        ->join('marca', 'autos.idMarca = marca.idMarca')
        ->where('autos.idAuto', $id)->get();
        return $modelos;
    }

    public function getUsuarios(){
        $usuarios = $this->db->select('*')->from('usuarios')->get()->result();
        /* $this->db->join('marca', 'autos.idMarca = marca.idMarca'); */
        /* $resultado = $this->db->get()->result(); */
        return $usuarios;
    }

    public function disponibilidad($id){
        $this->db->set(array(
            'status'=>0
        ));
        $this->db->where('idModelo', $id);
        if($this->db->update("modelos"))
            { 
                return 1; 
            } 
            else 
            { 
                return 0;
            }
    }
}