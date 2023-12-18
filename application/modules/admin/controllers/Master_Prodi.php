<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_Prodi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		// $this->load->model('Pesan_M');
		$this->load->library('form_validation');
		$this->load->model('M_Master_Prodi');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_v_prodi()
	{
		$data['title']				= 'Prodi';
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
		$data['Prodi']			=  $this->db->select('*')
													->from('tbl_prodi')
													->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_prodi/v_prodi',$data);			
		$this->load->view('layouts/template/footer');
	}

	public function halaman_c_prodi()
	{
		$data['title']				= 'Tambah Prodi';
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
		$data['prodi']			=  $this->db->select('*')
												->from('tbl_prodi')
												->get()->result_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_prodi/c_prodi',$data);				
		$this->load->view('layouts/template/footer');
	}

	public function halaman_u_prodi($id)
	{
		$data['title']				= 'Ubah Prodi';
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
		$data['prodi']			=  $this->db->select('*')
										->from('tbl_prodi')
										->get()->result_array();
		$data['prodi']			=  $this->db->select('*')
										->from('tbl_prodi')
										->where('tbl_prodi.id_prodi',$id)
										->get()->row_array();
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_prodi/u_prodi',$data);				
		$this->load->view('layouts/template/footer');
	}

	public function add_prodi()
	{
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|is_unique[tbl_prodi.nama_prodi]');
		$this->form_validation->set_rules('nama_lain_prodi', 'Nama Lain Prodi', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/tambah-prodi');
		} else {
			$data = [
				'nama_prodi' => htmlentities($this->input->post('nama_prodi')),
				'nama_lain_prodi' => htmlentities($this->input->post('nama_lain_prodi')),
				'jurusan' => htmlentities($this->input->post('jurusan')),
			];
		
			$this->M_Master_Prodi->create($data);
			$this->session->set_flashdata('success', 'Data berhasil ditambah');
			redirect('admin/master-prodi');
		}
	}


	public function update_prodi()
	{
		$id = $this->input->post('id_prodi');
		$this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required');
		$this->form_validation->set_rules('nama_lain_prodi', 'Nama Lain Prodi', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/edit-prodi/'.$id);
		} else {
			$data = [
				'nama_prodi' => htmlentities($this->input->post('nama_prodi')),
				'nama_lain_prodi' => htmlentities($this->input->post('nama_lain_prodi')),
				'jurusan' => htmlentities($this->input->post('jurusan')),
			];
		
			$this->M_Master_Prodi->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/master-prodi');
		}
	}

	public function delete_prodi($id)
	{
		$this->M_Master_Prodi->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		redirect('admin/master-prodi');
	}

}
