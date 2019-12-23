<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlSesion extends CI_Controller {

	public function index()
	{
		$this->load->view('IngresarSistema');
	}

	public function validarCuenta(){
		$acc = $this -> input->post("cuenta");
		if(strlen($acc)>=4 && strlen($acc)<=30){
			return true;
		}else
		{
			return false;
		}
	}
	/*public function index()
	{
		$this->load->view('IngresarSistema');
	}*/
	public function validarClave(){
		$pas = $this -> input->post("clave");
		if(strlen($pas)>=4 && strlen($pas)<=30 && ctype_alnum($pas)){
			return true;
		}else
		{
			return false;
		}
	}
	public function autentificarUsuario(){
		if($this->validarCuenta() && $this->validarClave()){
			//echo "Datos validos";

			$this->load->model("Usuario");
			$this->Usuario->setCuenta($this->input->post("cuenta"));
			$this->Usuario->setClave($this->input->post("clave"));
			
			if($this->Usuario->existeUsuario()){
				echo "Usuario existe";
			}
			else{
				echo "Datos No validos";
			}
		}
		else{
			echo "Datos no validos";
		}
		
	}
}
