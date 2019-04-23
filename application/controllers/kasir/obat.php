<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class obat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('obat_model');
		$this->load->model('jenis_model');
	}

	public function index()
	{
		$obat = $this->obat_model->listing();

		$data = array(	'judul' => 'Data obat ('.count($obat).')',
						'obat'	=> $obat,
						'isi' 	=> 'kasir/dataobat');
		$this->load->view('kasir/layout/wrapper', $data, FALSE);
	}
}