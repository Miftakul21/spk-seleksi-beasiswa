<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataNilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_beasiswa');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_daftarbeasiswa');
        if($this->session->userdata('status') != 'log-in'){
            redirect('login');
        }       
    }

    public function beasiswa()
    {
        $data['title'] = "test";
        $data['mahasiswa'] = $this->M_mahasiswa->get_data_mahasiswa();
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/data_nilai', $data);
    }

    public function insert_data_nilai($nim,$nilairapot,$penghasilan_ortu,$jumlah_tanggungan,$status_anak,$kartu_sosial)
    {
        // id kriteria
        $dataz_1 = split_string($nilairapot,0);
        $dataz_2 = split_string($penghasilan_ortu,0);
        $dataz_3 = split_string($jumlah_tanggungan,0);
        $dataz_4 = split_string($status_anak,0);
        $dataz_5 = split_string($kartu_sosial,0);
        $data_id_kriteria = [$dataz_1,$dataz_2,$dataz_3,$dataz_4,$dataz_5];  

        // id subkriteria
        $dataz1 = split_string($nilairapot,1);
        $dataz2 = split_string($penghasilan_ortu,1);
        $dataz3 = split_string($jumlah_tanggungan,1);
        $dataz4 = split_string($status_anak,1);
        $dataz5 = split_string($kartu_sosial,1);
        $data_id_subkriteria = [$dataz1,$dataz2,$dataz3,$dataz4,$dataz5];

        // nilai subkriteria
        $data1 = split_string($nilairapot,2);
        $data2 = split_string($penghasilan_ortu,2);
        $data3 = split_string($jumlah_tanggungan,2);
        $data4 = split_string($status_anak,2);
        $data5 = split_string($kartu_sosial,2);
        $data_nilai_subkriteria = [$data1,$data2,$data3,$data4,$data5];  
        
        for($i = 0; $i < 5; $i++){
            $this->M_daftarbeasiswa->insert_data_nilai($data_id_kriteria[$i],$data_id_subkriteria[$i],$nim,$data_nilai_subkriteria[$i]);    
        }        
    }

    public function store()
    {
        // ambil id_subkriteria
        $nim = $this->input->post('nim');
        $nilai_rapot = $this->input->post('1');
        $penghasilan_ortu = $this->input->post('2');
        $jumlah_tanggungan = $this->input->post('3');
        $status_anak = $this->input->post('4');
        $kartu_sosial = $this->input->post('5');
        $id_beasiswa = $this->input->post('id_beasiswa');

        $cek_pendaftar = $this->M_daftarbeasiswa->cek_daftar($nim); // Upload Pendaftaran
        if(count($cek_pendaftar) >= 5) {
            $data_session = [
                'info' => 'Error',
                'message' => "Anda sudah mendaftar beasiswa"
            ];
            $this->session->set_userdata($data_session);
            redirect('datanilai/beasiswa/'.$id_beasiswa);   
        } else {
            $update_data = $this->M_daftarbeasiswa->daftar_beasiswa($id_beasiswa,$nim);
            $this->insert_data_nilai($nim,$nilai_rapot,$penghasilan_ortu,$jumlah_tanggungan,$status_anak,$kartu_sosial);

            if($update_data){
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Data Berhasil disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('datanilai/beasiswa/'.$id_beasiswa);
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Data Gagal disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('datanilai/beasiswa/'.$id_beasiswa);
            }
        }
    }
}