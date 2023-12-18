<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Master_Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->library('form_validation');
		$this->load->library('security');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Master_Pengguna');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_data_pengguna()
	{
		$data['title']					= 'Rekap Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/data_pengguna',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_pengguna_luar()
	{
		$data['title']					= 'Rekap Penelitian';
		$data['user_login_data'] 		= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['reviewer']				=  $this->db->select('*')
													->from('tbl_reviewer')
													->join('tbl_tahun_aktif', 'tbl_reviewer.tahun_id = tbl_tahun_aktif.id_thn')
													->order_by('nip_nik', 'DESC')
													->get()->result_array();
		$data['role']			=  $this->db->select('*')
													->from('tbl_role')
													->where('id_role !=', 1)
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/v_reviewer_luar',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_pengguna()
	{
		$data['title']				= 'Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		$data['pengguna']				=  $this->db->select('*')
													->from('tbl_pengguna')
													->join('tbl_prodi','tbl_pengguna.prodi_id = tbl_prodi.id_prodi')
													->order_by('nip_nik', 'DESC')
													->get()->result_array();
		$data['cek_anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_penelitian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->get()->num_rows();
		$data['prodi']			=  $this->db->select('*')
													->from('tbl_prodi')
													->get()->result_array();
		$data['role']			=  $this->db->select('*')
													->from('tbl_role')
													->where('id_role !=', 1)
													->get()->result_array();
		$data['tahun_aktif'] = $this->db->select('*')
													->from('tbl_tahun_aktif')
													->where('status_aktif', 'Aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/v_pengguna',$data);	
		$this->load->view('layouts/template/footer');
	}
	

	public function halaman_c_pengguna()
	{
		$data['title']				= 'Tambah Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		$data['get_role']			=  $this->db->select('*')
												->from('tbl_role')
												->where('id_role !=', 1)
												->get()->result_array();
		$data['prodi']			=  $this->db->select('*')
												->from('tbl_prodi')
												->get()->result_array();
		$data['tahun_aktif'] = $this->db->select('*')
												->from('tbl_tahun_aktif')
												->where('status_aktif', 'Aktif')
												->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/c_pengguna',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_u_pengguna($id)
	{
		$data['title']				= 'Ubah Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		$data['pengguna']			=  $this->db->select('*')
										->from('tbl_pengguna')
										->where('nip_nik',$id)
										->get()->row_array();
		$data['prodi']			=  $this->db->select('*')
										->from('tbl_prodi')
										->get()->result_array();
		$data['get_role']			=  $this->db->select('*')
										->from('tbl_role')
										->where('id_role !=', 1)
										->get()->result_array();						
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/u_pengguna',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_c_pengguna_luar()
	{
		$data['title']				= 'Tambah Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/c_reviewer_luar',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_u_pengguna_luar($id)
	{
		$data['title']				= 'Ubah Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		$data['reviewer']			=  $this->db->select('*')
													->from('tbl_reviewer')
													->where('nip_nik',$id)
													->get()->row_array();				
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_pengguna/u_reviewer_luar',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_data_pengguna()
	{
		$data['title']				= 'Tahun Data Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		$data['tahun_aktif'] = $this->db->select('*')
													->from('tbl_tahun_aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('dashboard_data/data_pengguna/v_data_pengguna',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tabel_pengguna($id)
	{
		$data['title']				= 'Data Pengguna';
		$data['user_login_data'] 	= $this->user_login_data;
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
		$data['pengguna']				=  $this->db->select('*')
													->from('tbl_pengguna')
													->join('tbl_prodi','tbl_pengguna.prodi_id = tbl_prodi.id_prodi')
													->where('tbl_pengguna.tahun_id',$id)
													->order_by('nip_nik', 'DESC')
													->get()->result_array();
		$data['cek_anggota_dosen']				=  $this->db->select('*')
													->from('tbl_anggota')
													->join('tbl_penelitian', 'tbl_anggota.penelitian_id = tbl_penelitian.id_penelitian')
													->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
													->where('tbl_penelitian.nip_nik_ketua',$data['user_login_data']['nip_nik'])
													->get()->num_rows();
		$data['prodi']			=  $this->db->select('*')
													->from('tbl_prodi')
													->get()->result_array();
		$data['role']			=  $this->db->select('*')
													->from('tbl_role')
													->where('id_role !=', 1)
													->get()->result_array();
		$data['tahun_aktif'] = $this->db->select('*')
													->from('tbl_tahun_aktif')
													->where('status_aktif', 'Aktif')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('dashboard_data/data_pengguna/tabel_pengguna/v_tabel_pengguna',$data);	
		$this->load->view('layouts/template/footer');
	}

	public function add_user()
	{
		$role = $this->input->post('role_id');

		$this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|max_length[18]|is_unique[tbl_pengguna.nip_nik]|numeric|min_length[9]', [
			'required' => 'NIP/NIK harus diisi.',
			'max_length' => 'NIP/NIK tidak boleh lebih dari 18 angka.',
			'is_unique' => 'NIP/NIK sudah digunakan oleh pengguna lain.',
			'min_length' => 'Panjang %s minimal 9 karakter.',
			'numeric' => 'Kolom %s harus berisi angka.'
		]);
		$this->form_validation->set_rules('prodi_id', 'Prodi ID', 'required', [
			'required' => 'Prodi harus diisi.',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password harus diisi.',
		]);

		$this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z\s\p{P}]+$/u]', [
			'required' => 'Nama harus diisi.',
			'regex_match' => 'Nama hanya boleh mengandung huruf dan simbol.'
		]);

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tambah-pengguna');
		} else {
			$tahun = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('status_aktif', 'Aktif')
				->get()
				->row();
		
			$data = [
				'nip_nik' => htmlentities($this->input->post('nip_nik')),
				'prodi_id' => htmlentities($this->input->post('prodi_id')),
				'nidn_nidk' => 0,
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
				'nama' => htmlentities($this->input->post('nama')),
				'email' => htmlentities('default@email.com'),
				'jk' => htmlentities('Belum Diisi'),
				'alamat' => htmlentities('Belum Diisi'),
				'foto_profil' => htmlentities('user.png'),
				'role_id' => $role,
				'tahun_id' => $tahun->id_thn,
				'pengguna_status' => 0,
				'pengguna_aktif' => 0,
				'status_pesan' => 0,
			];	
		
			$this->M_Master_Pengguna->create($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/master-pengguna');
		}
	}

	public function add_user_luar()
	{
		$this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|max_length[18]|is_unique[tbl_reviewer.nip_nik]|numeric|min_length[9]', [
			'required' => 'NIP/NIK harus diisi.',
			'max_length' => 'NIP/NIK tidak boleh lebih dari 18 angka.',
			'is_unique' => 'NIP/NIK sudah digunakan oleh pengguna lain.',
			'min_length' => 'Panjang %s minimal 9 karakter.',
			'numeric' => 'Kolom %s harus berisi angka.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password harus diisi.',
		]);

		$this->form_validation->set_rules('nidn', 'NIDN', 'required|trim|max_length[10]|numeric|is_unique[tbl_reviewer.nidn]', [
			'required' => 'NIDN harus diisi.',
			'max_length' => 'NIDN tidak boleh lebih dari 10 karakter.',
			'numeric' => 'NIDN hanya boleh berisi angka.',
			'is_unique' => 'NIDN sudah digunakan oleh pengguna lain.'
		]);
		

		$this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z\s\p{P}]+$/u]', [
			'required' => 'Nama harus diisi.',
			'regex_match' => 'Nama hanya boleh mengandung huruf dan simbol.'
		]);
		

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tambah-pengguna-luar');
		} else {
			$tahun = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('status_aktif', 'Aktif')
				->get()
				->row();
		
			$data = [
				'nip_nik' => htmlentities($this->input->post('nip_nik')),
				'nidn' =>  htmlentities($this->input->post('nidn')),
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
				'nama' => htmlentities($this->input->post('nama')),
				'email' => htmlentities('default@email.com'),
				'foto_profil' => htmlentities('user.png'),
				'role_id' => 3,
				'tahun_id' => $tahun->id_thn,
				'pengguna_status' => 1,
				'pengguna_aktif' => 0,
			];	
		
			$this->M_Master_Pengguna->create_luar($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/master-pengguna-luar');
		}
	}

	public function update_user_luar()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|max_length[18]|numeric|min_length[9]', array(
			'required' => 'Kolom %s harus diisi.',
			'max_length' => 'Panjang %s maksimal 18 karakter.',
			'min_length' => 'Panjang %s minimal 9 karakter.',
			'numeric' => 'Kolom %s harus berisi angka.'

		));
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z\s\p{P}]+$/u]', [
			'required' => 'Nama harus diisi.',
			'regex_match' => 'Nama hanya boleh mengandung huruf dan simbol.'
		]);

		$this->form_validation->set_rules('newpassword', 'Password Baru', 'trim');
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/edit-pengguna-luar/'.$id);
		} else {
			$password = $this->input->post('oldpassword');
		
			if (!empty($this->input->post('newpassword'))) {
				$password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
			}
		
			$data = [
				'nip_nik' => htmlentities($this->input->post('nip_nik')),
				'nidn' => htmlentities($this->input->post('nidn')),
				'nama' => htmlentities($this->input->post('nama')),
				'password' => $password,
			];
		
			$this->M_Master_Pengguna->update_luar($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/master-pengguna-luar');
		}
	}

	public function update_user()
	{
		$id = $this->input->post('id');

		$this->form_validation->set_rules('nip_nik', 'NIP/NIK', 'required|max_length[18]|numeric|min_length[9]', array(
			'required' => 'Kolom %s harus diisi.',
			'max_length' => 'Panjang %s maksimal 18 karakter.',
			'min_length' => 'Panjang %s minimal 9 karakter.',
			'numeric' => 'Kolom %s harus berisi angka.'

		));
		
		$this->form_validation->set_rules('nidn_nidk', 'NIDN', 'required|trim|max_length[10]|numeric|is_unique[tbl_reviewer.nidn]', [
			'required' => 'NIDN harus diisi.',
			'max_length' => 'NIDN tidak boleh lebih dari 10 karakter.',
			'numeric' => 'NIDN hanya boleh berisi angka.',
			'is_unique' => 'NIDN sudah digunakan oleh pengguna lain.'
		]);
		
		$this->form_validation->set_rules('nama', 'Nama', 'required|regex_match[/^[a-zA-Z\s\p{P}]+$/u]', [
			'required' => 'Nama harus diisi.',
			'regex_match' => 'Nama hanya boleh mengandung huruf dan simbol.'
		]);
		
		$this->form_validation->set_rules('newpassword', 'Password Baru', 'trim');
	
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/edit-pengguna/'.$id);
		} else {
			$password = $this->input->post('oldpassword');
		
			if (!empty($this->input->post('newpassword'))) {
				$password = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
			}
		
			$data = [
				'nip_nik' => htmlentities($this->input->post('nip_nik')),
				'nidn_nidk' => htmlentities($this->input->post('nidn_nidk')),
				'nama' => htmlentities($this->input->post('nama')),
				'password' => $password,
				'prodi_id' => htmlentities($this->input->post('prodi_id')),
				'role_id' => htmlentities($this->input->post('role_id')),
			];
		
			$this->M_Master_Pengguna->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/master-pengguna');
		}
	}

	public function switch_access_user()
	{
		$nip_nik=$this->input->get('nip_nik');
		$pengguna_status=$this->input->get('pengguna_status');
		if ($pengguna_status==1) {
			$this->M_Master_Pengguna->update($nip_nik,['pengguna_status' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_Pengguna->update($nip_nik,['pengguna_status' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}

	public function switch_access_user_aktif()
	{
		$nip_nik=$this->input->get('nip_nik');
		$pengguna_aktif=$this->input->get('pengguna_aktif');
		if ($pengguna_aktif==1) {
			$this->M_Master_Pengguna->update($nip_nik,['pengguna_aktif' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_Pengguna->update($nip_nik,['pengguna_aktif' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}


	public function switch_access_user_luar()
	{
		$nip_nik=$this->input->get('nip_nik');
		$pengguna_status=$this->input->get('pengguna_status');
		if ($pengguna_status==1) {
			$this->M_Master_Pengguna->update_luar($nip_nik,['pengguna_status' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_Pengguna->update_luar($nip_nik,['pengguna_status' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}

	public function switch_access_user_aktif_luar()
	{
		$nip_nik=$this->input->get('nip_nik');
		$pengguna_aktif=$this->input->get('pengguna_aktif');
		if ($pengguna_aktif==1) {
			$this->M_Master_Pengguna->update_luar($nip_nik,['pengguna_aktif' => 0]);
			$this->session->set_flashdata('success','Akses berhasil dinonaktifkan');	
		}else{
			$this->M_Master_Pengguna->update_luar($nip_nik,['pengguna_aktif' => 1]);
			$this->session->set_flashdata('success','Akses berhasil diaktifkan');
		}
	}


	public function delete_user($id)
	{
		$this->M_Master_Pengguna->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-pengguna');
	}

	public function delete_user_luar($id)
	{
		$this->M_Master_Pengguna->delete_luar($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-pengguna-luar');
	}

	public function import_excel() {
		$file = $_FILES['file_excel']['tmp_name'];
		$ext = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);
		
		if ($ext !== 'xlsx') {
			$this->session->set_flashdata('error', 'File tidak didukung. Hanya file dengan ekstensi .xlsx yang diperbolehkan.');
			redirect('admin/master-pengguna');
		}
		
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
		$worksheet = $spreadsheet->getActiveSheet();
		$data = array();
		$highestRow = $worksheet->getHighestDataRow();
		$highestColumn = $worksheet->getHighestDataColumn();
		for ($row = 2; $row <= $highestRow; $row++) {
			$rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
			$tahun = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('status_aktif', 'Aktif')
				->get()->row();
			$prodi = $rowData[0][3];
			if ($prodi == "Teknologi Informasi") {
				$prodiku = 1;
			} elseif ($prodi == "Teknologi Rekayasa Komputer Jaringan") {
				$prodiku = 2;
			} elseif ($prodi == "Teknologi Rekayasa Kontruksi Jalan dan Jembatan") {
				$prodiku = 4;
			} elseif ($prodi == "Teknologi Otomotif") {
				$prodiku = 5;
			} elseif ($prodi == "Agroindustri") {
				$prodiku = 6;
			} elseif ($prodi == "Teknologi Pakan Ternak") {
				$prodiku = 7;
			} elseif ($prodi == "Akuntansi") {
				$prodiku = 3;
			}
			$role_akun = $rowData[0][4];
			if ($role_akun == "Dosen") {
				$roleku = 2;
			} elseif ($role_akun == "Reviewer") {
				$roleku = 3;
			} elseif ($role_akun == "Kepala P3M") {
				$roleku = 4;
			}
			$data[] = array( 
				'nip_nik' => htmlentities($rowData[0][0]),
				'nama' => htmlentities($rowData[0][1]),
				'nidn_nidk' => 0,
				'password' => password_hash($rowData[0][2], PASSWORD_DEFAULT),
				'prodi_id' => htmlentities($prodiku),
				'email' => htmlentities('default@email.com'),
				'jk' => htmlentities('Belum Diisi'),
				'alamat' => htmlentities('Belum Diisi'),
				'foto_profil' => htmlentities('user.png'),
				'role_id' => htmlentities($roleku),
				'tahun_id' => $tahun->id_thn,
				'pengguna_status' => 0,
				'pengguna_aktif' => 1,
				'status_pesan' => 0,
			);
		}
		
		$insertData = array();
		$existingNipNik = $this->db->select('nip_nik')->from('tbl_pengguna')->where_in('nip_nik', array_column($data, 'nip_nik'))->get()->result_array();
		
		if (!empty($existingNipNik)) {
			$existingNipNik = array_column($existingNipNik, 'nip_nik');
			$invalidNipNik = array_diff(array_column($data, 'nip_nik'), $existingNipNik);
		
			foreach ($data as $row) {
				if (in_array($row['nip_nik'], $invalidNipNik)) {
					$insertData[] = $row;
				}
			}
		
			if (!empty($insertData)) {
				$validNipNikList = implode(', ', array_column($insertData, 'nip_nik'));
				$this->session->set_flashdata('success', 'Data dengan NIP/NIK berikut berhasil ditambah: ' . $validNipNikList);
			}
		
			$invalidNipNikList = implode(', ', $invalidNipNik);
			$this->session->set_flashdata('error', 'Beberapa data tidak dapat dimasukkan');
		} else {
			$insertData = $data;
		
			if (!empty($insertData)) {
				$validNipNikList = implode(', ', array_column($insertData, 'nip_nik'));
				$this->session->set_flashdata('success', 'Data dengan NIP/NIK berikut berhasil ditambah: ' . $validNipNikList);
			}
		}
		
		if (!empty($insertData)) {
			$this->db->insert_batch('tbl_pengguna', $insertData);
		} else {
			$this->session->set_flashdata('error', 'Semua data sudah ada di dalam database. Tidak ada data yang ditambahkan.');
		}
		
		redirect('admin/master-pengguna');
	}

	public function import_excel_luar() {
		$file = $_FILES['file_excel']['tmp_name'];
		$ext = pathinfo($_FILES['file_excel']['name'], PATHINFO_EXTENSION);
		
		if ($ext !== 'xlsx') {
			$this->session->set_flashdata('error', 'File tidak didukung. Hanya file dengan ekstensi .xlsx yang diperbolehkan.');
			redirect('admin/master-rviewer');
		}
		
		$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
		$worksheet = $spreadsheet->getActiveSheet();
		$data = array();
		$highestRow = $worksheet->getHighestDataRow();
		$highestColumn = $worksheet->getHighestDataColumn();
		for ($row = 2; $row <= $highestRow; $row++) {
			$rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
			$tahun = $this->db->select('*')
				->from('tbl_tahun_aktif')
				->where('status_aktif', 'Aktif')
				->get()->row();
			$data[] = array( 
				'nip_nik' => htmlentities($rowData[0][0]),
				'nama' => htmlentities($rowData[0][1]),
				'nidn' => 0,
				'password' => password_hash($rowData[0][2], PASSWORD_DEFAULT),
				'email' => htmlentities('default@email.com'),
				'foto_profil' => htmlentities('user.png'),
				'role_id' => 3,
				'tahun_id' => $tahun->id_thn,
				'pengguna_status' => 1,
				'pengguna_aktif' => 0,
			);
		}
		
		$insertData = array();
		$existingNipNik = $this->db->select('nip_nik')->from('tbl_reviewer')->where_in('nip_nik', array_column($data, 'nip_nik'))->get()->result_array();
		
		if (!empty($existingNipNik)) {
			$existingNipNik = array_column($existingNipNik, 'nip_nik');
			$invalidNipNik = array_diff(array_column($data, 'nip_nik'), $existingNipNik);
		
			foreach ($data as $row) {
				if (in_array($row['nip_nik'], $invalidNipNik)) {
					$insertData[] = $row;
				}
			}
			if (!empty($insertData)) {
				$validNipNikList = implode(', ', array_column($insertData, 'nip_nik'));
				$this->session->set_flashdata('success', 'Data dengan NIP/NIK berikut berhasil ditambah: ' . $validNipNikList);
			}
		
			$invalidNipNikList = implode(', ', $invalidNipNik);
			$this->session->set_flashdata('error', 'Beberapa data tidak dapat dimasukkan');
		} else {
			$insertData = $data;
		
			if (!empty($insertData)) {
				$validNipNikList = implode(', ', array_column($insertData, 'nip_nik'));
				$this->session->set_flashdata('success', 'Data dengan NIP/NIK berikut berhasil ditambah: ' . $validNipNikList);
			}
		}
		
		if (!empty($insertData)) {
			$this->db->insert_batch('tbl_reviewer', $insertData);
		} else {
			$this->session->set_flashdata('error', 'Semua data sudah ada di dalam database. Tidak ada data yang ditambahkan.');
		}
		
		redirect('admin/master-pengguna-luar');
	}


}