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
		$this->load->view('Utama/One');
		$this->load->view('daftar/index');
		//load session library
		// if form was submitte and given captcha matches one in session
			// $data['title'] = 'User Account';
	}
	public function add() {
		$this->hellomotion->addUser();
			redirect('index.php/Hello/login');
	}
	public function daftarAction(){
		$this->load->library('session');
		$this->load->helper(array('captcha','url'));
		$username = $this->input->post('uname', true);
		$email = $this->input->post('mail', true);
		$password = $this->input->post('psww', true);
		$fullname = $this->input->post('fullname', true);
		$tgl = $this->input->post('profile_tanggal_lahir[day]', true);
		$bln = $this->input->post('profile_tanggal_lahir[month]', true);
		$tahun = $this->input->post('profile_tanggal_lahir[year]', true);
		$kota = $this->input->post('domisili', true);
		$province = $this->input->post('Provinsi', true);
		$no_phone = $this->input->post('nomor', true);
		$pekerjaan = $this->input->post('job', true);
		$twitter = $this->input->post('twitter');
		
		$data['title'] = 'User Account | Hellomotion';
		$this->form_validation->set_rules('uname' , 'username', 'required|trim');
		$this->form_validation->set_rules('mail', 'Email', 'required|trim|valid_email|is_unique[registrasi.email]');//cek double email
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
		$this->form_validation->set_rules('profile_tanggal_lahir[day]' ,'tanggal', 'required|trim');
		$this->form_validation->set_rules('profile_tanggal_lahir[year]' ,'tahun', 'required|trim');
		$this->form_validation->set_rules('profile_tanggal_lahir[month]' ,'month', 'required|trim');
		$this->hellomotion->addUser($username, $email, $password, $fullname, $tgl, $bln, $tahun, $kota, $province, $no_phone, $pekerjaan, $twitter);
		$this->session->set_flashdata('sukses', 'data berhasil diinput');
		redirect(base_url('daftar/index'));
	}
}

?>
