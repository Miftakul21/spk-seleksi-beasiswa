<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('M_users');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Halaman User';
        $data['user'] = $this->M_users->get_data_users();
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/user', $data);
        $this->load->view('layout/page/bottom');
    }

    public function store()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level_user = $this->input->post('level_user');

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Mohon isi form username'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]', [
            'require' => 'Mohon isi form username',
            'min_length' => 'Username minimal 3 character'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]', [
            'require' => 'Mohon isi form password',
            'min_length' => 'Username minimal 6 character'
        ]);
        $this->form_validation->set_rules('level_user', 'Level_user', 'required', [
            'required' => 'Mohon isi form level_user'
        ]);

        if($this->form_validation->run() != TRUE) {
            $data['title'] = 'Halaman User';
            $data['user'] = $this->M_users->get_data_users();
            $this->load->view('layout/page/top',$data);
            $this->load->view('pages/user', $data);
            $this->load->view('layout/page/bottom');
        } else {
            $enc_password = md5($password);
            $cek_insert = $this->M_users->insert_user($nama, $username, $enc_password, $level_user);

            // cek insert data
            if($cek_insert) {
                $data_session = [
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan!'
                ];
                $this->session->set_userdata($data_session);

                $data['title'] = 'Halaman User';
                $data['user'] = $this->M_users->get_data_users();
                $this->load->view('layout/page/top',$data);
                $this->load->view('pages/user', $data);
                $this->load->view('layout/page/bottom');
            } else {
                $data_session = [
                    'status' => 'error',
                    'message' => 'Data gagal disimpan!'
                ];
                $this->session->set_userdata($data_session);

                $data['title'] = 'Halaman User';
                $data['user'] = $this->M_users->get_data_users();
                $this->load->view('layout/page/top',$data);
                $this->load->view('pages/user', $data);
                $this->load->view('layout/page/bottom');
            }
        }
    }

}
