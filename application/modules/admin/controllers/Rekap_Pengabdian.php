<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekap_Pengabdian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->library('form_validation');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_v_data_pengabdian_rekap()
	{
		$data['title']					= 'Rekap Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['tahun_aktif']				=  $this->db->select('*')
													->from('tbl_tahun_aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/v_data_pengabdian_rekap',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_pengabdian_rekap($id)
	{
		$data['title']					= 'Rekap Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')				
													->where('tbl_tahun_aktif.id_thn', $id)
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->where('status_pengabdian !=', 5)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/tabel_pengabdian/v_tabel_pengabdian_rekap',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_data_pengabdian($id)
	{
		$data['title']				= 'Data Pengabdian Laporan';
		$data['user_login_data'] 	= $this->user_login_data;

		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/tabel_pengabdian/data_pengabdian/v_data_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_kemajuan_pengabdian($id)
	{
		$data['title']				= 'Data Laporan Kemajuan';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['lp_kemajuan']				=  $this->db->select('*')
													->from('tbl_laporan_kemajuan')
													->join('tbl_luaran_hasil', 'tbl_laporan_kemajuan.luaran_hasil_id = tbl_luaran_hasil.id_luaran_hasil')
													// ->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													// ->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id',$id)
													->get()->result_array();
		$data['lp_dok']		=  $this->db->select('*')
													->from('tbl_dok_lp_kemajuan')
													->get()->result_array();
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_kemajuan !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan !=', "Tidak Ada")
													->where('pengabdian_id', $id)
													->get()->result_array();
		$data['pengabdian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/tabel_pengabdian/data_pengabdian/laporan_kemajuan/v_laporan_kemajuan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_kemajuan_akhir_pengabdian($id)
	{
		$data['title']				= 'Data Laporan Kemajuan Akhir';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['lp_kemajuan']				=  $this->db->select('*')
													->from('tbl_laporan_kemajuan_akhir')
													->join('tbl_luaran_hasil', 'tbl_laporan_kemajuan_akhir.luaran_hasil_id = tbl_luaran_hasil.id_luaran_hasil')
													// ->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													// ->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id',$id)
													->get()->result_array();
		$data['lp_dok']		=  $this->db->select('*')
													->from('tbl_dok_lp_kemajuan_akhir')
													->get()->result_array();
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('pengabdian_id', $id)
													->get()->result_array();
		$data['pengabdian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/tabel_pengabdian/data_pengabdian/laporan_kemajuan_akhir/v_laporan_kemajuan_akhir',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_logbook_pengabdian($id)
	{
		$data['title']					= 'Logbook Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;

		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['logbook']				=  $this->db->select('*')
													->from('tbl_logbook')
													->join('tbl_pengabdian','tbl_logbook.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.status_pengabdian',4)
													->where('tbl_pengabdian.id_pengabdian',$id)
													->where('tbl_logbook.luaran !=','Logbook')
													->get()->result_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian',$id)
													->get()->row_array();
		$data['tahun']				=  $this->db->select('*')
													->from('tbl_logbook')
													->join('tbl_pengabdian','tbl_logbook.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.status_pengabdian',4)
													->where('tbl_pengabdian.id_pengabdian',$id)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/tabel_pengabdian/logbook_pengabdian/v_logbook_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_logbook_dokumen_pengabdian($id)
	{
		$data['title']					= 'Logbook Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['logbook_foto']				=  $this->db->select('*')
													->from('tbl_dokumen_logbook')
													->where('dokumen_file','Tidak Ada')
													->where('dokumen_url','Tidak Ada')
													->where('logbook_id',$id)
													->get()->result_array();
		$data['logbook_file']				=  $this->db->select('*')
													->from('tbl_dokumen_logbook')
													->where('dokumen_foto','Tidak Ada')
													->where('dokumen_url','Tidak Ada')
													->where('logbook_id',$id)
													->get()->result_array();
		$data['logbook_url']				=  $this->db->select('*')
													->from('tbl_dokumen_logbook')
													->where('dokumen_foto','Tidak Ada')
													->where('dokumen_file','Tidak Ada')
													->where('logbook_id',$id)
													->get()->result_array();
			$data['idku']				=  $this->db->select('*')
													->from('tbl_logbook')
													->where('id_logbook',$id)
													->get()->row_array();
		$data['id'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_pengabdian/data_pengabdian/tabel_pengabdian/logbook_pengabdian/logbook_dokumen/v_logbook_dokumen',$data);
		$this->load->view('layouts/template/footer');
	}

}
