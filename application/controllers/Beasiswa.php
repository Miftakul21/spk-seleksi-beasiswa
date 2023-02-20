<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('M_beasiswa');
        $this->load->library('form_validation');
        if($this->session->userdata('status') != 'log-in'){
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Halaman Beasiswa';
        $data['beasiswa'] = $this->M_beasiswa->get_data_beasiswa();
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/beasiswa',$data);
    }

    public function store()
    {
        $jenis_beasiswa = $this->input->post('jenis_beasiswa');
        $kuota = $this->input->post('kuota');
        $periode = $this->input->post('periode');

        $insert_data = $this->M_beasiswa->insert_data($jenis_beasiswa, $kuota, $periode);

        if($insert_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil disimpan!'
            ];
            $this->session->set_userdata($data_session);
            redirect('beasiswa/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal disimpan!'
            ];
            $this->session->set_userdata($data_session);
            redirect('beasiswa/index');
        }
    }


    public function update()
    {
        $jenis_beasiswa = $this->input->post('jenis_beasiswa');
        $kuota = $this->input->post('kuota');
        $periode = $this->input->post('periode');
        $id = $this->input->post('id_beasiswa');

        $update_data = $this->M_beasiswa->update_data($jenis_beasiswa, $kuota, $periode, $id);

        if($update_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('beasiswa/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal diupdate!'
            ];
            $this->session->set_userdata($data_session);
            redirect('beasiswa/index');
        }        
    }

    public function delete()
    {
        $id = $this->input->post('id_beasiswa');
        $delete_data = $this->M_beasiswa->delete_data($id);

        if($delete_data){
            $data_session = [
                'info' => 'Success',
                'message' => 'Berhasil dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('beasiswa/index');
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Gagal dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('beasiswa/index');
        }  
    }

}

