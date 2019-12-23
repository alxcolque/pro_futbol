<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArbitroModel extends CI_Model
{


	var $table = 'arbitros';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Funciones de Operaciones By ALEX COL
	public function get_All($idt)
	{
		$query = $this->db->query("SELECT arbitro_id,CONCAT(nombres,' ',apellidos)as nombre
			FROM arbitros
			WHERE torneo_id='$idt';");
		$output = '<option value="">-Selecione Arbitro-</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="'.
			$row->arbitro_id.'">'.
			$row->nombre.'</option>';
		}
		return $output;
	}
  //Seleccionar $titulo
	public function get_all_arbitros()
	{
		$this->db->from('arbitros');
		$query=$this->db->get();
		return $query->result();
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('arbitro_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function arb_add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function arb_update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('arbitro_id', $id);
		$this->db->delete($this->table);
	}
  ///Seleccionar torneo


}
