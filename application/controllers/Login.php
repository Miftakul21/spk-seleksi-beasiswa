<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_users');	
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Login";
		$this->load->view('login');
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
			$enc_passwrod = md5($password);
			$cek_akun = $this->M_users->cek_login($username, $enc_passwrod);
			
			$level_user;
			foreach($cek_akun as $data){
				$level_user = $data['level_user'];
			}

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

		}

		/* 
			Validation form
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]', [
				'required' => 'Mohon isi form username',
				'min_length' => 'Username minimal 3 character'
			]);

			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]', [
				'required' => 'Mohon isi form password',
				'min_length' => 'Password minimal 6 digit'
			]);
		if($this->form_validation->run() != TRUE){
			$data['title'] = "Login";
			$this->load->view('login', $data);
		} else {
			if(strlen($password) < 8){
				redirect('login');
			} else {
				$enc_passwrod = md5($password);
				$cek_akun = $this->M_users->cek_login($username, $enc_passwrod);			

				if(count($cek_akun) > 0) {
					$data_session = [
						'status' => 'log-in' 
					];
					$this->session->set_userdata($data_session);
					redirect('dashboard');
				} else {
					$data_session = [
						'error' => 'Error',
						'message' => 'Kesalahan saat login, silahakan coba lagi!'
					];
					$this->session->set_userdata($data_session);
					redirect('login');
				}

			}	
		}
		*/
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}
