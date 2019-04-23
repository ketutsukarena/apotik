<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//listing user
	public function listing(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();

	}
	//detail user
	public function detail($id_user){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	//login user
	public function login($username,$password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(	'username' 	=>$username ,
								'password'	=>sha1($password)));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	//tambah
	public function tambah($data){
		$this->db->insert('user', $data);
	}

	//edit
	public function edit($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	//hapus
	public function hapus($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
	
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */