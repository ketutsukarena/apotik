<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembelian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pembelian_model');
	}

	public function index(){ 
		$transaksi = $this->pembelian_model->get();
		$obat = $this->pembelian_model->trans_obat();
		$tampil_data = $this->pembelian_model->ambil_transaksi();

		$total = $this->pembelian_model->hargatotal();

		$data = array(	'judul' => 'Transaksi Pembelian Obat',
						'transaksi'	=> $transaksi,
						'obat' => $obat,
						'total' => $total,
						'tampil_data' => $tampil_data,
						'isi' 	=> 'admin/transaksi/transaksi_beli');
  		$this->load->view('admin/layout/wrapper', $data, FALSE);
 	}

 	public function tambah(){
		// validasi
 		$tampil_data = $this->pembelian_model->ambil_transaksi();

		$valid =$this->form_validation;

		$valid->set_rules('nama_obat','Nama Obat','required',
			array(	'required' 		=> 'Nama Obat harus diisi!'));

		$valid->set_rules('jumlah','Jumlah Obat','required',
			array(	'required' 		=> 'Jumlah Obat harus diisi!'));

		if ($valid->run()===FALSE) {
			redirect(base_url('admin/pembelian'));
		}else {
			$namaobat = $this->pembelian_model->getobat($this->input->post('nama_obat'));
			
			$datas = array(	'idobat' 		=> $namaobat->id_obat,
							'hargasatuan' 	=> $namaobat->hargabeli_obat,
							'jumlahobat' 	=> $this->input->post('jumlah'),
							'hargasubtotal'	=> $namaobat->hargabeli_obat * $this->input->post('jumlah')
							);
			$this->pembelian_model->tambah($datas);
			redirect(base_url('admin/pembelian'));
		}
	}

	//hapus pembelian barang
	public function hapusbantuan($id){
		$hapus = array('id' => $id, );
		$this->pembelian_model->hapusbantuanid($hapus);

		redirect(base_url('admin/pembelian'));
	}

	public function tambah_transaksi(){
		// validasi
		$valid =$this->form_validation;

		$valid->set_rules('nama_supplier','Nama Supplier','required',
			array(	'required' 		=> 'Nama Supplier harus diisi!'));

		if ($valid->run()===FALSE) {
			redirect(base_url('admin/pembelian'));
		}else {
			// simpan data transaksi
			$datas = array(	'tgl_transaksibeli' 	=> date('Y-m-d'),
							'id_user' 				=> $this->session->userdata('id_user'),
							'id_suplier' 			=> $this->input->post('nama_supplier'),
							'totalpembelian'		=> $this->input->post('total')
							);

			$this->pembelian_model->tambah_transaksi($datas);

			// simpan data detail transaksi

			$ambilbantuan = $this->pembelian_model->ambil_transaksi();
			$id_transaksibeli = $this->pembelian_model->getidtransaksi();
			foreach ($ambilbantuan as $a) {
				$data = array(	'id_transaksibeli' 	=> $id_transaksibeli,
								'id_obat' 			=> $a->idobat,
								'hargasatuan' 		=> $a->hargasatuan,
								'jumlah' 			=> $a->jumlahobat,
								'subtotal' 		=> $a->hargasubtotal
							);
				$this->pembelian_model->tambah_detailtransaksi($data);
			}
 	 	 	 	

 	 	 	 //hapus semua data dari tabel bantuan
			$this->pembelian_model->hapusbantuan();


			// load index
			$transaksi = $this->pembelian_model->get(); 
			$obat = $this->pembelian_model->trans_obat();
			$tampil_data = $this->pembelian_model->ambil_transaksi();

			$total = $this->pembelian_model->hargatotal();

			$data = array(	'judul' => 'Transaksi Pembelian Obat',
							'transaksi'	=> $transaksi,
							'obat' => $obat,
							'total' => $total,
							'tampil_data' => $tampil_data,
							'isi' 	=> 'admin/transaksi/transaksi_beli');
	  		$this->load->view('admin/layout/wrapper', $data, FALSE);

		}
	}

}

/* End of file obat.php */
/* Location: ./application/controllers/admin/obat.php */