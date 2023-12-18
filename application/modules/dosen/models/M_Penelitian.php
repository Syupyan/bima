<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Penelitian extends CI_Model {

	//get data user jika user login

	public function getFileNameLaporanKemajuan($id)
    {
        $this->db->select('url_file_laporan_kemajuan');
        $this->db->from('tbl_penelitian'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_penelitian', $id_penelitian);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_kemajuan;
        } else {
            return false;
        }
    }

	public function getFileName($id_penelitian)
    {
        $this->db->select('subtansi_usulan');
        $this->db->from('tbl_penelitian'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_penelitian', $id_penelitian);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->subtansi_usulan;
        } else {
            return false;
        }
    }

	public function getFileNameFile($id)
    {
        $this->db->select('dokumen_file');
        $this->db->from('tbl_dokumen_logbook'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_dok', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dokumen_file;
        } else {
            return false;
        }
    }

	public function getFileNameFoto($id)
    {
        $this->db->select('dokumen_foto');
        $this->db->from('tbl_dokumen_logbook'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_dok', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->dokumen_foto;
        } else {
            return false;
        }
    }

	public function getFileNameLpKemajuan($id)
    {
        $this->db->select('url_file');
        $this->db->from('tbl_dok_lp_kemajuan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('luaran_hasil_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file;
        } else {
            return false;
        }
    }

	public function getFileNameLpKemajuanAkhir($id)
    {
        $this->db->select('url_file');
        $this->db->from('tbl_dok_lp_kemajuan_akhir'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('luaran_hasil_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file;
        } else {
            return false;
        }
    }

    public function getFileNameULPKemajuan($id)
    {
        $this->db->select('url_file_laporan_kemajuan');
        $this->db->from('tbl_upload_laporan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_kemajuan;
        } else {
            return false;
        }
    }

	public function getFileNameULPKemajuanAkhir($id)
    {
        $this->db->select('url_file_laporan_kemajuan_akhir');
        $this->db->from('tbl_upload_laporan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_kemajuan_akhir;
        } else {
            return false;
        }
    }

    public function getFileNameULPKeuangan($id)
    {
        $this->db->select('url_file_laporan_keuangan');
        $this->db->from('tbl_upload_laporan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_keuangan;
        } else {
            return false;
        }
    }

    public function getFileNameULPKemajuanD($id)
    {
        $this->db->select('url_file_laporan_kemajuan');
        $this->db->from('tbl_upload_laporan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_up_laporan', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_kemajuan;
        } else {
            return false;
        }
    }

	public function getFileNameULPKemajuanAkhirD($id)
    {
        $this->db->select('url_file_laporan_kemajuan_akhir');
        $this->db->from('tbl_upload_laporan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_up_laporan', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_kemajuan_akhir;
        } else {
            return false;
        }
    }

    public function getFileNameULPKeuanganD($id)
    {
        $this->db->select('url_file_laporan_keuangan');
        $this->db->from('tbl_upload_laporan'); // Ganti "nama_tabel_penelitian" dengan nama tabel penelitian yang sesuai
        $this->db->where('id_up_laporan', $id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->url_file_laporan_keuangan;
        } else {
            return false;
        }
    }

    public function insert_luaran($luaranData)
    {
        // Memasukkan data luaran ke dalam tabel luaran
        $this->db->insert_batch('tbl_luaran_hasil', $luaranData);
    }

	public function insert_luaran1($luaranData)
    {
        // Memasukkan data luaran ke dalam tabel luaran
        $this->db->insert_batch('tbl_luaran_hasil', $luaranData);
    }

    public function insert_lap($luaranData)
    {
        // Memasukkan data luaran ke dalam tabel luaran
        $this->db->insert_batch('tbl_upload_laporan', $luaranData);
    }

	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_pengguna",["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
	}
	
	public function create_penelitian($data=[])
	{
		return $this->db->insert("tbl_penelitian",$data);
	}

	public function delete_luaran_by_ids($luaranIds, $penelitianId)
    {
        $this->db->where('penelitian_id', $penelitianId);
        $this->db->where_in('luaran_wajib_id', $luaranIds);
        $this->db->delete('tbl_luaran_hasil');
    }

	public function get_existing_luaran_wajib_ids($penelitianId)
    {
        $this->db->select('luaran_wajib_id');
        $this->db->from('tbl_luaran_hasil');
        $this->db->where('penelitian_id', $penelitianId);
        $query = $this->db->get();

        $existingLuaranIds = [];
        foreach ($query->result_array() as $row) {
            $existingLuaranIds[] = $row['luaran_wajib_id'];
        }

        return $existingLuaranIds;
    }
	
	public function delete_luaran_tambahan_by_ids($luaranIds, $penelitianId)
    {
        $this->db->where('penelitian_id', $penelitianId);
        $this->db->where_in('luaran_tambahan_id', $luaranIds);
        $this->db->delete('tbl_luaran_hasil');
    }

	public function get_existing_luaran_tambahan_ids($penelitianId)
    {
        $this->db->select('luaran_tambahan_id');
        $this->db->from('tbl_luaran_hasil');
        $this->db->where('penelitian_id', $penelitianId);
        $query = $this->db->get();

        $existingLuaranTidakIds = [];
        foreach ($query->result_array() as $row) {
            $existingLuaranTidakIds[] = $row['luaran_tambahan_id'];
        }

        return $existingLuaranTidakIds;
    }

	public function create_logbook($data=[])
	{
		return $this->db->insert("tbl_logbook",$data);
	}

	public function delete_logbook_dok($id)
	{
		return $this->db->delete("tbl_dokumen_logbook",["id_dok" => $id]);
	}

	public function delete_logbook_dok_all($id)
	{
		return $this->db->delete("tbl_dokumen_logbook",["logbook_id" => $id]);
	}

	public function delete_logbook($id)
	{
		return $this->db->delete("tbl_logbook",["id_logbook" => $id]);
	}


	public function create_logbook_dokumen($data=[])
	{
		return $this->db->insert("tbl_dokumen_logbook",$data);
	}

	public function create_anggota_dosen($data=[])
	{
		return $this->db->insert("tbl_anggota",$data);
	}

	public function create_anggota_mhs($data=[])
	{
		return $this->db->insert("tbl_anggota",$data);
	}
	
	public function update_penelitian($id,$data=[])
	{
		$this->db->where("id_penelitian",$id);
		return $this->db->update("tbl_penelitian",$data);
	}

	public function update_persetujuan($id,$data=[])
	{
		$this->db->where("id_anggota",$id);
		return $this->db->update("tbl_anggota",$data);
	}

	public function getDataDosen($option) {
		// mengambil data dari database berdasarkan nilai yang dipilih
		$query = $this->db->get_where('tbl_pengguna', array('nip_nik' => $option));
		return $query->row_array();
	  }

	 public function getDataMhs($option) {
		// mengambil data dari database berdasarkan nilai yang dipilih
		$query = $this->db->get_where('tbl_mahasiswa', array('id_mhs' => $option));
		return $query->row_array();
	  }

	public function delete_anggota_dosen($id)
	{
		return $this->db->delete("tbl_anggota",["nip_nik_anggota" => $id]);
	}

	public function delete_anggota_mhs($id)
	{
		return $this->db->delete("tbl_anggota",["nim_anggota" => $id]);
	}

	public function delete_draft($id)
	{
		return $this->db->delete("tbl_penelitian",["id_penelitian" => $id]);
	}

	public function get_all_unread_pesan($option=NULL)
	{

		if ($option=="count") {
			return $this->db->get_where("tbl_penelitian",["status_pesan" => 0])->num_rows();
		}else{
			return $this->db->order_by("judul",'DESC')
						->get("tbl_penelitian",5)->result_array();
		}
	}

	public function get_pesan($id=NULL)
	{
		if ($id) {
			$this->db->get_where("tbl_usulan",["id_usulan" => $id]);
		}else{
			return $this->db->get("tbl_usulan",["id_usulan" => $id]);
		}
	}

}