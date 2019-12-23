<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TecnicoModel extends CI_Model
{


	var $table = 'tecnicos';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getById($id)
	{
		$this->db->from($this->table);
		$this->db->where('tecnico_id',$id);
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
    $this->db->where('tecnico_id', $id);
		$this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

  public function data_delete()
	{
		$this->db->where('tecnico_id');
		$this->db->delete($this);
	}

	public function delete_by_id($id)
	{
		$this->db->where('tecnico_id', $id);
		$this->db->delete($this->table);
	}
  ///Seleccionar torneo


}
