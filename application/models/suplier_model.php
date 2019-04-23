<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplier_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing suplier
	public function listing(){
		$this->db->select('*');
		$this->db->from('suplier');
		$this->db->order_by('id_suplier', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
	//detail suplier
	public function detail($id_suplier){
		$this->db->select('*');
		$this->db->from('suplier');
		$this->db->where('id_suplier', $id_suplier);
		$this->db->order_by('id_suplier', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	//tambah suplier
	public function tambah($data){
		$this->db->insert('suplier', $data);
	}

	//edit suplier
	public function edit($data){
		$this->db->where('id_suplier', $data['id_suplier']);
		$this->db->update('suplier', $data);
	}

	//hapus suplier
	public function hapus($data){
		$this->db->where('id_suplier', $data['id_suplier']);
		$this->db->delete('suplier', $data);
	}
	
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */