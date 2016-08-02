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
					$datos['privilegios'] = $this->Usuario_model->usuario_privilegio($data->id_usuario);
					$datos['personas'] = $this->Usuario_model->persona($data->id_usuario);
					$this->user->add_usuario($datos);
					redirect(base_url().'home');
				}else{
					$this->session->set_flashdata('Message',$this->lang->line('evt-evento-msge'));
					redirect(base_url().'login2');
				}
			}
		}
		if(!empty($this->user->get_usuario()))
		{
			redirect(base_url().'home');
		}else{
			$this->load->view('login2');
		}

	}
	public function logout()
	{
		$this->session->unset_userdata(array('usuario' => ''));
		$this->session->sess_destroy('login');
		redirect(base_url().'login');
	}

}