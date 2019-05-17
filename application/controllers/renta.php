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
	
	public function usuario(){
		$param['nombre'] = $this->input->post('txtnombre');
		$param['apellidos'] = $this->input->post('txtapellidos');
		$param['edad'] = $this->input->post('txtedad');
		$temp = $this->input->post('txtsi');
		$temp2 = $this->input->post('txtedad');

		if($temp == 'Si' && $temp2 >= 18){
			$this->mRenta->usuario($param);
			/* $data['modulos'] = $this->Modulos_model->getModulos();
			$data['marcas'] = $this->mRenta->getMarcas();
			$data['modelos'] = $this->mRenta->getModelos();
			$this->load->view('rentaAutos',$data); */
		}else {echo "<script>
                alert('Se requiere licencia vigente y ser mayor de edad');
                window.location= 'url.php'
			 </script>";
			}

    }

	public function rentas(){
		$param['fechainicio'] = $this->input->post('txtFI');
		$param['fechafin'] = $this->input->post('txtFF');
		$param['total'] = $this->input->post('txttotal');
		$param['idUsuario'] = $this->input->post('idUsuario');
		$modelo = $this->input->post('slctModelo');
        $this->mRenta->disponibilidad($modelo);
		$this->mRenta->renta($param);
	}

	public function calcularFecha($date1, $date2){
		date('Y-m-d', strtotime(str_replace('/','-', $date1)));
		date('Y-m-d', strtotime(str_replace('/','-', $date2)));
		$diff = $date1->diff($date2);
		// will output 2 days
		echo $diff->days . ' days ';
	}

	public function us(){
		$param ['nombre'] = $this->input->post('txtnombre');
		$param ['apellidos'] = $this->input->post('txtapellidos');
		$param ['edad'] = $this->input->post('txtedad');

		$this->mRenta->usu($param);
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

	public function mostrarUsuarios(){
        echo json_encode($this->mRenta->getUsuarios());
	}

	public function actdisp($id){
		/* $auto = $this->input->post('slctModelo'); */
       	echo $this->mRenta->disponibilidad($id);
	}
	
	
}