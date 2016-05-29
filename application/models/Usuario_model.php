<?php

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function logueo($username, $password){
		$sql = $this->db->select('*')
				->from('cargo c')
				->join('usuario u','c.id_Cargo = u.Cargo_id_Cargo')
				->where(array('usuario_nom'=>$username,'pass' =>$password))
				->get();
				return $sql->row();
	}


	public function persona($id_persona){
		$sql = $this->db->select('*')
				->from('cargo c')
				->join('usuario u','c.id_Cargo = u.Cargo_id_Cargo')
				->join('persona p','p.id_part = u.participante_id_part')
				->where(array('u.id_usuario' => $id_persona))
				->get();
				return $sql->result_array();
	}

	public function usuario_privilegio($id_persona){
		$sql = $this->db->select('*')
		      ->from('cargo c')
		      ->join('usuario u','c.id_Cargo = u.Cargo_id_Cargo')
		      ->join('cargo_privilegio cp','c.id_Cargo = cp.cargo_id_Cargo')
		      ->join('privilegio p','p.idprivilegios = cp.privilegio_idprivilegios')
		      ->where(array('id_usuario' => $id_persona))
		      ->get();
		      return $sql->result_array();
	}
}