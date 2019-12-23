<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Arbitro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->helper(array('url','form'));
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
	 	$this->load->model('ArbitroModel');
	}
	public function index()
	{

		$data['sel_Arbi']=$this->ArbitroModel->get_all_arbitros();
		$this->load->view('arbitro/Arbitro_view',$data);
	}
	public function arb_add($id)
		{
			$data = array(
					'nombres' => $this->input->post('strNombres'),
					'apellidos' => $this->input->post('strApellidos'),
					'foto' => 'arb.png',
          'torneo_id' => $id
				);
			$insert = $this->ArbitroModel->arb_add($data);
			echo json_encode(array("status" => TRUE));
		}
	public function ajax_edit($id)
		{
			$data = $this->arb_model->get_by_id($id);

			echo json_encode($data);
		}

	public function arb_update()
	{
		$data = array(
					'nombres' => $this->input->post('strNombres'),
					'apellidos' => $this->input->post('strApellidos'),
				//'foto' => $this->input->post('foto'),

			);
		$this->arb_model->arb_update(array('arbitro_id' => $this->input->post('id_arbitro')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function arb_delete($id)
	{
		$this->arb_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
