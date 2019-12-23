<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PartidoModel extends CI_Model
{
	public $id_t;
	private $clave;
	public $idmax;
	var $table = 'partidos';
	var $tablej = 'jugadores';
	var $tbl_hecho = 'hechos';
	var $tbl_cambios = 'cambios';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function setClave($dato){
		$this->clave=$dato;
	}
	public function getIdt(){
		return $this->id_t;
	}
	public function getClave(){
		return $this->clave;
	}
	///Iniciar partido cambiado de estado_partido
	///Actualizar estado
	public function est_Part_Update($id, $data)
	{
    $this->db->where('partido_id', $id);
    $this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}
	//Funciones de Operaciones By ALEX COL
	//Datos en select para la pantalla principal
	public function get_AllC($id)
	{
		$this->id_t = $id;
		$query = $this->db->query("SELECT p.partido_id,CONCAT(a.nombre,' vs ',b.nombre) as partido
		FROM partidos p, equipos a, equipos b
		WHERE a.equipo_id=p.equipoA_id AND b.equipo_id=p.equipoB_id AND p.torneo_id='$id';");
		$output = '<option value="">-Selecione Partido-</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="'.
			$row->partido_id.'">'.
			$row->partido.'</option>';
		}
		return $output;
	}
	//Obtener todos los registtros de partidos
	public function get_AllP($id)
	{
		$query=$this->db->query("SELECT p.partido_id,CONCAT(ea.nombre,' vs ',eb.nombre) as partido, e.nombre,p.fecha_i,p.estado_partido
		FROM partidos p, equipos ea, equipos eb, estadios e
		WHERE e.estadio_id = p.estadio_id
		AND ea.equipo_id = p.equipoA_id
		AND eb.equipo_id = p.equipoB_id
		AND p.torneo_id = '$id'
		ORDER BY 4 DESC");

    return $query;
	}
  //Seleccionar $titulo

	public function get_Detalle($id,$idto)
	{
		//SET lc_time_names = 'es_ES';
		$query = $this->db->query("SELECT p.partido_id,
			e.nombre as estadio,
			CONCAT(ea.nombre,' - vs - ',eb.nombre) as partido,
			e.nombre,
			CONCAT(EXTRACT(DAY FROM p.fecha_i),' de ',MONTHNAME(p.fecha_i),' de ',EXTRACT(YEAR FROM p.fecha_i)) as fecha,
			p.estado_partido,
			CONCAT(a.nombres,' ',a.apellidos) as arbitro,
			p.fecha_i as tiempo
		FROM partidos p, equipos ea, equipos eb, estadios e, arbitros a
		WHERE e.estadio_id = p.estadio_id
		AND ea.equipo_id = p.equipoA_id
		AND eb.equipo_id = p.equipoB_id
		AND p.arbitro_id = a.arbitro_id
		AND p.torneo_id = '$idto'
    AND p.partido_id = '$id'
		");

		return $query->row();
	}
	//Obtener estado de select
	public function get_Estado($id){
		$query = $this->db->query("SELECT p.equipoA_id,p.equipoB_id,p.estado_partido,e.nombre as estadio,CONCAT(a.nombres,' ',a.apellidos)as arbitro,ea.nombre as equipoa, eb.nombre as equipob,p.fecha_i,p.fecha_d,p.fecha_r,p.fecha_f
		FROM partidos p, estadios e, arbitros a, equipos ea, equipos eb
		WHERE e.estadio_id=p.estadio_id
		AND a.arbitro_id=p.arbitro_id
		AND ea.equipo_id=p.equipoA_id
		AND eb.equipo_id=p.equipoB_id
		AND p.partido_id='$id'");
		return $query->row();
	}
	//obtener la cantidad de jugadores
	public function get_CantidadJ($idea,$ideb){
		$query = $this->db->query("SELECT
			(SELECT COUNT(j.estado)
			FROM jugadores j, equipos e
			WHERE e.equipo_id = j.equipo_id
			AND j.equipo_id = '$idea'
			AND j.estado = 1) as nja,

			(SELECT COUNT(j.estado)
			FROM jugadores j, equipos e
			WHERE e.equipo_id = j.equipo_id
			AND j.equipo_id = '$ideb'
			AND j.estado = 1) as njb
			FROM DUAL
		");
		return $query->row();
	}

	//obtener hechos
	public function get_HechoA($id,$tipo_h){
		$query = $this->db->query("SELECT SUM(h.tipo_hecho) as hecho
		FROM hechos h,partidos p
		WHERE h.equipo_id=p.equipoA_id
		AND p.partido_id= h.partido_id
		AND h.tipo_hecho='$tipo_h'
		AND p.partido_id='$id'");
		return $query->row();
	}
	public function get_HechoB($id,$tipo_h){
		$query = $this->db->query("SELECT SUM(h.tipo_hecho) as hecho
		FROM hechos h,partidos p
		WHERE h.equipo_id=p.equipoB_id
		AND p.partido_id= h.partido_id
		AND h.tipo_hecho='$tipo_h'
		AND p.partido_id='$id'");
		return $query->row();
	}
	//hechos resultados totales
	public function get_HechoAT($id){
		$query = $this->db->query("SELECT
		(SELECT COUNT(a.tipo_hecho) FROM hechos a WHERE a.tipo_hecho=1 AND a.equipo_id = p.equipoA_id AND a.partido_id = p.partido_id)as Tgol,
		(SELECT COUNT(a.tipo_hecho) FROM hechos a WHERE a.tipo_hecho=2 AND a.equipo_id = p.equipoA_id AND a.partido_id = p.partido_id)as Tamarilla,
		(SELECT COUNT(a.tipo_hecho) FROM hechos a WHERE a.tipo_hecho=3 AND a.equipo_id = p.equipoA_id AND a.partido_id = p.partido_id)as Troja
		FROM partidos p
		WHERE p.partido_id = '$id'
		");
		return $query->row();
	}
	public function get_HechoBT($id){
		$query = $this->db->query("SELECT
		(SELECT COUNT(a.tipo_hecho) FROM hechos a WHERE a.tipo_hecho=1 AND a.equipo_id = p.equipoB_id AND a.partido_id = p.partido_id)as Tgol,
		(SELECT COUNT(a.tipo_hecho) FROM hechos a WHERE a.tipo_hecho=2 AND a.equipo_id = p.equipoB_id AND a.partido_id = p.partido_id)as Tamarilla,
		(SELECT COUNT(a.tipo_hecho) FROM hechos a WHERE a.tipo_hecho=3 AND a.equipo_id = p.equipoB_id AND a.partido_id = p.partido_id)as Troja
		FROM partidos p
		WHERE p.partido_id = '$id'
		");
		return $query->row();
	}
	///cambios
	public function cargar_CmbxE($ide,$est){
		$query = $this->db->query("SELECT j.jugador_id, CONCAT(j.nombres,' ',j.apellidos) as nombres
			FROM jugadores j, equipos e
			WHERE e.equipo_id = j.equipo_id
			AND j.equipo_id = '$ide'
			AND j.estado = '$est'");
			$output = '<option value="">-Selecione Estadio-</option>';
			foreach ($query->result() as $row) {
				$output .= '<option value="'.
				$row->jugador_id.'">'.
				$row->nombres.'</option>';
			}
			return $output;
	}
	//lado A
	public function get_CambioA($idE,$idp)
	{
		$query=$this->db->query("SELECT c.cambio_id,c.e_jugador,c.s_jugador, CONCAT(e.nombres,' ',e.apellidos) as entra, CONCAT(s.nombres,' ',s.apellidos) as sale
		FROM cambios c, jugadores e, jugadores s, partidos p, equipos q
		WHERE c.partido_id = p.partido_id
		AND c.e_jugador = e.jugador_id
		AND c.s_jugador = s.jugador_id
		AND p.equipoA_id = q.equipo_id
    AND c.equipo_id = '$idE'
		AND c.partido_id = '$idp'
		");
    return $query;
	}
	//lado A
	public function get_CambioB($idE,$idp)
	{
		$query=$this->db->query("SELECT c.cambio_id,c.e_jugador,c.s_jugador, CONCAT(e.nombres,' ',e.apellidos) as entra, CONCAT(s.nombres,' ',s.apellidos) as sale
		FROM cambios c, jugadores e, jugadores s, partidos p, equipos q
		WHERE c.partido_id = p.partido_id
		AND c.e_jugador = e.jugador_id
		AND c.s_jugador = s.jugador_id
		AND p.equipoB_id = q.equipo_id
    AND c.equipo_id = '$idE'
		AND c.partido_id = '$idp'
		");
		return $query;
	}
	//fin de Hechos
	//tabla cambios
	public function insert_Cambios($data)
	{
		$this->db->insert($this->tbl_cambios, $data);
		return $this->db->insert_id();
	}
	public function est_Jug_Update($id, $data)
	{
		$this->db->where('jugador_id', $id);
		$this->db->update($this->tablej, $data);
		return $this->db->affected_rows();
	}
	///eliminacion de la tabla cambios
	public function del_Camb_by_id($id)
	{
		$this->db->where('cambio_id', $id);
		$this->db->delete($this->tbl_cambios);
	}
	///fin tabla cambios
	//insertar partido
	public function insert_Data($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
	///insertar hecho
	public function insert_Hecho($data)
	{
		$this->db->insert($this->tbl_hecho, $data);
		return $this->db->insert_id();
	}
	//
	public function data_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

  public function data_delete()
	{
		$this->db->where('partido_id');
		$this->db->delete($this);
	}

	public function delete_by_id($id)
	{
		$this->db->where('partido_id', $id);
		$this->db->delete($this->table);
	}
  ///Seleccionar torneo
	public function maxId()
	{
		$this->db->select_max('partido_id');
		$idmax = $this->db->get($this->table);
		return $idmax;
	}
}
