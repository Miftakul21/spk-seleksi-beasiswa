<?php
class M_mahasiswa extends CI_Model{

    function get_data_mahasiswa(){
        $query = $this->db->query('SELECT * FROM tb_mahasiswa');
        return $query->result_array();
    }

    function cek_mahasiswa($nim){
        $query = $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim = '$nim'");
        return $query->result_array();
    }

    function insert_data($nama, $nim, $jurusan, $angkatan){
        $query = $this->db->query("INSERT INTO tb_mahasiswa(nama, nim, jurusan, angkatan) VALUE
                ('$nama', '$nim', '$jurusan', '$angkatan')");
        return $query;
    }

    function update_data($nama, $nim, $jurusan, $angkatan, $id) {
        $query = $this->db->query("UPDATE tb_mahasiswa SET nama = '$nama', nim = '$nim', jurusan = '$jurusan', 
                angkatan = '$angkatan' WHERE id_mahasiswa = '$id'");
        return $query;
    }

    function delete_data($id) {
        $query = $this->db->query("DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$id'");
        return $query;
    }

}