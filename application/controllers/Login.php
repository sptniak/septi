<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('hellomotion');
		$this->load->library('form-validation');
	}

	public function Login()
	{
        // $this->load->view('Utama/One');
	// $this->load->view('Login/login');
	
		$this->load->library('form-validation');
	}
}
?>
