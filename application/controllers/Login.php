<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users');	
		$this->load->model('M_mahasiswa');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('index');
	}

	public function cek_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if(strlen($password) < 8) {
			$data_session = [
				'error' => 'Error',
				'message' => 'Kesalahan saat login, silahakan coba kembali!'
			];
			$this->session->set_userdata($data_session);
			redirect('login');
		} else {
			// Login Staf (Admin, Kepala Bagian)
			$enc_passwrod = md5($password);
			$cek_akun = $this->M_users->cek_login($username, $enc_passwrod);
			
			$level_user;
			foreach($cek_akun as $data){
				$level_user = $data['level_user'];
			}

			if($level_user == 'Admin') {
				$data_session = [
					'status' => 'log-in',
					'level_user' => $level_user
				];
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			} elseif($level_user == 'Kepala Biro') {
				$data_session = [
					'status' => 'log-in',
					'level_user' => $level_user
				];
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			} elseif($level_user == 'mahasiswa') {
				$cek_akun2 = $this->M_mahasiswa->cek_mahasiswa($username);

				$id_mhs;
				$nama;
				$nim;
				foreach($cek_akun2 as $akun){
					$id_mhs = $akun['id_mahasiswa'];
					$nama = $akun['nama'];
					$nim = $akun['nim'];
				}

				$data_session = [
					'id_mhs' => $id_mhs,
					'nama_mhs'=> $nama,
					'nim' => $nim,
					'status' => 'log-in mahasiswa',
					'level_user' => $level_user
				];
				$this->session->set_userdata($data_session);
				redirect('home');
			}

			/*
			if(count($cek_akun) > 0){
				$data_session = [
					'status' => 'log-in',
					'level_user' => $level_user
				];
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			} else {
				$data_session = [
					'error' => 'Error',
					'message' => 'Kesalahan saat login, silahakan coba kembali!'
				];
				$this->session->set_userdata($data_session);
				redirect('login');
			}
			*/

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}


/*
else if($username == $password) {
			// Login Mahasiswa Mendaftar Beasiswa
			$cek_akun2 = $this->M_mahasiswa->cek_mahasiswa($username);

			$id_mhs;
			$nama;
			$nim;
			foreach($cek_akun2 as $akun){
				$id_mhs = $akun['id_mahasiswa'];
				$nama = $akun['nama'];
				$nim = $akun['nim'];
			}

			if(count($cek_akun2) > 0){
				$data_session = [
					'id_mhs' => $id_mhs,
					'nama_mhs'=> $nama,
					'nim' => $nim,
					'status' => 'log-in mahasiswa'
				];
				$this->session->set_userdata($data_session);
				redirect('home');
			} else {
				$data_session = [
					'error' => 'Error',
					'message' => 'Kesalahan saat login, silahkan coba kembali!'
				];
				$this->session->set_userdata($data_session);
				redirect('login');
			}
		}
		*/
