<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {
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
						'isi' 	=> 'admin/obat/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah(){

		$jenis = $this->jenis_model->listing();

		// validasi
		$valid =$this->form_validation;

		$valid->set_rules('nama','Nama','required|is_unique[obat.nama_obat]',
			array(	'required' 		=> 'Nama Obat harus diisi!', 
					'is_unique' 	=> 'Nama Obat <strong>'.$this->input->post('nama').'</strong> Sudah ada. Tidak perlu ditambahkan lagi!'));

		$valid->set_rules('jenis','Jenis','required',
			array(	'required' 		=> 'Jenis harus diisi!'));

		$valid->set_rules('hargabeli','Harga beli','required',
			array(	'required' 		=> 'Harga beli harus diisi!'));

		$valid->set_rules('hargajual','Harga jual','required',
			array(	'required' 		=> 'Password harus diisi!'));

		$valid->set_rules('stok','Stok','required',
			array(	'required' 		=> 'Stok harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' => 'Tambah obat',
							'jenis' => $jenis,
							'isi' 	=> 'admin/obat/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'nama_obat' 		=> $this->input->post('nama'), 
							'id_jenis' 			=> $this->input->post('jenis'), 
							'hargabeli_obat' 	=> $this->input->post('hargabeli'), 
							'hargajual_obat' 	=> $this->input->post('hargajual'), 
							'stok_obat' 		=> $this->input->post('stok')
			);
			$this->obat_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/obat'),'refresh');
		}
	}

	//halaman edit
	public function edit($id_obat){

		$obat = $this->obat_model->detail($id_obat);
		$jenis = $this->jenis_model->listing();

		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'Nama harus diisi!'));

		$valid->set_rules('jenis','Jenis','required',
			array(	'required' 		=> 'Jenis harus diisi!'));

		$valid->set_rules('hargabeli','Harga beli','required',
			array(	'required' 		=> 'Harga beli harus diisi!'));

		$valid->set_rules('hargajual','Harga jual','required',
			array(	'required' 		=> 'Password harus diisi!'));

		$valid->set_rules('stok','Stok','required',
			array(	'required' 		=> 'Stok harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' 	=> 'Edit obat : '.$obat->nama_obat,
							'obat'		=>$obat,
							'jenis'		=>$jenis,
							'isi' 		=> 'admin/obat/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'id_obat'			=> $id_obat,
							'nama_obat' 		=> $this->input->post('nama'), 
							'id_jenis' 			=> $this->input->post('jenis'), 
							'hargabeli_obat' 	=> $this->input->post('hargabeli'), 
							'hargajual_obat' 	=> $this->input->post('hargajual'), 
							'stok_obat' 		=> $this->input->post('stok')
			);
			$this->obat_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/obat'),'refresh');
		}
	}
	//hapus
	public function hapus($id_obat){

		$data = array(	'id_obat' =>$id_obat );

		$this->obat_model->hapus($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/obat'),'refresh');
	}

}

/* End of file obat.php */
/* Location: ./application/controllers/admin/obat.php */