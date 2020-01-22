<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	
	public function cetak($tabel)
	{
		return $this->db->get($tabel);
	}

	public function cetak_catatan_santri($santri_id=null)
	{
		
		$this->db->select('cs.id as id, cs.catatan as catatan, cs.jenis as jenis, cs.keterangan as keterangan, cs.tgl_awal as tgl_awal, cs.tgl_akhir as tgl_akhir, cs.tempo as tempo, s.id as santri_id, s.nama as nama, s.alamat as alamat, s.nis as nis');
		$this->db->from('catatan_santri cs');
		$this->db->join('santri s', 'cs.santri_id = s.id', 'left');
		$this->db->order_by('cs.tgl_akhir', 'desc');
		if (!empty($santri_id)) {
			$this->db->where('s.id', $santri_id);
		}
		return $this->db->get();
	}

	public function cetak_kelas($kelas)
	{
		$this->db->select('*');
		$this->db->from('santri');
		$this->db->where('kelas_id', $kelas);
		$this->db->order_by('nis', 'asc');
		return $this->db->get();
	}

}

/* End of file Laporan.php */
/* Location: ./application/models/Laporan.php */