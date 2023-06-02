<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataNilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_beasiswa');
        $this->load->model('M_mahasiswa');
        $this->load->model('M_daftarbeasiswa');
        $this->load->model('M_datanilai');
        if($this->session->userdata('status') != 'log-in'){
            redirect('login');
        }       
    }

    public function beasiswa()
    {
        $data['title'] = "Halaman Penilianan SAW";
        $data['mahasiswa'] = $this->M_mahasiswa->get_data_mahasiswa();
        $this->load->view('layout/page/top', $data);
        $this->load->view('pages/data_nilai', $data);
    }

    public function delete()
    {
        $nim = $this->input->post('nim');
        $id_beasiswa = $this->input->post('id_beasiswa');

        $data = $this->db->query("SELECT a.nim, b.file1, b.file2 FROM tb_mahasiswa AS a JOIN tb_file AS b ON 
                                a.nim = b.nim where a.nim = '$nim'")->result_array();
        $file_1;
        $file_2;

        foreach($data as $df){
            $file_1 =  $df['file1'];
            $file_2 = $df['file2'];
        }

        if(file_exists('uploads/'.$file_1)){
            unlink('uploads/'.$file_1);
        } else {
            echo "File Tidak Ada ".$file_1." Pada Folder Upload"."<br>";            
        }

        if(file_exists('uploads/'.$file_2)){
            unlink('uploads/'.$file_2);
        } else {
            echo "File Tidak Ada ".$file_2." Pada Folder Upload"."<br>";            
        }

        $update_mhs = $this->M_mahasiswa->update_beasiswa_mhs($nim);
        $this->M_datanilai->delete_data_nilai_mhs($nim); // hapus data penilaian
        $this->M_datanilai->delete_data_hasil($nim); // hapus data hasil
        $this->M_datanilai->delete_file($nim); // hapus data file

        if($update_mhs){
            $data_session = [
                'info' => 'Success',
                'message' => 'Data berhasil dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('datanilai/beasiswa/'.$id_beasiswa);
        } else {
            $data_session = [
                'info' => 'Error',
                'message' => 'Data gagal dihapus!'
            ];
            $this->session->set_userdata($data_session);
            redirect('datanilai/beasiswa/'.$id_beasiswa);
        }
    }

    public function view()
    {
        $fname = $this->uri->segment(3);
        $tofile= realpath("uploads/".$fname);
        header('Content-Type: application/pdf');
        readfile($tofile);
    }

}