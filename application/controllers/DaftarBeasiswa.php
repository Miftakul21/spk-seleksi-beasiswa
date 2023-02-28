<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarBeasiswa extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        if($this->session->userdata('status') != 'log-in mahasiswa'){
            redirect('login_mhs');
        }
        $this->load->model('M_beasiswa');
        $this->load->model('M_kriteria');
        $this->load->model('M_daftarbeasiswa');
    }

    public function index()
    {
        $data['title'] = 'Daftar Beasiswa';
        $data['beasiswa'] = $this->M_beasiswa->get_data_beasiswa();
        $this->load->view('mahasiswa/beasiswa', $data);
    }

    public function store()
    {
        // ambil id_subkriteria
        $id_mhs = $this->session->userdata('id_mhs');
        $kriteria_1 = $this->input->post('1');
        $kriteria_2 = $this->input->post('2');
        $kriteria_3 = $this->input->post('3');
        $kriteria_4 = $this->input->post('4');
        $kriteria_5 = $this->input->post('5');

        // ambil nilai subkriteria
        // $nilai_kriteria_1 = $this->input->post('kriteria1');
        // $nilai_kriteria_2 = $this->input->post('kriteria2');
        // $nilai_kriteria_3 = $this->input->post('kriteria3');
        // $nilai_kriteria_4 = $this->input->post('kriteria4');
        // $nilai_kriteria_5 = $this->input->post('kriteria5');

        $cek_pendaftar = $this->M_daftarbeasiswa->cek_daftar($id_mhs); // Upload Pendaftaran
        // Nanti Di Isi                                            // Upload Nilai Kriteria

        if(count($cek_pendaftar)) {
            $data_session = [
                'info' => 'Error',
                'message' => "Anda sudah mendaftar beasiswa"
            ];
            $this->session->set_userdata($data_session);
            redirect('daftarbeasiswa');
        } else {

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf|png';
            $config['max_size']     = '2048';
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file_1')) {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Upload File Tidak Sesuai Format'
                ];
                $this->session->set_userdata($data_session);
                redirect('daftarbeasiswa');
            } else {
                $nama_file1 = $this->upload->data();
                $file1 = $nama_file1['file_name'];
                print_r($file1);
            }

            if(!$this->upload->do_upload('file_2')) {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Upload File Tidak Sesuai Format'
                ];
                $this->session->set_userdata($data_session);
                redirect('daftarbeasiswa');
            } else {
                $nama_file2 = $this->upload->data();
                $file2 = $nama_file2['file_name'];
                print_r($file2);
            }

            $insert_data = $this->M_daftarbeasiswa->insert_data("1", $kriteria_1, $kriteria_2, 
                $kriteria_3, $kriteria_4, $kriteria_5, $file1, $file2);
            
            if($insert_data){
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Data Berhasil disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('daftarbeasiswa');
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Data Gagal disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('daftarbeasiswa');
            }
        }
    }
}
