<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_model');
	}

	public function index()
	{
		$jenis = $this->jenis_model->listing();

		$data = array(	'judul' => 'Data jenis ('.count($jenis).')',
						'jenis'	=> $jenis,
						'isi' 	=> 'admin/jenis/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah(){
		// validasi
		$valid =$this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'jenis harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' => 'Tambah jenis',
							'isi' 	=> 'admin/jenis/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'nama_jenis' 		=> $this->input->post('nama'));
			$this->jenis_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/jenis'),'refresh');
		}
	}

	//halaman edit
	public function edit($id_jenis){

		$jenis = $this->jenis_model->detail($id_jenis);

		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'jenisname harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' 	=> 'Edit jenis : '.$jenis->nama_jenis,
							'jenis'		=>$jenis,
							'isi' 		=> 'admin/jenis/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'id_jenis'			=> $id_jenis,
							'nama_jenis' 		=> $this->input->post('nama')
			);
			$this->jenis_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/jenis'),'refresh');
		}
	}
	//hapus
	public function hapus($id_jenis){

		$data = array(	'id_jenis' =>$id_jenis );

		$this->jenis_model->hapus($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/jenis'),'refresh');
	}
}

/* End of file jenis.php */
/* Location: ./application/controllers/admin/jenis.php */