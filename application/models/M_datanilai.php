<?php 

class M_datanilai extends CI_Model{
    function get_data_beasiswa($id_beasiswa){    
        $query = $this->db->query("SELECT *  FROM tb_beasiswa WHERE id_beasiswa = '$id_beasiswa'")->result_array();
        return $query;
    }

    function get_data_mahasiswa($id_beasiswa){
        $query = $this->db->query("SELECT * FROM tb_mahasiswa WHERE id_beasiswa = '$id_beasiswa'")->result_array();
        return $query;
    }

    function get_data_kriteria($id_kriteria){
        $query = $this->db->query("SELECT * FROM tb_kriteria WHERE id_kriteria = '$id_kriteria' ORDER BY id_kriteria")->result_array();
        return $query;
    }

    // Nama Kriteria Dari Subkriteria (Crips)
    function get_data_nama_kriteria($nim_mhs){
        $query = $this->db->query("SELECT c.nama_subkriteria FROM tb_penilaian AS a JOIN tb_kriteria AS b ON a.`id_kriteria` = b.`id_kriteria`
						            JOIN tb_subkriteria AS c ON a.`id_subkriteria` = c.`id_subkriteria` WHERE nim = '$nim_mhs'")->result_array();
        return $query;        
    }

    function get_data_nilai_kriteria($nim_mhs){
        $query = $this->db->query("SELECT * FROM tb_penilaian WHERE nim = '$nim_mhs'")->result_array();
        return $query;
    }

    // Ambil Nilai MIM
    function get_data_nilai_min($id_kriteria){
        $query = $this->db->query("SELECT id_kriteria, MIN(nilai) AS nilai_min FROM tb_penilaian WHERE id_kriteria = '$id_kriteria'
						            GROUP BY id_kriteria")->result_array();
        return $query;
    }

    // Ambil NIlai MAX
    function get_data_nilai_max($id_kriteria){
        $query = $this->db->query("SELECT id_kriteria, MAX(nilai) AS nilai_max FROM tb_penilaian WHERE id_kriteria = '$id_kriteria'
						            GROUP BY id_kriteria")->result_array();
        return $query;
    }


    // Data Kriteria Beasiswa
    function kriteria_beasiswa($id_beasiswa){
        $query = $this->db->query("SELECT * FROM tb_kriteria AS a JOIN tb_beasiswa AS b ON a.id_beasiswa = b.`id_beasiswa` WHERE 
                                    b.id_beasiswa = '$id_beasiswa'")->result_array();
        return $query;
    }


}

?>