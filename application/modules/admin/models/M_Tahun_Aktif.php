<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Tahun_Aktif  extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_mahasiswa",$data);
	}

	public function update($id,$data=[])
	{
		$this->db->where("id_thn",$id);
		return $this->db->update("tbl_tahun_aktif",$data);
	}


}
