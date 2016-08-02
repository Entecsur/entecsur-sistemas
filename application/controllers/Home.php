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
			$priv                 = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$datos['distritos']   = $this->ponente_model->list_distrito();
			$datos['procedencia'] = $this->ponente_model->list_procedencia();
			$datos['listpriv']    = $this->Usuario_model->list_privilegios();
			$datos['cargos']      = $this->Usuario_model->list_cargo();
			$pagina               = $this->uri->segment(3);
			if($pagina == "" or $pagina == "registrar-usuario"){
				if($this->input->post()){
					self::__save_usuario();
				}
				$this->load->view('usuario/usuarios',$datos);
			}
			if($pagina == "editar-usuario"){
				$datos['list_user'] = $this->Usuario_model->list_usuarios();
				$this->load->view('usuario/usuarios_list',$datos);
			}
			if($pagina == "editar"){
				$idusuario = $this->uri->segment(4);
				$datos['persona'] = $this->Usuario_model->list_usuarios($idusuario);
				if($this->input->post()){
					self::__save_usuario();
				}
				$this->load->view('usuario/usuarios_edit',$datos);
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function __save_usuario(){
		if($this->form_validation->run('usuario')){
					$usuario = $this->input->post('evt-usuario',true);
					$verificar_user = $this->Usuario_model->verificar_usuario($usuario);
						$password = $this->input->post('evt-password',true);
						$repassword =$this->input->post('evt-repassword',true);
						if($password === $repassword){
							$pr = $this->input->post('evt-privilegios',true);
							if($pr !== null){
								$data['nom_part']             = $this->input->post('evt-nombrep',true);
								$data['ape_pater']            = $this->input->post('evt-apellidop',true);
								$data['ape_mater']            = $this->input->post('evt-apellidom',true);
								$data['doc_id']               = $this->input->post('evt-dnip',true);
								$data['telf']                 = $this->input->post('evt-telefonop',true);
								$data['correo']               = $this->input->post('evt-email',true);
								$data['distrito_id_distrito'] = $this->input->post('evt-cbodistrito',true);
								$data['procedencia_id_proce'] = $this->input->post('evt-cboprocedencia',true);
								$data['sexo']                 = $this->input->post('evt-cbosex',true);
								$user['usuario_nom']        = $usuario;
								$user['pass']               = md5($password);
								$user['Cargo_id_Cargo']     = $this->input->post('evt-cbocargo',true);
								$opcion = $this->input->post('evt-opcion',true);
								switch ($opcion)
								{
									case 'add':
										if($verificar_user == null){
											$lastid                    = $this->ponente_model->lastid();
											$id                        = $this->user->removeleft_ponente($lastid->id)+1;
											$zero                      = $this->user->zerofill($id,3);
											$data['idpersona']         = "P".$zero;
											$lastid1                   = $this->Usuario_model->lastid();
											$id1                       = $this->user->removeleft_usuario($lastid1->id)+1;
											$zero1                     = $this->user->zerofill($id1,3);
											$user['id_usuario']        = "U".$zero1;
											$user['persona_idpersona'] = "P".$zero;
											$result = $this->Usuario_model->insert_usuario($data,$user,$pr);
											$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuario registrado con exito!</div>");
											redirect(base_url('home/usuarios'));
										}else{
											$this->session->set_flashdata('Message_',"<div class = 'evt-error-event' >Usuario ya exisiste en la base de datos</div>");

										}
										break;
									case 'edit':
										$idpersona = $this->input->post('evt-idpersona',true);
										$idusuario = $this->input->post('evt-iduser',true);
										$this->Usuario_model->edit_usuario($data,$user,$pr,$idpersona,$idusuario);
										$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Usuario editado con exito!</div>");
										redirect(base_url('home/usuarios/editar-usuario'));
										break;
									default:
										# code...
										break;
								}
								}else{
							$this->session->set_flashdata('Message__',"<div class = 'evt-error-event' >Seleccione por lo menos un privilegio</div>");
							}
						}else{
							$this->session->set_flashdata('Message___',"<div class = 'evt-error-event' >Repassword no coincide</div>");
						}
				}
	}
	public function search_usuarios(){
		if($this->input->is_ajax_request() and $this->input->post()){
			$search = $this->input->post('search',true);
			$list_user = $this->Usuario_model->list_usuarios("",$search);
			$this->user->__list_usuarios($list_user);
		}
	}
	public function participantes(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$pagina = $this->uri->segment(3);
			if($pagina == "" or $pagina == "registrar-participante"){
				$datos['list_participantes'] = $this->participante_model->list_participantes();
				$this->load->view('participante/participantes',$datos);
			}
			if($pagina == "registrar-certificacion"){
				$idpersona = $this->uri->segment(4);
				$datos['datos_participante'] = $this->participante_model->list_participantes($idpersona);
				$iddocumento = $datos['datos_participante'][0]['id_doc_pago'];
				$datos['cursos_talleres'] = $this->participante_model->obtener_taller_conf($iddocumento);
				$this->load->view('participante/registrar_certificacion',$datos);
			}

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
					$pago_evento['precios']         = $this->input->post('evt-precio',true);
					$pago_evento['idevento']        = $this->input->post('evt-idevent',true);
					$idpersona                      = $this->input->post('evt-idpersona',true);
					$lastid                         = $this->pago_model->lastid();
					$id                             = $this->user->removeleftp($lastid->id)+1;
					$zero                           = $this->user->zerofill($id,5);
					$pago['id_doc_pago']            = "PG".$zero;
					$pago['num_doc']                = $this->input->post('evt-numbol',true);
					$pago['fecha']                  = date('Y-m-d');
					$pago['monto_tot']              = $this->input->post('evt-mtotal',true);
					$pago['participante_idpersona'] = $idpersona;
					$data                           = $this->pago_model->insert_pago($pago,$pago_evento,$idpersona);
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
			if(($this->uri->segment(3) == "") || ($this->uri->segment(3) == "registrar-ponente"))
			{
				$this->load->view('ponente/ponentes',$datos);
			}
			if($this->uri->segment(3) == "editar-ponente")
			{
				$datos['listap'] = $this->ponente_model->list_ponente();
				$this->load->view('ponente/editar_ponente',$datos);
			}
		}else{
			redirect(base_url().'login');
		}
	}
	public function search_ponentes(){
		if($this->input->is_ajax_request() and $this->input->post()){
			$search = $this->input->post('search',true);
			$listap = $this->ponente_model->list_ponente("",$search);
			$this->user->list_ponentes($listap);
		}
	}
	public function edit_ponente(){
		if($this->input->is_ajax_request() and $this->input->post()){
			$idparticipante = $this->input->post('id',true);
			$data['tallerconf']= $this->ponente_model->obtner_taller_conf($idparticipante);
			$data['datos'] = $this->ponente_model->list_ponente($idparticipante);
			echo json_encode($data);
		}
	}
	public function delete_tc($idpersona,$idevento){
		if($this->input->is_ajax_request() and $this->input->post()){

		}
	}
	public function registrar_ponente(){
		if($this->input->is_ajax_request() and $this->input->post()){
			if($this->form_validation->run('ponentes') == TRUE){
				$opcion = $this->input->post('regp',true);
				$data['nom_part']             = $this->input->post('evt-nombrep',true);
				$data['ape_pater']            = $this->input->post('evt-apellidop',true);
				$data['ape_mater']            = $this->input->post('evt-apellidom',true);
				$data['doc_id']               = $this->input->post('evt-dnip',true);
				$data['telf']                 = $this->input->post('evt-telefonop',true);
				$data['correo']               = $this->input->post('evt-email',true);
				$data['distrito_id_distrito'] = $this->input->post('evt-cbodistrito',true);
				$data['procedencia_id_proce'] = $this->input->post('evt-cboprocedencia',true);
				$data['sexo']                 = $this->input->post('evt-cbosex',true);
				$ponente_evento['id_evento']  = $this->input->post('idevento',true);
				switch ($opcion) {
					case 'registrarp':
						if($this->input->post('evt-opcion') != ""){
							$lastid                       = $this->ponente_model->lastid();
							$id                           = $this->user->removeleft_ponente($lastid->id)+1;
							$zero                         = $this->user->zerofill($id,3);
							$data['idpersona']            = "P".$zero;
							$ponente['persona_idpersona'] = "P".$zero;
							$this->ponente_model->insert_ponente($data,$ponente,$ponente_evento);
							$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ponente registrado con éxtito!</div>");
							echo 1;
						}else{
							echo 0;
						}
						break;
					case 'editarp':
						//if($this->input->post('evt-opcion') != ""){
							$idpersona = $this->input->post('evt-idpersona',true);
							$ponente['persona_idpersona'] = $idpersona;
							$this->ponente_model->update_ponente($data,$ponente,$ponente_evento,$idpersona);
							$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ponente editado con éxtito!</div>");

							echo 1;
						/*}else{
							echo 0;
						}*/
						break;
					default:
						# code...
						break;
				}
			}else{
				$this->__loadErrorsPonentes();
			}
		}
	}

	public function __loadErrorsPonentes()
	{
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

	public function certificaciones()
	{
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('certificacion/certificaciones',$datos);
		}else{
			redirect(base_url().'login');
		}
	}

	public function preinscripcion()
	{
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$datos['distritos']   = $this->persona_preinscripcion->allDistritos();
			$datos['procedencia'] = $this->persona_preinscripcion->allProcedencia();
			$datos['categoria']   = $this->persona_preinscripcion->allCategoria();
			$datos['conferencia'] = $this->persona_preinscripcion->getEvents('001');
			$datos['taller']      = $this->persona_preinscripcion->getEvents('002');
			$pagina = $this->uri->segment(3);
			if($pagina == "" or $pagina =="registrar-preinscripcion"){
				self::__insert();
				$this->load->view('preinscripcion/preinscripcion',$datos);
			}
			if($pagina == "editar-preinscripcion"){
				$datos['preinscritos'] = $this->pago_model->obtner_preinscritos();
				$this->load->view('preinscripcion/lista_preinscritos',$datos);
			}
			$idpersona = $this->uri->segment(4);
			if($idpersona !=""){
				$datos['preinscritos']    = $this->pago_model->obtner_preinscritos("",$idpersona);
				$datos['cursos_talleres'] =$this->persona_preinscripcion->obtener_cursos_talleres($idpersona);
				self::__insert();
				$this->load->view('preinscripcion/editar_preinscripcion',$datos);
			}

		}else{
			redirect(base_url().'login');
		}
	}
	public function __insert()
	{
		if($this->input->post()){
			if($this->form_validation->run('preinscripcion')){
				$data = array(
							'nom_part'             => $this->input->POST('nombre'),
							'ape_pater'            => $this->input->POST('paterno'),
							'ape_mater'            => $this->input->POST('materno'),
							'doc_id'               => $this->input->POST('doc_id'),
							'fec_nac'              => $this->input->POST('fec_nac'),
							'telf'                 => $this->input->POST('telef'),
							'correo'               => $this->input->POST('correo'),
							'distrito_id_distrito' => $this->input->POST('distrito'),
							'procedencia_id_proce' => $this->input->POST('proced'),
							'sexo'                 => $this->input->POST('sexo')
						);
				$correo = $this->persona_preinscripcion->verificar_email($data['correo']);
				$opcion = $this->input->post('evt-opcion',true);
				$eventos = $this->input->POST('evento');
				switch ($opcion) {
					case 'add':
						if($correo == null){
							$valor = $this->persona_preinscripcion->insertar($data, $eventos);
							if($valor)
							{
								$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pre-inscripción realizada correctamente!</strong></div>");
								redirect(base_url('home/preinscripcion'));
							}
						}else{
							$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Ud. se ha registrado anteriormente!</strong></div>");
							redirect(base_url('home/preinscripcion'));
						}
						break;
					case 'edit':
						$idpersona = $this->uri->segment(4);
						$valor  = $this->persona_preinscripcion->edit_participante($data,$eventos,$idpersona);
						if($valor)
							{
								$this->session->set_flashdata('Message',"<div class = 'alert alert-success fade in ' > <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Pre-inscripción editada con exito!</strong></div>");
								redirect(base_url('home/preinscripcion'));
							}
						break;
					default:
						# code...
						break;
				}


			}
		}
	}
	public function search_preinscritos()
	{
		if($this->input->is_ajax_request() and $this->input->post())
		{
			$nombre = $this->input->post('search',true);
			echo $nombre;
			$preinscritos = $this->pago_model->obtner_preinscritos("",$nombre);
			$this->user->list_preinscritos($preinscritos);
		}
	}
	public function obtener_evento()
	{
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
			$idpersona             = $this->input->post('idpersona',true);
			$datos['preinscritos'] = $this->pago_model->obtner_preinscritos($idpersona);
			$datos['mtotal']       = $this->user->_monto_total($datos);
			echo json_encode($datos);
		}
	}
	public function save(){
			if($this->form_validation->run('evento') == TRUE)
				{
					$data['nom_evento']               = $this->input->post('evt-nombre',true);
					$data['precio']                   = $this->input->post('evt-precio',true);
					$data['fecha_evento']             = $this->input->post('evt-fecha',true);
					$data['hora_ini']                 = $this->input->post('evt-hora',true);
					$data['ambiente']                 = $this->input->post('evt-ambiente',true);
					$data['categoria_id_tipo_evento'] = $this->input->post('evt-categoria',true);
					$condicion                        = $this->input->post('evt-condicion',true);
					switch ($condicion) {
						case 'new':
							$lastid            =  $this->evento_model->lastid();
							$id                = $this->user->removeleft($lastid->id)+1;
							$zero              = $this->user->zerofill($id,4);
							$data['id_evento'] = "E".$zero;
							$result            = $this->evento_model->add_evento($data);
							if($result == true){
								$this->session->set_flashdata('Message',$this->lang->line('evt-evento-add'));
								redirect(base_url().'home/eventos/registrar-evento');
							}
							break;
						case 'edit':
							$idevento = $this->input->post('evt-ideventoo',true);
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