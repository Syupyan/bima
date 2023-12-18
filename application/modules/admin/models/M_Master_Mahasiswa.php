<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Master_Mahasiswa extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_mahasiswa",$data);
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_mhs",$id);
		return $this->db->update("tbl_mahasiswa",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_mahasiswa",["id_mhs" => $id]);
	}


}
