<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Resultado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		//$this->load->helper(array('url','form'));
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
	 	$this->load->model('ResultadoModel');
	}
	public function index()
	{
		$data['resultado']=$this->ResultadoModel->get_all_equipos();
		$this->load->view('resultados/Resultado_view',$data);
	}

}
