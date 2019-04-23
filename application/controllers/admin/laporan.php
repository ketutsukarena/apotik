<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pembelian_model');

	}

	public function index()
	{
		$detail = $this->pembelian_model->get_detail_transaksi_beli();
		$transaksibeli = $this->pembelian_model->get_transaksi_beli();

		$tanggal=$this->pembelian_model->tanggal();
		$nama_obat=$this->pembelian_model->namaobat();
		$nama_supplier=$this->pembelian_model->namasupplier();


		$data = array(	'judul' => 'Data Transaksi Beli ('.count($detail).')',
						'detail'	=> $detail,
						'transaksibeli' => $transaksibeli,
						'nama_obat' => $nama_obat,
						'tanggal' => $tanggal,
						'nama_supplier' => $nama_supplier,
						'isi' 	=> 'admin/transaksi/laporan_transaksi');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}