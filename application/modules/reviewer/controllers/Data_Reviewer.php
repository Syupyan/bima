<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Reviewer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->library('form_validation');
		$this->load->model('M_Reviewer');
		$this->load->library('email');
		//load helper
		$this->load->helper('reviewer');
		$this->load->helper('access');
		check_reviewer();
		//data user yang login
		$this->user_login_data = $this->M_Reviewer->get_user_login_data();
	}

	public function halaman_v_reviewer_penelitian()
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian', 2)
													->get()->result_array();
		$data['penelitian1']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/v_reviewer_penelitian',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_data_penelitian_disahkan()
	{
		$data['title']					= 'Data Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_penelitian']	= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian']	= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_penelitian/dashboard_data/data_penelitian_disahkan/v_data_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_penelitian_disahkan($id)
	{
		$data['title']					= 'Data Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_penelitian']	= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian']	= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_tahun_aktif.id_thn', $id)
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/dashboard_data/data_penelitian_disahkan/tabel_penelitian/v_tabel_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}
	public function halaman_v_tabel_penelitian_disahkan_detail($id)
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('id_penelitian', $id)
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		$data['id']	 =			$this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_penelitian.id_penelitian', $id)
													->get()->row_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.penelitian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.penelitian_id =',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/dashboard_data/data_penelitian_disahkan/tabel_penelitian/d_tabel_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_tabel_penelitian_disahkan_hasil($id)
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->where('id_penelitian', $id)
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_penilaian_reviewer')
													->where('penelitian_id',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Kualitas Topik Penelitian
			<p>a. Inovasi dan kebaruan topik</p>
			<p>b. Kedalaman pemahaman peneliti terhadap topik</p>
			<p>c. Kesesuaian dengan RIP Politala</p>
			<p>d. Keselarasan dengan road map penelitian pengusul</p>',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kedalaman dan komplekstasi permasalahan</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Tujuan dan manfaat penelitian</p>
			<p>d. Urgensi topik peneitian dalam pemecahan masalah</p>',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Metode Penelitian
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
			'kriteria' => 'Peluang Luaran Penelitian
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
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get('tbl_penilaian_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		$data['id']	 =			$this->db->select('*')
												->from('tbl_penelitian')
												->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
												->where('id_penelitian', $id)
												->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/dashboard_data/data_penelitian_disahkan/tabel_penelitian/h_tabel_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_data_pengabdian_disahkan()
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		// $data['count_data_usulan_pengabdian_admin']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian_admin']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/dashboard_data/data_pengabdian_disahkan/v_data_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_pengabdian_disahkan($id)
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		// $data['count_data_usulan_pengabdian_admin']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian_admin']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/dashboard_data/data_pengabdian_disahkan/tabel_pengabdian/v_tabel_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_pengabdian_disahkan_detail($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/dashboard_data/data_pengabdian_disahkan/tabel_pengabdian/d_tabel_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_tabel_pengabdian_disahkan_hasil($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/dashboard_data/data_pengabdian_disahkan/tabel_pengabdian/h_tabel_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_reviewer_penelitian_detail($id)
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian', 2)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.penelitian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.penelitian_id =',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/v_reviewer_penelitian_detail',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_reviewer_penelitian_penilaian($id)
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitianku']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian', 2)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/v_reviewer_penelitian_penilaian',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_reviewer_pengabdian()
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian', 2)
													->get()->result_array();
		$data['pengabdian1']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_pengguna', 'tbl_pengabdian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/v_reviewer_pengabdian',$data);		
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_reviewer_pengabdian_detail($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
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
													->where('status_pengabdian', 2)
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
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/v_reviewer_pengabdian_detail',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_reviewer_pengabdian_penilaian($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdianku']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_pengabdian.tahun_id')
													->where('id_pengabdian', $id)
													->where('tbl_pengabdian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_pengabdian', 2)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('layouts/template/navbar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/v_reviewer_pengabdian_penilaian',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_penelitian_disahkan()
	{
		$data['title']					= 'Data Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;
		// $data['count_data_usulan_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_penelitian_admin']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->where('status_penelitian !=', 5)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/v_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_penelitian_disahkan_detail($id)
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_pengguna', 'tbl_penelitian.nip_nik_ketua = tbl_pengguna.nip_nik')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		$data['anggota_mhs']			=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
													->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
													// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		$data['luaran_usulan']				=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.penelitian_id =',$id)
													->get()->result_array();
		$data['luaran_usulan_tidak_wajib']		=  $this->db->select('*')
													->from('tbl_luaran_hasil')
													->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
													->where('tbl_luaran_hasil.penelitian_id =',$id)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/d_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_penelitian_disahkan_hasil($id)
	{
		$data['title']				= 'Data Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_penelitian')
		// 											->where('status_penelitian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_penilaian_reviewer')
													->where('penelitian_id',$id)
													->get()->result_array();
		$data['anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_anggota.penelitian_id',$id)
													->get()->result_array();
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Kualitas Topik Penelitian
			<p>a. Inovasi dan kebaruan topik</p>
			<p>b. Kedalaman pemahaman peneliti terhadap topik</p>
			<p>c. Kesesuaian dengan RIP Politala</p>
			<p>d. Keselarasan dengan road map penelitian pengusul</p>',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Perumusan Masalah
			<p>a. Kedalaman dan komplekstasi permasalahan</p>
			<p>b. Kemampuan melakukan problematisasi</p>
			<p>c. Tujuan dan manfaat penelitian</p>
			<p>d. Urgensi topik peneitian dalam pemecahan masalah</p>',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Metode Penelitian
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
			'kriteria' => 'Peluang Luaran Penelitian
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
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get('tbl_penilaian_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/h_penelitian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}
	
	public function halaman_v_pengabdian_disahkan()
	{
		$data['title']					= 'Data Pengabdian';
		$data['user_login_data'] 		= $this->user_login_data;
		// $data['count_data_usulan_pengabdian_admin']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian_admin']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
		// $data['count_data_usulan_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',1)
		// 											->get()->num_rows();
		// $data['count_data_dinilai_pengabdian']	= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',3)
		// 											->get()->num_rows();
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
													->where('status_pengabdian !=', 5)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/v_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_pengabdian_disahkan_detail($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/d_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}


	public function halaman_v_pengabdian_disahkan_hasil($id)
	{
		$data['title']				= 'Data Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/h_pengabdian_disahkan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_data_evaluasi_penelitian($id)
	{
		$data['title']				= 'Data Evaluasi Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;

		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['penelitian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/v_data_evaluasi_penelitian',$data);
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
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/data_penelitian/v_data_penelitian',$data);
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
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/data_penelitian/laporan_kemajuan/v_laporan_kemajuan',$data);
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
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/data_penelitian/laporan_kemajuan_akhir/v_laporan_kemajuan_akhir',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_keuangan_penelitian($id)
	{
		$data['title']				= 'Data Laporan Keuangan';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['lp_upload']		=  $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('nama_file_laporan_keuangan !=', "Tidak Ada")
													->where('url_file_laporan_keuangan !=', "Tidak Ada")
													->where('penelitian_id', $id)
													->get()->result_array();
		$data['penelitian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/data_penelitian/laporan_keuangan/v_laporan_keuangan',$data);
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
													->get()->result_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->where('id_penelitian',$id)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/data_penelitian/logbook/v_logbook',$data);
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
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/data_penelitian/logbook/logbook_dokumen/v_logbook_dokumen',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_data_evaluasi_pengabdian($id)
	{
		$data['title']				= 'Data Evaluasi Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;

		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['pengabdian'] = $id;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/v_data_evaluasi_pengabdian',$data);
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/data_pengabdian/v_data_pengabdian',$data);
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/data_pengabdian/laporan_kemajuan/v_laporan_kemajuan',$data);
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/data_pengabdian/laporan_kemajuan_akhir/v_laporan_kemajuan_akhir',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_lp_keuangan_pengabdian($id)
	{
		$data['title']				= 'Data Laporan Keuangan';
		$data['user_login_data'] 	= $this->user_login_data;
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
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/data_pengabdian/laporan_keuangan/v_laporan_keuangan',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_logbook_pengabdian($id)
	{
		$data['title']					= 'Logbook Penelitian';
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
													->get()->result_array();
		$data['pengabdian']				=  $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian',$id)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/data_pengabdian/logbook/v_logbook',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_logbook_dokumen_pengabdian($id)
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
													->where('logbook_id',$id)
													->get()->result_array();
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
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/data_pengabdian/logbook/logbook_dokumen/v_logbook_dokumen',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_evaluasi_kemajuan_penelitian($id)
	{
		$data['title']				= 'Kemajuan Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitianku']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->row_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_evaluasi_reviewer')
													->where('penelitian_id',$id)
													->get()->result_array();
		$data['evaluasi']				=  $this->db->select('*')
													->from('tbl_evaluasi_reviewer')
													->where('penelitian_id',$id)
													->get()->num_rows();
		$data['penelitian'] = $id;
		
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Persentase capaian pelaksanaan penelitian dari rencana yang ditetapkan.',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Kemajuan pencapaian luaran yang dijanjikan.',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Mutu dan potensi dampak hasil penelitian bidang keilmuan atau lingkupan/masyarakat.',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Kelayakan ketercapaian target penelitian dan luaran pada periode yang tersisa.',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Luaran tambahan yang telah dihasilkan atau sedang diupayakan.',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get('tbl_evaluasi_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/v_penelitian_disahkan_evaluasi',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_evaluasi_kemajuan_pengabdian($id)
	{
		$data['title']				= 'Kemajuan Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdianku']				=  $this->db->select('*')
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
													->from('tbl_evaluasi_reviewer')
													->where('pengabdian_id',$id)
													->get()->result_array();
		$data['evaluasi']				=  $this->db->select('*')
													->from('tbl_evaluasi_reviewer')
													->where('pengabdian_id',$id)
													->get()->num_rows();
		
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Persentase capaian pelaksanaan pengabdian dari rencana yang ditetapkan.',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Kemajuan pencapaian luaran yang dijanjikan.',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Mutu dan potensi dampak hasil pengabdian bidang keilmuan atau lingkupan/masyarakat.',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Kelayakan ketercapaian target pengabdian dan luaran pada periode yang tersisa.',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Luaran tambahan yang telah dihasilkan atau sedang diupayakan.',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('pengabdian_id', $id);
        $query = $this->db->get('tbl_evaluasi_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/v_pengabdian_disahkan_evaluasi',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_evaluasi_kemajuan_penelitian_akhir($id)
	{
		$data['title']				= 'Kemajuan Penelitian Akhir';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['penelitianku']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->row_array();
		$data['penelitian']				=  $this->db->select('*')
													->from('tbl_penelitian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_penelitian.tahun_id')
													->join('tbl_pengguna','tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
													->where('id_penelitian', $id)
													->where('tbl_penelitian.status_aktif', 'Disetujui')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('status_penelitian !=', 0)
													->where('status_penelitian !=', 1)
													->where('status_penelitian !=', 2)
													->where('status_penelitian !=', 3)
													->get()->row_array();
		$data['hasil']				=  $this->db->select('*')
													->from('tbl_evaluasi_akhir_reviewer')
													->where('penelitian_id',$id)
													->get()->result_array();
		$data['evaluasi']				=  $this->db->select('*')
													->from('tbl_evaluasi_akhir_reviewer')
													->where('penelitian_id',$id)
													->get()->num_rows();
		$data['penelitian'] = $id;
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Persentase capaian pelaksanaan penelitian dari rencana yang ditetapkan.',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Kemajuan pencapaian luaran yang dijanjikan.',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Mutu dan potensi dampak hasil penelitian bidang keilmuan atau lingkupan/masyarakat.',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Kelayakan ketercapaian target penelitian dan luaran pada periode yang tersisa.',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Luaran tambahan yang telah dihasilkan atau sedang diupayakan.',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('penelitian_id', $id);
        $query = $this->db->get('tbl_evaluasi_akhir_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_penelitian/penelitian_disahkan/v_penelitian_disahkan_evaluasi_akhir',$data);
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_evaluasi_kemajuan_pengabdian_akhir($id)
	{
		$data['title']				= 'Kemajuan Pengabdian Akhir';
		$data['user_login_data'] 	= $this->user_login_data;
		// $data['count_data_reviewer']		= $this->db->select('*')
		// 											->from('tbl_pengabdian')
		// 											->where('status_pengabdian',2)
		// 											->get()->num_rows();
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();											
		$data['pengabdianku']				=  $this->db->select('*')
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
													->from('tbl_evaluasi_akhir_reviewer')
													->where('pengabdian_id',$id)
													->get()->result_array();
		$data['evaluasi']				=  $this->db->select('*')
													->from('tbl_evaluasi_akhir_reviewer')
													->where('pengabdian_id',$id)
													->get()->num_rows();
		
		// Kirim data ke view
		$kriteria1 = array(
			'kriteria' => 'Persentase capaian pelaksanaan pengabdian dari rencana yang ditetapkan.',
		);
		
		$kriteria2 = array(
			'kriteria' => 'Kemajuan pencapaian luaran yang dijanjikan.',
		);
		
		$kriteria3 = array(
			'kriteria' => 'Mutu dan potensi dampak hasil pengabdian bidang keilmuan atau lingkupan/masyarakat.',
		);
		
		$kriteria4 = array(
			'kriteria' => 'Kelayakan ketercapaian target pengabdian dan luaran pada periode yang tersisa.',
		);
		
		$kriteria5 = array(
			'kriteria' => 'Luaran tambahan yang telah dihasilkan atau sedang diupayakan.',
		);
		$data['kriteria1'] = $kriteria1;
        $data['kriteria2'] = $kriteria2;
        $data['kriteria3'] = $kriteria3;
        $data['kriteria4'] = $kriteria4;
        $data['kriteria5'] = $kriteria5;
        $this->db->select_sum('nilai', 'total_nilai');
        $this->db->where('pengabdian_id', $id);
        $query = $this->db->get('tbl_evaluasi_akhir_reviewer');
        $data['total_nilai'] = $query->row()->total_nilai;
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_reviewer/v_reviewer_pengabdian/pengabdian_disahkan/v_pengabdian_disahkan_evaluasi_akhir',$data);
		$this->load->view('layouts/template/footer');
	}


	public function add_nilai_reviewer_penelitian()
	{
		$id = $this->input->post('penelitian_id');
		$id = $this->input->post('penelitian_id_1');
		
		$this->form_validation->set_rules('komentar_penelitian', 'Komentar Penelitian', 'required|min_length[1]', array(
			'required' => 'Kolom %s harus diisi.',
			'min_length' => 'Panjang %s minimal 1 karakter.'
		));
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('reviewer/penilaian-penelitian/'.$id);
		} else {
			$nm = $this->input->post('skor');
			$result = array();
			foreach ($nm as $key => $val) {
				$result[] = array(
					'penelitian_id' => $_POST['penelitian_id'][$key],
					'skor' => $_POST['skor'][$key],
					'bobot' => $_POST['bobot'][$key],
					'nilai' => $_POST['nilai'][$key],
					'pengabdian_id' => $_POST['pengabdian_id'][$key]
				);
			}
			$test = $this->db->insert_batch('tbl_penilaian_reviewer', $result);
			$data = [
				'komentar_penelitian' => htmlentities($this->input->post('komentar_penelitian')),
				'status_penelitian' => 3
			];
		
			$this->M_Reviewer->update_penelitian($id, $data);
			$kepala 		= $this->db->select('*')
										->from('tbl_pengguna')
										->where('role_id', 4)
										->get()->row();
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
			$email = $kepala->email; // Mendapatkan array dari input field 'email[]'
        	$this->email->initialize($config);
        	$this->email->from('pklict2022@gmail.com', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        	$this->email->to($email);
        	$emailku = $this->db->get_where('tbl_penelitian', ['id_penelitian' => $id])->row_array();
        	$data['nama'] = $emailku['judul'];
        	$mesg  = $this->load->view('v_reviewer/v_reviewer_penelitian/email_penilaian_reviewer', $data,true);
			$this->email->subject('Info Anggota !');
			$this->email->message($mesg);
        	if ($this->email->send()) {
				$this->session->set_flashdata('success', 'Nilai ditambah');
				redirect('reviewer/usulan-penelitian');
        	    die;
        	} else {
        	    echo $this->email->print_debugger();
        	    die;
        	}
		}

}

public function add_nilai_evaluasi_reviewer_penelitian()
{
	$id = $this->input->post('penelitian_id');
	$id = $this->input->post('penelitian_id_1');
	
	$this->form_validation->set_rules('komentar_evaluasi', 'Komentar Evaluasi', 'required|min_length[1]', array(
		'required' => 'Kolom %s harus diisi.',
		'min_length' => 'Panjang %s minimal 1 karakter.'
	));
	
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('error', validation_errors());
		redirect('reviewer/evaluasi-kemajuan-penelitian/'.$id);
	} else {
		$nm = $this->input->post('skor');
		$result = array();
		foreach ($nm as $key => $val) {
			$result[] = array(
				'penelitian_id' => $_POST['penelitian_id'][$key],
				'skor' => $_POST['skor'][$key],
				'bobot' => $_POST['bobot'][$key],
				'nilai' => $_POST['nilai'][$key],
				'pengabdian_id' => $_POST['pengabdian_id'][$key]
			);
		}
		$test = $this->db->insert_batch('tbl_evaluasi_reviewer', $result);
		$data = [
			'komentar_evaluasi' => htmlentities($this->input->post('komentar_evaluasi')),
		];
	
		$this->M_Reviewer->update_penelitian($id, $data);
		$this->session->set_flashdata('success', 'Evaluasi ditambah');
		redirect('reviewer/penelitian-disahkan');
	}

}

public function add_nilai_evaluasi_reviewer_penelitian_akhir()
{
	$id = $this->input->post('penelitian_id');
	$id = $this->input->post('penelitian_id_1');
	
	$this->form_validation->set_rules('komentar_evaluasi', 'Komentar Evaluasi', 'required|min_length[1]', array(
		'required' => 'Kolom %s harus diisi.',
		'min_length' => 'Panjang %s minimal 1 karakter.'
	));
	
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('error', validation_errors());
		redirect('reviewer/evaluasi-kemajuan-penelitian/'.$id);
	} else {
		$nm = $this->input->post('skor');
		$result = array();
		foreach ($nm as $key => $val) {
			$result[] = array(
				'penelitian_id' => $_POST['penelitian_id'][$key],
				'skor' => $_POST['skor'][$key],
				'bobot' => $_POST['bobot'][$key],
				'nilai' => $_POST['nilai'][$key],
				'pengabdian_id' => $_POST['pengabdian_id'][$key]
			);
		}
		$test = $this->db->insert_batch('tbl_evaluasi_akhir_reviewer', $result);
		$data = [
			'komentar_evaluasi_akhir' => htmlentities($this->input->post('komentar_evaluasi')),
		];
	
		$this->M_Reviewer->update_penelitian($id, $data);
		$this->session->set_flashdata('success', 'Evaluasi akhir ditambah');
		redirect('reviewer/penelitian-disahkan');
	}

}

public function add_nilai_reviewer_pengabdian()
{
	$id = $this->input->post('pengabdian_id');
	$id = $this->input->post('pengabdian_id_1');
	
	$this->form_validation->set_rules('komentar_pengabdian', 'Komentar Pengabdian', 'required|min_length[1]', array(
		'required' => 'Kolom %s harus diisi.',
		'min_length' => 'Panjang %s minimal 1 karakter.'
	));
	
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('error', validation_errors());
		redirect('reviewer/pengabdian-penelitian'.$id);
	} else {
		$nm = $this->input->post('skor');
		$result = array();
		foreach ($nm as $key => $val) {
			$result[] = array(
				'pengabdian_id' => $_POST['pengabdian_id'][$key],
				'skor' => $_POST['skor'][$key],
				'bobot' => $_POST['bobot'][$key],
				'nilai' => $_POST['nilai'][$key],
				'penelitian_id' => $_POST['penelitian_id'][$key]
			);
		}
		$test = $this->db->insert_batch('tbl_penilaian_reviewer', $result);
		
		$data = [
			'komentar_pengabdian' => htmlentities($this->input->post('komentar_pengabdian')),
			'status_pengabdian' => 3
		];
	
		$this->M_Reviewer->update_pengabdian($id, $data);
		$this->session->set_flashdata('success', 'Nilai ditambah');
		redirect('reviewer/usulan-pengabdian');
	}

}
public function add_nilai_evaluasi_reviewer_pengabdian()
{
	$id = $this->input->post('pengabdian_id');
	$id = $this->input->post('pengabdian_id_1');
	
	$this->form_validation->set_rules('komentar_evaluasi', 'Komentar Evaluasi', 'required|min_length[1]', array(
		'required' => 'Kolom %s harus diisi.',
		'min_length' => 'Panjang %s minimal 1 karakter.'
	));
	
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('error', validation_errors());
		redirect('reviewer/evaluasi-kemajuan-pengabdian/'.$id);
	} else {
		$nm = $this->input->post('skor');
		$result = array();
		foreach ($nm as $key => $val) {
			$result[] = array(
				'penelitian_id' => $_POST['penelitian_id'][$key],
				'skor' => $_POST['skor'][$key],
				'bobot' => $_POST['bobot'][$key],
				'nilai' => $_POST['nilai'][$key],
				'pengabdian_id' => $_POST['pengabdian_id'][$key]
			);
		}
		$test = $this->db->insert_batch('tbl_evaluasi_reviewer', $result);
		$data = [
			'komentar_evaluasi' => htmlentities($this->input->post('komentar_evaluasi')),
		];
	
		$this->M_Reviewer->update_pengabdian($id, $data);
		$this->session->set_flashdata('success', 'Evaluasi ditambah');
		redirect('reviewer/pengabdian-disahkan');
	}

}
public function add_nilai_evaluasi_reviewer_pengabdian_akhir()
{
	$id = $this->input->post('pengabdian_id');
	$id = $this->input->post('pengabdian_id_1');
	
	$this->form_validation->set_rules('komentar_evaluasi', 'Komentar Evaluasi', 'required|min_length[1]', array(
		'required' => 'Kolom %s harus diisi.',
		'min_length' => 'Panjang %s minimal 1 karakter.'
	));
	
	if ($this->form_validation->run() == false) {
		$this->session->set_flashdata('error', validation_errors());
		redirect('reviewer/evaluasi-kemajuan-pengabdian/'.$id);
	} else {
		$nm = $this->input->post('skor');
		$result = array();
		foreach ($nm as $key => $val) {
			$result[] = array(
				'penelitian_id' => $_POST['penelitian_id'][$key],
				'skor' => $_POST['skor'][$key],
				'bobot' => $_POST['bobot'][$key],
				'nilai' => $_POST['nilai'][$key],
				'pengabdian_id' => $_POST['pengabdian_id'][$key]
			);
		}
		$test = $this->db->insert_batch('tbl_evaluasi_akhir_reviewer', $result);
		$data = [
			'komentar_evaluasi_akhir' => htmlentities($this->input->post('komentar_evaluasi')),
		];
	
		$this->M_Reviewer->update_pengabdian($id, $data);
		$this->session->set_flashdata('success', 'Evaluasi akhir ditambah');
		redirect('reviewer/pengabdian-disahkan');
	}

}

public function status_lp_kemajuan()
{
	$id_lp_kemajuan = $this->input->get('id_lp_kemajuan');
	$status_lp_kemajuan = $this->input->get('status_lp_kemajuan');
	if ($status_lp_kemajuan == 'Sudah Sesuai') {
		$this->M_Reviewer->update_lp_kemajuan($id_lp_kemajuan,['status_lp_kemajuan' => 'Belum Lengkap']);
		$this->session->set_flashdata('success','Belum Lengkap');	
	}else{
		$this->M_Reviewer->update_lp_kemajuan($id_lp_kemajuan,['status_lp_kemajuan' => 'Sudah Sesuai']);
		$this->session->set_flashdata('success','Sudah Sesuai');
	}
}

public function status_lp_kemajuan_akhir()
{
	$id_lp_kemajuan = $this->input->get('id_lp_kemajuan');
	$status_lp_kemajuan = $this->input->get('status_lp_kemajuan_akhir');
	if ($status_lp_kemajuan == 'Sudah Sesuai') {
		$this->M_Reviewer->update_lp_kemajuan_akhir($id_lp_kemajuan,['status_lp_kemajuan_akhir' => 'Belum Lengkap']);
		$this->session->set_flashdata('success','Belum Lengkap');	
	}else{
		$this->M_Reviewer->update_lp_kemajuan_akhir($id_lp_kemajuan,['status_lp_kemajuan_akhir' => 'Sudah Sesuai']);
		$this->session->set_flashdata('success','Sudah Sesuai');
	}
}

}
