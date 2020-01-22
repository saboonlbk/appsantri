<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('template');
		if (!$this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesan', 'anda belum login!');
			redirect(base_url('login'),'refresh');
		}
	}

	public function index()
	{
		$data['title'] = 'halaman beranda';
		$data['santri_baru'] = $this->dao->ambil_data('santri', array('status'=>'baru'))->num_rows();
		$data['santri_aktif'] = $this->dao->ambil_data('santri', array('status'=>'lama'))->num_rows();
		$data['kelas'] = $this->dao->tampil('kelas')->num_rows();
		$data['catatan_santri'] = $this->dao->tampil('catatan_santri')->num_rows();
		$this->template->display('/template/v_content', $data);
	}

	public function starter()
	{
		$this->load->view('starter');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */