<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_login','login');
		if (!$this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesan', 'anda belum login!');
			redirect(base_url('login'),'refresh');
		}
	}

	public function index()
	{
		$this->profil();
	}

	public function profil()
	{
		$id = $this->session->userdata('id');
		$data['admin'] = $this->dao->ambil_data('user', array('id'=>$id))->row();
		$this->template->display('admin/v_tampil_profil', $data);
	}

	public function ubahProfil()
	{
		$id = $this->session->userdata('id');
		$data = array(
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'username' => $this->input->post('username')
		);

		$ubah = $this->dao->ubah('user', $data, array('id'=>$id));
		
		if ($ubah) {
			$this->session->set_flashdata('pesan', 'berhasil mengubah data!\nsilakan login kembali untuk melihat perubahan');
			redirect(base_url('admin'),'refresh');
		}else{
			$this->session->set_flashdata('pesan', 'gagal mengubah data!');
		}
	}

	public function ubahPassword()
	{
		$id = $this->session->userdata('id');
		$data = array('password' => md5($this->input->post('password')));
		$ubah = $this->dao->ubah('user',$data, array('id'=>$id));
		if ($ubah) {
			$this->session->set_flashdata('pesan', 'berhasil mengubah password!\nsilakan login kembali untuk melihat perubahan');
			redirect(base_url('admin'),'refresh');
		}else{
			echo "Gagal mengubah password!";
		}
	}

	public function ubahFoto()
	{
		$file = 'foto'.time();

		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_width']            = 5000;
		$config['max_height']           = 5000;
		$config['overwrite']           	= TRUE;
		$config['file_name']			= $file;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')){
			echo $this->upload->display_errors();
		}else{
			$upload_data = $this->upload->data();
			$fotoLama = $this->dao->ambil_data('user', array('id'=>$this->session->userdata('id')))->row();
			if ($fotoLama->foto!="") {
				unlink('upload/'.$fotoLama->foto);
			}
			$data = array('foto' => $upload_data['file_name'] );
			$simpan = $this->dao->ubah('user',$data, array('id'=> $fotoLama->id));
			if ($simpan) {
				$this->session->set_flashdata('pesan', "Foto profil berhasil diubah!\nsilakan Login kembali untuk melihat perubahan");
				redirect(base_url('admin'),'refresh');
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal ditambah!');
			}
		}
	}


	public function tes()
	{
		echo md5('admin');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */