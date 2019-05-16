<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/

class cUsuario extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('mUsuario');
        $this->load->model('Modulos_model');
    }
    
    public function index(){
		$data['modulos'] = $this->Modulos_model->getModulos();
		$this->load->view('usuario',$data);
	}

    public function usuario(){
		$param['nombre'] = $this->input->post('txtnombre');
		$param['apellidos'] = $this->input->post('txtapellidos');
		$param['edad'] = $this->input->post('txtedad');
		$temp = $this->input->post('txtsi');
		$temp2 = $this->input->post('txtedad');

		if($temp == 'Si' && $temp2 >= 18){
			$this->mUsuario->usuario($param);
			$data['modulos'] = $this->Modulos_model->getModulos();
			$data['marcas'] = $this->mUsuario->getMarcas();
			$data['modelos'] = $this->mUsuario->getModelos();
			$this->load->view('rentaAutos',$data);
		}else {echo "<script>
                alert('Se requiere licencia vigente y ser mayor de edad');
                window.location= 'url.php'
			 </script>";
			}

    }

}    