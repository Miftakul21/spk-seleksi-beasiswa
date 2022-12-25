<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users');	
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('layout/login/top', $data);
		$this->load->view('login');
		$this->load->view('layout/login/bottom');
	}

	public function cek_login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		if(strlen($password) < 8){
			redirect('login');
		} else {
			$enc_passwrod = md5($password);
			$cek_akun = $this->M_users->cek_login($username, $enc_passwrod);			

			if(count($cek_akun) > 0) {
				redirect('dashboard');
			} else {
				$data_session = [
					'error' => 'Error',
					'message' => 'Akun tidak ditemukan'
				];
				$this->session->set_userdata($data_session);
				redirect('login');
			}

		}


	}
}
