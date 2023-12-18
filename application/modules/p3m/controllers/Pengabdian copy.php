<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengabdian extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		// $this->load->model('Pesan_M');
		$this->load->library('email');
		$this->load->model('M_Pengabdian');
		$this->load->helper('p3m');
		$this->load->helper('access');
		check_p3m();
		check_dosen();
		//data user yang login
		$this->user_login_data = $this->M_Pengabdian->get_user_login_data();
	}

	public function halaman_v_pengabdian()
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna','tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian', 1)
													->get()->result_array();
		$data['pengabdian1']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_data_pengabdian_disahkan()
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['tahun_aktif']			=  $this->db->select('*')
													->from('tbl_tahun_aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_disahkan/v_data_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_pengabdian_disahkan($id)
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.id_thn', $id)
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_disahkan/tabel_pengabdian/v_tabel_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}
	public function halaman_v_tabel_pengabdian_disahkan_detail($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('id_pengabdian', $id)
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['id']	 =			$this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('id_pengabdian', $id)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_disahkan/tabel_pengabdian/d_tabel_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_tabel_pengabdian_disahkan_hasil($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('id_pengabdian', $id)
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_penilaian_reviewer')
													->where('pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Kualitas Topik Pengabdian
			<p>a. Inovasi dan kebaruan topik</p>
			<p>b. Kedalaman pemahaman peneliti terhadap topik</p>
			<p>c. Kesesuaian dengan RIP Politala</p>
			<p>d. Keselarasan dengan road map pengabdian pengusul</p>',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kedalaman dan komplekstasi permasalahan</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Tujuan dan manfaat pengabdian</p>
			<p>d. Urgensi topik peneitian dalam pemecahan masalah</p>',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Metode Pengabdian
			<p>a. Ketepatan dan kesesuaian metode yang digunakan</p>
			<p>b. Detail dan kelengkapan metode yang disampaikan</p>
			<p>c. Kebaruan dan tingkat kompleksitas metode</p>
			<p>d. Kelayakan sumber daya dalam penggunaan metode</p>',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kesesuaian waktu</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Kelayakan dan kesesuaian personalia pengusul</p>',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Peluang Luaran Pengabdian
			<p>a. Publikasi Ilmiah</p>
			<p>b. Pengembangan Ilmu</p>
			<p>c. Pengayaan bahan ajar</p>',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('pengabdian_id', $id);
        $query = $this->db->get('tbl_penilaian_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		$data['id']	 =			$this->db->select('*')
								->from('tbl_pengabdian')
								->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
								->where('id_pengabdian', $id)
								->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_disahkan/tabel_pengabdian/h_tabel_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_dinilai_pengabdian()
	{
		$data['title']					= 'DInilai Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian', 3)
													->get()->result_array();
		$data['pengabdian1']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_dinilai_pengabdian/v_dinilai_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}
	
	public function halaman_v_dinilai_pengabdian_detail($id)
	{
		$data['title']				= 'Detail Dinilai Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('id_pengabdian', $id)
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian', 3)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_dinilai_pengabdian/d_dinilai_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_dinilai_pengabdian_hasil($id)
	{
		$data['title']				= 'Hasil Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('id_pengabdian', $id)
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_penilaian_reviewer')
													->where('pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Kualitas Topik Pengabdian
			<p>a. Inovasi dan kebaruan topik</p>
			<p>b. Kedalaman pemahaman peneliti terhadap topik</p>
			<p>c. Kesesuaian dengan RIP Politala</p>
			<p>d. Keselarasan dengan road map pengabdian pengusul</p>',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kedalaman dan komplekstasi permasalahan</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Tujuan dan manfaat pengabdian</p>
			<p>d. Urgensi topik peneitian dalam pemecahan masalah</p>',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Metode Pengabdian
			<p>a. Ketepatan dan kesesuaian metode yang digunakan</p>
			<p>b. Detail dan kelengkapan metode yang disampaikan</p>
			<p>c. Kebaruan dan tingkat kompleksitas metode</p>
			<p>d. Kelayakan sumber daya dalam penggunaan metode</p>',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kesesuaian waktu</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Kelayakan dan kesesuaian personalia pengusul</p>',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Peluang Luaran Pengabdian
			<p>a. Publikasi Ilmiah</p>
			<p>b. Pengembangan Ilmu</p>
			<p>c. Pengayaan bahan ajar</p>',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('pengabdian_id', $id);
        $query = $this->db->get('tbl_penilaian_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_dinilai_pengabdian/h_dinilai_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_pengabdian_disahkan()
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_pengabdian_disahkan_detail($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('id_pengabdian', $id)
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/d_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_pengabdian_disahkan_hasil($id)
	{
		$data['title']				= 'Hasil Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['count_unread_pesan_penelitian']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->num_rows();
		$data['count_unread_pesan_penelitian_disetujui']		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['count_unread_pesan_pengabdian_disetujui']		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Disetujui')
										->get()->num_rows();
		$data['all_unread_pesan_penelitian'] 		= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_penelitian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['all_unread_pesan_pengabdian'] 		= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_anggota.nip_nik_anggota')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_pengabdian.status_aktif !=', 'Draft')
										->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
										->where('tbl_anggota.status_anggota','Menunggu')
										->get()->result_array();
		$data['ketua_penelitian'] 					= $this->db->select('*')
										->from('tbl_penelitian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_penelitian.id_penelitian = tbl_anggota.penelitian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
										->from('tbl_pengabdian')
										->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
										->join('tbl_anggota', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
										->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
										->where('tbl_tahun_aktif.status_aktif', 'Aktif')
										->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
										->where('tbl_anggota.nip_nik_anggota', $data['user_login_data']['nip_nik'])
										->get()->row_array();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('id_pengabdian', $id)
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_penilaian_reviewer')
													->where('pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['id'] = $id;
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Kualitas Topik Pengabdian
			<p>a. Inovasi dan kebaruan topik</p>
			<p>b. Kedalaman pemahaman peneliti terhadap topik</p>
			<p>c. Kesesuaian dengan RIP Politala</p>
			<p>d. Keselarasan dengan road map pengabdian pengusul</p>',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kedalaman dan komplekstasi permasalahan</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Tujuan dan manfaat pengabdian</p>
			<p>d. Urgensi topik peneitian dalam pemecahan masalah</p>',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Metode Pengabdian
			<p>a. Ketepatan dan kesesuaian metode yang digunakan</p>
			<p>b. Detail dan kelengkapan metode yang disampaikan</p>
			<p>c. Kebaruan dan tingkat kompleksitas metode</p>
			<p>d. Kelayakan sumber daya dalam penggunaan metode</p>',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kesesuaian waktu</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Kelayakan dan kesesuaian personalia pengusul</p>',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Peluang Luaran Pengabdian
			<p>a. Publikasi Ilmiah</p>
			<p>b. Pengembangan Ilmu</p>
			<p>c. Pengayaan bahan ajar</p>',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('pengabdian_id', $id);
        $query = $this->db->get('tbl_penilaian_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/h_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function switch_access()
	{
		$id_pengabdian = $this->input->get('id_pengabdian');
		$pengguna_status = $this->input->get('status_pengabdian');
		$this->M_Pengabdian->update($id_pengabdian,['status_pengabdian' => 2]);
		$this->session->set_flashdata('success','Usulan Berhasil Dikirim Ke Reviewer');
	}

	public function pengabdian_disahkan()
	{
		$id_pengabdian = $this->input->post('pengabdian_id_1');
		$nip_nik = $this->input->post('nip_nik_ketua');
		$data_nik_nip = [
			'status_pesan' 	=> 1
		];	
		$this->M_Pengabdian->update_pengguna($nip_nik,$data_nik_nip);
		$this->M_Pengabdian->update_anggota($id_pengabdian,['status_pesan' => 1]);
		$this->M_Pengabdian->update($id_pengabdian,['status_pengabdian' => 4]);

		$config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol' 	=> 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_pass' => 'rtjttfigflyyquvk',
            'smtp_user' => 'pklict2022@gmail.com',
            'charset' 	=> 'utf-8',
            'newline' 	=> "\r\n"
        ];
		
		$emails = $_POST['email']; // Mendapatkan array dari input field 'email[]'
		$to = implode(',', $emails); // Menggabungkan array email menjadi string dengan pemisah koma

        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($to);
		$emailku = $this->db->get_where('tbl_pengabdian', ['nip_nik_ketua' => $this->input->post('emailku')])->row_array();
        $data['nama'] = $emailku['judul'];
        $mesg  = $this->load->view('v_pengabdian/v_dinilai_pengabdian/email_penilaian_disahkan', $data,true);
		$this->email->subject('Selamat Pengabdian telah di sahkan !');
		$this->email->message($mesg);
        if ($this->email->send()) {
		$this->session->set_flashdata('success','Usulan Berhasil Disahkan');
			redirect('p3m/dinilai-pengabdian');
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

	}

	public function pengabdian_ditolak()
	{
		$id_pengabdian = $this->input->post('pengabdian_id_1');
		$nip_nik = $this->input->post('nip_nik_ketua');
		$data_nik_nip = [
			'status_pesan' 	=> 2
		];	
		$this->M_Pengabdian->update_pengguna($nip_nik,$data_nik_nip);
		$this->M_Pengabdian->update_anggota($id_pengabdian,['status_pesan' => 1]);
		$this->M_Pengabdian->update($id_pengabdian,['status_pengabdian' => 5]);

		$config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol' 	=> 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_pass' => 'rtjttfigflyyquvk',
            'smtp_user' => 'pklict2022@gmail.com',
            'charset' 	=> 'utf-8',
            'newline' 	=> "\r\n"
        ];
		
		$emails = $_POST['email']; // Mendapatkan array dari input field 'email[]'
		$to = implode(',', $emails); // Menggabungkan array email menjadi string dengan pemisah koma
        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($to);
		$emailku = $this->db->get_where('tbl_pengabdian', ['nip_nik_ketua' => $this->input->post('emailku')])->row_array();
        $data['nama'] = $emailku['judul'];
        $mesg  = $this->load->view('v_pengabdian/v_dinilai_pengabdian/email_penilaian_ditolak', $data,true);
		$this->email->subject('Mohon maaf Pengabdian Ditolak !');
		$this->email->message($mesg);
        if ($this->email->send()) {
			$this->session->set_flashdata('success','Usulan Berhasil Ditolak');
			redirect('p3m/dinilai-pengabdian');
        	 return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }

	}
	

}
