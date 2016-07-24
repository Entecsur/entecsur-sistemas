<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(!empty($this->user->get_usuario()))
			{
				$usuario = $this->user->get_usuario();
				$this->load->view('home');
			}else{
				redirect(base_url().'login');
			}
	}

	public function usuarios(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('usuario/usuarios',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function participantes(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('participante/participantes',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function eventos()
	{
		if(!empty($this->user->get_usuario()))
		{

			$pagina               = $this->uri->segment(3);
			$pagina1              = $this->uri->segment(4);
			$priv                 = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$datos['eventos']     = $this->evento_model->list_event();
			if($pagina == ""){
				if($this->input->post())
				{
					$this->save();
				}
				$this->load->view('evento/eventos',$datos);
			}
			if($pagina == "registrar-evento")
			{
				if($this->input->post()){
					$this->save();
				}
				$this->load->view('evento/eventos',$datos);
			}
			if($pagina == "editar-evento")
			{
				if($this->input->post()){
					$this->save();
				}
				$this->load->view('evento/eventos_list',$datos);
			}

		}else{
			redirect(base_url().'login');
			}
	}
	public function pagos(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$datos['preinscritos'] = $this->pago_model->obtner_preinscritos();
			$this->load->view('pago/pagos',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function registrar_pagos(){
			if($this->input->is_ajax_request() and $this->input->post()){

				if($this->form_validation->run('pagos') == TRUE){
					$pago_evento['precios'] = $this->input->post('evt-precio',true);
					$pago_evento['idevento'] = $this->input->post('evt-idevent',true);
					$idpersona = $this->input->post('evt-idpersona',true);
					$lastid = $this->pago_model->lastid();
					$id = $this->user->removeleftp($lastid->id)+1;
					$zero = $this->user->zerofill($id,5);
					$pago['id_doc_pago'] = "PG".$zero;
					$pago['num_doc'] = $this->input->post('evt-numbol',true);
					$pago['fecha'] = date('Y-m-d');
					$pago['monto_tot'] = $this->input->post('evt-mtotal',true);
					$pago['participante_idpersona'] = $idpersona;
					$data = $this->pago_model->insert_pago($pago,$pago_evento,$idpersona);
					$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pago registrado con éxtito!</div>");
					echo "1";
				} else{
					$errors['nombrep']     = form_error('evt-nombrep','<div class = "evt-error-event">','</div>');
					$errors['apellidosp']  = form_error('evt-apellidosp','<div class = "evt-error-event">','</div>');
					$errors['dnip']        = form_error('evt-dnip','<div class = "evt-error-event">','</div>');
					$errors['telefonop']   = form_error('evt-telefonop','<div class = "evt-error-event">','</div>');
					$errors['procedencia'] = form_error('evt-procedenciap','<div class = "evt-error-event">','</div>');
					$errors['numbol']      = form_error('evt-numbol','<div class = "evt-error-event">','</div>');
					$errors['cursos']      = form_error('evt-cursos[]','<div class = "evt-error-event">','</div>');
					$errors['mtotal']      = form_error('evt-mtotal','<div class = "evt-error-event">','</div>');

        			echo  json_encode($errors);
				}
			}
	}

	public function ponentes(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$datos['distritos'] = $this->ponente_model->list_distrito();
			$datos['procedencia'] = $this->ponente_model->list_procedencia();
			$datos['eventos']     = $this->evento_model->list_event();
			$this->load->view('ponente/ponentes',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function registrar_ponente(){
		if($this->input->is_ajax_request() and $this->input->post()){
			if($this->form_validation->run('ponentes') == TRUE){
				if($this->input->post('evt-opcion') != ""){
					$lastid = $this->ponente_model->lastid();
					$id = $this->user->removeleft_ponente($lastid->id)+1;
					$zero = $this->user->zerofill($id,3);
					$data['idpersona']            = "P".$zero;
					$data['nom_part']             = $this->input->post('evt-nombrep',true);
					$data['ape_pater']            =$this->input->post('evt-apellidop',true);
					$data['ape_mater']            = $this->input->post('evt-apellidom',true);
					$data['doc_id']               = $this->input->post('evt-dnip',true);
					$data['telf']                 =$this->input->post('evt-telefonop',true);
					$data['correo']               = $this->input->post('evt-email',true);
					$data['distrito_id_distrito'] = $this->input->post('evt-cbodistrito',true);
					$data['procedencia_id_proce'] =$this->input->post('evt-cboprocedencia',true);
					$data['sexo']                 =$this->input->post('evt-cbosex',true);
					$ponente_evento['id_evento']    =$this->input->post('idevento',true);
					$ponente['persona_idpersona'] = "P".$zero;
					$this->ponente_model->insert_ponente($data,$ponente,$ponente_evento);
					$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ponente registrado con éxtito!</div>");
					echo 1;
				}else{
					echo 0;
				}
			}else{
				$errors['nombrep']        = form_error('evt-nombrep','<div class = "evt-error-event">','</div>');
				$errors['apellidop']      = form_error('evt-apellidop','<div class = "evt-error-event">','</div>');
				$errors['apellidom']      = form_error('evt-apellidom','<div class = "evt-error-event">','</div>');
				$errors['dnip']           = form_error('evt-dnip','<div class = "evt-error-event">','</div>');
				$errors['telefonop']      = form_error('evt-telefonop','<div class = "evt-error-event">','</div>');
				$errors['emailp']         = form_error('evt-email','<div class = "evt-error-event">','</div>');
				$errors['cbodistrito']    = form_error('evt-cbodistrito','<div class = "evt-error-event">','</div>');
				$errors['cboprocedencia'] = form_error('evt-cboprocedencia','<div class = "evt-error-event">','</div>');
				echo json_encode($errors);
			}
		}
	}

	public function certificaciones(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('certificacion/certificaciones',$datos);
		}else{
			redirect(base_url().'login');
		}
	}

	public function preinscripcion(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('preinscripcion/preinscripcion',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function search_preinscritos(){
		if($this->input->is_ajax_request() and $this->input->post()){
			$nombre = $this->input->post('search',true);
			echo $nombre;
			$preinscritos = $this->pago_model->obtner_preinscritos("",$nombre);
			$this->user->list_preinscritos($preinscritos);
		}
	}
	public function obtener_evento(){
		if($this->input->is_ajax_request() and $this->input->post())
		{
			$id = $this->input->post('id',true);
			$data = $this->evento_model->event_id($id);
			echo json_encode($data);
		}
	}
	public function search_event(){
		if($this->input->is_ajax_request() and $this->input->post())
		{

			$this->form_validation->set_rules('buscar','Buscar','required|trim');
			if($this->form_validation->run() == true){
				$buscar = $this->input->post('buscar',true);
				$categoria = $this->input->post('categoria',true);
				$eventos = $this->evento_model->search_event($buscar,$categoria);
				if(count($eventos) > 0){
					$this->user->list_event($eventos);
				}else{
					echo "Evento no encontrado";
				}

			}else{
				echo "Digite un evento a buscar";
			}

		}
	}
	public function obtner_preincritos(){
		if($this->input->is_ajax_request() and $this->input->post())
		{
			$idpersona = $this->input->post('idpersona',true);
			$datos['preinscritos'] = $this->pago_model->obtner_preinscritos($idpersona);
			$datos['mtotal'] = $this->user->_monto_total($datos);
			//print_r($datos);exit;
			echo json_encode($datos);
		}
	}
	public function save(){
			if($this->form_validation->run('evento') == TRUE)
				{
					$data['nom_evento'] = $this->input->post('evt-nombre',true);
					$data['precio'] = $this->input->post('evt-precio',true);
					$data['fecha_evento'] = $this->input->post('evt-fecha',true);
					$data['hora_ini'] = $this->input->post('evt-hora',true);
					$data['ambiente'] = $this->input->post('evt-ambiente',true);
					$data['categoria_id_tipo_evento'] = $this->input->post('evt-categoria',true);
					$condicion = $this->input->post('evt-condicion',true);
					switch ($condicion) {
						case 'new':
							$lastid =  $this->evento_model->lastid();
							$id = $this->user->removeleft($lastid->id)+1;
							$zero = $this->user->zerofill($id,4);
							$data['id_evento'] = "E".$zero;
							$result = $this->evento_model->add_evento($data);
							if($result == true){
								$this->session->set_flashdata('Message',$this->lang->line('evt-evento-add'));
								redirect(base_url().'home/eventos/registrar-evento');
							}
							break;
						case 'edit':
							$idevento = $this->input->post('evt-ideventoo',true);
							//echo $idevento; exit;
							$result = $this->evento_model->edit_event($data,$idevento);
							if($result == true){
								$this->session->set_flashdata('Message',$this->lang->line('evt-evento-edit'));
								redirect(base_url().'home/eventos/editar-evento');
							}
							break;
						default:
							# code...
							break;
					}

				}

	}
}