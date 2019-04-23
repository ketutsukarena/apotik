<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembelian_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing obat
	 public function get(){
  	 	return $this->db->get("suplier");
	 }

	 public function trans_obat(){
  	 	return $this->db->get("obat");
	 }

	 public function tambah($data){
		$this->db->insert('bantuan_transaksi_beli', $data);
	}

	public function ambil_transaksi(){
		$this->db->select('*');
		$this->db->from('bantuan_transaksi_beli');
		$query = $this->db->get();
		return $query->result();
	}

	public function getobat($id){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('id_obat',$id);
		$query = $this->db->get();
		return $query->row();
	}

	//harga total
	public function hargatotal(){
		$query = $this->db->query("SELECT SUM(hargasubtotal) AS total FROM bantuan_transaksi_beli");
		return $query->row()->total;
	}

	//detail obat
	public function getnama($id_obat){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('id_obat', $id_obat);
		$query = $this->db->get();
		return $query->row();
	}

	//tambah transaksi
	public function tambah_transaksi($data){
		$this->db->insert('transaksibeli', $data);
	}

	// tambah detail transaksi
	public function tambah_detailtransaksi($data){
		$this->db->insert('detail_transaksibeli', $data);
	}


	//listing suplier
	public function listingsuplier(){
		$this->db->select('*');
		$this->db->from('suplier');
		$this->db->order_by('id_suplier', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//mendapat id transaksi yang terakhir
	public function getidtransaksi(){
		$query = $this->db->query("SELECT MAX(id_transaksibeli) AS id FROM transaksibeli");
		return $query->row()->id;
	}

	//hapus  data dari tabel bantuan by ID
	public function hapusbantuanid($data){
		$this->db->where('id', $data['id']);
		$this->db->delete('bantuan_transaksi_beli',$data);
	}

	//hapus semua data dai tabel bantuan
	public function hapusbantuan(){
		$this->db->query("DELETE FROM bantuan_transaksi_beli");
	}

	// ===========================================================================================

	public function get_detail_transaksi_beli(){
		$this->db->select('*');
		$this->db->from('detail_transaksibeli');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_transaksi_beli(){
		$this->db->select('*');
		$this->db->from('transaksibeli');
		$query = $this->db->get();
		return $query->result();
	}	

	// public function get_id_transaksibeli(){
	// 	$this->db->select('id_transaksibeli');
	// 	$this->db->from('detail_transaksibeli');
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// public function gettanggal($tanggal){
	// 	$this->db->select('tgl_transaksibeli');
	// 	$this->db->from('transaksibeli');
	// 	$this->db->where('id_transaksibeli', $id_transaksibeli);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	public function tanggal(){
  	 	return $this->db->get("transaksibeli");
	 }


	 public function gettanggal($id_transaksibeli){
		$this->db->select('*');
		$this->db->from('transaksibeli');
		$this->db->where('id_transaksibeli', $id_transaksibeli);
		$query = $this->db->get();
		return $query->row();
	}

	public function namaobat(){
  	 	return $this->db->get("obat");
	 }

	public function namasupplier(){
  	 	return $this->db->get("suplier");
	 }

	 public function getnamaobat($id_obat){
	 	$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('id_obat', $id_obat);
		$query = $this->db->get();
		return $query->row();
	 }

	 public function getnamasupplier($id_suplier){
		$this->db->select('*');
		$this->db->from('suplier');
		$this->db->where('id_suplier', $id_suplier);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file obat_model.php */
/* Location: ./application/models/obat_model.php */