<?php 
class Persona_Preinscripcion extends CI_Model {
	
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
	/**
	 * Metod que retorna un objeto de mayor id de la tabla persona
	 * @return [type] [description]
	 */
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
		//utilizar transacciones si deseas registrar varias tabla a la vez
		$this->db->trans_start();
		$id_persona = self::newCodigo();
		$data = array('idpersona' => $id_persona,
			'nom_part' => $dato['nom_part'],
			'ape_pater' => $dato['ape_pater'],
			'ape_mater' => $dato['ape_mater'],
			'doc_id' => $dato['doc_id'],
			'fec_nac' => $dato['fec_nac'],
			'telf' => $dato['telf'],
			'correo' => $dato['correo'],
			'distrito_id_distrito' => $dato['distrito_id_distrito'],
			'procedencia_id_proce' => $dato['procedencia_id_proce'],
			'sexo' => $dato['sexo']
		);

		$this->db->insert('persona',$data);
		//si registras en la tabla persona tbn en la tabla hija
		//participante se registra el idpersona
		$idpersona = self::lastIdPerson();
		$participante = array(
			'idpersona' => $idpersona->id,
			'foto_boleta' => 'null',
			'estado_pago' =>'0'
			);
		$this->db->insert('participante',$participante);

		$i = 0;
		foreach ($eventos as $evento) {
			$parti_envento[$i] = array('evento_id_evento' => $evento,
							'fecha' => '',
							'participante_idpersona' => $id_persona,
				);
			$i++;
		}
		$this->db->insert_batch('parti_preinscripcion', $parti_envento);
		$this->db->trans_complete();
		/**
		 * [si la transacción se ha ejecutado con exito el método "trans_status()"
		 * retorna true, en caso contrario retorna un false las cuales se van almacenar
		 * en la variable $success]
		 * @var [type]
		 */
		$success = $this->db->trans_status();
		return $success;
	}
}
?>