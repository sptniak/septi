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
		$this->form_validation->set_rules('uname' , 'username', 'required');
		$this->form_validation->set_rules('mail', 'Email', 'trim|valid_email|is_unique[registrasi.email]');//cek double email
		$this->form_validation->set_rules('psww' , 'psww', 'required|matches[pwd]');
		$this->form_validation->set_rules('pwd', 'pwd', 'required');
		$this->form_validation->set_rules('fullname' ,'full', 'trim|required');
		$this->form_validation->set_rules('domisili' ,'city', 'trim|required');
		$this->form_validation->set_rules('Provinsi' ,'Provinsi', 'trim|required');
		$this->form_validation->set_rules('nomor' ,'number', 'trim|required');
		$this->form_validation->set_rules('job' ,'jobs', 'trim');
		$this->form_validation->set_rules('profile_tanggal_lahir[day]' ,'tanggal', 'trim|required');
		$this->form_validation->set_rules('profile_tanggal_lahir[year]' ,'tahun', 'trim|required');
		$this->form_validation->set_rules('profile_tanggal_lahir[month]' ,'month', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$this->hellomotion->addUser($username, $email, $password, $fullname, $tgl, $bln, $tahun, $kota, $province, $no_phone, $pekerjaan, $twitter);
			$this->session->set_flashdata('sukses', 'data berhasil diinput');
			redirect(base_url('daftar/index'));
		} else {
			$this->load->view('Utama/One');
			$this->load->view('daftar/index');
		}
	}
}

?>
