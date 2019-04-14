<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Utama/One');
		$this->load->view('Utama/1');	
	}
	public function register()
	{
		$this->load->view('Utama/One');
		$this->load->view('Utama/registrasi');
	}
}
?>
