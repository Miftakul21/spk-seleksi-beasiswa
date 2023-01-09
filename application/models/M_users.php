<?php 
class M_users extends CI_Model{

    function get_data_users() {
        $query  = $this->db->query("SELECT * FROM tb_users");
        return $query->result_array();
    }

    function cek_login($username, $password) {
        $query  = $this->db->query("SELECT * FROM tb_users WHERE username = '$username' AND password = '$password'");
        return $query->result_array();
    }

    function insert_user($nama, $username, $password, $level){
        $query = $this->db_query("INSERT INTO tb_users('nama', 'username', 'password', 'level_user')
                                VALUES('$nama', '$username', '$password', '$level')");
        return $query;
    }

}

?>