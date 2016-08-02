<?php 
class Persona_preinscripcion extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function newCodigo() {
		$new_codigo = "";
		$cant_reg = $this->db->count_all('persona');
		$cant_reg = $cant_reg + 1;
		$num_digitos = strlen($cant_reg);

		if ($num_digitos == 1) {
			$new_codigo = 'P00'.$cant_reg;
		} else if ($num_digitos == 2) {
			$new_codigo = 'P0'.$cant_reg;
		} else {
			$new_codigo = 'P'.$cant_reg;
		}
		return $new_codigo;
	}
	public function allDistritos(){
		$sql = $this->db->get('distrito');
		return $sql->result_array();
	}

	public function allProcedencia(){
		$sql = $this->db->get('procedencia');
		return $sql->result_array();
	}

	public function allCategoria(){
		$sql = $this->db->get('categoria');
		return $sql->result_array();
	}

	public function lastInsertID(){
		/*$sql = $this->db->order_by('idpersona' => 'desc')
					->get('persona');
		return $sql->row();	*/
	}
	public function lastIdPerson(){
		$this->db->select('max(idpersona) as id');
		$this->db->from('persona');
		$sql = $this->db->get();
		return $sql->row();
	}

	public function getEvents($id){
		$sql = $this->db->select('id_evento, nom_evento')
						->get_where('evento', array('categoria_id_tipo_evento' => $id));
		return $sql->result_array();
	}

	public function insertar($dato, $eventos){
		$this->db->trans_start();
		$id_persona = self::newCodigo();
		$data = array('idpersona' => $id_persona,
			'nom_part'             => $dato['nom_part'],
			'ape_pater'            => $dato['ape_pater'],
			'ape_mater'            => $dato['ape_mater'],
			'doc_id'               => $dato['doc_id'],
			'fec_nac'              => $dato['fec_nac'],
			'telf'                 => $dato['telf'],
			'correo'               => $dato['correo'],
			'distrito_id_distrito' => $dato['distrito_id_distrito'],
			'procedencia_id_proce' => $dato['procedencia_id_proce'],
			'sexo'                 => $dato['sexo']
		);

		$this->db->insert('persona',$data);
		$idpersona = self::lastIdPerson();
		$participante = array(
			'idpersona'   => $idpersona->id,
			'foto_boleta' => 'null',
			'estado_pago' =>'0'
			);
		$this->db->insert('participante',$participante);
		$i = 0;
		foreach ($eventos as $evento) {
			$parti_envento[$i] = array(
									'evento_id_evento' => $evento,
									'fecha' => '',
									'participante_idpersona' => $id_persona,
								);
			$i++;
		}
		$this->db->insert_batch('parti_preinscripcion', $parti_envento);
		$this->db->trans_complete();
		$success = $this->db->trans_status();
		return $success;
	}

	public function verificar_email($email){
		$this->db->select('*');
		$this->db->from("participante p");
		$this->db->join('persona pe','pe.idpersona = p.idpersona');
		$this->db->where(array('correo' => $email));
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function obtener_cursos_talleres($idpersona){
		$this->db->select('*');
		$this->db->from('participante p');
		$this->db->join('parti_preinscripcion pp','p.idpersona = pp.`participante_idpersona`');
		$this->db->join('evento e','e.`id_evento` = pp.`evento_id_evento`');
		$this->db->join('categoria c','c.`id_tipo_evento` = e.`categoria_id_tipo_evento`');
		$this->db->where(array('p.idpersona' => $idpersona));
		$sql = $this->db->get();
		return $sql->result_array();
	}

	public function edit_participante($data,$eventos,$idpersona){
		$this->db->trans_start();
		$this->db->where(array('idpersona' => $idpersona));
		$this->db->update('persona',$data);
		$this->db->where(array('participante_idpersona' =>$idpersona));
		$this->db->delete('parti_preinscripcion');
		$i = 0;
		foreach ($eventos as $evento) {
			$parti_envento[$i] = array(
									'evento_id_evento' => $evento,
									'fecha' => '',
									'participante_idpersona' => $idpersona,
								);
			$i++;
		}
		$this->db->insert_batch('parti_preinscripcion', $parti_envento);
		$this->db->trans_complete();
		$success = $this->db->trans_status();
		return $success;
	}
}
?>