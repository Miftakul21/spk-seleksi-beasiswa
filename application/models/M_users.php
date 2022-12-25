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

}

?>