<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'judul' => 'Data User ('.count($user).')',
						'user'	=> $user,
						'isi' 	=> 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//halaman tambah
	public function tambah(){
		// validasi
		$valid =$this->form_validation;

		$valid->set_rules('nama','Nama','required',
			array(	'required' 		=> 'Username harus diisi!'));

		$valid->set_rules('username','Username','required|is_unique[user.username]',
			array(	'required' 		=> 'Password harus diisi!', 
					'is_unique' 	=> 'Username <strong>'.$this->input->post('username').'</strong> Sudah ada. Buat Username Baru!'));

		$valid->set_rules('password1','Password','required|min_length[8]',
			array(	'required' 		=> 'Password harus diisi!', 
					'min_length' 	=> 'Password minimal 8 karakter!'));

		$valid->set_rules('password2','Password kedua','required|matches[password1]',
			array(	'required' 		=> 'Password harus diisi!', 
					'matches' 		=> 'Password harus sama!'));

		$valid->set_rules('alamat','Alamat','required',
			array(	'required' 		=> 'Alamat harus diisi!'));

		$valid->set_rules('tgllahir','Tanggal Lahir','required',
			array(	'required' 		=> 'Tanggal Lahir harus diisi!'));

		$valid->set_rules('kelamin','Jenis Kelamin','required',
			array(	'required' 		=> 'Jenis Kelamin harus diisi!'));

		$valid->set_rules('level','Level','required',
			array(	'required' 		=> 'Level harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' => 'Tambah User',
							'isi' 	=> 'admin/user/tambah');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'nama_user' 		=> $this->input->post('nama'), 
							'username' 			=> $this->input->post('username'), 
							'password' 			=> sha1($this->input->post('password1')), 
							'alamat_user' 		=> $this->input->post('alamat'), 
							'tgllahir_user' 	=> $this->input->post('tgllahir'), 
							'jeniskelamin_user' => $this->input->post('kelamin'), 
							'level_user' 		=> $this->input->post('level')
			);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
	}

	//halaman edit
	public function edit($id_user){

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

		$valid->set_rules('level','Level','required',
			array(	'required' 		=> 'Level harus diisi!'));

		if ($valid->run()===FALSE) {

			$data = array(	'judul' 	=> 'Edit User : '.$user->nama_user,
							'user'		=>$user,
							'isi' 		=> 'admin/user/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else {
			$data = array(	'id_user'			=> $id_user,
							'nama_user' 		=> $this->input->post('nama'),
							'alamat_user' 		=> $this->input->post('alamat'),
							'tgllahir_user' 	=> $this->input->post('tgllahir'),
							'jeniskelamin_user' => $this->input->post('kelamin'),
							'level_user' 		=> $this->input->post('level')

			);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
	}
	//hapus
	public function hapus($id_user){

		$data = array(	'id_user' =>$id_user );

		$this->user_model->hapus($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */