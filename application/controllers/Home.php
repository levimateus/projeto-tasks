<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('TaskModel');
		$this->load->library('session');

		if ($this->session->has_userdata('id') == false){
			redirect('login');
		}
	}

	public function index(){
		$tasks = $this->TaskModel->listAll();
		$data = array('tasks' => $tasks);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('app/home', $data);
		$this->load->view('template/footer');
	}
}