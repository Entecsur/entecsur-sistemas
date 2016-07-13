<?php

class Evento_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}
	public function add_evento($datos = array()){
		$this->db->insert('evento',$datos);
		return true;
	}

	public function list_event()
	{
		$this->db->select('*');
		$this->db->from('evento e');
		$this->db->join('categoria c','c.id_tipo_evento = e.categoria_id_tipo_evento');
		$this->db->order_by('e.id_evento','DESC');
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function lastid(){
		$this->db->select('Max(id_evento) as id');
		$this->db->from('evento');
		$sql = $this->db->get();
		return $sql->row();
	}
	public function event_id($id){
		$this->db->select('*');
		$this->db->from('evento');
		$this->db->where(array('id_evento' => $id));
		$sql = $this->db->get();
		return $sql->result_array();
	}
	public function edit_event($data =array(),$idevento){
		$this->db->where(array('id_evento' => $idevento));
		$this->db->update('evento',$data);
		return true;
	}
	public function search_event($nombre,$categoria){
		$this->db->select('*');
		$this->db->from('evento e');
		$this->db->join('categoria c','e.categoria_id_tipo_evento =c.id_tipo_evento');
		//$this->db->where(array('c.id_tipo_evento' => $categoria));
		$this->db->like('e.nom_evento',$nombre);
		$this->db->like('c.id_tipo_evento',$categoria);
		$this->db->order_by('e.id_evento','ASC');
		$sql = $this->db->get();
		return $sql->result_array();
	}

}