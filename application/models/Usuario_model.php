<?php

class Usuario_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function logueo($username, $password){
		$sql = $this->db->select('*')
				->from('usuario u')
				->where(array('u.usuario_nom'=>$username,'u.pass' =>$password))
				->get();
				return $sql->row();
	}


	public function persona($id_persona){
		$sql = $this->db->select('*')
				->from('persona p')
				->join('usuario u','p.idpersona = u.persona_idpersona')
				->where(array('u.id_usuario' => $id_persona))
				->get();
				return $sql->result_array();
	}

	public function usuario_privilegio($id_persona){
		$sql = $this->db->select('*')
		      ->from('usuario u')
		      ->join('usuario_privilegio up','u.id_usuario = up.id_usuario')
		      ->join('privilegio p','p.idprivilegios = up.privilegio_idprivilegios')
		      ->join('categoria_privilegio cp','cp.idcat_priv = p.idcat_priv')
		     // ->group_by('pr.img_cat')
		      ->where(array('u.id_usuario' => $id_persona))
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

	public function list_privilegios(){
		$this->db->select('*');
		$this->db->from('privilegio p');
		$this->db->join('categoria_privilegio cp','cp.idcat_priv = p.idcat_priv');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function verificar_usuario($usuario){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where(array('usuario_nom'=>$usuario));
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function insert_usuario($data,$user,$pr){
		$this->db->trans_start();
		$this->db->insert('persona',$data);
		$this->db->insert('usuario_system',array('persona_idpersona' => $data['idpersona']));
		$this->db->insert('usuario',$user);
		foreach($pr as $key => $value){
			$privilegios[] =  array(
				'privilegio_idprivilegios' =>$value,
				'id_usuario' =>$user['id_usuario'],
				);
		}
		$this->db->insert_batch('usuario_privilegio',$privilegios);
		$this->db->trans_complete();
		$success = $this->db->trans_status();
		return $success;

	}
	public function lastid(){
		$this->db->select('max(id_usuario) as id');
		$this->db->from('usuario');
		$sql = $this->db->get();
		return $sql->row();
	}
	public function list_cargo(){
		$this->db->select('*');
		$this->db->from('cargo');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function list_usuarios($idusuario = "",$search = ""){
		$this->db->select('*');
		$this->db->from('persona p');
		$this->db->join('usuario_system us','p.idpersona = us.persona_idpersona');
		$this->db->join('usuario u','u.persona_idpersona = us.persona_idpersona');
		$this->db->join('cargo c','c.id_Cargo = u.Cargo_id_Cargo');
		if($idusuario != ""){
			$this->db->join('usuario_privilegio up','u.id_usuario = up.id_usuario');
			$this->db->where(array('idpersona' => $idusuario));
		}
		if($search != ""){
			$this->db->like('p.idpersona',$search);
			$this->db->or_like('p.nom_part',$search);
			$this->db->or_like('p.ape_pater',$search);
			$this->db->or_like('p.doc_id',$search);
			$this->db->or_like('u.usuario_nom',$search);
		}
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function edit_usuario($data,$user,$pr,$idpersona,$idusuario){
		$this->db->trans_start();
		$this->db->where(array('idpersona' => $idpersona));
		$this->db->update('persona',$data);
		$this->db->where(array('id_usuario' => $idusuario));
		$this->db->update('usuario',$user);
		$this->db->where(array('id_usuario' =>$idusuario));
		$this->db->delete('usuario_privilegio');
		foreach($pr as $key => $value){
			$privilegios[] =  array(
				'privilegio_idprivilegios' =>$value,
				'id_usuario' =>$idusuario,
				);
		}
		$this->db->insert_batch('usuario_privilegio',$privilegios);
		$this->db->trans_complete();
		$success = $this->db->trans_status();
		return $success;
	}

}