<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('M_users');
        $this->load->library('form_validation');
        if($this->session->userdata('status') !='log-in') {
            redirect('login');
        } 
    }

    public function index()
    {
        $data['level_user'] = ["Admin","Petugas","Kepala Biro"];
        $data['title'] = 'Halaman User';
        $data['user'] = $this->M_users->get_data_users();
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/user', $data);
    }
    
    public function store()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level_user = $this->input->post('level_user');  
        

        if(strlen($password) < 8) {
            $data_session = [
                'info' => 'Error',
                'message' => 'password minimal 8 digit'
            ];
            $this->session->set_userdata($data_session);
            redirect('user/index');
        } else {
            $enc_password = md5($password);
            $insert_data = $this->M_users->insert_data($nama, $username, $enc_password, $level_user);
            if($insert_data){
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Berhasil disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('user/index');
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Gagal disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('user/index');
            }

        }


        

    }

    public function update(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $level_user = $this->input->post('level_user');  
        $id = $this->input->post('id');  

        if(strlen($password) < 8) {
            $data_session = [
                'info' => 'Error',
                'message' => 'password minimal 8 digit'
            ];
            
            $this->session->set_userdata($data_session);
            redirect('user/index');
        } else {
            $enc_password = md5($password);
            $update_data = $this->M_users->update_data($nama, $username, $enc_password, $level_user, $id);

            if($update_data) {
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Berhasil diupdate!'
                ];
                $this->session->set_userdata($data_session);
                redirect('user/index');
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Gagal diupdate!'
                ];
                $this->session->set_userdata($data_session);
                redirect('user/index');
            }

        }
    }

    public function delete(){
        $id = $this->input->post('id');
        $delete_data = $this->M_users->delete_data($id);

        $data = $this->M_users->get_users_id($id);
        $data_terakhir = $data['id_users'];

        if($data_terakhir == '1'){
            $data_session = [
                'info' => 'Error',
                'message' => 'Data terakhir tidak bisa dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('user/index');            
        } else {
            if($delete_data) {
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Berhasil dihapus!'
                ];
                $this->session->set_userdata($data_session);
                redirect('user/index');
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Gagal dihapus!'
                ];
                $this->session->set_userdata($data_session);
                redirect('user/index');
            }
        }
    }

}
