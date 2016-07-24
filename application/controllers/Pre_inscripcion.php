<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_inscripcion extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('persona_preinscripcion');
	}
	public function index(){
		$data['distritos'] = $this->persona_preinscripcion->allDistritos();
		$data['procedencia'] = $this->persona_preinscripcion->allProcedencia();
		$data['categoria'] = $this->persona_preinscripcion->allCategoria();
		$data['conferencia'] = $this->persona_preinscripcion->getEvents('001');
		$data['taller'] = $this->persona_preinscripcion->getEvents('002');

		$this->load->view('preinscripcion/form_preinscripcion', $data);
	}
	public function insert(){
		$data = array('nom_part' => $this->input->POST('nombre'),
			'ape_pater' => $this->input->POST('paterno'),
			'ape_mater' => $this->input->POST('materno'),
			'doc_id' => $this->input->POST('doc_id'),
			'fec_nac' => $this->input->POST('fec_nac'),
			'telf' => $this->input->POST('telef'),
			'correo' => $this->input->POST('correo'),
			'distrito_id_distrito' => $this->input->POST('distrito'),
			'procedencia_id_proce' => $this->input->POST('proced'),
			'sexo' => $this->input->POST('sexo')
		);
		
		$eventos = $this->input->POST('evento');

		$valor = $this->persona_preinscripcion->insertar($data, $eventos);
		if($valor){
			$this->load->view('preinscripcion/confirm');
		}
	}
	public function showEvents(){
		$this->load->library('pre_inscripcion');
		if($this->input->is_ajax_request() and $this->input->post()){
			$id = $this->input->post('id_evt');
			$eventos = $this->persona_preinscripcion->getEvents($id);
			if(count($eventos) > 0){
				$this->pre_inscripcion->listEvents($eventos);
			}else{
				echo "Evento no encontrado";
			}
		}else{
			echo "Digite un evento a buscar";
		}
	}
}
?>