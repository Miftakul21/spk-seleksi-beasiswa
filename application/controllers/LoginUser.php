<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginUser extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_mahasiswa');
    }

    public function index()
    {
        $data['title'] = 'Login Sistem Informasi Beasiswa';
        $this->load->view('login_mhs',$data);
    }

    public function cek_login_mhs()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek_akun = $this->M_mahasiswa->cek_mahasiswa($username);

        $id_mhs;
        $nama;
        $nim;
        foreach($cek_akun as $akun){
            $id_mhs = $akun['id_mahasiswa'];
            $nama = $akun['nama'];
            $nim = $akun['nim'];
        }

        if(count($cek_akun) > 0) {
            $data_session = [
                'id_mhs' => $id_mhs,
                'nama_mhs' => $nama,
                'nim' => $nim,
                'status' => 'log-in mahasiswa'
            ];
            $this->session->set_userdata($data_session);
            redirect('home');
        } else {
            $data_session = [
                'error' => 'Error',
                'message' => 'Kesalahan saat login, silahkan coba kembali!'
            ];
            $this->session->set_userdata($data_session);
            redirect('login_mhs');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_mhs');
    }
}