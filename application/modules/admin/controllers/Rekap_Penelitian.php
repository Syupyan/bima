<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekap_Penelitian extends CI_Controller {

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

	public function halaman_v_data_penelitian_rekap()
	{
		$data['title']					= 'Rekap Penelitian';
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
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/v_data_penelitian_rekap',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_penelitian_rekap($id)
	{
		$data['title']					= 'Rekap Data Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')				
													->where('tbl_tahun_aktif.id_thn', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->where('status_penelitian !=', 5)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/tabel_penelitian/v_tabel_penelitian_rekap',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_data_penelitian($id)
	{
		$data['title']				= 'Data Penelitian Laporan';
		$data['user_login_data'] 	= $this->user_login_data;

		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['penelitian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/tabel_penelitian/data_penelitian/v_data_penelitian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_kemajuan_penelitian($id)
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
													->where('tbl_luaran_hasil.penelitian_id',$id)
													->get()->result_array();
		$data['lp_dok']		=  $this->db->select('*')
													->from('tbl_dok_lp_kemajuan')
													->get()->result_array();
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_kemajuan !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan !=', "Tidak Ada")
													->where('penelitian_id', $id)
													->get()->result_array();
		$data['penelitian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/tabel_penelitian/data_penelitian/laporan_kemajuan/v_laporan_kemajuan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_kemajuan_akhir_penelitian($id)
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
													->where('tbl_luaran_hasil.penelitian_id',$id)
													->get()->result_array();
		$data['lp_dok']		=  $this->db->select('*')
													->from('tbl_dok_lp_kemajuan_akhir')
													->get()->result_array();
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('penelitian_id', $id)
													->get()->result_array();
		$data['penelitian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/tabel_penelitian/data_penelitian/laporan_kemajuan_akhir/v_laporan_kemajuan_akhir',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_logbook_penelitian($id)
	{
		$data['title']					= 'Logbook Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;

		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['logbook']				=  $this->db->select('*')
													->from('tbl_logbook')
													->join('tbl_penelitian','tbl_logbook.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_penelitian.status_penelitian',4)
													->where('tbl_penelitian.id_penelitian',$id)
													->where('tbl_logbook.luaran !=','Logbook')
													->get()->result_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->where('id_penelitian',$id)
													->get()->row_array();
		$data['tahun']				=  $this->db->select('*')
													->from('tbl_logbook')
													->join('tbl_penelitian','tbl_logbook.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_penelitian.status_penelitian',4)
													->where('tbl_penelitian.id_penelitian',$id)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/tabel_penelitian/logbook_penelitian/v_logbook_penelitian',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_logbook_dokumen_penelitian($id)
	{
		$data['title']					= 'Logbook Penelitian';
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
		$this->load->view('rekap_data/rekap_penelitian/data_penelitian/tabel_penelitian/logbook_penelitian/logbook_dokumen/v_logbook_dokumen',$data);
		$this->load->view('layouts/template/footer');
	}

}
