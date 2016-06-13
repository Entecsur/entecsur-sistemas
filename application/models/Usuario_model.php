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
				->join('persona p','p.idpersona = u.persona_idpersona')
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
		      ->join('categoria_privilegio pr','p.idcat_priv = pr.idcat_priv')
		     // ->group_by('pr.img_cat')
		      ->where(array('id_usuario' => $id_persona))
		      ->get();
		      return $sql->result_array();
	}

	public function obtener_priv($categoria_priv){
		$this->db->select('*');
		$this->db->from('privilegio p');
		$this->db->join('categoria_privilegio cp','p.idcat_priv=cp.idcat_priv');
		$this->db->where(array('cp.nombre_cat' => $categoria_priv));
		$sql = $this->db->get();
		return  $sql->result_array();
	}
	
}