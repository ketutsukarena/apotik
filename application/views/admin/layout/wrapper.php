<?php
	//proteksi halaman
	if($this->session->userdata('username')=="" && $this->session->userdata('level')==""){
		$this->session->set_flashdata('sukses', 'Silahkan login dahulu!!');
		redirect(base_url('login'),'refresh');
	}elseif ($this->session->userdata('level')=="kasir") {
		$this->session->set_flashdata('sukses', 'Silahkan login sebagai Admin!!');
		redirect(base_url('login'),'refresh');
	}
	//gabungan layout
	require_once('head.php');
	require_once('header.php');
	require_once('nav.php');
	require_once('konten.php');
	require_once('footer.php');
?>