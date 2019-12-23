<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TorneoModel extends CI_Model
{

	var $table = 'torneos';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function getAll()
	{
		$this->db->from('torneos');
		$query=$this->db->get();
		return $query->result();
	}
  //Seleccionar $titulo

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('torneo_id',$id);
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
		$this->db->where('torneo_id');
		$this->db->delete($this);
	}

	public function delete_by_id($id)
	{
		$this->db->where('torneo_id', $id);
		$this->db->delete($this->table);
	}
  ///Seleccionar torneo


}
