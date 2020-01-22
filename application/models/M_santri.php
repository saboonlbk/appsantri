<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_santri extends CI_Model {
	public function nisOtomatis()
	{
		$this->db->select('RIGHT(santri.nis,4) as nis',FALSE);
		$this->db->order_by('nis', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('santri');
		if ($query->num_rows()<>0) {
			$data = $query->row();
			$nis = intval($data->nis)+1;
		}else{
			$nis=1;
		}
		$tahun = date('Y');
		$nismax = str_pad($nis, 4,"0",STR_PAD_LEFT);
		$nisOtomatis = $tahun.'-'.$nismax;
		return $nisOtomatis;
	}
	
	public function tampilDetail($id)
	{
		$this->db->select('s.id as id, s.nis as nis, s.nama as nama, s.tempat_lahir as tempat_lahir, s.tgl_lahir as tgl_lahir, s.jk as jk, s.anak_ke as anak_ke, s.saudara_kandung as kandung, s.saudara_tiri as tiri, s.alamat as alamat_santri, ot.nama_ayah as nama_ayah, ot.umur_ayah as umur_ayah, ot.pekerjaan_ayah as pekerjaan_ayah, ot.pendidikan_ayah as pendidikan_ayah, ot.nama_ibu as nama_ibu, ot.umur_ibu as umur_ibu, ot.pekerjaan_ibu as pekerjaan_ibu, ot.pendidikan_ibu as pendidikan_ibu, ot.alamat as alamat_orang_tua, ot.no_hp as no_hp, w.nama_wali_1 as nama_wali_1, w.status_kekeluargaan_1 as status_kekeluargaan_1, w.alamat_1 as alamat_1, w.no_hp_1 as no_hp_1, w.nama_wali_2 as nama_wali_2, w.status_kekeluargaan_2 as status_kekeluargaan_2, w.alamat_2 as alamat_2, w.no_hp_2 as no_hp_2, as.nama_sekolah as nama_sekolah, as.tanggal as tanggal, as.diterima_di_kelas as diterima_di_kelas, as.nilai as nilai, s.status as status, s.kelas_id as kelas_id');
		$this->db->from('santri s');
		$this->db->join('orang_tua ot', 'ot.santri_id = s.id', 'left');
		$this->db->join('wali w', 'w.santri_id = s.id', 'left');
		$this->db->join('asal_sekolah as', 'as.santri_id = s.id', 'left');
		$this->db->where('s.id', $id);
		return $this->db->get();
	}

	public function tampilSantriPerKelas($kelas=null, $tahun=null)
	{
		if ($kelas == null && $tahun==null) {
			$this->db->select('*');
			$this->db->from('santri');
			$this->db->order_by('kelas_id', 'asc');
		}else if ($tahun==null) {
			$this->db->select('*');
			$this->db->from('santri');
			$this->db->where('kelas_id', $kelas);
			$this->db->order_by('kelas_id', 'asc');
		}else{
			$this->db->select('*');
			$this->db->from('santri');
			$this->db->where('kelas_id', $kelas);
			$this->db->like('nis', $tahun, 'BOTH');
			$this->db->order_by('kelas_id', 'asc');
		}
		return $this->db->get();
	}

}

/* End of file M_santri.php */
/* Location: ./application/models/M_santri.php */