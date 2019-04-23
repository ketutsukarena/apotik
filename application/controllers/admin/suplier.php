<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('suplier_model');
	}

	public function index()
	{
		$suplier = $this->suplier_model->listing();

		$data = array(	'judul' => 'Data Suplier ('.count($suplier).')',
						'suplier'	=> $suplier,
						'isi' 	=> 'admin/suplier/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah(){
		// validasi
		$valid =$this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'Nama harus diisi!'));

		$valid->set_rules('alamat','Alamat','required',
			array(	'required' 		=> 'Alamat harus diisi!'));

		$valid->set_rules('kota','Kota','required',
			array(	'required' 		=> 'Kota harus diisi!'));

		$valid->set_rules('no_telp','No Telepon','required',
			array(	'required' 		=> 'No telepon harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array('judul' => 'Tambah suplier',
				'isi' => 'admin/suplier/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'nama_suplier' 		=> $this->input->post('nama'), 
							'alamat' 			=> $this->input->post('alamat'), 
							'kota' 				=> $this->input->post('kota'), 
							'no_telp' 			=> $this->input->post('no_telp')
			);
			$this->suplier_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/suplier'),'refresh');
		}
	}

	//halaman edit
	public function edit($id_suplier){

		$suplier = $this->suplier_model->detail($id_suplier);

		// validasi
		$valid =$this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'Nama harus diisi!'));

		$valid->set_rules('alamat','Alamat','required',
			array(	'required' 		=> 'Alamat harus diisi!'));

		$valid->set_rules('kota','Kota','required',
			array(	'required' 		=> 'Kota harus diisi!'));

		$valid->set_rules('no_telp','No Telepon','required',
			array(	'required' 		=> 'No telepon harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' 	=> 'Edit suplier : '.$suplier->nama_suplier,
							'suplier'	=>$suplier,
							'isi' 		=> 'admin/suplier/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'id_suplier'		=> $id_suplier,
							'nama_suplier' 		=> $this->input->post('nama'), 
							'alamat' 			=> $this->input->post('alamat'), 
							'kota' 				=> $this->input->post('kota'), 
							'no_telp' 			=> $this->input->post('no_telp')

			);
			$this->suplier_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/suplier'),'refresh');
		}
	}
	//hapus
	public function hapus($id_suplier){

		$data = array(	'id_suplier' =>$id_suplier );

		$this->suplier_model->hapus($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/suplier'),'refresh');
	}

}

/* End of file suplier.php */
/* Location: ./application/controllers/admin/suplier.php */