<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('M_mahasiswa');
        $this->load->library('form_validation');
        if($this->session->userdata('status') != 'log-in'){
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Mahasiswa';
        $data['mahasiswa'] = $this->M_mahasiswa->get_data_mahasiswa();
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/mahasiswa', $data);
    }

    public function store()
    {
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $jurusan = $this->input->post('jurusan');
        $angkatan = $this->input->post('angkatan');

        $cek_data = $this->M_mahasiswa->cek_mahasiswa($nim);
        if(count($cek_data) > 0) {
            $data_session = [
                'info' => 'Error',
                'message' => 'Data sudah ditambahkan!'
            ];
            $this->session->set_userdata($data_session);
            redirect('mahasiswa/index');
        } else {
            $insert_data = $this->M_mahasiswa->insert_data($nama, $nim, $jurusan, $angkatan, $nim);
            if($insert_data){
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Berhasil disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('mahasiswa/index');
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Gagal disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('mahasiswa/index');
            }
        }
    }


    public function update()
    {
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $jurusan = $this->input->post('jurusan');
        $angkatan = $this->input->post('angkatan');
        $id = $this->input->post('id_mahasiswa');
        $update_data = $this->M_mahasiswa->update_data($nama, $nim, $jurusan, $angkatan, $id);
        if($update_data) {
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('mahasiswa/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('mahasiswa/index');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id_mahasiswa');
        $delete_data = $this->M_mahasiswa->delete_data($id);

        if($delete_data) {
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('mahasiswa/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('mahasiswa/index');
        }       
    }
}
