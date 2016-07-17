<?php

class Pago_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function obtner_preinscritos($idpersona = "",$search = "")
	{
		$this->db->select('pe.`idpersona`, pe.`nom_part`,pe.`ape_pater`,pe.`ape_mater`,pe.`doc_id`,pe.`telf`,
		pe.`sexo`,pe.`telf`,pr.`nom_proce`,pr.`telf_proce`,e.`id_evento`,e.`nom_evento`, e.`precio`,
		e.`fecha_evento`,e.`ambiente`,e.`hora_ini`');
		$this->db->from('parti_preinscripcion pp');
		$this->db->join('participante p','p.idpersona = pp.participante_idpersona');
		$this->db->join('persona pe','pe.idpersona = p.idpersona');
		$this->db->join('procedencia pr','pe.procedencia_id_proce = pr.id_proce');
		$this->db->join('evento e','e.id_evento = pp.evento_id_evento');
		if($idpersona == ""){
			$this->db->where(array('p.estado_pago' => '0'));
			if($search != ""){
				$this->db->like('pe.nom_part',$search);
				$this->db->or_like('pe.doc_id',$search);
			}
			$this->db->group_by('p.idpersona');

		}else{
			$this->db->where(array('pe.idpersona' => $idpersona));
		}
		$sql = $this->db->get();
		return $sql->result_array();

	}

	public function insert_pago($pago =array(),$pago_evento =array(),$idpersona){
		$this->db->trans_start();
		$this->db->insert('doc_pago',$pago);
		$ultimoid = $this->pago_model->lastid();
		for($i = 0;$i < count($pago_evento['precios']);$i++){
			$pevento[$i] = array(
				'doc_pago_id_doc_pago'       => $ultimoid->id,
				'evento_id_evento'           => $pago_evento['idevento'][$i],
				'cant'                       => 0,
				'importe'                    => (double)$pago_evento['precios'][$i],
				'certificado_id_certificado' => 'null',
				);
		}
		$this->db->insert_batch('doc_pago_evento',$pevento);
		$this->db->where(array('idpersona' => $idpersona));
		$this->db->update('participante',array('estado_pago' => 1));
		$this->db->trans_complete();
		return true;
	}

	public function lastid(){
		$this->db->select('Max(id_doc_pago) as id');
		$this->db->from('doc_pago');
		$sql = $this->db->get();
		return $sql->row();
	}



}