<?php
/**
*
*/
class MAutos extends CI_Model{

   function __construct(){
        parent::__construct();
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

    public function altaAutos($parametro){
        $campos = array(
            'year' => $parametro['year'],
            'color' => $parametro['color'],
            'precioDia' => $parametro['precioDia'],
            'placas' => $parametro['placas'],
            'idModelo' => $parametro['idModelo'],
            'idMarca' => $parametro['idMarca'],
            'status' => $parametro['status']
        );

        $this->db->insert('autos', $campos);
    }

    
}