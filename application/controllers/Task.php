<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('TaskModel');
		$this->load->library('session');
		$this->load->library('form_validation');

		if ($this->session->has_userdata('id') == false){
			redirect('login');
		}
	}

	public function register(){
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('app/task/register');
		$this->load->view('template/footer');
	}

	public function store(){
		$this->form_validation->set_rules('code', 'code', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');

		if ($this->form_validation->run()){
			$filename = $this->_uploadFile('attachment');
			$data = array(
				'code' => $this->input->post('code'), 
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'), 
				'attached_file' => $filename,
				'user_id' => $this->session->id
			);

			$this->TaskModel->save($data);
			redirect(base_url('home'));
		} else {
			redirect('register?fail=true');
		}
	}

	public function delete(){
		$this->form_validation->set_rules('id', 'id', 'required');

		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$this->TaskModel->delete($id);
			redirect('task/usertasks');
		} else {
			echo "Ocorreu um erro";
		}
	}

	public function edit(){
		$this->form_validation->set_rules('id', 'id', 'required');

		if ($this->form_validation->run()) {
			$id = $this->input->post('id');
			$task = $this->TaskModel->selectOne($id);

			$data = array('task' => $task);

			$this->load->view('template/header');
			$this->load->view('template/navbar');
			$this->load->view('app/task/edit', $data);	
		} else {
			echo "Ocorreu um erro";
		}
	}

	public function update(){
		$this->form_validation->set_rules('code', 'code', 'required');
		$this->form_validation->set_rules('id', 'id', 'required');
		$this->form_validation->set_rules('file_name', 'file_name', 'required');
		$this->form_validation->set_rules('name', 'name', 'required');

		if ($this->form_validation->run()) {
			$filename = $this->input->post('file_name');

			if ($this->input->post('attachment_edit') == 'on') {
				unlink('upload/'.$filename);
				$filename = $this->_uploadFile('attachment');
			}

			$data = array(
				'id' => $this->input->post('id'),
				'code' => $this->input->post('code'), 
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'), 
				'attached_file' => $filename,
				'user_id' => $this->session->id
			);

			$this->TaskModel->update($data);
			redirect(base_url('task/usertasks'));
		} else {
			echo "Ocorreu um erro";
		}
	}

	public function userTasks(){
		$userId = $this->session->id;
		$tasks = $this->TaskModel->listByUser($userId);
		$data = array('tasks' => $tasks);
		$this->load->view('template/header');
		$this->load->view('template/navbar');
		$this->load->view('app/task/list', $data);
		$this->load->view('template/footer');
	}

	private function _randomizeFileName($fileInputName){
		if (!isset($_FILES[$fileInputName]['name'])) {
			return false;
		}

		$filename = $_FILES[$fileInputName]['name'];
		$filename = explode('.', $filename);
		$filename[0] = rand().time();
		$filename = implode('.', $filename);

		return $filename;
	}

	private function _uploadFile($fileInputName){	
		if (!isset($_FILES[$fileInputName]['name'])) {
			return false;
		}

		$filename = $this->_randomizeFileName($fileInputName);

		$config['upload_path'] = './upload';
		$config['file_name'] = $filename;
		$config['allowed_types'] = '*';
		$config['max_size']    = 20480;
		$config['max_width']   = 1024;
		$config['max_height']  = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($fileInputName)){
			return false;
		} else {
			return $filename;
		}
	}
}