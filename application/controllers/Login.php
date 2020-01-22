<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_login','login');
	}

	public function index()
	{
		if ($this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesan', 'anda sudah login!');
			redirect(base_url('home'),'refresh');
		}else{
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_login');
			} else {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$get_user = $this->login->get_user($username, $password)->num_rows();
				if ($get_user>0) {
					$user = $this->login->get_user($username, $password)->row();
					$sesi = array(
						'id'		=> $user->id,
						'nama' 		=> $user->nama,
						'jk'		=> $user->jenis_kelamin,
						'username' 	=> $user->username,
						'password' 	=> $user->password,
						'level' 	=> $user->level,
						'foto'		=> $user->foto,
						'masuk'		=> TRUE
					);

					$this->session->set_userdata($sesi);
					$this->session->set_flashdata('pesan', 'selamat datang '.$this->session->userdata('nama'));
					redirect(base_url('home'),'refresh');
				}else{
					$this->session->set_flashdata('pesan', 'username atau password salah');
					redirect(base_url('login'),'refresh');
				}
			}
		}
	}

	public function logout()
	{
		$sesi = array('id','nama','username','password','jk','masuk','level');
		$this->session->unset_userdata($sesi);
		redirect(base_url('login'),'refresh');
	}

	public function tes()
	{
		echo md5("admin");
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */