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

}