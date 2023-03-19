<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

use Dompdf\Dompdf;

class Laporan extends CI_Controller{
    public function __construct()
    {
        parent::__construct(); 
        if($this->session->userdata('status') != 'log-in') {
            redirect('login');
        }
        $this->load->model('M_beasiswa');
        $this->load->model('M_kriteria');
        $this->load->model('M_subkriteria');
    }

    public function index()
    {
        $data['title'] = 'Halaman Laporan';
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/laporan', $data);
    }

    
    public function hasil()
    {
        $pdf = $this->load->view('laporan\laporan', null, true);

        $dompdf = new Dompdf();

        $dompdf->set_option('isRemoteEnabled', TRUE);

        $dompdf->loadHTML($pdf);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream('laporan.pdf', array('Attachment' => 0));
    }












}