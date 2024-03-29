<?php
class M_beasiswa extends CI_Model{
    function get_data_idBeasiswa($id_beasiswa) {
        $query = $this->db->query("SELECT * FROM tb_beasiswa WHERE id_beasiswa = '$id_beasiswa'")->result_array();
        return $query;
    }

    function get_data_beasiswa(){
        $query = $this->db->query('SELECT * FROM tb_beasiswa ORDER BY id_beasiswa ASC');
        return $query->result_array();
    }

    function insert_data($jenis_beasiswa, $kuota, $periode, $tgl_pendaftaran, $tgl_penutupan) {
        $query = $this->db->query("INSERT tb_beasiswa (jenis_beasiswa, kuota, periode, tgl_pendaftaran, tgl_penutupan, file, status) 
                VALUES ('$jenis_beasiswa','$kuota', '$periode', '$tgl_pendaftaran', '$tgl_penutupan', '', '1')");
        return $query;
    }

    function update_data($jenis_beasiswa, $kuota, $periode, $tgl_pendaftaran, $tgl_penutupan, $id) {
        $query = $this->db->query("UPDATE tb_beasiswa SET jenis_beasiswa = '$jenis_beasiswa', kuota = '$kuota',
                periode = '$periode', tgl_pendaftaran = '$tgl_pendaftaran', tgl_penutupan = '$tgl_penutupan'
                WHERE id_beasiswa = '$id'");
        return $query;
    }

    function delete_data($id) {
        $query = $this->db->query("DELETE FROM tb_beasiswa WHERE id_beasiswa = '$id'");
        return $query;
    }
}