<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('masuk')) {
			$this->session->set_flashdata('pesanLogin', 'anda belum login!');
			redirect(base_url('login'),'refresh');
		}
		$this->load->model('M_santri');
	}

	public function index()
	{
		if ($this->uri->segment(1)=='santri_baru') {
			$data['isi'] = $this->dao->ambil_data('santri',array('status'=>'baru'))->result();
		}else{
			$data['isi'] = $this->dao->ambil_data('santri',array('status'=>'lama'))->result();
		}
		$this->template->display('santri/tampil', $data);
	}

	public function tambah()
	{
		$data['nisOtomatis'] 	= $this->M_santri->nisOtomatis();
		$data['kelas']			= $this->dao->tampil('kelas')->result();
		$this->template->display('santri/tambah', $data);
	}

	public function prosesTambah()
	{
		$simpanSantri = $this->dao->tambah('santri', array(
			'nis' 				=> $this->input->post('nis'),
			'nama'				=> $this->input->post('nama'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tgl_lahir'			=> $this->input->post('tgl_lahir'),
			'jk'				=> $this->input->post('jk'),
			'anak_ke'			=> $this->input->post('anak_ke'),
			'saudara_kandung'	=> $this->input->post('saudara_kandung'),
			'saudara_tiri'		=> $this->input->post('saudara_tiri'),
			'alamat' 			=> $this->input->post('alamat'),
			'status'			=> $this->input->post('status'),
			'kelas_id'			=> $this->input->post('kelas')
		));
		$santri_id = $this->db->insert_id();
		$simpanOrangTua = $this->dao->tambah('orang_tua', array(
			'nama_ayah'			=> $this->input->post('nama_ayah'),
			'umur_ayah'			=> $this->input->post('umur_ayah'),
			'pekerjaan_ayah'	=> $this->input->post('pekerjaan_ayah'),
			'pendidikan_ayah'	=> $this->input->post('pendidikan_ayah'),
			'nama_ibu'			=> $this->input->post('nama_ibu'),
			'umur_ibu'			=> $this->input->post('umur_ibu'),
			'pekerjaan_ibu'		=> $this->input->post('pekerjaan_ibu'),
			'pendidikan_ibu'	=> $this->input->post('pendidikan_ibu'),
			'alamat'			=> $this->input->post('alamat'),
			'no_hp'				=> $this->input->post('no_hp'),
			'santri_id'			=> $santri_id
		));
		$simpanWali = $this->dao->tambah('wali', array(
			'nama_wali_1'			=> $this->input->post('nama_wali_1'),
			'nama_wali_2'			=> $this->input->post('nama_wali_2'),
			'status_kekeluargaan_1'	=> $this->input->post('status_kekeluargaan_1'),
			'status_kekeluargaan_2'	=> $this->input->post('status_kekeluargaan_2'),
			'alamat_1'				=> $this->input->post('alamat_1'),
			'alamat_2'				=> $this->input->post('alamat_2'),
			'no_hp_1'				=> $this->input->post('no_hp_1'),
			'no_hp_2'				=> $this->input->post('no_hp_2'),
			'santri_id'				=> $santri_id
		));
		$simpanSekolahAsal = $this->dao->tambah('asal_sekolah', array(
			'nama_sekolah'		=> $this->input->post('nama_sekolah'),
			'tanggal'			=> $this->input->post('tanggal'),
			'diterima_di_kelas'	=> $this->input->post('diterima_di_kelas'),
			'nilai'				=> $this->input->post('nilai'),
			'santri_id'			=> $santri_id
		));

		if ($simpanSantri && $simpanOrangTua && $simpanWali && $simpanSekolahAsal) {
			echo "Simpan Berhasil!";
		}else{
			echo "Simpan Gagal";
		}
	}

	public function ubah($id)
	{
		$data['santri'] = $this->dao->ambil_data('santri', array('id'=>$id))->row();
		$data['orang_tua'] = $this->dao->ambil_data('orang_tua', array('santri_id'=>$id))->row();
		$data['wali'] = $this->dao->ambil_data('wali', array('santri_id'=>$id))->row();
		$data['asal_sekolah'] = $this->dao->ambil_data('asal_sekolah', array('santri_id'=>$id))->row();
		$data['kelas']= $this->dao->tampil('kelas')->result();
		$this->template->display('santri/ubah', $data);
	}

	public function prosesUbah()
	{
		$id = $this->input->post('id');
		$simpanSantri = $this->dao->ubah('santri', array(
			'nis' 				=> $this->input->post('nis'),
			'nama'				=> $this->input->post('nama'),
			'tempat_lahir'		=> $this->input->post('tempat_lahir'),
			'tgl_lahir'			=> $this->input->post('tgl_lahir'),
			'jk'				=> $this->input->post('jk'),
			'anak_ke'			=> $this->input->post('anak_ke'),
			'saudara_kandung'	=> $this->input->post('saudara_kandung'),
			'saudara_tiri'		=> $this->input->post('saudara_tiri'),
			'alamat' 			=> $this->input->post('alamat'),
			'status'			=> $this->input->post('status'),
			'kelas_id'			=> $this->input->post('kelas')

		), array('id'=>$id));
		$simpanOrangTua = $this->dao->ubah('orang_tua', array(
			'nama_ayah'			=> $this->input->post('nama_ayah'),
			'umur_ayah'			=> $this->input->post('umur_ayah'),
			'pekerjaan_ayah'	=> $this->input->post('pekerjaan_ayah'),
			'pendidikan_ayah'	=> $this->input->post('pendidikan_ayah'),
			'nama_ibu'			=> $this->input->post('nama_ibu'),
			'umur_ibu'			=> $this->input->post('umur_ibu'),
			'pekerjaan_ibu'		=> $this->input->post('pekerjaan_ibu'),
			'pendidikan_ibu'	=> $this->input->post('pendidikan_ibu'),
			'alamat'			=> $this->input->post('alamat'),
			'no_hp'				=> $this->input->post('no_hp')
		), array('santri_id'=>$id));
		$simpanWali = $this->dao->tambah('wali', array(
			'nama_wali_1'			=> $this->input->post('nama_wali_1'),
			'nama_wali_2'			=> $this->input->post('nama_wali_2'),
			'status_kekeluargaan_1'	=> $this->input->post('status_kekeluargaan_1'),
			'status_kekeluargaan_2'	=> $this->input->post('status_kekeluargaan_2'),
			'alamat_1'				=> $this->input->post('alamat_1'),
			'alamat_2'				=> $this->input->post('alamat_2'),
			'no_hp_1'				=> $this->input->post('no_hp_1'),
			'no_hp_2'				=> $this->input->post('no_hp_2')
		), array('santri_id'=>$id));
		$simpanSekolahAsal = $this->dao->ubah('asal_sekolah', array(
			'nama_sekolah'		=> $this->input->post('nama_sekolah'),
			'tanggal'			=> $this->input->post('tanggal'),
			'diterima_di_kelas'	=> $this->input->post('diterima_di_kelas'),
			'nilai'				=> $this->input->post('nilai')
		), array('santri_id'=>$id));

		if ($simpanSantri && $simpanOrangTua && $simpanWali && $simpanSekolahAsal) {
			echo "Ubah data Berhasil!";
		}else{
			echo "ubah data Gagal";
		}
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus('santri', array('id'=>$id));
		if ($hapus) {
			echo "Data berhasil dihapus!";
		}else{
			echo "Gagal menghapus data";
		}

	}

	public function hapusSemua()
	{
		$id = $this->input->post('id');
		$hapus = $this->dao->hapus_semua('santri',$id);
	}

	public function detail($id)
	{
		$data['detail'] = $this->M_santri->tampilDetail($id)->row();
		$data['kelas'] = $this->dao->tampil('kelas')->result();
		$this->template->display('santri/detail',$data);

	}

	public function exportExcel($status = null)
	{
		// include file
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		// instansiasi
		$excel = new PHPExcel();
		//buat properties
		$excel->getProperties()->setCreator('YPP Qamarul Huda')
		->setLastModifiedBy('YPP Qamarul Huda')
		->setTitle("Data Santri")
		->setSubject("Santri")
		->setDescription("Laporan Semua Data Santri")
		->setKeywords("Data Santri");
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

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SANTRI ".strtoupper($status)); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:I1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIS"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "TEMPAT, TANGGAL LAHIR"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "JENIS KELAMIN"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "ANAK KE");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "SAUDARA KANDUNG");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "SAUDARA TIRI"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "ALAMAT");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "KELAS");

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

		
		if ($status !='') {
			$santris = $this->dao->ambil_data('santri', array('status'=>$status))->result();
		}else{
			$santris = $this->dao->tampil('santri')->result();	
		}
		$kelas = $this->dao->tampil('kelas')->result();
		$no = 1;
		$numrow = 4;

		foreach ($santris as $santri) {
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $santri->nis);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $santri->nama);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $santri->tempat_lahir.", ".$santri->tgl_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $santri->jk);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $santri->anak_ke);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $santri->saudara_kandung);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $santri->saudara_tiri);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $santri->alamat);
			foreach ($kelas  as $kel) {
				if ($santri->kelas_id==$kel->id) {
					$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $kel->nama_kelas);
				}
			}
			if ($santri->kelas_id=='0') {
				$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, 'Belum punya kelas');
			}
			
			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_col);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			
			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A nis
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B nama
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(30); // Set width kolom C tempat tgl lahir
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(40); // Set width kolom D jenis kelamin
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E 
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(10); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(50); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E

		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$excel->getActiveSheet(0)->setTitle("Laporan Data Santri");
		$excel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Santri "'.$status.'_'.time().'".xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

	public function exportPDF($id)
	{
		$this->load->library('Pdf', 'pdf');
		$data['detail'] = $this->M_santri->tampilDetail($id)->row();
		$data['kelas'] = $this->dao->tampil('kelas')->result();
		$html 	= $this->load->view('laporan/laporan_santri', $data, TRUE);
		$css 	= base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
		$style 	= file_get_contents($css);
		$path 	= 'Laporan Data Santri.pdf';

		$pdf = $this->pdf->load();
		$pdf->AddPage('P');
		$pdf->WriteHTML($style, 1);
		$pdf->WriteHTML($html,2);
		$pdf->Output($path,"I");
	}

}

/* End of file Santri.php */
/* Location: ./application/controllers/Santri.php */