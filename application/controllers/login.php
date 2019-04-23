<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$valid =$this->form_validation;

		$valid->set_rules('username','Username','required',
			array(	'required' 		=> 'Username harus diisi!'));

		$valid->set_rules('password','Password','required|min_length[8]',
			array(	'required' 		=> 'Password harus diisi!', 
					'min_length' 	=> 'Password minimal 8 karakter!'));
		if ($valid->run()===FALSE){
			//end validasi
			$data['judul'] = 'login user';
			$this->load->view('vlogin', $data, FALSE);
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//cek database
			$cek_login = $this->user_model->login($username,$password);
			//kalau ada record
			if (count($cek_login)== 1){
				$this->session->set_userdata('username',$username);
				$this->session->set_userdata('level',$cek_login->level_user);
				$this->session->set_userdata('id_user',$cek_login->id_user);
				$this->session->set_userdata('nama',$cek_login->nama_user);
				if ($cek_login->level_user == "admin"){
					redirect(base_url('admin/dasbor'),'refresh');
				}else{
					redirect(base_url('kasir/penjualan/transaksi')	,'refresh');
				}
			}else{
				//kalau record tidak ada
				$this->session->set_flashdata('sukses','Username dan password tidak cocok!!!');
				redirect(base_url('login'),'refresh');
			}

		}
	}
	//function logiut
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('logout','Anda berhasil logout!');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */