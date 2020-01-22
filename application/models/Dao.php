<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dao extends CI_Model {
	
	public function tampil($tabel)
	{
		return $this->db->get($tabel);
	}	

	public function tambah($tabel, $data)	
	{
		return $this->db->insert($tabel, $data);
	}

	public function ambil_data($tabel, $id)
	{
		return $this->db->get_where($tabel, $id);
	}

	public function ubah($tabel, $data, $id)
	{
		return $this->db->update($tabel, $data, $id);
	}

	public function hapus($tabel, $id)
	{
		return $this->db->delete($tabel, $id);
	}

	public function hapus_semua($tabel, $id)
	{
		$this->db->where_in('id', $id);
		return $this->db->delete($tabel);
	}
}

/* End of file Dao.php */
/* Location: ./application/models/Dao.php */