<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        if($this->session->userdata('status') != 'log-in') {
            redirect('login');
        }
        $this->load->model('M_beasiswa');
        $this->load->model('M_kriteria');
        $this->load->model('M_subkriteria');
    }

    public function index()
    {
        $data['title'] = 'Halaman kriteria';
        $data['beasiswa'] = $this->M_beasiswa->get_data_beasiswa();
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/kriteria', $data);
    }

    public function store()
    {
        $nama_kriteria = $this->input->post('nama_kriteria');
        $nilai_bobot = $this->input->post('nilai_bobot');
        $jenis_beasiswa = $this->input->post('jenis_beasiswa');
        $atribut_kriteria = $this->input->post('atribut_kriteria');        

        // Cek Jumlah Kriteria Minimal 5
        $cek_jumlah_kriteria = $this->M_kriteria->cek_jumlah_kriteria($jenis_beasiswa);

        if(count($cek_jumlah_kriteria) >= 5) {
            $data_session = [
                'info' => 'Error',
                'message' => 'Kriteria Beasiswa Maksimal 5'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        } else {
            $nilai_bobot = $nilai_bobot / 100;
            $insert_data = $this->M_kriteria->insert_data($nama_kriteria, $nilai_bobot, $atribut_kriteria, $jenis_beasiswa);

            if($insert_data){
                $data_session = [
                    'info' => 'Success',
                    'message' => 'Berhasil disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('kriteria/index');
            } else {
                $data_session = [
                    'info' => 'Error',
                    'message' => 'Gagal disimpan!'
                ];
                $this->session->set_userdata($data_session);
                redirect('kriteria/index');
            }
        }
    }

    public function update()
    {
        $nama_kriteria = $this->input->post('nama_kriteria');
        $nilai_bobot = $this->input->post('nilai_bobot');
        $jenis_beasiswa = $this->input->post('jenis_beasiswa');
        $id = $this->input->post('id');
        $atribut_kriteria = $this->input->post('atribut_kriteria'); 
        
        $nilai_bobot = $nilai_bobot / 100;
        
        $update_data = $this->M_kriteria->update_data($nama_kriteria, $nilai_bobot, $atribut_kriteria, $jenis_beasiswa, $id);
        
        if($update_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');

        $delete_data = $this->M_kriteria->delete_data($id);
        if($delete_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        }
    }

    public function store_subkriteria()
    {
        $subKriteria = $this->input->post('sub_kriteria');
        $nilai = $this->input->post('nilai');
        $id_kriteria = $this->input->post('id_kriteria');

        $insert_data = $this->M_subkriteria->insert_data($subKriteria, $nilai, $id_kriteria);
        
        if($insert_data) {
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil disimpan!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal disimpan!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        }
    }

    public function update_subkriteria()
    {
        $subKriteria = $this->input->post('sub_kriteria');
        $nilai = $this->input->post('nilai_subkriteria');
        $id_subkriteria = $this->input->post('id_subkriteria');

        $update_data = $this->M_subkriteria->update_data($subKriteria, $nilai, $id_subkriteria);

        if($update_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        }
    }

    public function delete_subkriteria()
    {
        $id_subkriteria = $this->input->post('id');

        $delete_data = $this->M_subkriteria->delete_data($id_subkriteria);

        if($delete_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('kriteria/index');
        }
    }
}
