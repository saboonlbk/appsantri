<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesanLogin', 'anda belum login!');
			redirect(base_url('login'),'refresh');
		}else if ($this->session->userdata('level')!='SA') {
			$this->session->set_flashdata('pesanLogin', 'anda tidak punya hak akses4!');
			redirect(base_url('login'),'refresh');
		}

		$this->load->library('form_validation');
	}


	public function index()
	{
		$data['user'] = $this->dao->tampil('user')->result();
		$this->template->display('user/tampil_user',$data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('level', 'level', 'trim|required');

		$this->form_validation->set_message(array(
			'required' => 'isian {field} tidak boleh kosong'
		));

		if ($this->form_validation->run() == FALSE) {
			$this->template->display('user/tambah');
		} else {
			$file = 'foto'.time();

			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_width']            = 5000;
			$config['max_height']           = 5000;
			$config['overwrite']           	= TRUE;
			$config['file_name']			= $file;

			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('foto')){
				// echo $this->upload->display_errors();
				$foto = "";
			}else{
				$upload_data = $this->upload->data();
				$foto = $upload_data['file_name'];
			}
			$data = array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level'=> $this->input->post('level'),
				'foto'=> $foto
			);

			$simpan = $this->dao->tambah('user',$data);
			if ($simpan) {
				$this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
				redirect('user','refresh');
			}else{
				$this->session->set_flashdata('pesan', 'Data gagal ditambah!');
			}
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus('user', array('id'=>$id));
		if ($hapus) {
			echo "Data berhasil dihapus!";
		}else{
			echo "Gagal menghapus data";
		}
	}

	public function hapusSemua()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus_semua('user',$id);
	}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */