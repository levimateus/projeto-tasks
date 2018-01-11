<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('form_validation');
 		$this->load->model('UserModel');
	}

	public function login(){
		if ($this->session->has_userdata('id') == true){
			redirect('home');
		}
		
		$this->load->view('template/header');
		$this->load->view('app/authentication/login');
		$this->load->view('template/footer');
	}

	public function logout(){
		if ($this->session->has_userdata('id') == false){
			redirect('login');
		}

		$this->session->unset_userdata(array('id', 'name'));
		$this->session->sess_destroy();

		redirect('login');
	}

	public function authenticate(){
		if ($this->session->has_userdata('id') == true){
			redirect('home');
		}
		
 		$this->form_validation->set_rules('email', 'email', 'required');
 		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$user = $this->UserModel->authenticate($email, $password);

			if ($user == false) {
				redirect('login?fail=true');
			} else {
				$this->session->set_userdata($user);
				redirect('home');
			}
		} else {
			redirect('login?fail=true');
		}
	}
}
