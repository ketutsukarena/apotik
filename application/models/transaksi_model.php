<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing bantuan transaksijual
	public function listing(){
		$this->db->select('*');
		$this->db->from('bantuan_transaksijual');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// //get bantuan transaksijual
	// public function getdatabantuan($id){
	// 	$this->db->select('*');
	// 	$this->db->from('bantuan_transaksijual');
	// 	$this->db->where('id', $id);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	//getnamaobat
	public function getnamaobat($id_obat){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('id_obat', $id_obat);
		$query = $this->db->get();
		return $query->row();
	}

	//total belnjaan
	public function total(){
		$query = $this->db->query("SELECT SUM(subtotal) as total FROM bantuan_transaksijual");
		return $query->row()->total;
	}

	//data obat
	public function getobat($namaobat){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('nama_obat', $namaobat);
		$query = $this->db->get();
		return $query->row();
	}

	//tambah obat 
	public function tambah($data){
		$this->db->insert('bantuan_transaksijual', $data);
	}
 
	//hapus
	public function hapus($data){
		$this->db->where('id', $data['id']);
		$this->db->delete('bantuan_transaksijual', $data);
	}

	//tambah ke tabel transaksi
	public function addtransaksi($data){

		$this->db->insert('transaksijual', $data);
	}

	//get id transaksi
	public function getidtransaksi(){
		$query = $this->db->query("SELECT MAX(id_transaksijual) AS id FROM transaksijual WHERE 1");
		return $query->row()->id;
	}

	//tambah ke tabel detail_transaksi
	public function adddetailtransaksi($data){
		$this->db->insert('detail_transaksijual', $data);
	}

	//hapus semua data di tabel bantuan
	public function hapusbantuan(){
		// $this->db->delete('bantuan_transaksijual');
		$query = $this->db->query("DELETE FROM bantuan_transaksijual");
	}
}

/* End of file transaksi_model.php */
/* Location: ./application/models/transaksi_model.php */