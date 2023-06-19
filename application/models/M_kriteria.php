<?php
class M_kriteria extends CI_Model{

    function get_data_kriteria() {
        $query = $this->db->query("SELECT * FROM tb_kriteria");
        return $query->result_array();
    }

    function insert_data($nama_kriteria, $nilai_bobot, $jenis_beasiswa){
        $query = $this->db->query("INSERT INTO tb_kriteria(nama_kriteria, nilai_bobot, id_beasiswa)
                VALUES( '$nama_kriteria', '$nilai_bobot', '$jenis_beasiswa')");
        return $query;
    }

    function update_data($nama_kriteria, $nilai_bobot, $id_beasiswa, $id){
        $query = $this->db->query("UPDATE tb_kriteria SET nama_kriteria = '$nama_kriteria', nilai_bobot = 
                '$nilai_bobot', id_beasiswa = '$id_beasiswa' WHERE id_kriteria = '$id'");
        return $query;
    }

    function delete_data($id){
        $query = $this->db->query("DELETE FROM tb_kriteria WHERE id_kriteria = '$id'");
        return $query;
    }

    function cek_jumlah_kriteria($id) {
        $query = $this->db->query("SELECT * FROM tb_beasiswa AS a JOIN tb_kriteria AS b ON 
                a.`id_beasiswa` = b.`id_beasiswa` WHERE a.`id_beasiswa` = '$id'");
        return $query->result_array();
    }
}