<?php

class M_subkriteria extends CI_Model{
    function insert_data($nama_kriteria, $nilai_kriteria, $id_kriteria)
    {
        $query = $this->db->query("INSERT INTO tb_subkriteria(nama_kriteria, nilai_kriteria, $id_kriteria)
                VALUES('$nama_kriteria, $nilai_kriteria', '$id_kriteria')");
        return $query;
    }

    function update_data($nama_kriteria, $nilai_kriteria, $id_kriteria, $id_subkriteria)
    {
        $query = $this->db->query("UPDATE tb_subkriteria SET nama_kriteria = '$nama_kriteria', 
                nilai_kriteria = '$nilai_kriteria', id_kriteria = '$id_kriteria' WHERE 
                id_subkriteria = '$id_subkriteria'");
        return $query;
    }

    function delete_data($id) 
    {
        $query = $this->db->query("DELETE FROM tb_subkriteria WHERE id_subkriteria = '$id'");
        return $query;
    }
}