<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		$this->load->model('obat_model');
	}

	public function index(){

		$belanja = $this->transaksi_model->listing();

		$total = $this->transaksi_model->total();

		$dataobat = $this->obat_model->listing();

		$data = array(	'judul' 	=> 'Transaksi penjualan',
						'belanja' 	=> $belanja,
						'total'		=> $total,
						'obat'		=> $dataobat,
						'isi' 		=> 'kasir/penjualan/vtransaksi');
		$this->load->view('kasir/layout/wrapper', $data, FALSE);
	}
	public function addobat(){

		$belanja = $this->transaksi_model->listing();
		$cekstok = $this->obat_model->listing_array();
		$total = $this->transaksi_model->total();

		//validasi tambah belanja
		$valid = $this->form_validation;

		$valid->set_rules('namaobat','Nama Obat','required',
			array(	'required' 		=> 'Nama Obat harus diisi!'));

		$valid->set_rules('jumlah','Jumlah','required',
			array(	'required' 		=> 'Jumlah harus diisi!'));

		if ($valid->run()===FALSE){
			// redirect(base_url('kasir/penjualan/transaksi'),'refresh');

			$data = array(	'judul' 	=> 'Transaksi penjualan',
							'belanja' 	=> $belanja,
							'total'		=> $total,
							'isi' 		=> 'kasir/penjualan/vtransaksi');
			$this->load->view('kasir/layout/wrapper', $data, FALSE);
		}
		else{
			$cek_obat = $this->transaksi_model->getobat($this->input->post('namaobat'));
			//cek data obat
			if (count($cek_obat)== 1){
				// cek stok obat
				$cekstok=$cekstok[0];
				if ($cekstok['stok_obat'] == 0){
					$this->session->set_flashdata('sukses', 'Jumlah Obat '.$this->input->post('namaobat').' sedang kosong');
					redirect(base_url('kasir/penjualan/transaksi'),'refresh');
				}elseif ($this->input->post('jumlah') > $cekstok['stok_obat']){
					$this->session->set_flashdata('sukses', 'Jumlah Obat '.$this->input->post('namaobat').' yang tersedia hanya '.$cekstok['stok_obat']);
					redirect(base_url('kasir/penjualan/transaksi'),'refresh');
				}else{

					$data = array(	'id_obat' 		 	=> $cek_obat->id_obat, 
									'jumlah' 			=> $this->input->post('jumlah'),
									'hargasatuan' 		=> $cek_obat->hargajual_obat,
									'subtotal' 			=> $this->input->post('jumlah') * $cek_obat->hargajual_obat
					);
					$this->transaksi_model->tambah($data);
					redirect(base_url('kasir/penjualan/transaksi'),'refresh');
				}

			}else{

				$data = array(	'judul' 	=> 'Transaksi penjualan',
								'belanja' 	=> $belanja,
								'total'		=> $total,
								'isi' 		=> 'kasir/penjualan/vtransaksi');

				$this->session->set_flashdata('sukses', 'Obat '.$this->input->post('namaobat').' tersebut tidak tercatat dalam data obat!');
				$this->load->view('kasir/layout/wrapper', $data, FALSE);
			}

			
		}
	}

	public function hapusobat($id){

		$hapus = array(	'id' =>$id );
		$this->transaksi_model->hapus($hapus);

		
		$belanja = $this->transaksi_model->listing();

		$total = $this->transaksi_model->total();

		$data = array(	'judul' 	=> 'Transaksi penjualan',
						'belanja' 	=> $belanja,
						'total'		=> $total,
						'isi' 		=> 'kasir/penjualan/vtransaksi');
		$this->load->view('kasir/layout/wrapper', $data, FALSE);
	}

	public function addtransaksi(){
		$valid = $this->form_validation;

		$total = $this->transaksi_model->total();

		$valid->set_rules('bayar','Pembayaran Obat','required',
			array(	'required' 		=> 'pembayaran harus diisi!'
	));

		if ($valid->run()===FALSE){

			$belanja = $this->transaksi_model->listing();

			$data = array(	'judul' 	=> 'Transaksi penjualan',
							'belanja' 	=> $belanja,
							'total'		=> $total,
							'isi' 		=> 'kasir/penjualan/vtransaksi');
			$this->load->view('kasir/layout/wrapper', $data, FALSE);
		}else{
			//tambah ke tabel transaksi
			$data = array(	'tgl_transaksijual' => date('Y-m-d'), 
							'id_user' 			=> $this->session->userdata('id_user'),
							'totalpenjualan' 	=> $this->input->post('total'));
			$this->transaksi_model->addtransaksi($data);

			//mendapatkan idtransaksi
			$idtransaksijual = $this->transaksi_model->getidtransaksi();

			// print_r($idtransaksijual);
			// mendapatkan data dari tabel bantuan
			$bantuan = $this->transaksi_model->listing();

			foreach ($bantuan as $bantuan) {
				//tambah ke tabel detailtransaksi
				$datadetail = array(	'id_transaksijual'	=> $idtransaksijual, 
										'id_obat' 			=> $bantuan->id_obat,
										'jumlah_obat' 	  	=> $bantuan->jumlah,
										'hargasatuan'		=> $bantuan->hargasatuan,
										'subtotal'			=> $bantuan->subtotal,);
				$this->transaksi_model->adddetailtransaksi($datadetail);
			}

			//hapus data dalam tabel bantuan
			$this->transaksi_model->hapusbantuan();

			//load halaman transaksi
			$belanja = $this->transaksi_model->listing();
			$total = $this->transaksi_model->total();
			$data = array(	'judul' 	=> 'Transaksi penjualan',
							'belanja' 	=> $belanja,
							'total'		=> $total,
							'isi' 		=> 'kasir/penjualan/vtransaksi');
			$this->load->view('kasir/layout/wrapper', $data, FALSE);

		}
	}

}

/* End of file penjualan.php */
/* Location: ./application/controllers/kasir/penjualan.php */