<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		if($this->input->post())
		{
			if($this->form_validation->run('login'))
			{
				$usuario = $this->input->post('evt-usuario',true);
				$password = $this->input->post('evt-password',true);
				$data = $this->Usuario_model->logueo($usuario,md5($password));
				if(count($data) == 1){
					$this->session->set_userdata('login');
					$datos['personas'] = $this->Usuario_model->persona($data->id_usuario);
					$datos['privilegios'] = $this->Usuario_model->persona_privilegio($data->id_usuario);
					$this->add_usuario($datos);
					redirect(base_url().'home');
				}else{
					$this->session->set_flashdata('Message',$this->lang->line('evt-controller-message'));
					redirect(base_url().'login');
				}
			}
		}
		$this->load->view('login');
	}
	public function home(){
		if(!empty($this->get_usuario()))
		{	
			$usuario = $this->get_usuario();
			$this->load->view('home',compact('usuario'));
		}else{
			redirect(base_url().'login');
		}
		
	}
	public function logout(){
		$this->session->unset_userdata(array('usuario' => ''));
		$this->session->sess_destroy('login');
		redirect(base_url().'login');
	}
	/**
	 * Estos métodos tienen que ir en una libreria
	 * @return [type] [description]
	 */
	public function get_usuario()
	{
		if(!$this->session->userdata('usuario'))
			$this->set_usuario(array());

		return $this->session->userdata('usuario');
	}

	public function set_usuario($usuario=array())
	{
		$this->session->set_userdata('usuario',$usuario);
	}

	public function add_usuario($user = array()){
		$usuario = $this->get_usuario();
		$usuario['persona'] = $user;
		$this->set_usuario($usuario);
		return true;
	}
}