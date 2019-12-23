<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jugador extends CI_Controller {

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
    public function getJugadores($id){

      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query=$this->JugadorModel->get_All_Ju($id);
      $data = array();
      $i = 1;
      foreach($query->result() as $r) {
           $data[] = array(
              '<center>'.$i++.'</center>',
              $r->nombres,
              $r->apellidos,
              $r->num_cam,
              $r->puesto,
							'<center>
							<button class="btn btn-warning" title = "Editar Jugador" onclick="actJug('.$r->jugador_id.')"><i class="fas fa-edit"></i></button>
							<button class="btn btn-danger" title = "Eliminar Jugador" onclick="delJug('.$r->jugador_id.')"><i class="fas fa-trash"></i></button>
							</center>',

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
	public function getDataJuga($id)
	{
		$data = $this->JugadorModel->getById($id);
		echo json_encode($data);
	}
  public function jugaSave($id)
	{
		//insertar tecnico
		$data = array(
				'nombres' => $this->input->post('nombres'),
				'apellidos' => $this->input->post('apellidos'),
        'equipo_id' => $id,
        'num_cam' => $this->input->post('num_cam'),
        'foto' => 'foto.png',
        'puesto' => $this->input->post('puesto'),
        'estado' => 1
		);
		$insert = $this->JugadorModel->insertData($data);
		echo json_encode(array("status" => TRUE));
	}
	public function jugadUpdate($id)
	{
		$data = array(
      'nombres' => $this->input->post('nombres'),
      'apellidos' => $this->input->post('apellidos'),
      'num_cam' => $this->input->post('num_cam'),
      'puesto' => $this->input->post('puesto'),
		);
		$this->JugadorModel->dataUpdate($id, $data);
		echo json_encode(array("status" => TRUE));
	}

	public function eliminarJuga($id)
	{
		$this->JugadorModel->deleteById($id);
		echo json_encode(array("status" => TRUE));
	}


}
