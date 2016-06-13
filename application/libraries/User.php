<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User {

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

	public function add_usuario($user){
		$usuario = $this->get_usuario();
		$usuario['persona'] = $user;
		$this->set_usuario($usuario);
		return true;
	}

	function filtrar_array(&$array, $clave_orden) 
			{
  				$array_filtrado = array(); 
  				foreach($array as $index=>$array_value) 
  				{
	    			$value = $array_value[$clave_orden];
	    			unset($array_value[$clave_orden]);
	    			$array_filtrado[$value][] = $array_value;
    			}

 			 		$array = $array_filtrado; 
			}
	
}