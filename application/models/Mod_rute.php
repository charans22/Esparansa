<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_rute extends CI_Model{
	public function __construct(){
    	parent::__construct();
    	$this->load->database();
	}

	public function get()
	{
		$this->db->select('*');
		$this->db->from('tb_rute');
		$res = $this->db->get()->result_array();		

		return $res;
	}

	public function simpan($data)
	{
		return $this->db->insert('tb_rute',$data);
	}

	public function hapus($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('tb_rute');
	}
}