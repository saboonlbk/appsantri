<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_santri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesanLogin', 'anda belum login!');
			redirect(base_url('login'),'refresh');
		}
		$this->load->model('M_laporan','laporan');
	}

	public function index()
	{
		$data['isi'] = $this->laporan->cetak_catatan_santri()->result();
		$this->template->display('catatan_santri/tampil', $data);
	}

	public function tambah()
	{
		$data['santris'] = $this->dao->tampil('santri')->result();
		$this->template->display('catatan_santri/tambah', $data);
	}

	public function prosesTambah()
	{
		$catatan_santri =array(
			'catatan' => $this->input->post('catatan'),
			'jenis' => $this->input->post('jenis'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_awal' => $this->input->post('tgl_awal'),
			'tgl_akhir' => $this->input->post('tgl_akhir'),
			'tempo' => $this->input->post('tempo'),
			'santri_id' => $this->input->post('santri_id'),
		);
		$simpan = $this->dao->tambah('catatan_santri',$catatan_santri);
		if ($simpan) {
			echo 'Data berhasil disimpan';
		}else{
			echo 'Gagal Menyimpan data!';
		}
	}

	public function ubah($id)
	{
		$data['row']= $this->dao->ambil_data('catatan_santri', array('id'=>$id))->row();
		$data['santris'] = $this->dao->tampil('santri')->result();
		$this->template->display('catatan_santri/ubah',$data);
	}

	public function prosesUbah()
	{
		$id = $this->input->post('id');
		$catatan_santri =array(
			'catatan' => $this->input->post('catatan'),
			'jenis' => $this->input->post('jenis'),
			'keterangan' => $this->input->post('keterangan'),
			'tgl_awal' => $this->input->post('tgl_awal'),
			'tgl_akhir' => $this->input->post('tgl_akhir'),
			'tempo' => $this->input->post('tempo'),
			'santri_id' => $this->input->post('santri_id'),
		);
		$ubah = $this->dao->ubah('catatan_santri',$catatan_santri, array('id'=>$id));
		if ($ubah) {
			echo 'Data berhasil disimpan';
		}else{
			echo 'Gagal Menyimpan data!';
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus('catatan_santri', array('id'=>$id));
		if ($hapus) {
			echo "Data berhasil dihapus!";
		}else{
			echo "Gagal menghapus data";
		}
	}

	public function hapus_semua()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus_semua('catatan_santri',$id);
	}

	public function exportExcel()
	{
		
		// include file
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		// instansiasi
		$excel = new PHPExcel();
		//buat properties
		$excel->getProperties()->setCreator('YPP Qamarul Huda')
		->setLastModifiedBy('YPP Qamarul Huda')
		->setTitle("Data Catatan Santri")
		->setSubject("Santri")
		->setDescription("Laporan Semua Data Catatan Santri")
		->setKeywords("Data Catatan Santri");
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

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA CATATAN SANTRI "); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA SANTRI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "CATATAN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "JENIS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "KETERANGAN");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "TANGGAL AWAL");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "TANGGAL AKHIR"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "TEMPO");

		// STYLE header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);

		
		$catatans = $this->laporan->cetak_catatan_santri()->result();
		$no = 1;
		$numrow = 4;

		foreach ($catatans as $catatan) {
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $catatan->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $catatan->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $catatan->catatan);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $catatan->jenis);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $catatan->keterangan);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $catatan->tgl_awal);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $catatan->tgl_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $catatan->tempo);
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A nis
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B nama
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C tempat tgl lahir
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(40); // Set width kolom D jenis kelamin
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(10); // Set width kolom E

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Laporan Data Santri");
		$excel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data catatan santri.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

}

/* End of file Catatan_santri.php */
/* Location: ./application/controllers/Catatan_santri.php */