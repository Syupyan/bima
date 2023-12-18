<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Setting_Penelitian_Pengabdian extends CI_Model {

	public function create_tema($data=[])
	{
		return $this->db->insert("tbl_tema_penelitian_pengabdian",$data);
	}

	public function delete_tema($id=NULL)
	{
		return $this->db->delete("tbl_tema_penelitian_pengabdian",["id_tema" => $id]);
	}

	public function create_luaran($data=[])
	{
		return $this->db->insert("tbl_luaran_usulan",$data);
	}

	public function delete_luaran($id=NULL)
	{
		return $this->db->delete("tbl_luaran_usulan",["id_luaran" => $id]);
	}

	public function update_tema($id,$data=[])
	{
		$this->db->where("id_tema",$id);
		return $this->db->update("tbl_tema_penelitian_pengabdian",$data);
	}

	public function update_luaran($id,$data=[])
	{
		$this->db->where("id_luaran",$id);
		return $this->db->update("tbl_luaran_usulan",$data);
	}


}