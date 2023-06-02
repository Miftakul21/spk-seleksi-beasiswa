<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller{
    public function __construct()
    { 
        parent::__construct();
        if($this->session->userdata('status') != 'log-in mahasiswa'){
            redirect('login');
        }       
    }

    // Halaman Edit Password Mahasiswa
    public function edit($nim) {
        $data['title'] = "Halaman Setting";
        $data['user'] =  $this->db->query("SELECT * FROM tb_mahasiswa AS a JOIN tb_users AS b ON a.nim = b.username WHERE a.nim = '$nim'")->result_array();
        $this->load->view('mahasiswa/profil',$data);
    }

    // Function Update Password
    public function update_password(){
        $nim = $this->input->post('username');
        $password = $this->input->post('password');

        if(strlen($password) < 8) {
            $data_session = [
                'info' => 'Error',
                'message' => 'Password kurang dari 8 character!'
            ];
            $this->session->set_userdata($data_session);
            redirect('profil/edit/'.$nim);
        } else {
            $password_enc = md5($password);
            $update_data = $this->db->query("update tb_users set password = '$password_enc' where username = '$nim'");

            if($update_data) {
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Berhasil ubah password!'
                ];
                $this->session->set_userdata($data_session);
                redirect('profil/edit/'.$nim);
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Gagal ubah password!'
                ];
                $this->session->set_userdata($data_session);
                redirect('profil/edit/'.$nim);
            }
        } 



    }
}