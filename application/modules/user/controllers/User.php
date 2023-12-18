<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		//load library 
		$this->load->library('form_validation');
		$this->load->library('email');
		//load model
		$this->load->model('M_User');
		//load helper
		$this->load->helper('user');
		$this->load->helper('access');
		check_access1();
		//data user yang login
		$this->user_login_data = $this->M_User->get_user_login_data();
	}

	public function halaman_v_profil()
	{
		$data['title']			= 'Profil Saya';
		$data['user_login_data'] = $this->user_login_data;
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
		$data['anggota']				=  $this->db->select('*')
										->from('tbl_pengguna')
										->get()->result_array();
		$data['setting']				=  $this->db->select('*')
										->from('tbl_setting')
										->where('id_setting',1)
										->get()->row_array();
		############# ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_user/user_profile',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_dashboard()
	{
		$data['title']			= 'Dashboard';
		$data['user_login_data'] = $this->user_login_data;
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
		// dashboard dosen
		$data['count_pengguna'] = $this->db->select('*')
										->from('tbl_pengguna')
										->get()->num_rows();
		$data['count_mahasiswa'] = $this->db->select('*')
										->from('tbl_mahasiswa')
										->get()->num_rows();
		$data['count_prodi'] = $this->db->select('*')
										->from('tbl_prodi')
										->get()->num_rows();
		// 
		// dashboard dosen
		$data['count_penelitian_ketua'] = $this->db->select('*')
													->from('tbl_penelitian')
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('status_penelitian !=', 0)
													->get()->num_rows();
		$data['count_penelitian_anggota'] = $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.status_anggota','Disetujui')
													->where('status_penelitian !=', 0)
													->get()->num_rows();
		$data['count_pengabdian_ketua'] = $this->db->select('*')
													->from('tbl_pengabdian')
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('status_pengabdian !=', 0)
													->get()->num_rows();
		$data['count_pengabdian_anggota'] = $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
													->where('tbl_anggota.status_anggota','Disetujui')
													->where('status_pengabdian !=', 0)
													->get()->num_rows();
		$data['count_penelitian_disahkan'] = $this->db->select('*')
													->from('tbl_penelitian')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->num_rows();
		$data['count_pengabdian_disahkan'] = $this->db->select('*')
													->from('tbl_pengabdian')
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->num_rows();
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
		$data['anggota']				=  $this->db->select('*')
													->from('tbl_pengguna')
													->get()->result_array();
		$data['setting']				=  $this->db->select('*')
														->from('tbl_setting')
														->where('id_setting',1)
														->get()->row_array();
// Mengambil jumlah penelitian yang disahkan berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_approved');
$this->db->from('tbl_penelitian p');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('p.nip_nik_ketua', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_penelitian', 4);
$this->db->group_by('ta.tahun_aktif');
$queryApproved = $this->db->get();
$resultPenelitianApproved = $queryApproved->result_array();

// Mengambil jumlah pengabdian yang disahkan berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_approved');
$this->db->from('tbl_pengabdian p');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('p.nip_nik_ketua', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_pengabdian', 4);
$this->db->group_by('ta.tahun_aktif');
$queryApproved = $this->db->get();
$resultPengabdianApproved = $queryApproved->result_array();

// Mengambil jumlah penelitian yang ditolak berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_rejected');
$this->db->from('tbl_penelitian p');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('p.nip_nik_ketua', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_penelitian', 5);
$this->db->group_by('ta.tahun_aktif');
$queryRejected = $this->db->get();
$resultPenelitianRejected = $queryRejected->result_array();

// Mengambil jumlah pengabdian yang ditolak berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_rejected');
$this->db->from('tbl_pengabdian p');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('p.nip_nik_ketua', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_pengabdian', 5);
$this->db->group_by('ta.tahun_aktif');
$queryRejected = $this->db->get();
$resultPengabdianRejected = $queryRejected->result_array();

// Menginisialisasi array untuk menyimpan data grafik
$data['penelitian_labels'] = array();
$data['penelitian_approved_data'] = array();
$data['penelitian_rejected_data'] = array();
$data['penelitian_colors'] = array('#36a2eb', '#ff6384');

// Memasukkan data persetujuan penelitian ke dalam array
foreach ($resultPenelitianApproved as $row) {
    $data['penelitian_labels'][] = $row['tahun_id'];
    $data['penelitian_approved_data'][] = $row['total_approved'];
}

// Memasukkan data penolakan penelitian ke dalam array
foreach ($resultPenelitianRejected as $row) {
    $index = array_search($row['tahun_id'], $data['penelitian_labels']);
    if ($index === false) {
        $data['penelitian_labels'][] = $row['tahun_id'];
        $data['penelitian_approved_data'][] = 0;
        $data['penelitian_rejected_data'][] = $row['total_rejected'];
    } else {
        $data['penelitian_rejected_data'][$index] = $row['total_rejected'];
    }
}

// Menginisialisasi array untuk menyimpan data grafik
$data['pengabdian_labels'] = array();
$data['pengabdian_approved_data'] = array();
$data['pengabdian_rejected_data'] = array();
$data['pengabdian_colors'] = array('#36a2eb', '#ff6384');

// Memasukkan data persetujuan pengabdian ke dalam array
foreach ($resultPengabdianApproved as $row) {
    $data['pengabdian_labels'][] = $row['tahun_id'];
    $data['pengabdian_approved_data'][] = $row['total_approved'];
}

// Memasukkan data penolakan pengabdian ke dalam array
foreach ($resultPengabdianRejected as $row) {
    $index = array_search($row['tahun_id'], $data['pengabdian_labels']);
    if ($index === false) {
        $data['pengabdian_labels'][] = $row['tahun_id'];
        $data['pengabdian_approved_data'][] = 0;
        $data['pengabdian_rejected_data'][] = $row['total_rejected'];
    } else {
        $data['pengabdian_rejected_data'][$index] = $row['total_rejected'];
    }
}
// Mengambil jumlah penelitian anggota yang disahkan berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_approved');
$this->db->from('tbl_anggota a');
$this->db->join('tbl_penelitian p', 'p.id_penelitian = a.penelitian_id');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('a.nip_nik_anggota', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_penelitian', 4);
$this->db->group_by('ta.tahun_aktif');
$queryApprovedPenelitianAnggota = $this->db->get();
$resultPenelitianApprovedAnggota = $queryApprovedPenelitianAnggota->result_array();

// Mengambil jumlah pengabdian anggota yang disahkan berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_approved');
$this->db->from('tbl_anggota a');
$this->db->join('tbl_pengabdian p', 'p.id_pengabdian = a.pengabdian_id');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('a.nip_nik_anggota', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_pengabdian', 4);
$this->db->group_by('ta.tahun_aktif');
$queryApprovedPengabdianAnggota = $this->db->get();
$resultPengabdianApprovedAnggota = $queryApprovedPengabdianAnggota->result_array();

// Mengambil jumlah penelitian anggota yang ditolak berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_rejected');
$this->db->from('tbl_anggota a');
$this->db->join('tbl_penelitian p', 'p.id_penelitian = a.penelitian_id');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('a.nip_nik_anggota', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_penelitian', 5);
$this->db->group_by('ta.tahun_aktif');
$queryRejectedPenelitianAnggota = $this->db->get();
$resultPenelitianRejectedAnggota = $queryRejectedPenelitianAnggota->result_array();

// Mengambil jumlah pengabdian anggota yang ditolak berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_rejected');
$this->db->from('tbl_anggota a');
$this->db->join('tbl_pengabdian p', 'p.id_pengabdian = a.pengabdian_id');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('a.nip_nik_anggota', $data['user_login_data']['nip_nik']);
$this->db->where('p.status_pengabdian', 5);
$this->db->group_by('ta.tahun_aktif');
$queryRejectedPengabdianAnggota = $this->db->get();
$resultPengabdianRejectedAnggota = $queryRejectedPengabdianAnggota->result_array();

// Menginisialisasi array untuk menyimpan data grafik penelitian anggota
$data['penelitian_anggota_labels'] = array();
$data['penelitian_anggota_approved_data'] = array();
$data['penelitian_anggota_rejected_data'] = array();
$data['penelitian_anggota_colors'] = array('#36a2eb', '#ff6384');

// Memasukkan data persetujuan penelitian anggota ke dalam array
foreach ($resultPenelitianApprovedAnggota as $row) {
    $data['penelitian_anggota_labels'][] = $row['tahun_id'];
    $data['penelitian_anggota_approved_data'][] = $row['total_approved'];
}

// Memasukkan data penolakan penelitian anggota ke dalam array
foreach ($resultPenelitianRejectedAnggota as $row) {
    $index = array_search($row['tahun_id'], $data['penelitian_anggota_labels']);
    if ($index === false) {
        $data['penelitian_anggota_labels'][] = $row['tahun_id'];
        $data['penelitian_anggota_approved_data'][] = 0;
        $data['penelitian_anggota_rejected_data'][] = $row['total_rejected'];
    } else {
        $data['penelitian_anggota_rejected_data'][$index] = $row['total_rejected'];
    }
}

// Menginisialisasi array untuk menyimpan data grafik pengabdian anggota
$data['pengabdian_anggota_labels'] = array();
$data['pengabdian_anggota_approved_data'] = array();
$data['pengabdian_anggota_rejected_data'] = array();
$data['pengabdian_anggota_colors'] = array('#36a2eb', '#ff6384');

// Memasukkan data persetujuan pengabdian anggota ke dalam array
foreach ($resultPengabdianApprovedAnggota as $row) {
    $data['pengabdian_anggota_labels'][] = $row['tahun_id'];
    $data['pengabdian_anggota_approved_data'][] = $row['total_approved'];
}

// Memasukkan data penolakan pengabdian anggota ke dalam array
foreach ($resultPengabdianRejectedAnggota as $row) {
    $index = array_search($row['tahun_id'], $data['pengabdian_anggota_labels']);
    if ($index === false) {
        $data['pengabdian_anggota_labels'][] = $row['tahun_id'];
        $data['pengabdian_anggota_approved_data'][] = 0;
        $data['pengabdian_anggota_rejected_data'][] = $row['total_rejected'];
    } else {
        $data['pengabdian_anggota_rejected_data'][$index] = $row['total_rejected'];
    }
}
############################### ======= #####################
// Mengambil jumlah pengguna berdasarkan tahun_id
// Mengambil jumlah pengguna berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_pengguna');
$this->db->from('tbl_pengguna p');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->group_by('ta.tahun_aktif');
$queryPengguna = $this->db->get();
$resultPengguna = $queryPengguna->result_array();

// Menginisialisasi array untuk menyimpan data grafik
$data['labels'] = array();
$data['total_pengguna'] = array();

// Memasukkan data pengguna ke dalam array
foreach ($resultPengguna as $row) {
    $data['labels'][] = $row['tahun_id'];
    $data['total_pengguna'][] = $row['total_pengguna'];
}

// Mengambil tahun terkini
$currentYear = date('Y');
$chartData = array();
$chartLabels = array();

// Filter data berdasarkan tahun terkini dan tahun selama 4 tahun ke depan
for ($i = $currentYear; $i <= $currentYear + 4; $i++) {
    $index = array_search($i, $data['labels']);
    if ($index !== false) {
        $chartLabels[] = $data['labels'][$index];
        $chartData[] = $data['total_pengguna'][$index];
    } else {
        $chartLabels[] = $i;
        $chartData[] = 0;
    }
}

// Menyimpan data yang akan ditampilkan dalam diagram
$data['chartLabels'] = $chartLabels;
$data['chartData'] = $chartData;
####################################================##############
// Mengambil jumlah mahasiswa berdasarkan tahun_id
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_mahasiswa');
$this->db->from('tbl_mahasiswa m');
$this->db->join('tbl_tahun_aktif ta', 'm.tahun_id = ta.id_thn');
$this->db->group_by('ta.tahun_aktif');
$queryMahasiswa = $this->db->get();
$resultMahasiswa = $queryMahasiswa->result_array();

// Menginisialisasi array untuk menyimpan data grafik
$data['mahasiswaChartLabels'] = array();
$data['mahasiswaChartData'] = array();

// Memasukkan data mahasiswa ke dalam array
foreach ($resultMahasiswa as $row) {
    $data['mahasiswaChartLabels'][] = $row['tahun_id'];
    $data['mahasiswaChartData'][] = $row['total_mahasiswa'];
}

// Mengambil tahun terkini
$currentYear = date('Y');
$chartData = array();
$chartLabels = array();

// Filter data berdasarkan tahun terkini dan tahun selama 4 tahun ke depan
for ($i = $currentYear; $i <= $currentYear + 4; $i++) {
    $index = array_search($i, $data['mahasiswaChartLabels']);
    if ($index !== false) {
        $chartLabels[] = $data['mahasiswaChartLabels'][$index];
        $chartData[] = $data['mahasiswaChartData'][$index];
    } else {
        $chartLabels[] = $i;
        $chartData[] = 0;
    }
}

// Menyimpan data yang akan ditampilkan dalam diagram
$data['mahasiswaChartLabels'] = $chartLabels;
$data['mahasiswaChartData'] = $chartData;
###########################################################
$this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_penelitian');
$this->db->from('tbl_penelitian p');
$this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
$this->db->where('p.status_penelitian', 4);
$this->db->group_by('ta.tahun_aktif');
$this->db->order_by('ta.tahun_aktif');
$queryPenelitian = $this->db->get();
$resultPenelitian = $queryPenelitian->result_array();

// Menginisialisasi array untuk menyimpan data grafik
$data['penelitianChartLabels'] = array();
$data['penelitianChartData'] = array();

// Memasukkan data penelitian ke dalam array
foreach ($resultPenelitian as $row) {
    $data['penelitianChartLabels'][] = $row['tahun_id'];
    $data['penelitianChartData'][] = $row['total_penelitian'];
}

// Mengambil tahun terkini
$currentYear = date('Y');
$chartData = array();
$chartLabels = array();

// Filter data berdasarkan tahun terkini dan tahun selama 4 tahun ke depan
for ($i = $currentYear; $i <= $currentYear + 4; $i++) {
    $index = array_search($i, $data['penelitianChartLabels']);
    if ($index !== false) {
        $chartLabels[] = $data['penelitianChartLabels'][$index];
        $chartData[] = $data['penelitianChartData'][$index];
    } else {
        $chartLabels[] = $i;
        $chartData[] = 0;
    }
}

// Menyimpan data yang akan ditampilkan dalam diagram
$data['penelitianChartLabels'] = $chartLabels;
$data['penelitianChartData'] = $chartData;
##########################################################
   // Mengambil jumlah pengguna berdasarkan tahun_id
   $this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_pengabdian');
   $this->db->from('tbl_pengabdian p');
   $this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
   $this->db->where('p.status_pengabdian', 4); // Filter berdasarkan status_pengabdian = 4
   $this->db->group_by('ta.tahun_aktif');
   $queryPengabdian = $this->db->get();
   $resultPengabdian = $queryPengabdian->result_array();

   // Menginisialisasi array untuk menyimpan data grafik
   $data['pengabdianChartLabels'] = array();
   $data['pengabdianChartData'] = array();

   // Memasukkan data pengabdian ke dalam array
   foreach ($resultPengabdian as $row) {
	   $data['pengabdianChartLabels'][] = $row['tahun_id'];
	   $data['pengabdianChartData'][] = $row['total_pengabdian'];
   }

   // Mengambil tahun terkini
   $currentYear = date('Y');
   $chartData = array();
   $chartLabels = array();

   // Filter data berdasarkan tahun terkini dan tahun selama 4 tahun ke depan
   for ($i = $currentYear; $i <= $currentYear + 4; $i++) {
	   $index = array_search($i, $data['pengabdianChartLabels']);
	   if ($index !== false) {
		   $chartLabels[] = $data['pengabdianChartLabels'][$index];
		   $chartData[] = $data['pengabdianChartData'][$index];
	   } else {
		   $chartLabels[] = $i;
		   $chartData[] = 0;
	   }
   }

   // Menyimpan data yang akan ditampilkan dalam diagram
   $data['pengabdianChartLabels'] = $chartLabels;
   $data['pengabdianChartData'] = $chartData;
###########################################################################
    // Mengambil jumlah pengguna berdasarkan tahun_id
    $this->db->select('ta.tahun_aktif as tahun_id, COUNT(*) as total_pengabdian');
    $this->db->from('tbl_pengabdian p');
    $this->db->join('tbl_tahun_aktif ta', 'p.tahun_id = ta.id_thn');
    $this->db->where('p.status_pengabdian', 4); // Filter berdasarkan status_pengabdian = 4
    $this->db->group_by('ta.tahun_aktif');
    $queryPengabdian = $this->db->get();
    $resultPengabdian = $queryPengabdian->result_array();

    // Menginisialisasi array untuk menyimpan data grafik
    $data['pengabdianChartLabels'] = array();
    $data['pengabdianChartData'] = array();

    // Memasukkan data pengabdian ke dalam array
    foreach ($resultPengabdian as $row) {
        $data['pengabdianChartLabels'][] = $row['tahun_id'];
        $data['pengabdianChartData'][] = $row['total_pengabdian'];
    }

    // Mengambil tahun terkini
    $currentYear = date('Y');
    $chartData = array();
    $chartLabels = array();

    // Filter data berdasarkan tahun terkini dan tahun selama 4 tahun ke depan
    for ($i = $currentYear; $i <= $currentYear + 4; $i++) {
        $index = array_search($i, $data['pengabdianChartLabels']);
        if ($index !== false) {
            $chartLabels[] = $data['pengabdianChartLabels'][$index];
            $chartData[] = $data['pengabdianChartData'][$index];
        } else {
            $chartLabels[] = $i;
            $chartData[] = 0;
        }
    }

    // Menyimpan data yang akan ditampilkan dalam diagram
    $data['pengabdianChartLabels'] = $chartLabels;
    $data['pengabdianChartData'] = $chartData;

		############# ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_dashboard/v_dashboard',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_dashboard_p3m()
	{
		$data['title']			= 'Dashboard';
		$data['user_login_data'] = $this->user_login_data;
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
		// dashboard dosen
		$data['count_pengguna'] = $this->db->select('*')
										->from('tbl_pengguna')
										->get()->num_rows();
		$data['count_mahasiswa'] = $this->db->select('*')
										->from('tbl_mahasiswa')
										->get()->num_rows();
		$data['count_prodi'] = $this->db->select('*')
										->from('tbl_prodi')
										->get()->num_rows();
		// 
		// dashboard dosen
		$data['count_penelitian_ketua'] = $this->db->select('*')
													->from('tbl_penelitian')
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->num_rows();
		$data['count_penelitian_anggota'] = $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_anggota', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->num_rows();
		$data['count_pengabdian_ketua'] = $this->db->select('*')
													->from('tbl_pengabdian')
													->where('nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->num_rows();
		$data['count_pengabdian_anggota'] = $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_anggota', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
													->where('tbl_anggota.nip_nik_anggota',$data['user_login_data']['nip_nik'])
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->num_rows();
		$data['count_penelitian_disahkan'] = $this->db->select('*')
													->from('tbl_penelitian')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->num_rows();
		$data['count_pengabdian_disahkan'] = $this->db->select('*')
													->from('tbl_pengabdian')
													->where('status_pengabdian !=', 0)
													->where('status_pengabdian !=', 1)
													->where('status_pengabdian !=', 2)
													->where('status_pengabdian !=', 3)
													->get()->num_rows();
		$data['ketua_penelitian'] 					= $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->get()->row_array();
		$data['ketua_pengabdian'] 					= $this->db->select('*')
														->from('tbl_pengabdian')
														->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
														->get()->row_array();
		$data['anggota']				=  $this->db->select('*')
													->from('tbl_pengguna')
													->get()->result_array();
		$data['setting']				=  $this->db->select('*')
														->from('tbl_setting')
														->where('id_setting',1)
														->get()->row_array();
		check_p3m();
		############# ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_dashboard/v_p3m',$data);
		$this->load->view('layouts/template/footer');
	}

	public function aktivasi_user()
	{
		$id = $this->input->post('id');
		if (!empty($this->input->post('newnidn'))) {
			$nidn = $this->input->post('newnidn');
		}else{
			$nidn = $this->input->post('oldnidn');
		}
		$data = [
			'nidn_nidk' => $nidn,
			'nama' => htmlentities($this->input->post('nama')),
			'jk' => $this->input->post('jk'),
			'alamat' => htmlentities($this->input->post('alamat')),
			'pengguna_status' => 1

		]; 
		$this->session->set_userdata($nip_nik);
		$this->M_User->update_user($id,$data);
		$this->session->set_flashdata('success','Data berhasil diubah');
		redirect('dashboard');
	}


	

	public function edit_profile()
	{
		$data['title']			= 'Edit Profil';
		$data['user_login_data'] = $this->user_login_data;
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
		$data['anggota']				=  $this->db->select('*')
										->from('tbl_pengguna')
										->get()->result_array();
		$data['setting']				=  $this->db->select('*')
										->from('tbl_setting')
										->where('id_setting',1)
										->get()->row_array();
		############# ============= ##############
		edit_profile_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/template/header',$data);
			$this->load->view('layouts/template/sidebar',$data);
			$this->load->view('v_user/user_edit_profile',$data);
			$this->load->view('layouts/template/footer');
		}else{
			$nip_nik = $this->input->post('nip_nik');
			$old_img = $this->input->post('old_img');
			////////////////////////////////////////
			if (!empty($_FILES['file']['name'])) {
				$img = $this->M_User->upload("img/profile","png|jpg|jpeg|gif|jfif");
				$this->M_User->resize_img('profile/'.$img,'500','500');
				if ($old_img!="user.png"){
					unlink(FCPATH.'./asset/img/profile/'.$old_img);
				}	
			}else{
				$img = $this->input->post('old_img');
			}
			/////////////////////////////////////////
			$nip_nik= $this->input->post('nip_nik_1');
			$nip_nik2= $this->input->post('nip_nik_2');
			if($data['user_login_data']['nip_nik'] == $nip_nik){
			$data_user = [
				'nama' =>  htmlentities($this->input->post('nama')),
				'nip_nik' =>  htmlentities($this->input->post('nip_nik_1')),
				'nidn_nidk' =>  htmlentities($this->input->post('nidn_nidk')),
				'foto_profil'	=>	$img,
				'jk' 	=> htmlentities($this->input->post('jk')),
				'alamat' 	=> htmlentities($this->input->post('alamat'))
			];
			$this->M_User->update_user($nip_nik2,$data_user);
			$this->session->set_flashdata('success', 'Akun berhasil di edit');
			redirect('user');
		}else{
			$data_user = [
				'nama' =>  htmlentities($this->input->post('nama')),
				'nip_nik' =>  htmlentities($this->input->post('nip_nik_1')),
				'nidn_nidk' =>  htmlentities($this->input->post('nidn_nidk')),
				'foto_profil'	=>	$img,
				'jk' 	=> htmlentities($this->input->post('jk')),
				'alamat' 	=> htmlentities($this->input->post('alamat'))
			];
			$this->M_User->update_user($nip_nik2,$data_user);
			$this->session->unset_userdata(["nip_nik","nip_nik"]);
			$this->session->set_flashdata('info','Anda berhasil merubah nip dan nik, dan terlogout otomatis !');
			redirect('login');
			}
		}
	}

	public function change_password()
	{
		$data['title']			= 'Ubah Password';
		$data['user_login_data'] = $this->user_login_data;
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
		$data['anggota']				=  $this->db->select('*')
										->from('tbl_pengguna')
										->get()->result_array();
		$data['setting']				=  $this->db->select('*')
										->from('tbl_setting')
										->where('id_setting',1)
										->get()->row_array();
		############# ============= ##############
		change_password_validation();
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('layouts/template/header',$data);
			$this->load->view('layouts/template/sidebar',$data);
			$this->load->view('v_user/user_change_password',$data);
			$this->load->view('layouts/template/footer');	
		} else {
			$nip_nik 		= $this->input->post('nip_nik');
			$old_password 	= $this->input->post('old_password');// password hash 
			$your_password 	= $this->input->post('your_password'); // password sekarang
			$new_password 	= $this->input->post('new_password'); // password baru
			if (!password_verify($new_password, $old_password)) {
				if (password_verify($your_password, $old_password)) {
					$this->M_User->update_user($nip_nik,["password" => password_hash($new_password, PASSWORD_DEFAULT)]);
					$this->session->set_flashdata('success', 'Password anda berhasil diperbarui');
					redirect('user/change-password');
				}else{
					$this->session->set_flashdata('warning', 'Password yang anda masukan salah');
					redirect('user/change-password');
				}
			}else{
				$this->session->set_flashdata('warning', 'Password tidak boleh sama dengan password sekarang');
				redirect('user/change-password');
			}
		}
	}

	public function status_pesan()
	{
		$id = $this->input->post('nip_nik');
		$data = [
			'status_pesan' => 0

		]; 
		$this->M_User->update_user($id,$data);
		redirect('dashboard');
	}

	public function status_pesan_anggota()
	{
		$id = $this->input->post('nip_nik');
		$data = [
			'status_pesan' => 0

		]; 
		$this->M_User->update_anggota($id,$data);
		redirect('dashboard');
	}
	
	public function aktivasi_email()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_unique_email', array(
			'required' => 'Kolom %s harus diisi.',
			'valid_email' => 'Kolom %s harus berisi email yang valid.',
			'check_unique_email' => 'Email sudah digunakan pengguna lain.'
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('user');
		}
		
		$email = $this->input->post('email');
		$type = $this->input->post('nip_nik');
		
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('tbl_pengguna_token', $user_token);
		$this->_sendEmailAktivasi($token, $type);
		$this->session->set_flashdata('success', 'Silahkan periksa email anda!');
		redirect('user');
	}
	
	public function check_unique_email($email)
	{
		$existingEmail = $this->db->get_where('tbl_pengguna', ['email' => $email])->row();
		if ($existingEmail) {
			$this->form_validation->set_message('check_unique_email', 'Email sudah digunakan pengguna lain.');
			return false;
		}
		return true;
	}
	private function _sendEmailAktivasi($token, $type)
    {
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
        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($this->input->post('email'));
        $data = $this->db->select('*')
		->from('tbl_pengguna')
		->where('nip_nik',$type)
		->get()->row_array();
        $data['nama'] = $data['nama'];
        $email = $this->input->post('email');
        $data['link'] = base_url() . 'user/aktivasi?email=' . $this->input->post('email') . '&token=' . urlencode($token).'&id='.$type;
        $mesg  = $this->load->view('v_user/email_aktivasi', $data,true);
            $this->email->subject('Aktivasi Email');
            $this->email->message($mesg);
            // $this->email->message('Halo, '.$email.'<br> Jika anda merasa <strong>tidak melakukan hal ini</strong>, maka <strong>abaikan</strong> pesan ini !<br> Klik tautan berikut untuh merubah password anda: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah Password</a><br><strong style="color: green;">*Tautan ini hanya berlaku 1 jam.</strong><br><strong style="color: red;">*Harap tidak membagikan tautan ini kepada siapapun !</strong>');
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

	public function aktivasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $id = $this->input->get('id');
            $user_token = $this->db->get_where('tbl_pengguna_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->session->set_userdata('id', $id);
                    $this->db->delete('tbl_pengguna_token', ['email' => $email]);
                    $this->changeemailaktivasi();
                } else {
                    $this->db->delete('tbl_pengguna_token', ['email' => $email]);
                    $this->session->set_flashdata('warning','Aktivasi gagal, Tautan sudah Kadaluarsa !');
            redirect('user');
                }
            } else {
                $this->session->set_flashdata('warning','Tautan salah atau Sudah tidak berlaku !');
                redirect('user');
            }
    }

	public function ubah_email()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_unique_email', array(
			'required' => 'Kolom %s harus diisi.',
			'valid_email' => 'Kolom %s harus berisi email yang valid.',
			'check_unique_email' => 'Email sudah ada dalam database.'
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('user');
		}
		
		$email = $this->input->post('email');
		$type = $this->input->post('nip_nik');
		
		$token = base64_encode(random_bytes(32));
		$user_token = [
			'email' => $email,
			'token' => $token,
			'date_created' => time()
		];
		$this->db->insert('tbl_pengguna_token', $user_token);
		$this->_sendEmailUbah($token, $type);
		$this->session->set_flashdata('success', 'Silahkan periksa email anda!');
		redirect('user');
	}

	private function _sendEmailUbah($token, $type)
    {
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
        $this->email->initialize($config);
        $this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($this->input->post('email'));
        $emailku = $this->db->select('*')
		->from('tbl_pengguna')
		->where('nip_nik',$type)
		->get()->row_array();
        $data['nama'] = $emailku['nama'];
        $email = $this->input->post('email');
        $data['link'] = base_url() . 'user/ubah?email=' . $this->input->post('email') . '&token=' . urlencode($token).'&id='.$type;
        $mesg  = $this->load->view('v_user/email_ubah', $data,true);
            $this->email->subject('Ubah Email');
            $this->email->message($mesg);
            // $this->email->message('Halo, '.$email.'<br> Jika anda merasa <strong>tidak melakukan hal ini</strong>, maka <strong>abaikan</strong> pesan ini !<br> Klik tautan berikut untuh merubah password anda: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah Password</a><br><strong style="color: green;">*Tautan ini hanya berlaku 1 jam.</strong><br><strong style="color: red;">*Harap tidak membagikan tautan ini kepada siapapun !</strong>');
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

	public function ubah()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $id = $this->input->get('id');

            $user_token = $this->db->get_where('tbl_pengguna_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->session->set_userdata('id', $id);
                    $this->db->delete('tbl_pengguna_token', ['email' => $email]);
                    $this->changeemailubah();
                } else {
                    $this->db->delete('tbl_pengguna_token', ['email' => $email]);
                    $this->session->set_flashdata('warning','Ubah Email gagal, Tautan sudah Kadaluarsa !');
            redirect('user');
                }
            } else {
                $this->session->set_flashdata('warning','Tautan salah atau Sudah tidak berlaku !');
                redirect('user');
            }
    }
	
	public function changeemailaktivasi()
	{
		$newEmail = $this->session->userdata('reset_email'); // Mengambil email baru dari sesi
		$nip_nik = $this->session->userdata('id'); // Mengambil email baru dari sesi
		$this->db->set('email', $newEmail); // Mengubah kolom email dengan email baru
		$this->db->where('nip_nik', $nip_nik); // Menggunakan email lama sebagai kondisi
		$this->db->update('tbl_pengguna'); // Memperbarui tabel pengguna
		$this->session->unset_userdata('reset_email'); // Menghapus data sesi reset_email
		$this->session->unset_userdata('id'); // Menghapus data sesi reset_email
		$this->session->set_flashdata('success', 'Email Anda berhasil diaktivasi !'); // Menampilkan pesan sukses
		redirect('user'); // Mengarahkan ke halaman login
	}

	public function changeemailubah()
	{
		$newEmail = $this->session->userdata('reset_email'); // Mengambil email baru dari sesi
		$nip_nik = $this->session->userdata('id'); // Mengambil email baru dari sesi
		$this->db->set('email', $newEmail); // Mengubah kolom email dengan email baru
		$this->db->where('nip_nik', $nip_nik); // Menggunakan email lama sebagai kondisi
		$this->db->update('tbl_pengguna'); // Memperbarui tabel pengguna
		$this->session->unset_userdata('reset_email'); // Menghapus data sesi reset_email
		$this->session->unset_userdata('id'); // Menghapus data sesi reset_email
		$this->session->set_flashdata('success', 'Email Anda berhasil diubah !'); // Menampilkan pesan sukses
		redirect('user'); // Mengarahkan ke halaman login
	}

	public function download_file($folder, $file_name) {
		// Daftar folder yang diizinkan beserta path-nya
		$allowed_folders = array(
			'template' => './asset/file/template/',
			'pdf_proyek' => './asset/file/pdf_proyek/',
			'laporan_kemajuan' => './asset/file/laporan_kemajuan/',
			'laporan_kemajuan_akhir' => './asset/file/laporan_kemajuan_akhir/',
			'laporan_keuangan' => './asset/file/laporan_keuangan/',
			'logbook_file' => './asset/file/logbook/file/',
			'logbook_foto' => './asset/file/logbook/foto/',
			// Tambahkan folder lainnya sesuai kebutuhan
		);
	
		// Pastikan folder yang diminta diizinkan
		if (isset($allowed_folders[$folder])) {
			$file_path = $allowed_folders[$folder] . $file_name;
	
			// Periksa apakah file ada
			if (file_exists($file_path)) {
				// Memulai proses unduh
				$this->load->helper('download'); // Memastikan helper download di-load
				force_download($file_name, file_get_contents($file_path));
			} else {
				redirect('not-found');
			}
		} else {
			redirect('not-found');
		}
	}
	
	
}
