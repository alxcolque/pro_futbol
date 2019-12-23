<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstadioModel extends CI_Model
{


	var $table = 'estadios';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Funciones de Operaciones By ALEX COL
	public function get_All($idt)
	{
		$query = $this->db->query("SELECT estadio_id,nombre
			FROM estadios
			WHERE torneo_id='$idt';");
		$output = '<option value="">-Selecione Estadio-</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="'.
			$row->estadio_id.'">'.
			$row->nombre.'</option>';
		}
		return $output;
	}
  //Seleccionar $titulo

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('partido_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function data_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

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


}
