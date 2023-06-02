<?php 

class M_users extends CI_Model{

    function get_data_users() {
        $query  = $this->db->query("SELECT * FROM tb_users WHERE NOT level_user = 'mahasiswa'");
        return $query->result_array();
    }

    function get_users_id($id){
        $query = $this->db->query("SELECT * FROM tb_users WHERE id_users = '$id'")->result_array();
        return $query;
    }

    function cek_login($username, $password) {
        $query  = $this->db->query("SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'");
        return $query->result_array();
    }

    function insert_data($nama, $username, $password, $level_user) {
        $query = $this->db->query("INSERT tb_users (nama, username, password, level_user) VALUES ('$nama', '$username', '$password',
        '$level_user')");
        return $query;
    }

    function update_data($nama, $username, $password, $level_user, $id){
        $query = $this->db->query("UPDATE tb_users SET nama = '$nama', username = '$username', password='$password', 
        level_user = '$level_user' WHERE id_users = '$id'");
        return $query;
    }

    function delete_data($id) {
        $query = $this->db->query("DELETE FROM tb_users WHERE id_users = '$id'");
        return($query);
    }
}
?>