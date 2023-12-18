<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Anggaran_Aktif extends CI_Model {

	public function create($data=[])
	{
		return $this->db->insert("tbl_usulan_anggaran_aktif",$data);
	}

	public function delete($id=NULL)
	{
		return $this->db->delete("tbl_usulan_anggaran_aktif",["id_anggaran" => $id]);
	}


}
