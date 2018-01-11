<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('UserModel');
	}

	public function register(){
		$this->load->view('template/header');
		$this->load->view('app/user/register');
		$this->load->view('template/footer');
	}

	public function store(){
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run()) {
			$data = array(
				'name' => $this->input->post('name'), 
				'email' => $this->input->post('email'), 
				'password' => $this->input->post('password')
			);

			$this->UserModel->save($data);
			redirect(base_url('login'));
		} else {
			echo 'Ocorreu um erro';
		}
	}
}