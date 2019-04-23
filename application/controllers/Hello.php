<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('hellomotion');
		$this->load->library('form_validation');
		$this->load->library('session');
		if (isset($_SESSION['fullname'])) {
			//redirect(base_url('/dashboard/(:any)'));
			$this->load->view('/dashboard');
		}
	}

	public function login()
	{	
		$data['title'] = ' HelloMotion.com ';
		$this->load->view('Utama/One', $data);
		$this->load->view('Login/login');
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('uname' , 'username', 'required|trim');
		$this->form_validation->set_rules('psww' , 'Pass', 'required|trim');

	}
	public function admin(){
		$this->load->view('Admin/login');
	}
	public function loginAdminAction(){
		$username = $this->input->post('uname');
		$psw = $this->input->post('psw');
		$checkLogin = $this->hellomotion->checkAdmin($username,$psw);
		if ($checkLogin == 1 ) {
			$username = $this->hellomotion->getAdmin($username, $psw);
			foreach ($username as $key) {
					$name = [
						'username' => $key->username,
						'password' => $key->password
					];
			}
			$this->session->set_userdata($name);
			redirect('/Admin/dashboardAdmin');
		}else{
			$this->load->view('/Hello/admin');
		}
	}
	public function check() {
		$username = $this->input->post('uname');
		$password = $this->input->post('psw');
		$checkLogin = $this->hellomotion->checkUser($username, $password);
		print_r($checkLogin);
		if ($checkLogin == 1 ) {
			$username = $this->hellomotion->getUsers($username, $password);
			foreach ($username as $key) {
					$name = [
						'fullname' => $key->fullname,
						'username' => $key->username,
						'password' => $key->passwordd
					];
			}
			$this->session->set_userdata($name);
			redirect('/dashboard/index');
		}else{
			$this->load->view('/Hello/Login');
		}
		// if ( !empty($checkLogin)) {
		// 	redirect('index.php/daftar/index');//kalo ada isinya dan bener
		// }
		// else {
		// 	redirect('index.php/Hello/Login');
		// }
	}
}
?>
