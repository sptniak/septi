<?php
    class Hellomotion extends CI_Model {
        public function addUser() {
            $this->load->database();
            $data = [
				"username" => $this->input->post('uname', true),
				"email" => $this->input->post('mail', true),
				"passwordd" => $this->input->post('psww', true),
				"fullname" => $this->input->post('fullname', true),
				"tgl" => $this->input->post('profile_tanggal_lahir[day]', true),
				"bln" => $this->input->post('profile_tanggal_lahir[month]', true),
				"tahun" => $this->input->post('profile_tanggal_lahir[year]', true),
				"kota" => $this->input->post('domisili', true),
				"province" => $this->input->post('Provinsi', true),
				"no_phone" => $this->input->post('nomor', true),
				"pekerjaan" => $this->input->post('job', true),
            ];
            return $this->db->insert('registrasi', $data);
        }
        public function checkUser($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('passwordd', $password);
            return $this->db->get('registrasi')->row_array();

        }
    }
?>