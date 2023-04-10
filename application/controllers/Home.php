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
        $data['beasiswa'] = $this->db->query("SELECT a.jenis_beasiswa, a.tgl_pendaftaran, a.tgl_penutupan, DAY(a.`tgl_pendaftaran`) 
                            AS hari_pendaftaran, DAY(a.`tgl_penutupan`) AS hari_penutupan FROM tb_beasiswa AS a")->result_array();
        $this->load->view('mahasiswa/home',$data);
    }
    
}