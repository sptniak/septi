<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation'); 
	}

	public function index()
	{	
		$this->form_validation->set_rules('uname' , 'username', 'required|trim');
		$this->form_validation->set_rules('mail', 'Email', 'required|trim|valid_email|is_unique[registrasi.email');//cek double email
		$this->form_validation->set_rules('psww' , 'Pass', 'required|trim|min_length[8]|matches[pwd]', 'matches'); //password dont match!)
		$this->form_validation->set_rules('mail', 'Email', 'required|trim|matches[psww]');//pengecekan password
		if ($this->form_validation->run() == false){ 
			$data['title'] = 'User Account';
			$this->load->view('Utama/One', $data);
			$this->load->view('daftar/index');
		} else {
			echo 'data bertambah';
		}
	}
}
?>
