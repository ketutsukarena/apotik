<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class obat_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing obat
	public function listing(){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//listing array obat digunakan di transaksi
	public function listing_array(){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	//getjenis
	public function getjenis($id_jenis){
		$this->db->select('*');
		$this->db->from('jenis');
		$this->db->where('id_jenis', $id_jenis);
		$query = $this->db->get();
		return $query->row();
	}
	
	//detail obat
	public function detail($id_obat){
		$this->db->select('*');
		$this->db->from('obat');
		$this->db->where('id_obat', $id_obat);
		$this->db->order_by('id_obat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah
	public function tambah($data){
		$this->db->insert('obat', $data);
	}

	//edit
	public function edit($data){
		$this->db->where('id_obat', $data['id_obat']);
		$this->db->update('obat', $data);
	}

	//hapus
	public function hapus($data){
		$this->db->where('id_obat', $data['id_obat']);
		$this->db->delete('obat', $data);
	}
	
}

/* End of file obat_model.php */
/* Location: ./application/models/obat_model.php */