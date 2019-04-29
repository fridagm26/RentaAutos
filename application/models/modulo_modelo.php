<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class modulo_modelo extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		$this->load->DataBase();
	}

	
	//ACABA VAN LAS FUNCIONES
    public function obtenermodulos()
    {
		/* "select *from modulos"; */
		$modulos = $this->db->select('*')->from('modulos')->where('status',1)->get();
		/* $this->db->select('*');
		$this->db->from('modulos');
		$this->db->where('status',1);
		$modulos = $this->db->get(); */
		return $modulos;
    }
}