<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function hello()
	{
        $this->load->view('Hellofest/hellofest');
        $this->load->view('Hellofest/isi');
        
	}
}
?>
