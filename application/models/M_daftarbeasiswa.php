<?php
class M_daftarbeasiswa extends CI_Model{
    function get_data_pendaftar()
    {
        $query = $this->db->query("SELECT * FROM tb_pendaftar");
        return $query->result_array();
    }
    
    function insert_data($id_mhs, $id_kriteria1, $id_kriteria2, $id_kriteria3, $id_kriteria4, $id_kriteria5,  $nama_file1, $nama_file2)
    {
        $query = $this->db->query("INSERT tb_pendaftar(id_mhs, id_kriteria1, id_kriteria2, id_kriteria3, id_kriteria4, 
                id_kriteria5, nama_file1, nama_file2) VALUE ('$id_mhs', '$id_kriteria1', '$id_kriteria2', '$id_kriteria3', 
                '$id_kriteria4', '$id_kriteria5', '$nama_file1', '$nama_file2')");
        return $query;        
    }

    function cek_daftar($id_mhs) 
    {
        $query = $this->db->query("SELECT * FROM tb_pendaftar WHERE id_mhs = '$id_mhs'");
        return $query->result_array();
    }


}