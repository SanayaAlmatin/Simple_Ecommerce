<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$inputan = $this->input->post();
		if($inputan){
			$this->load->model('Madmin');
			$output = $this->Madmin->login($inputan);
			if($output=="ada"){
				redirect('home', 'refresh');
			} else{
				redirect('/', 'refresh');
			}
		}
		
		$this->load->view('login');
	}
}
