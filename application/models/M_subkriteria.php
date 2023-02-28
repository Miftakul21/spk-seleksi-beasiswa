<?php
class M_subkriteria extends CI_Model{
    function insert_data($nama_subkriteria, $nilai_subkriteria, $id_kriteria)
    {
        $query = $this->db->query("INSERT INTO tb_subkriteria(nama_subkriteria, nilai_subkriteria, id_kriteria)
                VALUES('$nama_subkriteria', '$nilai_subkriteria', '$id_kriteria')");
        return $query;
    }
    
    function update_data($nama_subkriteria, $nilai_subkriteria, $id_subkriteria)
    {
        $query = $this->db->query("UPDATE tb_subkriteria SET nama_subkriteria = '$nama_subkriteria', 
                nilai_subkriteria = '$nilai_subkriteria' WHERE 
                id_subkriteria = '$id_subkriteria'");
        return $query;
    }

    function delete_data($id) 
    {
        $query = $this->db->query("DELETE FROM tb_subkriteria WHERE id_subkriteria = '$id'");
        return $query;
    }
}