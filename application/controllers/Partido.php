<?php
class Partido extends CI_Controller {
    public $partidoId;
    public function __construct() {
        parent::__construct();
        $this->load->model(array('UserModel','TorneoModel','PartidoModel','EquipoModel','EstadioModel','ArbitroModel'));
        $this->load->helper(array('form', 'url','date'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
    }

    //Funciones principales

    public function index()
  	{
      $this->load->view('partido/Partido_view');
  	}
    //// Selecion de estadio y arbitro para dialogo
    public function getEstadio(){
      if($this->input->post('idt')){
        echo $this->EstadioModel->get_All($this->input->post('idt'));
      }
    }
    ///arbitro
    public function getArbitro(){
      if($this->input->post('idt')){
        echo $this->ArbitroModel->get_All($this->input->post('idt'));
      }
    }
    ///seleccionar equipo para ventana de dialgo
    public function getEquipo(){
      if($this->input->post('idt')){
        echo $this->EquipoModel->get_All($this->input->post('idt'));
      }
    }
    //Mostrar partido en Tablas
    public function getPartido($id){

      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query=$this->PartidoModel->get_AllP($id);
      $data = array();
      $i = 1;
      foreach($query->result() as $r) {
           $data[] = array(
              $i++,
              $r->partido,
              $r->nombre,
              $r->fecha_i,
              '<center><a href="#" class="btn-primary-link" onclick="detallePart('.$r->partido_id.','.$r->estado_partido.')">Ver mas...</a></center>',
							'<center><button class="btn btn-danger" onclick="deletePart('.$r->partido_id.')"><i class="fas fa-trash"></i></button></center>'
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
    //Guardar un partido
    public function insertPart($it){
      //$id = $this->PartidoModel->maxId();
      $data = $this->input->post();
      date_default_timezone_set('America/La_paz');
      $date = date('Y-m-d H:i:s');
      $info = array(
        //'partido_id' => $id+1,
				'estadio_id' => $data['est'],
				'arbitro_id' => $data['arb'],
				'equipoA_id' => $data['ea'],
				'equipoB_id' => $data['eb'],
				'fecha_i' => $data['fe'],
        'torneo_id' => $it,
				'estado_partido' => 1,
			);
		$insert = $this->PartidoModel->insert_Data($info);
		echo json_encode(array("status" => TRUE));
	  }

    public function getDetalle($id){
      $idt=$this->input->post('idto');
  		$data = $this->PartidoModel->get_Detalle($id,$idt);
  		echo json_encode($data);
    }

}
