<?php

class Participante_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function list_participantes($idpersona =""){
		$this->db->select('*');
		$this->db->from('participante p');
		$this->db->join('persona pe','p.idpersona = pe.idpersona');
		$this->db->join('doc_pago dp','p.idpersona = dp.participante_idpersona');
		if($idpersona != ""){
			$this->db->where(array('p.idpersona' => $idpersona));
		}
		$sql = $this->db->get();
		return $sql->result_array();
	}
	public function obtener_taller_conf($iddocumento){
		$this->db->select('*');
		$this->db->from('doc_pago_evento dpe');
		$this->db->join('evento e','e.id_evento =dpe.evento_id_evento');
		$this->db->join('evento_ponente ep','e.id_evento = ep.evento_id_evento');
		$this->db->join('ponente p','p.persona_idpersona = ep.ponente_persona_idpersona');
		$this->db->join('persona pe','pe.idpersona = p.persona_idpersona');
		$this->db->where(array('dpe.doc_pago_id_doc_pago'=> $iddocumento));
		$sql = $this->db->get();
		return $sql->result_array();
	}
}