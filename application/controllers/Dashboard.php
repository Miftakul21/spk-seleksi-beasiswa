<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') !='log-in') {
            redirect('login');
        } 

        $this->load->model('M_users');
        $this->load->model('M_beasiswa');
        $this->load->model('M_mahasiswa');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['mahasiswa'] = count($this->M_mahasiswa->get_data_mahasiswa());
        $data['users'] = count($this->M_users->get_data_users());
        $data['beasiswa'] = count($this->M_beasiswa->get_data_beasiswa());
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/dashboard', $data);
    }
    
}

?>