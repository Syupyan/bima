<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Reviewer extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		$user = $this->db->select('*')
                                            ->from('tbl_pengguna')
                                            ->join('tbl_role', 'tbl_pengguna.role_id = tbl_role.id_role')
                                            ->where('tbl_pengguna.nip_nik', $this->session->userdata("nip_nik"))
                                            ->get()->row();
		if (isset($user->nip_nik)) {
			return $this->db->get_where("tbl_pengguna", ["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
		} else {
			return $this->db->get_where("tbl_reviewer", ["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
		}
	}

	public function update_penelitian($id,$data=[])
	{
		$this->db->where("id_penelitian",$id);
		return $this->db->update("tbl_penelitian",$data);
	}

	public function update_pengabdian($id,$data=[])
	{
		$this->db->where("id_pengabdian",$id);
		return $this->db->update("tbl_pengabdian",$data);
	}

	public function update_lp_kemajuan($id,$data=[])
	{
		$this->db->where("id_lp_kemajuan",$id);
		return $this->db->update("tbl_laporan_kemajuan",$data);
	}

	public function update_lp_kemajuan_akhir($id,$data=[])
	{
		$this->db->where("id_lp_kemajuan",$id);
		return $this->db->update("tbl_laporan_kemajuan_akhir",$data);
	}
	
}
