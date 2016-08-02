<?php

class Ponente_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function list_distrito(){
		$this->db->select('*');
		$this->db->from('distrito');
		$sql =  $this->db->get();
		return $sql->result_array();
	}

	public function list_procedencia(){
		$this->db->select('*');
		$this->db->from('procedencia');
		$sql = $this->db->get();
		return $sql->result_array();
	}
	public function lastid(){
		$this->db->select('max(idpersona) as id');
		$this->db->from('persona');
		$sql = $this->db->get();
		return $sql->row();
	}

	public function insert_ponente($data,$ponente,$ponente_evento){
		$this->db->trans_start();
		$this->db->insert('persona',$data);
		$this->db->insert('ponente',$ponente);
		for($i = 0; $i < count($ponente_evento['id_evento']) ; $i++){
			$datos[$i] =array(
				'evento_id_evento' => $ponente_evento['id_evento'][$i],
				'hora_ini' => '',
				'duracion'=> '',
				'tema' => '',
				'ponente_persona_idpersona' =>$ponente['persona_idpersona'],
				);
		}
		$this->db->insert_batch('evento_ponente',$datos);
		$this->db->trans_complete();
		$success = $this->db->trans_status();
		return $success;

	}

	public function update_ponente($data,$ponente,$ponente_evento,$idpersona){
		$this->db->trans_start();
		$this->db->where('idpersona',$idpersona);
		$this->db->update('persona',$data);
		$this->db->where('persona_idpersona',$idpersona);
		$this->db->update('ponente',$ponente);
		for($i = 0; $i < count($ponente_evento['id_evento']) ; $i++){
			$datos[] =array(
				'evento_id_evento' => $ponente_evento['id_evento'][$i],
				'hora_ini' => '',
				'duracion'=> '',
				'tema' => '',
				'ponente_persona_idpersona' =>$ponente['persona_idpersona'],
				);
		}
		$this->db->update_batchh('evento_ponente', $datos, 'ponente_persona_idpersona');
		$this->db->trans_complete();
		$success = $this->db->trans_status();
		return $success;
	}

	public function list_ponente($idponente = "",$search = "")
	{
		$this->db->select('*');
		$this->db->from('persona p');
		$this->db->join('ponente po','p.idpersona = po.persona_idpersona');
		if($idponente != ""){
			$this->db->where(array('po.persona_idpersona' => $idponente));
		}
		if($search != ""){
			$this->db->like('p.idpersona',$search);
			$this->db->or_like('p.doc_id',$search);
			$this->db->or_like('p.nom_part',$search);
			$this->db->or_like('p.ape_pater',$search);
		}
		$sql =  $this->db->get();
		return $sql->result_array();
	}

	public function obtner_taller_conf($idpersona)
	{
		$this->db->select('*');
		$this->db->from('evento_ponente ep');
		$this->db->join('evento e','ep.evento_id_evento = e.id_evento');
		$this->db->where(array('ponente_persona_idpersona' =>$idpersona));
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function delet_taller_conf($idpersona,$idevento)
	{
		$this->db->where(array(
			'ponente_persona_idpersona' => $idpersona,
			'evento_id_evento' => $idevento,
			)
		);
		return $this->db->delete('evento_ponente');
	}

}