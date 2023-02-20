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

        $insert_data = $this->M_kriteria->insert_data($nama_kriteria, $nilai_bobot, $jenis_beasiswa);

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

    public function update()
    {
        $nama_kriteria = $this->input->post('nama_kriteria');
        $nilai_bobot = $this->input->post('nilai_bobot');
        $jenis_beasiswa = $this->input->post('jenis_beasiswa');
        $id = $this->input->post('id');
        
        $update_data = $this->M_kriteria->update_data($nama_kriteria, $nilai_bobot, $jenis_beasiswa, $id);
        
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
}
