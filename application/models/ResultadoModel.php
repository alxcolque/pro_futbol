<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResultadoModel extends CI_Model
{

	var $table = 'equipos';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_all_equipos()
	{
		$this->db->from('equipos');
		$query=$this->db->get();
		return $query->result();
	}


	/*public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('Id',$id);
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
		$this->db->where('id_a', $id);
		$this->db->delete($this->table);
	}*/


}
