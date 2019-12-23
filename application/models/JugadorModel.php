<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JugadorModel extends CI_Model
{

	var $table = 'jugadores';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_All_Ju($id)
	{
		$query = $this->db->query("SELECT j.jugador_id,e.nombre, j.nombres,j.apellidos,j.num_cam,j.puesto
		FROM equipos e, jugadores j
		WHERE j.equipo_id = e.equipo_id
		AND e.equipo_id ='$id';
		");
		return $query;
	}
	//Funciones de Operaciones By ALEX COL
	public function get_All($id)
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
	//Obtener datos para la tabla 1
	public function get_Jug_Titular_1($est,$est1,$idt,$idp)///SUBSTRING(j.nombres,1,2)
	{
		$query=$this->db->query("SELECT e.equipo_id,CONCAT(j.nombres,' ', j.apellidos) as nombres, j.num_cam, j.jugador_id,
		(SELECT COUNT(h.tipo_hecho) FROM hechos h WHERE h.tipo_hecho=1 AND h.jugador_id=j.jugador_id AND h.partido_id = p.partido_id)as goles,
		(SELECT COUNT(h.tipo_hecho) FROM hechos h WHERE h.tipo_hecho=2 AND h.jugador_id=j.jugador_id AND h.partido_id = p.partido_id)as amarillas,
		(SELECT COUNT(h.tipo_hecho) FROM hechos h WHERE h.tipo_hecho=3 AND h.jugador_id=j.jugador_id AND h.partido_id = p.partido_id)as rojas,
		j.estado
    FROM jugadores j, equipos e, partidos p
    WHERE j.equipo_id = e.equipo_id
    AND e.equipo_id = p.equipoA_id
    AND j.estado IN ('$est','$est1')
    AND p.partido_id = '$idp'
    AND p.torneo_id = '$idt'
		");
    return $query;
	}
  //Obtener datos para la tabla 2
	public function get_Jug_Titular_2($est,$est1,$idt,$idp)//SUBSTRING(j.nombres,1,2)
	{
		$query=$this->db->query("SELECT e.equipo_id,CONCAT(j.nombres,' ', j.apellidos) as nombres, j.num_cam, j.jugador_id,
		(SELECT COUNT(h.tipo_hecho) FROM hechos h WHERE h.tipo_hecho=1 AND h.jugador_id=j.jugador_id AND h.partido_id = p.partido_id)as goles,
		(SELECT COUNT(h.tipo_hecho) FROM hechos h WHERE h.tipo_hecho=2 AND h.jugador_id=j.jugador_id AND h.partido_id = p.partido_id)as amarillas,
		(SELECT COUNT(h.tipo_hecho) FROM hechos h WHERE h.tipo_hecho=3 AND h.jugador_id=j.jugador_id AND h.partido_id = p.partido_id)as rojas,
		j.estado
    FROM jugadores j, equipos e, partidos p
    WHERE j.equipo_id = e.equipo_id
    AND e.equipo_id = p.equipoB_id
    AND j.estado IN ('$est','$est1')
    AND p.partido_id = '$idp'
    AND p.torneo_id = '$idt'
		");
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
	///obtener un registro para Editar
	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where('jugador_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	//obtener estado
	public function get_Estado($id){
		$query = $this->db->query("SELECT estado_partido FROM partidos WHERE partido_id='$id'");
		return $query->row();
	}
	//insertar
	public function insertData($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
///Actualizar estado
	public function dataUpdate($id, $data)
	{
    $this->db->where('jugador_id', $id);
    $this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

  public function data_delete()
	{
		$this->db->where('jugador_id');
		$this->db->delete($this);
	}

	public function deleteById($id)
	{
		$this->db->where('jugador_id', $id);
		$this->db->delete($this->table);
	}

}
