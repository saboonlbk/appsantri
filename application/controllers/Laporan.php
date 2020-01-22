<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf', 'pdf');
		$this->load->model('M_laporan','laporan');
	}

	public function index()
	{
		$this->template->display('laporan/tampil');
	}

	public function cetak()
	{
		$tabel = $this->input->post('tabel');
		if ($tabel=='mustahik' || $tabel == 'parameter') {
			$this->cetakLaporan($tabel);
		}elseif ($tabel=='rangking') {
			$this->cetakRangking();
		}elseif ($tabel == 'sub_parameter') {
			$this->cetakSub();
		}
	}

	public function cetakLaporan($tabel)
	{
		$data['isi'] = $this->laporan->cetak($tabel)->result();
		$html 	= $this->load->view('laporan/'.$tabel, $data, TRUE);
		$css 	= base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
		$style 	= file_get_contents($css);
		$path 	= 'Laporan data '.$tabel.'.pdf';

		$pdf = $this->pdf->load();
		$pdf->AddPage('P');
		$pdf->WriteHTML($style, 1);
		$pdf->WriteHTML($html,2);
		$pdf->Output($path,"I");
	}

	public function cetakRangking()
	{
		$data['isi'] = $this->laporan->cetakRangking()->result();
		$html 	= $this->load->view('laporan/rangking', $data, TRUE);
		$css 	= base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
		$style 	= file_get_contents($css);
		$path 	= 'Laporan Hasil Rangking.pdf';

		$pdf = $this->pdf->load();
		$pdf->AddPage('P');
		$pdf->WriteHTML($style, 1);
		$pdf->WriteHTML($html,2);
		$pdf->Output($path,"I");
	}

	public function cetakSub()
	{
		$data['isi'] = $this->laporan->cetakSub()->result();
		$html 	= $this->load->view('laporan/sub_parameter', $data, TRUE);
		$css 	= base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css');
		$style 	= file_get_contents($css);
		$path 	= 'Laporan Sub Parameter.pdf';

		$pdf = $this->pdf->load();
		$pdf->AddPage('L');
		$pdf->WriteHTML($style, 1);
		$pdf->WriteHTML($html,2);
		$pdf->Output($path,"I");
	}


}

/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */