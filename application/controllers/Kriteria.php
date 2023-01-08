<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function index()
    {
        $data['title'] = 'Halaman kriteria';
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/kriteria');
        $this->load->view('layout/page/bottom');
    }
}
