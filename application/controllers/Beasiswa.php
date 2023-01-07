<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function index()
    {
        $data['title'] = 'Halaman Beasiswa';
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/beasiswa');
        $this->load->view('layout/page/bottom');
    }
}
