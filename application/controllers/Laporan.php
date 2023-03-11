<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{
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
        $data['title'] = 'Halaman Laporan';
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/laporan', $data);
    }
}