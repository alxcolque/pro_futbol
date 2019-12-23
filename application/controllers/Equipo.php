<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Equipo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->helper(array('url','form'));
		$this->load->helper('url');
		$this->load->helper('form');
	 	$this->load->model(array('UserModel','TorneoModel','PartidoModel','EquipoModel','JugadorModel','TecnicoModel'));
	}
	public function index()
	{
		$this->load->view('equipo/equipo_view');
	}

	//Mostrar partido en Tablas
    public function getEquipo($id){

      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query=$this->EquipoModel->get_All_Eq($id);
      $data = array();
      $i = 1;
      foreach($query->result() as $r) {
           $data[] = array(
              '<center>'.$i++.'</center>',
              $r->nombre,
              '<button class="btn btn-secondary" title = "Editar Tecnico" onclick="actTec('.$r->tecnico_id.')"><i class="fas fa-edit"></i></button> '.$r->tecnico,
              '<center><a href="#" title = "Ver Jugadores" class="btn-primary-link" onclick="verEquipo('.$r->equipo_id.')">Ver Jug...<i class="fas fa-eye"></a></center>',
							'<center>
							<button class="btn btn-warning" title = "Editar Equipo" onclick="actEqui('.$r->equipo_id.')"><i class="fas fa-edit"></i></button>
							<button class="btn btn-danger" title = "Eliminar Equipo" onclick="delEqui('.$r->equipo_id.')"><i class="fas fa-trash"></i></button>
							</center>'

					 );
      }
      $result = array(
           "draw" => $draw,
           "recordsTotal" => $query->num_rows(),
           "recordsFiltered" => $query->num_rows(),
           "data" => $data
        );
      echo json_encode($result);
      exit();
    }

	public function listar_J($id){
		$data['seleccion']=$this->Jugadores_model->lista_jugador($id);
		echo json_encode($data);
	}
	//CODIGO PARA EQUIPO
	public function savEquipo($idt)
	{
		$data = array(
				'nombre' => $this->input->post('nombre_equipo'),
				'torneo_id'=> $idt
		);
		$insert = $this->EquipoModel->dataAdd($data);
		echo json_encode(array("status" => TRUE));
	}
	public function savTecnico($ide)
	{
		//insertar tecnico
		$data = array(
				'nombres' => $this->input->post('nombre_tec'),
				'equipo_id'=> $ide,
		);
		$insert = $this->TecnicoModel->dataAdd($data);
		echo json_encode(array("status" => TRUE));
	}

	public function idEqui(){
		$data=$this->EquipoModel->maxId();
		echo json_encode($data);
	}

	public function getDataEqui($id)
	{
		$data = $this->EquipoModel->getById($id);
		echo json_encode($data);
	}

	public function equipoUpdate($id)
	{
		$data = array(
			'nombre' => $this->input->post('nombre_equipo'),
		);
		$this->EquipoModel->dataUpdate($id, $data);
		echo json_encode(array("status" => TRUE));
	}

	public function eliminarEqui($id)
	{
		$this->EquipoModel->deleteById($id);
		echo json_encode(array("status" => TRUE));
	}
	//FIN DE CODIGO PARA EQUIPO
	//INICIO PARA TECNICO


	public function getDataTecn($id)
	{
		$data = $this->TecnicoModel->getById($id);
		echo json_encode($data);
	}

	public function tecnicoUpdate($id)
	{
		$data = array(
					'nombres' => $this->input->post('nombre_tecnico')
		);
		$this->TecnicoModel->dataUpdate($id,$data);
		echo json_encode(array("status" => TRUE));
	}
	//FIN PARA TECNICO

}
