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
	public function eventos(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('evento/eventos',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function pagos(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('pago/pagos',$datos);
		}else{
			redirect(base_url().'login');
		}
	}
	public function ponentes(){
		if(!empty($this->user->get_usuario()))
		{
			$priv = $this->uri->segment(2);
			$datos['privilegios'] = $this->Usuario_model->obtener_priv($priv);
			$this->load->view('ponente/ponentes',$datos);
		}else{
			redirect(base_url().'login');
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
}