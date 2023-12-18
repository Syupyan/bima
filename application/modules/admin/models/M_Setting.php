<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Setting extends CI_Model {


    public function getFileNamePanduan($id)
    {
        $this->db->select('file_panduan');
        $this->db->from('tbl_setting'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_setting', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->file_panduan;
        } else {
            return false;
        }
    }
	
	public function getFileName($id)
    {
        $this->db->select('template_import_pengguna');
        $this->db->from('tbl_setting'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_setting', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->template_import_pengguna;
        } else {
            return false;
        }
    }
	
		public function getFileNameMahasiswa($id)
    {
        $this->db->select('template_import_mahasiswa');
        $this->db->from('tbl_setting'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_setting', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->template_import_mahasiswa;
        } else {
            return false;
        }
    }
		public function getFileNameSubtansi($id)
    {
        $this->db->select('template_subtansi_pengabdian');
        $this->db->from('tbl_setting'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_setting', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->template_subtansi_pengabdian;
        } else {
            return false;
        }
    }

	public function getFileNameSubtansiP($id)
    {
        $this->db->select('template_subtansi_penelitian');
        $this->db->from('tbl_setting'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_setting', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->template_subtansi_penelitian;
        } else {
            return false;
        }
    }
	
	public function getFileNameSubtansiPanduan($id)
    {
        $this->db->select('file_panduan');
        $this->db->from('tbl_setting'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_setting', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->file_panduan;
        } else {
            return false;
        }
    }


	public function update($id,$data=[])
	{
		$this->db->where("id_setting",$id);
		return $this->db->update("tbl_setting",$data);
	}


}
