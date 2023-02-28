<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_beasiswa');
        $this->load->model('M_mahasiswa');
        if($this->session->userdata('status') != 'log-in mahasiswa'){
            redirect('login_mhs');
        }
    }

    public function index()
    {
        $data['title'] = 'Home';
        // $data['id_mhs'] = $this->session->userdata('id_mhs');
        // $data['nama_mhs'] = $this->session->userdata('nama_mhs');
        $this->load->view('mahasiswa/home',$data);
    }
    
}