<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
    }

    public function index()
    {
        $data['title'] = 'Halaman User';
        $this->load->view('layout/page/top',$data);
        $this->load->view('pages/user');
        $this->load->view('layout/page/bottom');
    }
}
