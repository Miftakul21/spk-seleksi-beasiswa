<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function index()
    {
        $data['title'] = 'Halaman Mahasiswa';
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/mahasiswa');
        $this->load->view('layout/page/bottom');
    }
}
