<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarBeasiswa extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        if($this->session->userdata('status') != 'log-in mahasiswa'){
            redirect('login');
        }
        $this->load->model('M_mahasiswa');
        $this->load->model('M_beasiswa');
        $this->load->model('M_kriteria');
        $this->load->model('M_daftarbeasiswa');
    }

    public function index()
    {
        // $data['title'] = 'Daftar Beasiswa';
        $this->load->view('mahasiswa/beasiswa', [
            'beasiswa' => $this->M_beasiswa->get_data_beasiswa(),
            'title' => "Daftar Beasiswa",
            'error' => ''
        ]);
    }

    public function insert_data_nilai($nim,$nilairapot,$penghasilan_ortu,$jumlah_tanggungan,$status_anak,$kartu_sosial,$prestasi_non_akademik)
    {
        // id kriteria
        $dataz_1 = split_string($nilairapot,0);
        $dataz_2 = split_string($penghasilan_ortu,0);
        $dataz_3 = split_string($jumlah_tanggungan,0);
        $dataz_4 = split_string($status_anak,0);
        $dataz_5 = split_string($kartu_sosial,0);
        $dataz_6 = split_string($prestasi_non_akademik,0);
        $data_id_kriteria = [$dataz_1,$dataz_2,$dataz_3,$dataz_4,$dataz_5,$dataz_6];  

        // id subkriteria
        $dataz1 = split_string($nilairapot,1);
        $dataz2 = split_string($penghasilan_ortu,1);
        $dataz3 = split_string($jumlah_tanggungan,1);
        $dataz4 = split_string($status_anak,1);
        $dataz5 = split_string($kartu_sosial,1);
        $dataz6 = split_string($prestasi_non_akademik,1);
        $data_id_subkriteria = [$dataz1,$dataz2,$dataz3,$dataz4,$dataz5,$dataz6];

        // nilai subkriteria
        $data1 = split_string($nilairapot,2);
        $data2 = split_string($penghasilan_ortu,2);
        $data3 = split_string($jumlah_tanggungan,2);
        $data4 = split_string($status_anak,2);
        $data5 = split_string($kartu_sosial,2);
        $data6 = split_string($prestasi_non_akademik,2);
        $data_nilai_subkriteria = [$data1,$data2,$data3,$data4,$data5,$data6];  
        
        for($i = 0; $i < 6; $i++){
            $this->M_daftarbeasiswa->insert_data_nilai($data_id_kriteria[$i],$data_id_subkriteria[$i],$nim,$data_nilai_subkriteria[$i]);    
        }        
    }

    public function store()
    {
        $nim = $this->input->post('nim');
        $nilai_rapot = $this->input->post('1');
        $penghasilan_ortu = $this->input->post('2');
        $jumlah_tanggungan = $this->input->post('3');
        $status_anak = $this->input->post('4');
        $kartu_sosial = $this->input->post('5');
        $prestasi_non_akademik = $this->input->post('6');
        $id_beasiswa = $this->input->post('id_beasiswa');
        
        $cek_pendaftar = $this->M_daftarbeasiswa->cek_daftar($nim); // Upload Pendaftaran
        $data_mahasiswa = $this->M_mahasiswa->cek_mahasiswa($nim);
        $data_beasiswa = $this->M_beasiswa->get_data_idBeasiswa($id_beasiswa);

        $tahun_angkatan_mhs;
        $periode_beasiswa;
        foreach($data_mahasiswa as $data){
            $tahun_angkatan_mhs = $data['angkatan'];
        }

        foreach($data_beasiswa as $data) {
            $periode_beasiswa = $data['periode'];
        }

        // Validasi periode pendaftaran
        if($periode_beasiswa == $tahun_angkatan_mhs) {
            // Validasi Mendaftar Hanya 1 Kali
            if(count($cek_pendaftar) >= 6){
                $data_session = [
                    'info' => 'Error',
                    'message' => "Anda sudah mendaftar beasiswa"
                ];
                $this->session->set_userdata($data_session);
                redirect('daftarbeasiswa');    
            } else {
                // Settting format file
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'pdf|png|doc';
                $config['max_size']     = '2048';
                $config['encrypt_name'] = TRUE;
                
                $this->load->library('upload', $config);

                //File Raport 
                if(!$this->upload->do_upload('file1')) {
                    $data_session = [
                        'info' => 'Error',
                        // 'message' => 'Upload File Tidak Sesuai Format'
                        'message' => $this->upload->display_errors()
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('daftarbeasiswa');

                } else {
                    $nama_file1 = $this->upload->data();
                    $file1 = $nama_file1['file_name'];              
                }

                // File Penghasilan
                if(!$this->upload->do_upload('file2')) {
                    $data_session = [
                        'info' => 'Error',
                        // 'message' => 'Upload File Tidak Sesuai Format'
                        'message' => $this->upload->display_errors()
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('daftarbeasiswa');
                } else {
                    $nama_file2 = $this->upload->data();
                    $file2 = $nama_file2['file_name'];   
                }

                // File Kartu Keluarga
                if(!$this->upload->do_upload('file3')) {
                    $data_session = [
                        'info' => 'Error',
                        // 'message' => 'Upload File Tidak Sesuai Format'
                        'message' => $this->upload->display_errors()
                    ];
                    $this->session->set_userdata($data_session);
                    redirect('daftarbeasiswa');
                } else {
                    $nama_file3 = $this->upload->data();
                    $file3 = $nama_file3['file_name'];   
                }

                // File SKTM
                if($this->upload->do_upload('file4')) {
                    $nama_file4 = $this->upload->data() ? $this->upload->data() : '';
                    $file4 = $nama_file4['file_name'];   
                }

                // KIP-Kuliah
                if($this->upload->do_upload('file5')) {
                    $nama_file5 = $this->upload->data() ? $this->upload->data() : '';
                    $file5 = $nama_file5['file_name'];   
                }

                // File Piagram/Sertifikat 1
                if($this->upload->do_upload('file6')) {
                    $nama_file6 = $this->upload->data() ? $this->upload->data() : '';
                    $file6 = $nama_file6['file_name'];   
                }

                // File Piagram/Sertifikat 2
                if($this->upload->do_upload('file7')) {
                    $nama_file7 = $this->upload->data() ? $this->upload->data() : '';
                    $file7 = $nama_file7['file_name'];   
                }

                // File Piagram/Sertifikat 3
                if($this->upload->do_upload('file8')) {
                    $nama_file8 = $this->upload->data() ? $this->upload->data() : '';
                    $file8 = $nama_file8['file_name'];   
                }

                $update_data = $this->M_daftarbeasiswa->daftar_beasiswa($id_beasiswa,$nim);

                // Upload file Document
                $this->M_daftarbeasiswa->upload_file($nim, $file1, $file2, $file3, $file4, $file5, $file6, $file7, $file8);

                // Upload Nilai Kriteria                                                                    
                $this->insert_data_nilai($nim,$nilai_rapot,$penghasilan_ortu,$jumlah_tanggungan,$status_anak,$kartu_sosial,$prestasi_non_akademik);

                if($update_data){
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
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Pendaftaran beasiswa dikhususkan untuk tahun angkatan '. $periode_beasiswa
            ];
            $this->session->set_userdata($data_session);
            redirect('daftarbeasiswa');
        }
    }

    public function view()
    {
        $fname = $this->uri->segment(3);

        if($fname == '') {
            $data_session = [
                'info' => 'Error',
                'message' => 'File pengumum tidak ditemukan!'
            ];
            $this->session->set_userdata($data_session);
            redirect('daftarbeasiswa/index');
        } else {
            $tofile= realpath("uploads/".$fname);
            header('Content-Type: application/pdf');
            readfile($tofile);
        }
    }
}
