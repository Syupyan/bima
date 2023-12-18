<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Pengabdian extends CI_Model {


	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_pengguna",["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_pengabdian",$id);
		return $this->db->update("tbl_pengabdian",$data);
	}

	public function update_pengguna($id,$data=[])
	{
		$this->db->where("nip_nik",$id);
		return $this->db->update("tbl_pengguna",$data);
	}

	public function update_anggota($id,$data=[])
	{
		$this->db->where("pengabdian_id",$id);
		return $this->db->update("tbl_anggota",$data);
	}

}
