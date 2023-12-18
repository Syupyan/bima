<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting_Penelitian_Pengabdian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Setting_Penelitian_Pengabdian');
		$this->load->library('form_validation');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_data_setting_penelitian()
	{
		$data['title']				= 'Setting BIMA POLITALA';
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
		$this->load->view('v_setting_penelitian_pengabdian/penelitian/data_setting_penelitian',$data);					
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tema_penelitian()
	{
		$data['title']				= 'Tema Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['tema_penelitian']				=  $this->db->select('*')
													->from('tbl_tema_penelitian_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_tema_penelitian_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tema_penelitian !=','Tidak Ada')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_setting_penelitian_pengabdian/penelitian/v_tema_penelitian',$data);			
		$this->load->view('layouts/template/footer');
	}

    public function halaman_v_luaran_penelitian()
	{
		$data['title']				= 'Luaran Penelitian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
        $data['luaran_usulan_wajib']				=  $this->db->select('*')
													->from('tbl_luaran_usulan')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_usulan.nama_luaran_wajib !=','Tidak Ada')
													->where('tbl_luaran_usulan.jenis_luaran =','Penelitian')
													->get()->result_array();
        $data['luaran_usulan_tidak_wajib']				=  $this->db->select('*')
													->from('tbl_luaran_usulan')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_usulan.nama_luaran_tambahan !=','Tidak Ada')
													->where('tbl_luaran_usulan.jenis_luaran =','Penelitian')
													->get()->result_array();	
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_setting_penelitian_pengabdian/penelitian/v_luaran_penelitian',$data);			
		$this->load->view('layouts/template/footer');
	}

	public function halaman_data_setting_pengabdian()
	{
		$data['title']				= 'Setting BIMA POLITALA';
		$data['user_login_data'] 	= $this->user_login_data;
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
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_setting_penelitian_pengabdian/pengabdian/data_setting_pengabdian',$data);					
		$this->load->view('layouts/template/footer');
	}

	public function halaman_v_tema_pengabdian()
	{
		$data['title']				= 'Tema Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
		$data['tema_pengabdian']				=  $this->db->select('*')
													->from('tbl_tema_penelitian_pengabdian')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_tema_penelitian_pengabdian.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tema_pengabdian !=','Tidak Ada')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_setting_penelitian_pengabdian/pengabdian/v_tema_pengabdian',$data);			
		$this->load->view('layouts/template/footer');
	}

    public function halaman_v_luaran_pengabdian()
	{
		$data['title']				= 'Luaran Pengabdian';
		$data['user_login_data'] 	= $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
													->from('tbl_setting')
													->where('id_setting',1)
													->get()->row_array();
        $data['luaran_usulan_wajib']				=  $this->db->select('*')
													->from('tbl_luaran_usulan')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_usulan.nama_luaran_wajib !=','Tidak Ada')
													->where('tbl_luaran_usulan.jenis_luaran =','Pengabdian')
													->get()->result_array();
        $data['luaran_usulan_tidak_wajib']				=  $this->db->select('*')
													->from('tbl_luaran_usulan')
													->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_luaran_usulan.tahun_id')
													->where('tbl_tahun_aktif.status_aktif', 'Aktif')
													->where('tbl_luaran_usulan.nama_luaran_tambahan !=','Tidak Ada')
													->where('tbl_luaran_usulan.jenis_luaran =','Pengabdian')
													->get()->result_array();	
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_setting_penelitian_pengabdian/pengabdian/v_luaran_pengabdian',$data);			
		$this->load->view('layouts/template/footer');
	}

    public function add_tema_penelitian()
	{
		$tahun = $this->db->select('*')
		->from('tbl_tahun_aktif')
		->where('status_aktif', 'Aktif')
		->get()->row();
		$this->form_validation->set_rules('tema_penelitian', 'Tema Penelitian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tema-penelitian');
		} else {
			$data = [
				'tema_penelitian' => htmlentities($this->input->post('tema_penelitian')),
				'tema_pengabdian' => 'Tidak Ada',
				'tahun_id' => $tahun->id_thn
			];
		
			$this->M_Setting_Penelitian_Pengabdian->create_tema($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/tema-penelitian');
		}
	}

	public function add_tema_pengabdian()
	{
		$tahun = $this->db->select('*')
		->from('tbl_tahun_aktif')
		->where('status_aktif', 'Aktif')
		->get()->row();
		$this->form_validation->set_rules('tema_pengabdian', 'Tema Pengabdian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tema-pengabdian');
		} else {
			$data = [
				'tema_penelitian' => 'Tidak Ada',
				'tema_pengabdian' => htmlentities($this->input->post('tema_pengabdian')),
				'tahun_id' => $tahun->id_thn

			];
		
			$this->M_Setting_Penelitian_Pengabdian->create_tema($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/tema-pengabdian');
		}
	}

	public function update_tema_penelitian()
	{
		$id = $this->input->post('id_tema');
		$this->form_validation->set_rules('tema_penelitian', 'Tema Penelitian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tema-penelitian');
		} else {
			$data = [
				'tema_penelitian' => htmlentities($this->input->post('tema_penelitian')),
			];
		
			$this->M_Setting_Penelitian_Pengabdian->update_tema($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/tema-penelitian');
		}
	}

	public function update_tema_pengabdian()
	{
		$id = $this->input->post('id_tema');
		$this->form_validation->set_rules('tema_pengabdian', 'Tema pengabdian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tema-pengabdian');
		} else {
			$data = [
				'tema_pengabdian' => htmlentities($this->input->post('tema_pengabdian')),
			];
		
			$this->M_Setting_Penelitian_Pengabdian->update_tema($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/tema-pengabdian');
		}
	}

    public function delete_tema_penelitian($id)
	{
		$this->M_Setting_Penelitian_Pengabdian->delete_tema($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/tema-penelitian');
	}

	public function delete_tema_pengabdian($id)
	{
		$this->M_Setting_Penelitian_Pengabdian->delete_tema($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/tema-pengabdian');
	}

	public function add_luaran_wajib_penelitian()
	{
		$this->form_validation->set_rules('nama_luaran_wajib', 'Luaran Penelitian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$tahun = $this->db->select('*')
		->from('tbl_tahun_aktif')
		->where('status_aktif', 'Aktif')
		->get()->row();
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-penelitian');
		} else {
			$data = [
				'nama_luaran_wajib' => htmlentities($this->input->post('nama_luaran_wajib')),
				'tahun_id' => $tahun->id_thn,
				'nama_luaran_tambahan' => 'Tidak Ada',
				'jenis_luaran' => 'Penelitian',
			];
		
			$this->M_Setting_Penelitian_Pengabdian->create_luaran($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/luaran-penelitian');
		}
	}

    public function add_luaran_tambahan_penelitian()
	{
		$this->form_validation->set_rules('nama_luaran_tambahan', 'Luaran Penelitian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$tahun = $this->db->select('*')
		->from('tbl_tahun_aktif')
		->where('status_aktif', 'Aktif')
		->get()->row();
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-penelitian');
		} else {
			$data = [
				'nama_luaran_tambahan' => htmlentities($this->input->post('nama_luaran_tambahan')),
				'nama_luaran_wajib' => 'Tidak Ada',
				'jenis_luaran' => 'Penelitian',
				'tahun_id' => $tahun->id_thn

			];
		
			$this->M_Setting_Penelitian_Pengabdian->create_luaran($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/luaran-penelitian');
		}
	}

	public function add_luaran_wajib_pengabdian()
	{
		$this->form_validation->set_rules('nama_luaran_wajib', 'Luaran Pengabdian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$tahun = $this->db->select('*')
		->from('tbl_tahun_aktif')
		->where('status_aktif', 'Aktif')
		->get()->row();
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-pengabdian');
		} else {
			$data = [
				'nama_luaran_wajib' => htmlentities($this->input->post('nama_luaran_wajib')),
				'tahun_id' => $tahun->id_thn,
				'nama_luaran_tambahan' => 'Tidak Ada',
				'jenis_luaran' => 'Pengabdian',
			];
		
			$this->M_Setting_Penelitian_Pengabdian->create_luaran($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/luaran-pengabdian');
		}
	}

    public function add_luaran_tambahan_pengabdian()
	{
		$this->form_validation->set_rules('nama_luaran_tambahan', 'Luaran Pengabdian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$tahun = $this->db->select('*')
		->from('tbl_tahun_aktif')
		->where('status_aktif', 'Aktif')
		->get()->row();
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-pengabdian');
		} else {
			$data = [
				'nama_luaran_tambahan' => htmlentities($this->input->post('nama_luaran_tambahan')),
				'nama_luaran_wajib' => 'Tidak Ada',
				'jenis_luaran' => 'Pengabdian',
				'tahun_id' => $tahun->id_thn

			];
		
			$this->M_Setting_Penelitian_Pengabdian->create_luaran($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/luaran-pengabdian');
		}
	}

	public function update_luaran_wajib_penelitian()
	{
		$this->form_validation->set_rules('nama_luaran_wajib', 'Luaran Penelitian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$id = $this->input->post('id_luaran');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-penelitian');
		} else {
			$data = [
				'nama_luaran_wajib' => htmlentities($this->input->post('nama_luaran_wajib')),
			];
		
			$this->M_Setting_Penelitian_Pengabdian->update_luaran($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/luaran-penelitian');
		}
	}

    public function update_luaran_tambahan_penelitian()
	{
		$this->form_validation->set_rules('nama_luaran_tambahan', 'Luaran Penelitian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$id = $this->input->post('id_luaran');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-penelitian');
		} else {
			$data = [
				'nama_luaran_tambahan' => htmlentities($this->input->post('nama_luaran_tambahan')),
			];
		
			$this->M_Setting_Penelitian_Pengabdian->update_luaran($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/luaran-penelitian');
		}
	}

	public function update_luaran_wajib_pengabdian()
	{
		$this->form_validation->set_rules('nama_luaran_wajib', 'Luaran pengabdian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$id = $this->input->post('id_luaran');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-pengabdian');
		} else {
			$data = [
				'nama_luaran_wajib' => htmlentities($this->input->post('nama_luaran_wajib')),
			];
		
			$this->M_Setting_Penelitian_Pengabdian->update_luaran($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/luaran-pengabdian');
		}
	}

    public function update_luaran_tambahan_pengabdian()
	{
		$this->form_validation->set_rules('nama_luaran_tambahan', 'Luaran pengabdian', 'required', array(
			'required' => 'Kolom %s harus diisi.',
		));
		$id = $this->input->post('id_luaran');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/luaran-pengabdian');
		} else {
			$data = [
				'nama_luaran_tambahan' => htmlentities($this->input->post('nama_luaran_tambahan')),
			];
		
			$this->M_Setting_Penelitian_Pengabdian->update_luaran($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/luaran-pengabdian');
		}
	}

	public function delete_luaran_wajib_penelitian($id)
	{
		$this->M_Setting_Penelitian_Pengabdian->delete_luaran($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/luaran-penelitian');
	}

    public function delete_luaran_tambahan_penelitian($id)
	{
		$this->M_Setting_Penelitian_Pengabdian->delete_luaran($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/luaran-penelitian');
	}

    public function delete_luaran_wajib_pengabdian($id)
	{
		$this->M_Setting_Penelitian_Pengabdian->delete_luaran($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/luaran-pengabdian');
	}

    public function delete_luaran_tambahan_pengabdian($id)
	{
		$this->M_Setting_Penelitian_Pengabdian->delete_luaran($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/luaran-pengabdian');
	}


}