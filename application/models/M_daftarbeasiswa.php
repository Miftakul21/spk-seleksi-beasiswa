<?php
class M_daftarbeasiswa extends CI_Model{
    function daftar_beasiswa($id_beasiswa, $nim)
    {
        $query = $this->db->query("UPDATE tb_mahasiswa SET id_beasiswa = '$id_beasiswa' WHERE nim = '$nim'");
        return $query;        
    }

    function cek_daftar($nim) 
    {
        $query = $this->db->query("SELECT * FROM tb_penilaian WHERE nim = '$nim'");
        return $query->result_array();
    }

    function insert_data_nilai($id_kriteria, $id_subkriteria, $nim, $nilai) {
        $query = $this->db->query("INSERT INTO tb_penilaian(id_kriteria, id_subkriteria, nim, nilai) VALUES ('$id_kriteria','$id_subkriteria',
                            '$nim', '$nilai')");
        return $query;
    }

    function upload_file($nim, $file1, $file2, $file3, $file4, $file5, $file6, $file7, $file8) 
    {
        $query = $this->db->query("INSERT INTO tb_file(nim,file1,file2,file3,file4,file5,file6,file7,file8) VALUES ('$nim','$file1','$file2','$file3','$file4','$file5','$file6','$file7','$file8')");
        return $query;
    }

}