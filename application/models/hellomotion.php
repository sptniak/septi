<?php
    class Hellomotion extends CI_Model {
        public function addUser($username, $email, $password, $fullname, $tgl, $bln, $tahun, $kota, $province, $no_phone, $pekerjaan, $twitter) {
            // return $this->db->insert('registrasi', );
            return $this->db->query("INSERT INTO `registrasi` (`username`, `email`, `passwordd`, `fullname`, `tgl`, `bln`, `tahun`, `kota`, `province`, `no_phone`, `pekerjaan`, `twitter`) VALUES ('$username', 'vio@vio.com', 'vio', 'vio', '20', 'juni', '2019', 'nganjuk', 'Jawa Timur', '0923810', 'mhs', 'apa')");
        }
        public function checkUser($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('passwordd', $password);
            return $this->db->get('registrasi')->row_array();

        }
    }
?>