<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		if($this->session->userdata('level')=="admin"){
			redirect(base_url('admin/dasbor'),'refresh');
		}elseif($this->session->userdata('level')=="kasir"){
			redirect(base_url('kasir/dasbor'),'refresh');
		}else{
			redirect(base_url('login'),'refresh');
		}
	}
}
