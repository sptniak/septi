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
        public function editUser($username, $email, $password, $fullname, $tgl, $bln, $tahun, $kota, $province, $no_phone, $pekerjaan, $twitter){
            return $this->db->query("UPDATE `registrasi` SET `email`='$email',`passwordd`='$passwordd',`fullname`='$fullname',`tgl`='$tgl',`bln`='$bln',`tahun`='$tahun',`kota`='$kota',`province`='$province',`no_phone`='$no_phone',`pekerjaan`='$pekerjaan',`twitter`='$twitter' WHERE `username`='$username'");
        }
        public function checkAdmin($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get('admin')->num_rows();
        }
        public function getAdmin($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            return $this->db->get('admin')->result();
        }
        public function tampilPartisipasi(){
            return $this->db->query("SELECT * FROM `partisipasi`")->result();
        }
        public function selectPartisipasiById($id){
            return $this->db->query("SELECT * FROM `partisipasi` WHERE `id`='$id'")->result();
        }
        public function editPartisipasi($id, $project, $type, $deadline, $entries, $award){
            return $this->db->query("UPDATE `partisipasi` SET `project`='$project',`type`='$type',`deadline`='$deadline',`entries`='$entries',`award`='$award' WHERE `id`='$id'");   
        }
        public function querydelete($id){
            return $this->db->query("DELETE FROM `partisipasi` WHERE `id` = '$id'");   
        }
    }
?>