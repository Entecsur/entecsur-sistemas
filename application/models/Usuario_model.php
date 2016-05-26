<?php

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function logueo($username, $password){
		$sql = $this->db->select('*')
				->from('usuario')
				->where(array('usuario_nom'=>$username,'pass' =>$password))
				->get();
				return $sql->row();
	}

	public function persona($id_persona){
		$sql = $this->db->select('*')
				->from('participante p')
				->join('usuario u','p.id_part = u.participante_id_part')
				->where(array('u.id_usuario' => $id_persona))
				->get();
				return $sql->result_array();
	}
	public function persona_privilegio($id_persona){
		$sql = $this->db->select('*')
		      ->from('usuario_privilegio up')
		      ->join('privilegio p','up.idprivilegios = p.idprivilegios')
		      ->join('modulo m','m.idmodulo = p.idmodulo')
		      ->where(array('id_usuario' => $id_persona))
		      ->get();
		      return $sql->result_array();
	}
}