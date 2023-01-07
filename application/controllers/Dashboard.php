<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') !='log-in') {
            redirect('login');
        } 
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/dashboard');
        $this->load->view('layout/page/bottom');
    }
}

?>