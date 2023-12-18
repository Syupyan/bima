<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Pengguna extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_pengguna",$data);
	}

	public function create_luar($data=[])
	{
		return $this->db->insert("tbl_reviewer",$data);
	}
	
	
	public function update($id,$data=[])
	{
		$this->db->where("nip_nik",$id);
		return $this->db->update("tbl_pengguna",$data);
	}

	public function update_luar($id,$data=[])
	{
		$this->db->where("nip_nik",$id);
		return $this->db->update("tbl_reviewer",$data);
	}


	public function delete($id)
	{
		return $this->db->delete("tbl_pengguna",["nip_nik" => $id]);
	}

	public function delete_luar($id)
	{
		return $this->db->delete("tbl_reviewer",["nip_nik" => $id]);
	}

}
