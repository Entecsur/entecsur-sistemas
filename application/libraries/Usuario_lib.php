<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_lib {

	var $CI;
	public function __construct()
	{

		$this->CI = & get_instance();
		
	}

	public function get_usuario()
	{
		if(!$this->CI->session->userdata('usuario'))
			$this->set_usuario(array());

		return $this->CI->session->userdata('usuario');
	}

	public function set_usuario($usuario=array())
	{
		$this->CI->session->set_userdata('usuario',$usuario);
	}

	public function add_usuario($user = array()){
		$usuario = $this->get_usuario();
		$usuario['persona'] = $user;
		$this->set_usuario($usuario);
		return true;
	}

	public function suma(){
		$a = 5;
		$b = 6;
		$suma =$a+$b;
		return $suma;
	}


}