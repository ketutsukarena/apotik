<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data = array('judul' => 'Halaman Dasbor',
			'isi' => 'admin/dasbor/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function profile(){
		$listuser = $this->user_model->detail($this->session->userdata('id_user'));
		$data = array('judul' => 'Profil - '.$this->session->userdata('username'),
			'isi' => 'admin/dasbor/profile',
			'datauser' => $listuser);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	public function editprofile($id_user){
		$user = $this->user_model->detail($id_user);

		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'Username harus diisi!'));

		$valid->set_rules('alamat','Alamat','required',
			array(	'required' 		=> 'Alamat harus diisi!'));

		$valid->set_rules('tgllahir','Tanggal Lahir','required',
			array(	'required' 		=> 'Tanggal Lahir harus diisi!'));

		$valid->set_rules('kelamin','Jenis Kelamin','required',
			array(	'required' 		=> 'Jenis Kelamin harus diisi!'));

		// $valid->set_rules('level','Level','required',
		// 	array(	'required' 		=> 'Level harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' 	=> 'Edit User : '.$user->nama_user,
							'user'		=>$user,
							'isi' 		=> 'admin/dasbor/editprofile');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'id_user'			=> $id_user,
							'nama_user' 		=> $this->input->post('nama'),
							'alamat_user' 		=> $this->input->post('alamat'),
							'tgllahir_user' 	=> $this->input->post('tgllahir'),
							'jeniskelamin_user' => $this->input->post('kelamin')

			);
			$this->user_model->edit($data);


			$this->session->set_userdata('nama',$this->input->post('nama'));
			redirect(base_url('admin/dasbor/profile'),'refresh');
		}
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */