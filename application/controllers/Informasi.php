<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller{
    public function __construct()
    { 
        parent::__construct();
        $this->load->model('M_beasiswa');
        if($this->session->userdata('status') != 'log-in mahasiswa'){
            redirect('login_mhs');
        }       
    }

    public function index()
    {
        $data['title'] = 'Informasi';
        $data['beasiswa'] = $this->M_beasiswa->get_data_beasiswa();        
        $this->load->view('mahasiswa/informasi', $data);       
    }

}