<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesanLogin', 'anda belum login!');
			redirect(base_url('login'),'refresh');
		}
		$this->load->model('M_santri');
		$this->load->model('M_laporan','laporan');
	}

	public function index()
	{
		$this->tampil();
	}

	public function json()
	{
		$this->load->library('datatables');
		$this->load->model('M_dt');
		echo $this->M_dt->get_idt('kelas','id,nama_kelas');
	}

	public function tes()
	{
		$this->template->display('kelas/tes');
	}

	function tampil()
	{
		if ($this->session->userdata('level')=='SA') {
			$data['isi']=$this->dao->tampil('kelas')->result();
			$this->template->display('kelas/tampil',$data);	
		}else{
			$this->session->set_flashdata('pesan', 'Tidak punya hak akses!');
			redirect(base_url(''),'refresh');
		}
		
	}

	function prosesTambah()
	{
		if ($this->session->userdata('level')=='SA') {
			$simpan = $this->dao->tambah('kelas', array('nama_kelas'=>$this->input->post('nama_kelas')));
			if ($simpan) {
				$this->session->set_flashdata('oke', 'Simpan berhasil');
				redirect('kelas/tampil','refresh');			
			}else{
				$this->session->set_flashdata('oke', 'Simpan gagal');
			}
		}else{
			$this->session->set_flashdata('pesan', 'Tidak punya hak akses!');
			redirect(base_url(''),'refresh');
		}
		
	}

	function ubah()
	{
		if ($this->session->userdata('level')=='SA') {
			$id = $this->input->post('id');
			$row = $this->dao->ambil_data('kelas', array('id'=>$id))->row();
			$nama_kelas = $row->nama_kelas;
			echo $nama_kelas;
		}else{
			$this->session->set_flashdata('pesan', 'Tidak punya hak akses!');
			redirect(base_url(''),'refresh');
		}
	}

	function prosesUbah()
	{
		if ($this->session->userdata('level')=='SA') {
			$id = $this->input->post('id');
			$simpan = $this->dao->ubah('kelas', array('nama_kelas'=>$this->input->post('nama_kelas')), array('id'=>$id));
			if ($simpan) {
				$this->session->set_flashdata('oke', 'Simpan berhasil');
				redirect('kelas/tampil','refresh');			
			}else{
				$this->session->set_flashdata('oke', 'Simpan gagal');
			}
		}else{
			$this->session->set_flashdata('pesan', 'Tidak punya hak akses!');
			redirect(base_url(''),'refresh');
		}
	}

	function hapus()
	{
		if ($this->session->userdata('level')=='SA') {
			$id = $this->input->post('id');
			$hapus = $this->dao->hapus('kelas', array('id'=>$id));
			if ($hapus) {
				echo "Data berhasil dihapus!";
			}else{
				echo "Gagal menghapus data";
			}
		}else{
			$this->session->set_flashdata('pesan', 'Tidak punya hak akses!');
			redirect(base_url(''),'refresh');
		}
	}

	public function hapusSemua()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus_semua('kelas',$id);
	}

	// khusus menampilkan kelas dari para santri
	function tampilSantri()
	{
		$data['kelas'] = $this->dao->tampil('kelas')->result();
		$data['santri']=$this->M_santri->tampilSantriPerKelas("", "")->result();
		$this->template->display('kelas/tampil_santri',$data);
	}

	public function ambilData()
	{
		$kelas = $this->input->post('kelas');
		$tahun = $this->input->post('tahun');
		$data['santri']=$this->M_santri->tampilSantriPerKelas($kelas, $tahun)->result();
		$data['kelas'] = $this->dao->tampil('kelas')->result();
		$this->load->view('kelas/santri', $data, false);
	}

	// menambahkan santri ke kelas
	function tambahSantri()
	{
		$data['kelass'] = $this->dao->tampil('kelas')->result();
		$data['santris'] = $this->dao->ambil_data('santri', array('kelas_id'=> 0))->result();
		$this->template->display('kelas/tambah_santri',$data);
	}

	function prosesTambahSantri()
	{
		$ids = $this->input->post('id');
		$kelas_id = $this->input->post('kelas');
		foreach ($ids as $id) {
			$ubah = $this->dao->ubah('santri', array('kelas_id'=>$kelas_id,  'status'=>'lama'), array('id'=>$id));
			if ($ubah) {
				echo 'berhasil menambah';
			}else{
				echo "gagal!";
			}
		}
	}
	
	function prosesUbahKelas(){
		$idSantri = $this->input->post('id');
		$idKelas = $this->input->post('kelas');
		$ubahKelas = $this->dao->ubah('santri', array('kelas_id'=>$idKelas), array('id'=>$idSantri));
		if ($ubahKelas) {
			$this->session->set_flashdata('oke', 'Simpan berhasil');
			redirect('kelas/tampilSantri','refresh');		
		}
	}

	public function exportExcel($kelas_id)
	{
		$kelas  = $this->dao->ambil_data('kelas',array('id'=>$kelas_id))->row();
		// include file
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		// instansiasi
		$excel = new PHPExcel();
		//buat properties
		$excel->getProperties()->setCreator('YPP Qamarul Huda')
		->setLastModifiedBy('YPP Qamarul Huda')
		->setTitle("Data santri Kelas ".$kelas->nama_kelas)
		->setSubject("Santri")
		->setDescription("Laporan data santri kelas ".$kelas->nama_kelas)
		->setKeywords("Data kelas ".$kelas->nama_kelas);
		// style kolom
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// style baris
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA KELAS ".strtoupper($kelas->nama_kelas)); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA SANTRI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "ALAMAT"); 

		// STYLE header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);

		
		$santris = $this->laporan->cetak_kelas($kelas_id)->result();
		$no = 1;
		$numrow = 4;

		foreach ($santris as $santri) {
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $santri->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $santri->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $santri->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $santri->alamat);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A nis
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B nama
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C tempat tgl lahir
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); // Set width kolom D jenis kelamin
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(50); // Set width kolom E 

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Laporan Data Santri");
		$excel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data santri kelas "'. $kelas->nama_kelas.'".xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

}

/* End of file kelas.php */
/* Location: ./application/controllers/kelas.php */