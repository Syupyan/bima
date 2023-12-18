<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Carbon\Carbon;
class Pengabdian extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->model('M_Pengabdian');	
		$this->load->library('security');
		//load helper
		// $this->load->helper('pengusul');
		$this->load->helper('access');
		// memanggil helper pengusul
		$this->load->helper('Pengabdian');
		check_dosen();
		//data user yang login
		$this->user_login_data = $this->M_Pengabdian->get_user_login_data();
	}

	public function halaman_v_pengabdian()
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_pengabdian.status_pengabdian',0)
													->get()->result_array();
		$data['tahun_anggaran']				=  $this->db->select('*')
													->from('tbl_usulan_anggaran_aktif')
													->join('tbl_tahun_aktif', 'tbl_tahun_aktif.id_thn = tbl_usulan_anggaran_aktif.thn_aktif_id')
													->where('tbl_tahun_aktif.tahun_aktif',date('Y'))
													->where('tbl_tahun_aktif.status_aktif','Aktif')
													->get()->result_array();
		$data['num_penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->get()->num_rows();
		$data['num_pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->get()->num_rows();
		$data['num_anggota']		=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
													->where('nip_nik_anggota',$data['user_login_data']['nip_nik'])
													->where('status_anggota','Disetujui')
													->get()->num_rows();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_pengabdian',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_data_pengabdian_ketua()
	{
		$data['title']					= 'Data Pengabdian Ketua';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['tahun_aktif']				=  $this->db->select('*')
													->from('tbl_tahun_aktif')
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_ketua/v_data_pengabdian_ketua',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_tabel_pengabdian_ketua($id)
	{
		$data['title']					= 'Data Pengabdian Ketua';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.id_thn', $id)
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('status_pengabdian !=', 0)
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_ketua/tabel_pengabdian/v_tabel_pengabdian_ketua',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_d_tabel_pengabdian_ketua($id)
	{
		$data['title']					= 'Detail Pengabdian Ketua';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->join('tbl_tahun_aktif', 'tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('id_pengabdian',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_ketua/tabel_pengabdian/d_tabel_pengabdian_ketua',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_data_pengabdian_anggota()
	{
		$data['title']					= 'Data Pengabdian Anggota';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_anggota/v_data_pengabdian_anggota',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_pengabdian_anggota($id)
	{
		$data['title']					= 'Data Pengabdian Anggota';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->join('tbl_anggota','tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->where('tbl_tahun_aktif.id_thn', $id)
													->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_anggota.status_anggota', 'Disetujui')
													->where('status_pengabdian !=', 0)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_anggota/tabel_pengabdian/v_tabel_pengabdian_anggota',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_d_tabel_pengabdian_anggota($id)
	{
		$data['title']					= 'Detail Pengabdian Anggota';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->join('tbl_tahun_aktif', 'tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('id_pengabdian',$id)
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
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/dashboard_data/data_pengabdian_anggota/tabel_pengabdian/d_tabel_pengabdian_anggota',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_detail_pengabdian($id)
	{
		$data['title']					= 'Detail Pengabdian';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('id_pengabdian',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_dosenku']		=  $this->db->select('*')
													->from('tbl_pengguna')
													->where('pengguna_status !=',0)
													->where('role_id !=',1)
													->where('role_id !=',3)
													->where('nip_nik !=',$data['user_login_data']['nip_nik'])
													->where('email !=','default@email.com')
													->order_by('nama','ASC')
													->get()->result_array();
		$data['anggota_mahasiswa']			=  $this->db->select('*')
													->from('tbl_mahasiswa')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													// ->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
													->get()->result_array();
		$data['cek_anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.status_anggota', 'Disetujui')
													->get()->num_rows();
		$nim = '';
		$data['cek_anggota_mahasiswa']				=  $this->db->select('*')
													->from('tbl_anggota')
													->where('tbl_anggota.pengabdian_id',$id)
													->where('tbl_anggota.nim_anggota !=',$nim)
													->get()->num_rows();
		$data['tahun_aktif'] = $this->db->select('*')
													->from('tbl_tahun_aktif')
													->where('status_aktif', 'Aktif')
													->get()->result_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();	
		$data['anggota_pengabdian']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/d_pengabdian',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_pengabdian_aktif()
	{
		$data['title']					= 'Data Pengabdian Aktif';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_pengabdian.status_pengabdian !=',0)
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/pengabdian_aktif/v_pengabdian_aktif',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_detail_pengabdian_aktif($id)
	{
		$data['title']					= 'Detail Pengabdian Aktif';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('id_pengabdian',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/pengabdian_aktif/d_pengabdian_aktif',$data);
		$this->load->view('layouts/template/footer');
		}
	}


	public function halaman_c_pengabdian_1()
	{
		$data['title']					= 'Tambah Usulan';
		$data['user_login_data'] 		= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('tbl_pengguna.nip_nik',$data['user_login_data']['nip_nik'])
													->order_by('tbl_pengabdian.id_pengabdian','DESC')
													->where('status_aktif', 'Disetujui')
													->get()->result_array();
		$data['pengabdianku1'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('tbl_pengguna.nip_nik',$data['user_login_data']['nip_nik'])
													->order_by('tbl_pengabdian.id_pengabdian','DESC')
													->limit(1)
													->get()->result_array();
		$data['tahun_anggaran']				=  $this->db->select('*')
													->from('tbl_usulan_anggaran_aktif')
													->join('tbl_tahun_aktif', 'tbl_tahun_aktif.id_thn = tbl_usulan_anggaran_aktif.thn_aktif_id')
													->where('tbl_tahun_aktif.tahun_aktif',date('Y'))
													->where('tbl_tahun_aktif.status_aktif','Aktif')
													->get()->result_array();
		$data['tema_pengabdian']				=  $this->db->select('*')
													->from('tbl_tema_penelitian_pengabdian')
													->where('tema_pengabdian !=','Tidak Ada')
													->get()->result_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_usulan')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('nama_luaran_wajib !=','Tidak Ada')
													->where('jenis_luaran =','Pengabdian')
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_usulan')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('nama_luaran_tambahan !=','Tidak Ada')
													->where('jenis_luaran =','Pengabdian')
													->get()->result_array();	
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/create_pengabdian/c_pengabdian_1',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_c_pengabdian_2($id)
	{
		$data['title']					= 'Tambah Usulan';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
	   $data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('id_pengabdian',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->result_array();
		$data['anggota_dosenku']		=  $this->db->select('*')
													->from('tbl_pengguna')
													->where('pengguna_status !=',0)
													->where('role_id !=',1)
													->where('role_id !=',3)
													->where('nip_nik !=',$data['user_login_data']['nip_nik'])
													->where('email !=','default@email.com')
													->order_by('nama','ASC')
													->get()->result_array();
		$data['anggota_mahasiswa']			=  $this->db->select('*')
													->from('tbl_mahasiswa')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													// ->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
													->get()->result_array();
		$data['cek_anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->get()->num_rows();
		$data['cek_anggota_dosenku']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.pengabdian_id',$id)
													->get()->num_rows();
		$nim = '';
		$data['cek_anggota_mahasiswa']				=  $this->db->select('*')
													->from('tbl_anggota')
													->where('tbl_anggota.pengabdian_id',$id)
													->where('tbl_anggota.nim_anggota !=',$nim)
													->get()->num_rows();
		$data['anggota_pengabdian']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/create_pengabdian/c_pengabdian_2',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_c_pengabdian_3($id)
	{
		$data['title']					= 'Tambah Usulan';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('id_pengabdian',$id)
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/create_pengabdian/c_pengabdian_3',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_c_pengabdian_4($id)
	{
		$data['title']					= 'Tambah Usulan';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
													->where('id_pengabdian',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
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
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/create_pengabdian/c_pengabdian_4',$data);
		$this->load->view('layouts/template/footer');
		}
	}



	public function halaman_persetujuan_anggota($id)
	{
		$data['title']					= 'Persetujuan Anggota';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdianku'] 					= $this->db->select('*')
											->from('tbl_pengabdian')
											->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
											->where('id_pengabdian',$id)
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
		// $data['user']				=  $this->db->select('*')
		// 									->from('tbl_anggota')
		// 									->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
		// 									->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
		// 									->get()->row_array();
		$data['luaran_usulan']				=  $this->db->select('*')
											->from('tbl_luaran_hasil')
											->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
											->where('tbl_luaran_hasil.pengabdian_id =',$id)
											->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
											->from('tbl_luaran_hasil')
											->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
											->where('tbl_luaran_hasil.pengabdian_id =',$id)
											->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/v_persetujuan_anggota/v_persetujuan_anggota_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_data_pengabdian($id)
	{
		$data['title']				= 'Data Pengabdian Laporan';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/v_data_pengabdian',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_kemajuan_pengabdian($id)
	{
		$data['title']				= 'Data Laporan Kemajuan';
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
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_kemajuan !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan !=', "Tidak Ada")
													->where('pengabdian_id', $id)
													->get()->result_array();
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/laporan_kemajuan/v_laporan_kemajuan',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_c_lp_kemajuan_pengabdian($id)
	{
		$data['title']					= 'Tambah Kemajuan Pengabdian';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian',$id)
													->get()->row_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tambahan']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();	
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/laporan_kemajuan/c_laporan_kemajuan',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_lp_kemajuan_akhir_pengabdian($id)
	{
		$data['title']				= 'Data Laporan Kemajuan Akhir';
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
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('pengabdian_id', $id)
													->get()->result_array();
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/laporan_kemajuan_akhir/v_laporan_kemajuan_akhir',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_c_lp_kemajuan_akhir_pengabdian($id)
	{
		$data['title']					= 'Tambah Kemajuan Akhir Pengabdian';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian',$id)
													->get()->row_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tambahan']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();	
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/laporan_kemajuan_akhir/c_laporan_kemajuan_akhir',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_lp_keuangan_pengabdian($id)
	{
		$data['title']				= 'Data Laporan Keuangan';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_keuangan !=', "Tidak Ada")
													->where('url_file_laporan_keuangan !=', "Tidak Ada")
													->where('pengabdian_id', $id)
													->get()->result_array();
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/laporan_keuangan/v_laporan_keuangan',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_logbook($id)
	{
		$data['title']					= 'Logbook Pengabdian';
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
													->where('tbl_pengabdian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('tbl_pengabdian.status_pengabdian',4)
													->where('tbl_pengabdian.id_pengabdian',$id)
													->get()->result_array();
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/logbook/v_logbook',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_c_logbook($id)
	{
		$data['title']					= 'Tambah Logbook Pengabdian';
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
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian',$id)
													->get()->row_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_hasil.pengabdian_id =',$id)
													->get()->result_array();	
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/logbook/c_logbook',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function halaman_v_logbook_dokumen($id)
	{
		$data['title']					= 'Dokumen Logbook Pengabdian';
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
		$data['pengabdian'] = $id;
		if($data['user_login_data']['nidn_nidk'] == 0){
			redirect('not-found');
		}else{
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengabdian/data_pengabdian/logbook/logbook_dokumen/v_logbook_dokumen',$data);
		$this->load->view('layouts/template/footer');
		}
	}

	public function add_logbook()
	{

		$id =  $this->input->post('id_pengabdian');
		$tanggal = $this->input->post('tanggal');
		$tm = date('d-m-Y', strtotime($tanggal));
		$waktu = $this->input->post('waktu');
		$tb = date('H:i:s', strtotime($waktu));
		$data = [
			'tanggal' 	=> $tm,
			'waktu' 	=> $tb,
			'pengabdian_id' 	=> $id,
			'penelitian_id' 	=> 0,
			'tempat_kegiatan' 	=> htmlentities($this->input->post('tempat_kegiatan')),


		];	
		$this->M_Pengabdian->create_logbook($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('dosen/logbook-pengabdian/'.$id);
	}
	
	public function add_foto_dokumen()
	{
		$id =  $this->input->post('id');
		$config['upload_path']          = './asset/file/logbook/foto/';
		$config['allowed_types']        = 'png|jpg';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		$existing_file = $this->M_Pengabdian->getFileNameFoto($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		if ( ! $this->upload->do_upload('dokumen_foto'))
		{
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('dosen/dokumen-logbook-pengabdian/'.$id);
		}else{
		$data = [
			'nama_file'     => $_FILES['dokumen_foto']['name'], // Mengambil nama file asli tanpa enkripsi
			'dokumen_foto' 	=> $this->upload->data("file_name"),
			'dokumen_file' 	=> 'Tidak Ada',
			'dokumen_url' 	=> 'Tidak Ada',
			'logbook_id' 	=> $id,
		];
		$this->M_Pengabdian->create_logbook_dokumen($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('dosen/dokumen-logbook-pengabdian/'.$id);
		}
	}

	public function add_file_dokumen()
	{
		$id =  $this->input->post('id');
		$config['upload_path']          = './asset/file/logbook/file/';
		$config['allowed_types']        = 'xls|xlsx|doc|docx|pdf';
		$config['max_size']             = 3000;
		$config['encrypt_name']         = TRUE;
		$this->load->library('upload', $config);
	
		$existing_file = $this->M_Pengabdian->getFileNameFile($id);
	
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
	
		if (!$this->upload->do_upload('dokumen_file')) {
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('dosen/dokumen-logbook-pengabdian/'.$id);
		} else {
			// Membersihkan karakter-karakter tidak diizinkan pada nama file
			$clean_filename = $this->security->sanitize_filename($_FILES['dokumen_file']['name']);
	
			$data = [
				'nama_file'     => $_FILES['dokumen_file']['name'],
				'dokumen_file'  => $this->upload->data("file_name"),
				'dokumen_foto'  => 'Tidak Ada',
				'dokumen_url'   => 'Tidak Ada',
				'logbook_id'    => $id,
			];
	
			$this->M_Pengabdian->create_logbook_dokumen($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/dokumen-logbook-pengabdian/'.$id);
		}
	}

	public function add_url_dokumen()
	{
		$id =  $this->input->post('id');

		$data = [
			'nama_file' 	=> 'Tidak Ada',
			'dokumen_file' 	=> 'Tidak Ada',
			'dokumen_foto' 	=> 'Tidak Ada',
			'dokumen_url' 	=> $this->input->post('dokumen_url'),
			'logbook_id' 	=> $id,
		];
		$this->M_Pengabdian->create_logbook_dokumen($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('dosen/dokumen-logbook-pengabdian/'.$id);
	}

	public function delete_logbook_dok_file($id)
	{
		$config['upload_path']          = './asset/file/logbook/file/';
		$existing_file = $this->M_Pengabdian->getFileNameFile($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		$this->M_Pengabdian->delete_logbook_dok($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_logbook_dok_foto($id)
	{
		$config['upload_path']          = './asset/file/logbook/foto/';
		$existing_file = $this->M_Pengabdian->getFileNameFoto($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		$this->M_Pengabdian->delete_logbook_dok($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_logbook_dok_url($id)
	{
		$this->M_Pengabdian->delete_logbook_dok($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_logbook_1($id)
	{
		$this->M_Pengabdian->delete_logbook_dok_all($id);
		$this->M_Pengabdian->delete_logbook($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}


	public function add_pengabdian_1()
	{
		$cek = $this->input->post('nip_nik_ketua');
		$tahun = $this->db->select('*')
			->from('tbl_tahun_aktif')
			->where('status_aktif', 'Aktif')
			->get()->row();
		
		$this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[tbl_pengabdian.judul]', array(
			'is_unique' => 'judul sudah digunakan oleh pengguna lain.'
		));
		// tambahkan aturan validasi is_unique untuk kolom judul
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/tambah-pengabdian/1');
		} else {
			$data = [
				'judul' => $this->security->xss_clean(htmlentities($this->input->post('judul'))),
				'tkt_awal' => 0,
				'tkt_akhir' => 0,
				'tema_pengabdian' => '',
				'nip_nik_ketua' => $cek,
				'tugas_ketua' => '',
				'status_pengabdian' => 0,
				'status_aktif' => 'Draft',
				'subtansi_usulan' => 'usulan',
				'nilai_pengabdian' => 0,
				'komentar_pengabdian' => 'Belum ada',
				'komentar_evaluasi' => 'Belum ada',
				'komentar_evaluasi_akhir' => 'Belum ada',
				'tahun_id' => $tahun->id_thn
			];
		
			$this->M_Pengabdian->create_pengabdian($data);
			$this->session->set_flashdata('success', 'Data awal berhasil didraftkan');
			redirect('dosen/tambah-pengabdian/1');
		}
	}

	public function add_pengabdian_1_1()
	{
		$id = $this->input->post('id_pengabdian');
		$judul = htmlentities($this->input->post('judul'));
		$tkt_awal = htmlentities($this->input->post('tkt_awal'));
		$tkt_akhir = htmlentities($this->input->post('tkt_akhir'));
		$tema_pengabdian = htmlentities($this->input->post('tema_pengabdian'));
		$luaran = $this->input->post('luaran');
		$luaranTambahan = $this->input->post('luaran_tambahan');
		$this->form_validation->set_rules('judul', 'Judul', 'required', array(
			'required' => 'Judul Tidak Boleh Kosong.'
		));
		$this->form_validation->set_rules('luaran[]', 'Luaran Wajib', 'required', array(
			'required' => 'Luaran Wajib Tidak Boleh Kosong.'
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/tambah-pengabdian/1');
		} else {
		if ($tkt_akhir < $tkt_awal) {
			// Tkt akhir sama dengan atau lebih rendah daripada tkt awal, berikan pesan error
			$this->session->set_flashdata('error', 'TKT akhir harus lebih tinggi daripada TKT awal');
			redirect('dosen/tambah-pengabdian/1/');
			return; // Hentikan eksekusi lebih lanjut
		}
	
		if ($tkt_akhir == $tkt_awal) {
			// Tkt awal dan tkt akhir sama, berikan pesan error
			$this->session->set_flashdata('error', 'TKT awal dan TKT akhir tidak boleh sama');
			redirect('dosen/tambah-pengabdian/1/');
			return; // Hentikan eksekusi lebih lanjut
		}
	
		$data = [
			'judul' => $judul,
			'tkt_awal' => $tkt_awal,
			'tkt_akhir' => $tkt_akhir,
			'tema_pengabdian' => $tema_pengabdian,
		];
	
		$this->M_Pengabdian->update_pengabdian($id, $data);
	
		// Ambil data luaran yang sudah ada sebelumnya
		$existingLuaranIds = $this->M_Pengabdian->get_existing_luaran_wajib_ids($id);
		$existingLuaranTambahanIds = $this->M_Pengabdian->get_existing_luaran_tambahan_ids($id);
	
		// Insert atau hapus data luaran terpilih
		$luaranData = [];
		if (!empty($luaran)) {
			foreach ($luaran as $luaranItem) {
				$luaranData[] = [
					'pengabdian_id' => $id,
					'penelitian_id' => 0,
					'luaran_tambahan_id' => 0,
					'luaran_wajib_id' => $luaranItem,
				];
			}
		}
		if (!empty($luaranTambahan)) {
			foreach ($luaranTambahan as $luaranTambahanItem) {
				$luaranData[] = [
					'pengabdian_id' => $id,
					'penelitian_id' => 0,
					'luaran_tambahan_id' => $luaranTambahanItem,
					'luaran_wajib_id' => 0,
				];
			}
		}
	
		$this->M_Pengabdian->delete_luaran_by_ids($existingLuaranIds, $id);
		$this->M_Pengabdian->delete_luaran_tambahan_by_ids($existingLuaranTambahanIds, $id);
	
		// Hapus luaran yang tidak dipilih
		$deletedLuaranIds = array_diff($existingLuaranIds, $luaran);
		$deletedLuaranTambahanIds = array_diff($existingLuaranTambahanIds, $luaranTambahan);
		$this->M_Pengabdian->delete_luaran_by_ids($deletedLuaranIds, $id);
		$this->M_Pengabdian->delete_luaran_tambahan_by_ids($deletedLuaranTambahanIds, $id);
	
		$this->M_Pengabdian->insert_luaran($luaranData);
	
		$this->session->set_flashdata('success', 'Data berhasil masuk draft');
		redirect('dosen/tambah-pengabdian/2/' . $id);
		}
	}

	public function add_pengabdian_2()
	{
		$cek = $this->input->post('id_pengabdian');

		$this->form_validation->set_rules('tugas_ketua', 'Tugas Ketua', 'min_length[1]', array(
			'min_length' => 'Panjang %s minimal 1 karakter.'
		));
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/tambah-pengabdian/2/'.$cek);
		} else {
			$data = [
				'tugas_ketua' => $this->security->xss_clean(htmlentities($this->input->post('tugas_ketua'))),
			];
			$this->M_Pengabdian->update_pengabdian($cek, $data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/tambah-pengabdian/3/'.$cek);
		}
	}

	public function add_pengabdian_3()
	{
		$cek = $this->input->post('id_pengabdian');
		$config['upload_path'] = './asset/file/pdf_proyek/';
		$config['allowed_types'] = 'pdf';
		// $config['max_size'] = 3000;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
	
		// Menghapus file lama jika ada
		$existing_file = $this->M_Pengabdian->getFileName($cek); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
	
		if (!$this->upload->do_upload('subtansi_usulan')) {
			// Jika terjadi error saat upload
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('dosen/tambah-pengabdian/4/' . $cek);
		} else {
			// Jika upload berhasil, lakukan pemrosesan tambahan yang diperlukan
			$data = [
				'subtansi_usulan' => $this->upload->data("file_name"),
			];
			$this->M_Pengabdian->update_pengabdian($cek, $data); // Ganti "M_Pengabdian" dengan model yang sesuai
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/tambah-pengabdian/4/' . $cek);
		}
	}

	public function add_pengabdian_4()
	{
		$cek = $this->input->post('id_pengabdian');
		$data = [
			'status_aktif' 	=> 'Disetujui'
		];	
		$this->M_Pengabdian->update_pengabdian($cek,$data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('dosen/pengabdian');
	}

	public function kirim_admin_p3m($id)
	{
		$data = [
			'status_pengabdian' 	=> 1
		];
		$ag = $this->db->select('*')
							->from('tbl_anggota')
							->where('pengabdian_id', $id)
							->where('status_anggota', 'Menunggu')
							->get()->result_array();
		foreach($ag as $ag){
		$this->db->where_in('nip_nik_anggota', $ag['nip_nik_anggota']);
		$this->db->delete('tbl_anggota');
		}
		$this->M_Pengabdian->update_pengabdian($id,$data);
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
		$kepala 		= $this->db->select('*')
										->from('tbl_pengguna')
										->where('role_id',4)
										->get()->row();
		$email = $kepala->email; // Mendapatkan array dari input field 'email[]'
        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($email);
        $emailku = $this->db->get_where('tbl_pengabdian', ['id_pengabdian' => $id])->row_array();
        $data['nama'] = $emailku['judul'];
        $mesg  = $this->load->view('v_pengabdian/email_penilaian_reviewer', $data,true);
		$this->email->subject('Info Pengabdian !');
		$this->email->message($mesg);
        if ($this->email->send()) {
			$this->session->set_flashdata('success','Pengabdian berhasil dikirim ke kepala P3M');
			redirect('dosen/pengabdian');
        	 return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
	}

	public function add_anggota_dosen()
	{
		$cek = $this->input->post('id_pengabdian');
		$this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|callback_validate_nip['.$cek.']', array(
			'validate_nip' => 'Dosen sudah menjadi anggota pengabdian pada tahun yang sama.'
		));
		$this->form_validation->set_rules('tugas', 'Tugas', 'min_length[1]', array(
			'min_length' => 'Panjang %s minimal 1 karakter.'
		));
	
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/tambah-pengabdian/2/'.$cek);
		} else {
			$th_current = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('tahun_aktif', date('Y'))
				->get()
				->row();
	
			$data = [
				'pengabdian_id' => $this->input->post('id_pengabdian'),
				'nip_nik_anggota' => $this->input->post('nip_nik'),
				'nim_anggota' => 0,
				'tugas' => htmlentities($this->input->post('tugas')),
				'penelitian_id' => 0,
				'status_anggota' => 'Menunggu',
				'status_pesan' => 0,
				'tahun_id' => ($th_current) ? $th_current->id_thn : null
			];
	
			$this->M_Pengabdian->create_anggota_dosen($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/tambah-pengabdian/2/'.$cek);
		}
	}

	public function add_anggota_mhs()
	{
		$cek = $this->input->post('id_pengabdian');
		$this->form_validation->set_rules('nim', 'NIM Anggota', 'required|callback_validate_nim['.$cek.']', array(
			'validate_nim' => 'Mahasiswa sudah menjadi anggota pengabdian lain pada tahun yang sama.'
		));
		$this->form_validation->set_rules('tugas', 'Tugas', 'min_length[1]', array(
			'min_length' => 'Panjang %s minimal 1 karakter.'
		));
	
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/tambah-pengabdian/2/'.$cek);
		} else {
			$th_current = $this->db->select('*')
										->from('tbl_tahun_aktif')
										->where('tahun_aktif', date('Y'))
										->get()
										->row();
	
			$data = [
				'pengabdian_id' => $this->input->post('id_pengabdian'),
				'nip_nik_anggota' => 0,
				'nim_anggota' => $this->input->post('nim'),
				'tugas' => htmlentities($this->input->post('tugas')),
				'penelitian_id' => 0,
				'status_anggota' => '',
				'status_pesan' => 0,
				'tahun_id' => ($th_current) ? $th_current->id_thn : null
			];
	
			$this->M_Pengabdian->create_anggota_mhs($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/tambah-pengabdian/2/'.$cek);
		}
	}
	

	public function add_anggota_dosen_detail()
	{
		$cek = $this->input->post('id_pengabdian');
		$this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|callback_validate_nip['.$cek.']', array(
			'validate_nip' => 'Dosen sudah menjadi anggota pengabdian pada tahun yang sama.'
		));
		$this->form_validation->set_rules('tugas', 'Tugas', 'min_length[1]', array(
			'min_length' => 'Panjang %s minimal 1 karakter.'
		));
	
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/detail-pengabdian/'.$cek);
		} else {
			$current_year = date('Y');
			$next_year = $current_year + 1;
	
			$th_current = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('tahun_aktif', $current_year)
				->get()->row();
	
			$th_next = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('tahun_aktif', $next_year)
				->get()->row();
	
			$data = [
				'pengabdian_id' => $this->input->post('id_pengabdian'),
				'nip_nik_anggota' => $this->input->post('nip_nik'),
				'nim_anggota' => 0,
				'tugas' => $this->input->post('tugas'),
				'penelitian_id' => 0,
				'status_anggota' => 'Menunggu',
				'status_pesan' => 0,
				'tahun_id' => ($th_current) ? $th_current->id_thn : $th_next->id_thn
			];
	
			$this->M_Pengabdian->create_anggota_dosen($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/detail-pengabdian/'.$cek);
		}
	}
	
	public function validate_nip($nip_nik, $pengabdian_id)
	{
		$current_year = date('Y');
	
		$query = $this->db->select('*')
								->from('tbl_anggota')
								->join('tbl_tahun_aktif', 'tbl_tahun_aktif.id_thn = tbl_anggota.tahun_id')
								->where('tbl_anggota.pengabdian_id', $pengabdian_id)
								->where('tbl_anggota.nip_nik_anggota', $nip_nik)
								->where('tbl_tahun_aktif.tahun_aktif', $current_year)
								->get();
	
		if ($query && $query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	

	public function add_anggota_mhs_detail()
	{
		$cek = $this->input->post('id_pengabdian');
		$this->form_validation->set_rules('nim', 'NIM Anggota', 'required|callback_validate_nim['.$cek.']', array(
			'validate_nim' => 'Mahasiswa sudah menjadi anggota pengabdian lain pada tahun yang sama.'
		));
		$this->form_validation->set_rules('tugas', 'Tugas', 'min_length[1]', array(
			'min_length' => 'Panjang %s minimal 1 karakter.'
		));
	
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('dosen/detail-pengabdian/'.$cek);
		} else {
			$th_current = $this->db->select('*')
										->from('tbl_tahun_aktif')
										->where('tahun_aktif', date('Y'))
										->get()
										->row();
			$th_next = $this->db->select('*')
									->from('tbl_tahun_aktif')
									->where('tahun_aktif', date('Y') + 1)
									->get()
									->row();
	
			$tahun_id = ($th_current) ? $th_current->id_thn : $th_next->id_thn;
	
			$data = [
				'pengabdian_id' => $this->input->post('id_pengabdian'),
				'nip_nik_anggota' => 0,
				'nim_anggota' => $this->input->post('nim'),
				'tugas' => $this->input->post('tugas'),
				'penelitian_id' => 0,
				'status_anggota' => '',
				'status_pesan' => 0,
				'tahun_id' => $tahun_id
			];
	
			$this->M_Pengabdian->create_anggota_mhs($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('dosen/detail-pengabdian/'.$cek);
		}
	}
	
	public function validate_nim($nim_anggota, $pengabdian_id)
	{
		$th_current = $this->db->select('*')
									->from('tbl_tahun_aktif')
									->where('tahun_aktif', date('Y'))
									->get()
									->row();
	
		$query = $this->db->select('*')
									->from('tbl_anggota')
									->where('pengabdian_id', $pengabdian_id)
									->where('nim_anggota', $nim_anggota)
									->where('tahun_id', $th_current->id_thn)
									->get();
	
		if ($query && $query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}

	public function persetujuan_pengabdian_anggota($id)
	{
		$data = [
			'status_anggota' 	=> 'Disetujui'
		];	
		$this->M_Pengabdian->update_persetujuan($id,$data);
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
		$kepala 		= $this->db->select('*')
									->from('tbl_anggota')
									->join('tbl_pengabdian', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
									->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
									->where('tbl_anggota.id_anggota',$id)
									->get()->row();
		$anggota 		= $this->db->select('*')
									->from('tbl_anggota')
									->where('tbl_anggota.id_anggota',$id)
									->get()->row();
		$email = $kepala->email; // Mendapatkan array dari input field 'email[]'
        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($email);
        $emailku = $this->db->get_where('tbl_pengguna', ['nip_nik' => $anggota->nip_nik_anggota])->row();
        $data['nama'] = $emailku->nama;
        $mesg  = $this->load->view('v_pengabdian/v_persetujuan_anggota/email_persetujuan_diterima', $data,true);
		$this->email->subject('Info Anggota !');
		$this->email->message($mesg);
        if ($this->email->send()) {
			$this->session->set_flashdata('success','Pengabdian berhasil diterima');
			redirect('dashboard');
        	 return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
	}

	public function persetujuan_pengabdian_anggota_tolak($id)
	{
		$data = [
			'status_anggota' 	=> 'Ditolak'
		];	
		$this->M_Pengabdian->update_persetujuan($id,$data);
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
		$kepala 		= $this->db->select('*')
									->from('tbl_anggota')
									->join('tbl_pengabdian', 'tbl_pengabdian.id_pengabdian = tbl_anggota.pengabdian_id')
									->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
									->where('tbl_anggota.id_anggota',$id)
									->get()->row();
		$anggota 		= $this->db->select('*')
									->from('tbl_anggota')
									->where('tbl_anggota.id_anggota',$id)
									->get()->row();
		$email = $kepala->email; // Mendapatkan array dari input field 'email[]'
        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($email);
        $emailku = $this->db->get_where('tbl_pengguna', ['nip_nik' => $anggota->nip_nik_anggota])->row();
        $data['nama'] = $emailku->nama;
        $mesg  = $this->load->view('v_pengabdian/v_persetujuan_anggota/email_persetujuan_ditolak', $data,true);
		$this->email->subject('Info Anggota !');
		$this->email->message($mesg);
        if ($this->email->send()) {
			$this->session->set_flashdata('success','Pengabdian berhasil ditolak');
			redirect('dashboard');
        	 return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
	}

	public function delete_anggota_dosen($id)
	{
		$this->M_Pengabdian->delete_anggota_dosen($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_anggota_mhs($id)
	{
		$this->M_Pengabdian->delete_anggota_mhs($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_draft($id)
	{
		$ids = $id;
				// Menghapus file lama jika ada
		$config['upload_path'] = './asset/file/pdf_proyek/';
				$existing_file = $this->M_Pengabdian->getFileName($ids); // Ganti "M_Pengabdian" dengan model yang sesuai
				if ($existing_file) {
					$file_path = $config['upload_path'] . $existing_file;
					if (file_exists($file_path)) {
						unlink($file_path);
					}
				}
		$this->db->where_in('pengabdian_id', $ids);
		$this->db->delete('tbl_anggota');
		$this->M_Pengabdian->delete_draft($id);
		$this->session->set_flashdata('success','Draft berhasil dihapus');
		redirect('dosen/tambah-pengabdian/1');
	}

	public function getDataDosen() {
		// memuat model
		
		// mengambil data dari model berdasarkan nilai yang dipilih
		$result = $this->M_Pengabdian->getDataDosen($_POST['option']);
		
		// mengirim hasil dalam format JSON
		echo json_encode($result);
	  }

	  public function getDataMhs() {
		// memuat model
		
		// mengambil data dari model berdasarkan nilai yang dipilih
		$result = $this->M_Pengabdian->getDataMhs($_POST['option']);
		
		// mengirim hasil dalam format JSON
		echo json_encode($result);
	  }

	  public function add_laporan_kemajuan()
	  {

		  $pengabdian = $this->input->post('id_pengabdian');
		  $luaran_hasil_id = htmlentities($this->input->post('luaran_hasil_id'));
		  $config['upload_path'] = './asset/file/laporan_kemajuan/';
		  $config['allowed_types'] = 'xlsx|xls|pdf|doc|docx'; // Sesuaikan dengan jenis file yang diizinkan
		//   $config['max_size'] = '100000'; // Ukuran file maksimum dalam kilobita
		  $config['encrypt_name']         = TRUE;
		  $this->load->library('upload', $config);
	  
		  $success_files = [];
		  $failed_files = [];
		  $insert_data = []; // Array untuk menyimpan data insert
	  
		  foreach ($_FILES['files']['name'] as $key => $filename) {
			  $_FILES['file']['name']     = $_FILES['files']['name'][$key];
			  $_FILES['file']['type']     = $_FILES['files']['type'][$key];
			  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$key];
			  $_FILES['file']['error']    = $_FILES['files']['error'][$key];
			  $_FILES['file']['size']     = $_FILES['files']['size'][$key];
	  
			  if ($this->upload->do_upload('file')) {
				  $success_files[] = $filename;
	  
				  // Tambahkan data insert ke dalam array
				  $insert_data[] = array(
					'nama_file'     => $_FILES['file']['name'],
					'luaran_hasil_id' => $luaran_hasil_id,
					'url_file'      => $this->upload->data("file_name")

				  );
			  } else {
				  $failed_files[] = $filename;
			  }
		  }
	  
		  if (!empty($insert_data)) {
			  // Lakukan multiple insert
			  $this->db->insert_batch('tbl_dok_lp_kemajuan', $insert_data);
			  $data = [
				'url_dok' => htmlentities($this->input->post('url_dok')),
				'deskripsi' => htmlentities($this->input->post('deskripsiku')),
				'luaran_hasil_id' => $luaran_hasil_id,
				'status_lp_kemajuan' => 'Belum Lengkap',
			];
			$this->db->insert('tbl_laporan_kemajuan', $data);
		  }else{
			$data = [
				'url_dok' => htmlentities($this->input->post('url_dok')),
				'deskripsi' => htmlentities($this->input->post('deskripsiku')),
				'luaran_hasil_id' => $luaran_hasil_id,
				'status_lp_kemajuan' => 'Belum Lengkap',
			];
			$this->db->insert('tbl_laporan_kemajuan', $data);
		  }
	  
		  if (!empty($success_files)) {
			  $success_message = "Berhasil mengunggah file: " . implode(", ", $success_files);
			  $this->session->set_flashdata('success', $success_message);
				redirect('dosen/data-laporan-kemajuan-pengabdian/'.$pengabdian);
		  }
	  
		  if (!empty($failed_files)) {
			  $failed_message = "Gagal mengunggah file/ file Kosong: " . implode(", ", $failed_files);
			  $this->session->set_flashdata('error', $failed_message);
				redirect('dosen/data-laporan-kemajuan-pengabdian/'.$pengabdian);
		  }
	  }
	  
	  public function add_laporan_kemajuan_akhir()
	  {

		  $pengabdian = $this->input->post('id_pengabdian');
		  $luaran_hasil_id = htmlentities($this->input->post('luaran_hasil_id'));
		  $config['upload_path'] = './asset/file/laporan_kemajuan_akhir/';
		  $config['allowed_types'] = 'xlsx|xls|pdf|doc|docx'; // Sesuaikan dengan jenis file yang diizinkan
		//   $config['max_size'] = '100000'; // Ukuran file maksimum dalam kilobita
		  $config['encrypt_name']         = TRUE;
		  $this->load->library('upload', $config);
	  
		  $success_files = [];
		  $failed_files = [];
		  $insert_data = []; // Array untuk menyimpan data insert
	  
		  foreach ($_FILES['files']['name'] as $key => $filename) {
			  $_FILES['file']['name']     = $_FILES['files']['name'][$key];
			  $_FILES['file']['type']     = $_FILES['files']['type'][$key];
			  $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$key];
			  $_FILES['file']['error']    = $_FILES['files']['error'][$key];
			  $_FILES['file']['size']     = $_FILES['files']['size'][$key];
	  
			  if ($this->upload->do_upload('file')) {
				  $success_files[] = $filename;
	  
				  // Tambahkan data insert ke dalam array
				  $insert_data[] = array(
					'nama_file'     => $_FILES['file']['name'],
					'url_file'      => $this->upload->data("file_name"),
					'luaran_hasil_id' => $luaran_hasil_id
				  );
			  } else {
				  $failed_files[] = $filename;
			  }
		  }
	  
		  if (!empty($insert_data)) {
			  // Lakukan multiple insert
			  $this->db->insert_batch('tbl_dok_lp_kemajuan_akhir', $insert_data);
			  $data = [
				'url_dok' => htmlentities($this->input->post('url_dok')),
				'deskripsi' => htmlentities($this->input->post('deskripsiku')),
				'luaran_hasil_id' => $luaran_hasil_id,
				'status_lp_kemajuan_akhir' => 'Belum Lengkap',

			];
			$this->db->insert('tbl_laporan_kemajuan_akhir', $data);
		  }else{
			$data = [
				'url_dok' => htmlentities($this->input->post('url_dok')),
				'deskripsi' => htmlentities($this->input->post('deskripsiku')),
				'luaran_hasil_id' => $luaran_hasil_id,
				'status_lp_kemajuan_akhir' => 'Belum Lengkap',

			];
			$this->db->insert('tbl_laporan_kemajuan_akhir', $data);
		  }
	  
		  if (!empty($success_files)) {
			  $success_message = "Berhasil mengunggah file: " . implode(", ", $success_files);
			  $this->session->set_flashdata('success', $success_message);
				redirect('dosen/data-laporan-kemajuan-akhir-pengabdian/'.$pengabdian);
		  }
	  
		  if (!empty($failed_files)) {
			  $failed_message = "Gagal mengunggah file/ file Kosong: " . implode(", ", $failed_files);
			  $this->session->set_flashdata('error', $failed_message);
				redirect('dosen/data-laporan-kemajuan-akhir-pengabdian/'.$pengabdian);
		  }
	  }

	  public function delete_lp_kemajuan($id)
	  {
		  $ids = $id;
				  // Menghapus file lama jika ada
		  $config['upload_path'] = './asset/file/laporan_kemajuan/';
				  $existing_file = $this->M_Pengabdian->getFileNameLpKemajuan($ids); // Ganti "M_Pengabdian" dengan model yang sesuai
				  if ($existing_file) {
					  $file_path = $config['upload_path'] . $existing_file;
					  if (file_exists($file_path)) {
						  unlink($file_path);
					  }
				  }
		  $this->db->where_in('luaran_hasil_id', $ids);
		  $this->db->delete('tbl_laporan_kemajuan');
		  $this->db->where_in('luaran_hasil_id', $ids);
		  $this->db->delete('tbl_dok_lp_kemajuan');
		  $this->session->set_flashdata('success','Laporan Kemajuan berhasil dihapus');
		  return redirect($_SERVER['HTTP_REFERER']);
	  }

	  public function delete_lp_kemajuan_akhir($id)
	  {
		  $ids = $id;
				  // Menghapus file lama jika ada
		  $config['upload_path'] = './asset/file/laporan_kemajuan_akhir/';
				  $existing_file = $this->M_Pengabdian->getFileNameLpKemajuanAkhir($ids); // Ganti "M_Pengabdian" dengan model yang sesuai
				  if ($existing_file) {
					  $file_path = $config['upload_path'] . $existing_file;
					  if (file_exists($file_path)) {
						  unlink($file_path);
					  }
				  }
		  $this->db->where_in('luaran_hasil_id', $ids);
		  $this->db->delete('tbl_laporan_kemajuan_akhir');
		  $this->db->where_in('luaran_hasil_id', $ids);
		  $this->db->delete('tbl_dok_lp_kemajuan_akhir');
		  $this->session->set_flashdata('success','Laporan Kemajuan Akhir berhasil dihapus');
		  return redirect($_SERVER['HTTP_REFERER']);
	  }

	  public function upload_laporan_kemajuan()
	  {
		  $id =  $this->input->post('pengabdian');
		  $config['upload_path']          = './asset/file/laporan_kemajuan/';
		  $config['allowed_types']        = 'pdf|doc|docx';
		//   $config['max_size']             = 3000;
		  $config['encrypt_name']			= TRUE;
		  $this->load->library('upload', $config);
		  $existing_file = $this->M_Pengabdian->getFileNameULPKemajuan($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		  if ($existing_file) {
			  $file_path = $config['upload_path'] . $existing_file;
			  if (file_exists($file_path)) {
				  unlink($file_path);
			  }
		  }
		  if ( ! $this->upload->do_upload('url'))
		  {
			  $this->session->set_flashdata('error', 'File tidak didukung !');
			  redirect('dosen/data-laporan-kemajuan-pengabdian/' . $id);
		  }else{
		  $data = [
			'nama_file_laporan_kemajuan' => $_FILES['url']['name'],
			'url_file_laporan_kemajuan' => $this->upload->data("file_name"),
			'url_file_laporan_kemajuan_akhir' => 'Tidak Ada',
			'nama_file_laporan_kemajuan_akhir' => 'Tidak Ada',
			'url_file_laporan_keuangan' => 'Tidak Ada',
			'nama_file_laporan_keuangan' => 'Tidak Ada',
			'pengabdian_id' => $id,
			'penelitian_id' => 0,
		  ];
		  $this->db->insert('tbl_upload_laporan',$data);
		  $this->session->set_flashdata('success','Data berhasil ditambah');
		  redirect('dosen/data-laporan-kemajuan-pengabdian/' . $id);
		  }
	  }
	  public function delete_up_lp_kemajuan($id)
	  {
		$existing_file = $this->M_Pengabdian->getFileNameULPKemajuanD($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		  $this->db->where_in('id_up_laporan', $id);
		  $this->db->delete('tbl_upload_laporan');
		  $this->session->set_flashdata('success','Laporan upload Kemajuan berhasil dihapus');
		  return redirect($_SERVER['HTTP_REFERER']);
	  }
  
	  public function upload_laporan_kemajuan_akhir()
	  {
		  $id =  $this->input->post('pengabdian');
		  $config['upload_path']          = './asset/file/laporan_kemajuan_akhir/';
		  $config['allowed_types']        = 'pdf|doc|docx';
		//   $config['max_size']             = 3000;
		  $config['encrypt_name']			= TRUE;
		  $this->load->library('upload', $config);
		  $existing_file = $this->M_Pengabdian->getFileNameULPKemajuanAkhir($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		  if ($existing_file) {
			  $file_path = $config['upload_path'] . $existing_file;
			  if (file_exists($file_path)) {
				  unlink($file_path);
			  }
		  }
		  if ( ! $this->upload->do_upload('url'))
		  {
			  $this->session->set_flashdata('error', 'File tidak didukung !');
			  redirect('dosen/data-laporan-kemajuan-akhir-pengabdian/' . $id);
		  }else{
		  $data = [
			'nama_file_laporan_kemajuan_akhir' => $_FILES['url']['name'],
			'url_file_laporan_kemajuan_akhir' => $this->upload->data("file_name"),
			'url_file_laporan_kemajuan' => 'Tidak Ada',
			'nama_file_laporan_kemajuan' => 'Tidak Ada',
			'url_file_laporan_keuangan' => 'Tidak Ada',
			'nama_file_laporan_keuangan' => 'Tidak Ada',
			'pengabdian_id' => $id,
			'penelitian_id' => 0,

		  ];
		  $this->db->insert('tbl_upload_laporan',$data);
		  $this->session->set_flashdata('success','Data berhasil ditambah');
		  redirect('dosen/data-laporan-kemajuan-akhir-pengabdian/' . $id);
		  }
	  }
	  public function delete_up_lp_kemajuan_akhir($id)
	  {
		$existing_file = $this->M_Pengabdian->getFileNameULPKemajuanAkhirD($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		  $this->db->where_in('id_up_laporan', $id);
		  $this->db->delete('tbl_upload_laporan');
		  $this->session->set_flashdata('success','Laporan upload Kemajuan berhasil dihapus');
		  return redirect($_SERVER['HTTP_REFERER']);
	  }

	  public function upload_laporan_keuangan()
	  {
		  $id =  $this->input->post('pengabdian');
		  $config['upload_path']          = './asset/file/laporan_keuangan/';
		  $config['allowed_types']        = 'xlsx|xls|pdf|doc|docx';
		//   $config['max_size']             = 3000;
		  $config['encrypt_name']			= TRUE;
		  $this->load->library('upload', $config);
		  $existing_file = $this->M_Pengabdian->getFileNameULPKeuangan($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		  if ($existing_file) {
			  $file_path = $config['upload_path'] . $existing_file;
			  if (file_exists($file_path)) {
				  unlink($file_path);
			  }
		  }
		  if ( ! $this->upload->do_upload('url'))
		  {
			  $this->session->set_flashdata('error', 'File tidak didukung !');
			  redirect('dosen/data-laporan-keuangan-pengabdian/' . $id);
		  }else{
		  $data = [
			'nama_file_laporan_keuangan' => $_FILES['url']['name'],
			'url_file_laporan_keuangan' => $this->upload->data("file_name"),
			'url_file_laporan_kemajuan' => 'Tidak Ada',
			'nama_file_laporan_kemajuan' => 'Tidak Ada',
			'url_file_laporan_kemajuan_akhir' => 'Tidak Ada',
			'nama_file_laporan_kemajuan_akhir' => 'Tidak Ada',
			'pengabdian_id' => $id,
			'penelitian_id' => 0,

		  ];
		  $this->db->insert('tbl_upload_laporan',$data);
		  $this->session->set_flashdata('success','Data berhasil ditambah');
		  redirect('dosen/data-laporan-keuangan-pengabdian/' . $id);
		  }
	  }
	  public function delete_up_lp_keuangan($id)
	  {
		$existing_file = $this->M_Pengabdian->getFileNameULPKeuanganD($id); // Ganti "M_Pengabdian" dengan model yang sesuai
		if ($existing_file) {
			$file_path = $config['upload_path'] . $existing_file;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
		  $this->db->where_in('id_up_laporan', $id);
		  $this->db->delete('tbl_upload_laporan');
		  $this->session->set_flashdata('success','Laporan upload Keuangan berhasil dihapus');
		  return redirect($_SERVER['HTTP_REFERER']);
	  }

}
