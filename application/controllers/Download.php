<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('download');
		$this->load->library('session');

		if ($this->session->has_userdata('id') == false){
			redirect('login');
		}
	}

	public function index($filename){
		force_download('upload/'.$filename, NULL);
		echo  "<script type='text/javascript'>window.close();</script>";
	}
}

