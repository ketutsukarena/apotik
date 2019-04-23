<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('user_model');
	}

	public function index()
	{
		$listuser = $this->user_model->detail($this->session->userdata('id_user'));
		$data = array('judul' => 'Profil - '.$this->session->userdata('username'),
			'isi' => 'admin/dasbor/profile',
			'datauser' => $listuser);
		$this->load->view('kasirn/layout/wrapper', $data, FALSE);
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/kasir/profile.php */