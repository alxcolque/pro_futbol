<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EquipoModel extends CI_Model
{


	var $table = 'equipos';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_All_Eq($idt)
	{
		$query = $this->db->query("SELECT e.equipo_id,t.tecnico_id,e.nombre, CONCAT(t.nombres,' ',t.apellidos) as tecnico
		FROM equipos e, tecnicos t
		WHERE t.equipo_id = e.equipo_id
		AND e.torneo_id='$idt';
		");
		return $query;
	}
	//Funciones de Operaciones By ALEX COL
	public function get_All($idt)
	{
		$query = $this->db->query("SELECT equipo_id, nombre
			FROM equipos
			WHERE torneo_id='$idt';");
		$output = '<option value="">-Selecione equipo-</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="'.
			$row->equipo_id.'">'.
			$row->nombre.'</option>';
		}
		return $output;
	}
  //Seleccionar $titulo
	public function maxId()
	{
		$query = $this->db->query("SELECT MAX(equipo_id) as idequi FROM equipos
		");
		return $query->row();
	}
	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where('equipo_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function dataAdd($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function dataUpdate($id, $data)
	{
    $this->db->where('equipo_id', $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function deleteById($id)
	{
		$this->db->where('equipo_id', $id);
		$this->db->delete($this->table);
	}
  ///Seleccionar torneo


}
