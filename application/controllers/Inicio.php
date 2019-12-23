<?php
class Inicio extends CI_Controller {
    public $partidoId;
    public function __construct() {
        parent::__construct();
        $this->load->model(array('UserModel','TorneoModel','PartidoModel','EquipoModel','JugadorModel'));
        $this->load->helper(array('form', 'url','date'));
        $this->load->library(array('session', 'form_validation'));
        $this->PartidoModel->setClave($this->input->post("idte"));
    }

    //Funciones principales

    public function index()
  	{
      $this->load->view('principal/Inicio_view');
  	}

    public function ajax_sel_titulo($id){
  		$data = $this->TorneoModel->get_by_id($id);
  		echo json_encode($data);
	  }
    //funcion del boton para iniciar partido
    public function botonEstado($id){
  		$data = $this->PartidoModel->get_Estado($id);
  		echo json_encode($data);
	  }
    ///Cantidad de jugadores para empezar el partido
    public function numeroJ(){
      $idea = $this->input->post('idea');
      $ideb = $this->input->post('ideb');
      $data = $this->PartidoModel->get_CantidadJ($idea,$ideb);
  		echo json_encode($data);
    }
    //Obtener los datos para la seleccion
    public function getAll(){
      if($this->input->post('idet')){
        echo $this->PartidoModel->get_AllC($this->input->post('idet'));
      }
	  }
    //funcion para obtener hechos
    public function miHechoA($id){
      $tipo_h=$this->input->get('tipo_h');
  		$data = $this->PartidoModel->get_HechoA($id,$tipo_h);
  		echo json_encode($data);
	  }
    public function miHechoB($id){
      $tipo_h=$this->input->get('tipo_h');
  		$data = $this->PartidoModel->get_HechoB($id,$tipo_h);
  		echo json_encode($data);
	  }
    //totales
    public function miHechoAT($id){
  		$data = $this->PartidoModel->get_HechoAT($id);
  		echo json_encode($data);
	  }
    public function miHechoBT($id){
  		$data = $this->PartidoModel->get_HechoBT($id);
  		echo json_encode($data);
	  }
    ///Datos de la tabla A
    public function getTablaA($id){
      $idp=$this->input->get('idp');
      $est=$this->input->get('est');
      $est1=$this->input->get('est1');
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query=$this->JugadorModel->get_Jug_Titular_1($est,$est1,$id,$idp);
      $data = array();
      ///estado del partido
      if($this->input->get('est_p')==1){
        $i = 1;
        foreach($query->result() as $r) {
             $data[] = array(
                $i++,
                $r->nombres,
                $r->num_cam,
             );
        }
      }
      else
        if($this->input->get('est_p')==2){//si estado es 2
        foreach($query->result() as $r) {
          if($r->estado==3){
            $data[] = array(
               $r->num_cam,
               '<span class="ml-1 text-info">'.$r->nombres.'</span>',
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
          }
          else if($r->amarillas>=2){
            $data[] = array(
               $r->num_cam,
               $r->nombres,
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
          }
          else if($r->rojas==1){
            $data[] = array(
               $r->num_cam,
               $r->nombres,
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
          }
          else{
            $data[] = array(
               $r->num_cam,
               $r->nombres,

               '<center><button onclick="btnGol('.$r->jugador_id.','.$r->equipo_id.')" type="button" class="btn btn-outline-success btn-sm ">'.$r->goles.'</button></center>',
               '<center><button onclick="btnamarilla('.$r->jugador_id.','.$r->equipo_id.')" type="button" class="btn btn-outline-warning btn-sm ">'.$r->amarillas.'</button></center>',
               '<center><button onclick="btnroja('.$r->jugador_id.','.$r->equipo_id.')" type="button" class="btn btn-outline-danger btn-sm ">'.$r->rojas.'</button></center>'
            );
          }

        }
      }
      else if($this->input->get('est_p')==3)//si el partido está en pausa
      {
        foreach($query->result() as $r) {
            $data[] = array(
               $r->num_cam,
               '<span class="ml-1 text-info">'.$r->nombres.'</span>',
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
        }
      }
      else{///si el partido finalizó
        foreach($query->result() as $r) {
            $data[] = array(
               $r->num_cam,
               '<span class="ml-1 text-warning">'.$r->nombres.'</span>',
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
        }
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
    ///Datos de la tabla B
    public function getTablaB($id){
      $idp=$this->input->get('idp');
      $est=$this->input->get('est');
      $est1=$this->input->get('est1');
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query=$this->JugadorModel->get_Jug_Titular_2($est,$est1,$id,$idp);
      $data = array();
      if($this->input->get('est_p')==1){
        $i = 1;
        foreach($query->result() as $r) {
             $data[] = array(
                $i++,
                $r->nombres,
                $r->num_cam,
             );
        }
      }
      else if($this->input->get('est_p')==2)
      {//si estado es 2
        foreach($query->result() as $r) {
          if($r->estado==3){
            $data[] = array(
               $r->num_cam,
               '<span class="ml-1 text-info">'.$r->nombres.'</span>',
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
          }
          else if($r->amarillas>=2){
            $data[] = array(
               $r->num_cam,
               $r->nombres,
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
          }
          else if($r->rojas==1){
            $data[] = array(
               $r->num_cam,
               $r->nombres,
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
          }
          else{
            $data[] = array(
               $r->num_cam,
               $r->nombres,

               '<center><button onclick="btnGol('.$r->jugador_id.','.$r->equipo_id.')" type="button" class="btn btn-outline-success btn-sm ">'.$r->goles.'</button></center>',
               '<center><button onclick="btnamarilla('.$r->jugador_id.','.$r->equipo_id.')" type="button" class="btn btn-outline-warning btn-sm ">'.$r->amarillas.'</button></center>',
               '<center><button onclick="btnroja('.$r->jugador_id.','.$r->equipo_id.')" type="button" class="btn btn-outline-danger btn-sm ">'.$r->rojas.'</button></center>'
            );
          }

        }
      }
      else if($this->input->get('est_p')==3)//si el partido está en pausa
      {
        foreach($query->result() as $r) {
            $data[] = array(
               $r->num_cam,
               '<span class="ml-1 text-info">'.$r->nombres.'</span>',
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
        }
      }
      else{///si el partido finalizó
        foreach($query->result() as $r) {
            $data[] = array(
               $r->num_cam,
               '<span class="ml-1 text-warning">'.$r->nombres.'</span>',
               '<center>'.$r->goles.'</center>',
               '<center>'. $r->amarillas.'</center>',
               '<center>'.$r->rojas.'</center>'
            );
        }
      }
      $result = array(
           "draw" => $draw,
           "recordsTotal" => $query->num_rows(),
           "recordsFiltered" => $query->num_rows(),
           "data" => $data
        );
      echo json_encode($result);
      exit();
    }///fin de la segunda tabla
    //Datos de la tabla modal
    public function getTabla0($id){
      $idp=$this->input->get('idp');
      $est=$this->input->get('est');
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      if($this->input->get('equi')==1){
        $query=$this->JugadorModel->get_Jug_Titular_1($est,$est,$id,$idp);
      }
      else{
        $query=$this->JugadorModel->get_Jug_Titular_2($est,$est,$id,$idp);
      }
      $data = array();
      foreach($query->result() as $r) {
           $data[] = array(
             $r->num_cam,
             $r->nombres,
            '<center><button onclick="llevarATitular('.$r->jugador_id.')" type="button" class="btn btn-outline-success btn-sm fa fa-arrow-right"></button></center>',
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
    public function getTabla1($id){
      $idp=$this->input->get('idp');
      $est=$this->input->get('est');
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      if($this->input->get('equi')==1){
        $query=$this->JugadorModel->get_Jug_Titular_1($est,$est,$id,$idp);
      }
      else{
        $query=$this->JugadorModel->get_Jug_Titular_2($est,$est,$id,$idp);
      }
      $data = array();
      foreach($query->result() as $r) {
           $data[] = array(
             $r->num_cam,
             $r->nombres,
            '<center><button onclick="bajarDelTitular('.$r->jugador_id.')" type="button" class="btn btn-outline-danger btn-sm fa fa-arrow-left"></button></center>',
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
    ///FUnciones para cambios
    /// Cargar select cambios
    public function cargar_SelectJug($ide){
      //if($this->input->post('est_a')){
        echo $this->PartidoModel->cargar_CmbxE($ide,$this->input->post('est_a'));
      //}
    }
    //Crear datos en la tabla de cambios
    public function addCambios($idp){
      $data = $this->input->post();
      date_default_timezone_set('America/La_paz');
      $date = date('Y-m-d H:i:s');
      $info = array(
				'cam_min' => $date,
        'e_jugador' => $data['idJE'],
        's_jugador' => $data['idJS'],
        'partido_id' => $idp,
        'equipo_id' => $data['idEq'],
			);
  		$insert = $this->PartidoModel->insert_Cambios($info);
      //Actualizar estado entrante
      $idje = $this->input->post('idJE');
      $data1 = array(
        'estado' => 2,
      );
      $this->PartidoModel->est_Jug_Update($idje, $data1);
      //Actualizar estado saliente
      $idjs = $this->input->post('idJS');
      $data2 = array(
        'estado' => 3,
      );
      $this->PartidoModel->est_Jug_Update($idjs, $data2);
  		echo json_encode(array("status" => TRUE));
    }
    //imprimir datos en tabla
    public function get_Tabla_Camb($idp){
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $idE = $this->input->get('idE');
      if($this->input->get('aob')==4){
        $query=$this->PartidoModel->get_CambioB($idE,$idp);
      }else{
        $query=$this->PartidoModel->get_CambioA($idE,$idp);
      }
      $data = array();
      foreach($query->result() as $r) {
           $data[] = array(
             $r->entra,
             $r->sale,
            '<center><button onclick="deshacerCambio('.$r->cambio_id.','.$r->e_jugador.','.$r->s_jugador.')" type="button" class="btn btn-outline-danger btn-sm fa fa-times-circle"></button></center>',
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
    //actualizar estados
    public function deshacerCambioC($id){

      //Actualizar estado entrante
      $idje = $this->input->post('idJE');
      $data1 = array(
        'estado' => 0,
      );
      $this->PartidoModel->est_Jug_Update($idje, $data1);
      //Actualizar estado saliente
      $idjs = $this->input->post('idJS');
      $data2 = array(
        'estado' => 1,
      );
      $this->PartidoModel->est_Jug_Update($idjs, $data2);

      ///Eliminar dato de la tabla cambios
      $this->PartidoModel->del_Camb_by_id($id);
      //fin eliminacion

      echo json_encode(array("status" => TRUE));
    }
    //Fin de datos modales
    //Inciar partidos cambiar estados
    public function actPart($id){
      $est=$this->input->post('est');
      date_default_timezone_set('America/La_paz');
      $now = date('Y-m-d H:i:s');
      if($est==1){
        $data = array(
          'fecha_i' => $now,
  				'estado_partido' => 2,///habilitar
  			);
      }else if($est==2){
        $data = array(
          'fecha_d' => $now,
          'estado_partido' => 3,///cescanso
  			);
      }else if($est==3){
        $data = array(
          'fecha_r' => $now,
          'estado_partido' => 2,///jugar
  			);
      }else{
        $data = array(
          'fecha_f' => $now,
  				'estado_partido' => 4,//finalizado
  			);

      }

  		$this->PartidoModel->est_Part_Update($id, $data);
  		echo json_encode(array("status" => TRUE));
    }
    ///
    //Hacer titular al jugadores
    public function actualizarEstado($id){

      $data = array(
					'estado' => $this->input->post('esta')
			);
  		$this->JugadorModel->dataUpdate($id, $data);
  		echo json_encode(array("status" => TRUE));
    }
    ///guardar hecho
    public function addHecho()
		{
      $data = $this->input->post();
      date_default_timezone_set('America/La_paz');
      $now = date('Y-m-d H:i:s');
			$data = array(
					'partido_id' => $data['partido_id'],
          'jugador_id' => $data['jugador_id'],
					'equipo_id' => $data['equipo_id'],
          'tipo_hecho' => $data['tipo_hecho'],
					'minuto' => $now,

				);
			$insert = $this->PartidoModel->insert_Hecho($data);
			echo json_encode(array("status" => TRUE));
		}

}
