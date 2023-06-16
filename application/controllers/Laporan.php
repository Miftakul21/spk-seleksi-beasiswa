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
        $jenis_beasiswa = isset($_POST['jenis_beasiswa']) ? $_POST['jenis_beasiswa'] : '';
        $periode = isset($_POST['periode']) ? $_POST['periode'] : '';

        $data['beasiswa'] = $this->db->query("SELECT * FROM tb_beasiswa WHERE jenis_beasiswa = '$jenis_beasiswa' 
                                            AND periode = '$periode'")->result_array();

        $data['title'] = 'Halaman Laporan';
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/laporan', $data);

    }
    // Nanti Diperbaiki
    public function hasil()
    {
        // $jenis_beasiswa = $this->input->post('jenis_beasiswa');
        $id_beasiswa = $this->input->post('id_beasiswa');
        $data['kuota'] = $this->input->post('kuota');
        $data['hasil'] = $this->db->query("SELECT a.nama, a.nim, b.nilai FROM tb_mahasiswa AS a JOIN tb_hasil AS b ON a.nim = b.nim WHERE 
                        a.`id_beasiswa` = '$id_beasiswa' ORDER BY b.nilai DESC")->result_array();
                        
        $pdf = $this->load->view('laporan\laporan', $data, true);
        $dompdf = new Dompdf();
        $dompdf->set_options(['isRemoteEnabled' => TRUE]);
        $dompdf->loadHTML($pdf);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan.pdf', array('Attachment' => 0));
    }
}