<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tahun_Aktif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Tahun_Aktif');
		$this->load->library('form_validation');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_v_tahun_aktif()
	{
		$data['title']				= 'Tahun Aktif';
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
		$data['tahun_aktif']			=  $this->db->select('*')
											->from('tbl_tahun_aktif')
											->get()->result_array();
		$data['jumlah_tahun_aktif']		=  $this->db->select('*')
											->from('tbl_tahun_aktif')
											->where('status_aktif', 'Aktif')
											->get()->num_rows();
		$thn = $this->db->select('*')
							->from('tbl_tahun_aktif')
							->order_by('id_thn', 'DESC') 
							->limit(1)
							->get()->row_array();
		if (date('Y') == $thn['tahun_aktif']) {
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_tahun_aktif/v_tahun_aktif',$data);			
		$this->load->view('layouts/template/footer');
		}else{
		$data = array(
			'status_aktif' => 'Tidak Aktif',
			'tahun_aktif' => date('Y')
		);
		$this->db->insert('tbl_tahun_aktif',$data);
		redirect('admin/tahun-aktif');
		}
	}

	public function switch_access()
	{
		
		$id_thn = $this->input->get('id_thn');
		$status_aktif = $this->input->get('status_aktif');
		if($status_aktif == 'Tidak Aktif') {
			$this->M_Tahun_Aktif->update($id_thn,['status_aktif' => 'Aktif']);
			$this->session->set_flashdata('success','Status tahun berhasil Aktif');
		}else{
			$this->M_Tahun_Aktif->update($id_thn,['status_aktif' => 'Tidak Aktif']);
			$this->session->set_flashdata('success','Status tahun berhasil Tidak Aktif');
		}
	}

	public function switch_access_1()
	{
		$id_thn = $this->input->get('id_thn');
		$status_aktif = $this->input->get('status_aktif');
		if($status_aktif == 'Aktif') {
			$this->M_Tahun_Aktif->update($id_thn,['status_aktif' => 'Tidak Aktif']);
			$this->session->set_flashdata('success','Status tahun berhasil Tidak Aktif');
		}else{
			$this->session->set_flashdata('warning','Status tahun hanya bisa aktif 1 saja !');
		}

	}


}
