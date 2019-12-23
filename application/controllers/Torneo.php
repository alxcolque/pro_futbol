<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Torneo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->helper(array('url','form'));
		$this->load->helper('url');
		$this->load->helper('form');
	 	$this->load->model('TorneoModel');
	}
	public function index()
	{
		$this->getAllData();

	}
	public function getAllData()
	{
		$data['mi_torneo'] = $this->TorneoModel->getAll();
		$this->load->view('torneo/elegir_Torneo',$data);
	}
	public function addData()
		{
			$data = array(
					'nombre' => $this->input->post('nombre'),
					'lugar' => $this->input->post('lugar'),
					'encargado' => $this->input->post('encargado'),
					'fecha_inicio' => $this->input->post('fecha_inicio'),

				);
			$insert = $this->TorneoModel->data_add($data);
			echo json_encode(array("status" => TRUE));
		}
	public function ajax_edit($id)
		{
			$data = $this->TorneoModel->get_by_id($id);

			echo json_encode($data);
		}

	public function updateData()
	{
		$data = array(
				'nombre' => $this->input->post('nombre'),
				'lugar' => $this->input->post('lugar'),
				'encargado' => $this->input->post('encargado'),
				'fecha_inicio' => $this->input->post('fecha_inicio'),
			);
		$this->TorneoModel->data_update(array('torneo_id' => $this->input->post('torneo_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function deleteData($id)
	{
		$this->TorneoModel->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
