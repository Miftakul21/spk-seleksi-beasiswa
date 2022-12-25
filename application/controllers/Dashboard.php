<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $data['title_page'] = 'Dashboard';
        $this->load->view('pages/dashboard');
    }
}

?>