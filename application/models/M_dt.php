<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dt extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_idt($table,$row)
	{
		$this->datatables->select($row);
		$this->datatables->from($table);
		$this->datatables->add_column('tool', '<a class="edit btn btn-success " data-id="$1"><i class="fa fa-pencil"></i></a>  <a class="hapus btn btn-danger " data-id="$1"><i class="fa fa-trash"></i></a>','id_barang');
		return $this->datatables->generate();
	}

}

/* End of file M_dt.php */
/* Location: ./application/models/M_dt.php */