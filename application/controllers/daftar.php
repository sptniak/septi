<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('hellomotion');
		$this->load->library('form_validation'); 
	}

	public function index()
	{	
		$this->load->library('form_validation');
		$data['title'] = 'User Account | Hellomotion';
		$this->form_validation->set_rules('uname' , 'username', 'required|trim');
		$this->form_validation->set_rules('mail', 'Email', 'required|trim|valid_email|is_unique[mahasiswa.email');//cek double email
		$this->form_validation->set_rules('psww' , 'Pass', 'required|trim|min_length[6]|matches[pwd]', 'matches',
			['matches' => 'Password Not Matches', 
			'min_length' => 'password too short'
		]); //password dont match!)
		$this->form_validation->set_rules('pwd', 'passs', 'required|trim|matches[psww]');//pengecekan password
		$this->form_validation->set_rules('fullname' ,'full', 'required|trim');
		$this->form_validation->set_rules('domisili' ,'city', 'required|trim');
		$this->form_validation->set_rules('provinsi' ,'provinsi', 'required|trim');
		$this->form_validation->set_rules('nomor' ,'number', 'required|trim');
		$this->form_validation->set_rules('job' ,'jobs', 'required|trim');
		
		
			// $data['title'] = 'User Account';
			$this->load->view('Utama/One', $data);
			$this->load->view('daftar/index');
			// echo "GOBLOK";
		
			
		
	}
	public function add() {
		$this->hellomotion->addUser();
			redirect('index.php/Hello/login');
	}
}

?>
