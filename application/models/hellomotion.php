<?php
    class Hellomotion extends CI_Model {
        public function addUser($username, $email, $password, $fullname, $tgl, $bln, $tahun, $kota, $province, $no_phone, $pekerjaan, $twitter) {
            // return $this->db->insert('registrasi', );
            return $this->db->query("INSERT INTO `registrasi` (`username`, `email`, `passwordd`, `fullname`, `tgl`, `bln`, `tahun`, `kota`, `province`, `no_phone`, `pekerjaan`, `twitter`) VALUES ('$username', '$email', '$password', '$fullname', '$tgl', '$bln', '$tahun', '$kota', '$province', '$no_phone', '$pekerjaan', '$twitter')");
        }
        public function checkUser($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('passwordd', $password);
            return $this->db->get('registrasi')->num_rows();
        }
        public function getUsers($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('passwordd', $password);
            return $this->db->get('registrasi')->result();
        }
    }
?>