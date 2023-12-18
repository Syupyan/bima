<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Carbon\Carbon;
class Anggaran_Aktif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		$this->load->library('form_validation');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Anggaran_Aktif');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_v_anggaran_aktif($id)
	{
		$data['title']				= 'Jadwal Waktu dan Tanggal Anggaran Aktif';
		$data['user_login_data'] 	= $this->user_login_data;
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
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
		$data['tahun_anggaran']				=  $this->db->select('*')
													->from('tbl_usulan_anggaran_aktif')
													->where('thn_aktif_id',$id)
													->get()->result_array();
		$data['batas_anggaran']				=  $this->db->select('*')
													->from('tbl_usulan_anggaran_aktif')
													->where('thn_aktif_id',$id)
													->get()->num_rows();
		$data['id']				=  $id;
		$aktivasi				=  $this->db->select('*')
													->from('tbl_tahun_aktif')
													->where('id_thn',$id)
													->where('status_aktif','Aktif')
													->get()->result_array();
		foreach($aktivasi as $aktivasi){
		if($aktivasi['status_aktif'] == 'Aktif'){
		if($aktivasi['tahun_aktif'] == date('Y')){
		########### ============= ##############
		$this->load->view('layouts/template/header',$data);
		$this->load->view('layouts/template/sidebar',$data);
		$this->load->view('v_anggaran_aktif/v_anggaran_aktif',$data);			
		$this->load->view('layouts/template/footer');
		}
		}else{

		redirect('not-found');
			}
		}
	}


	public function add_waktu()
	{
		$date = Carbon::now('Asia/Makassar');
		$data['date'] = $date->format('d-m-Y H:i:s');
		$id =  $this->input->post('id');
		$tanggal_mulai = $this->input->post('tanggal_mulai');
		$waktu_mulai = $this->input->post('waktu_mulai');
		$tm = date('d-m-Y H:i:s', strtotime($tanggal_mulai . ' ' . $waktu_mulai));
		$tanggal_berakhir = $this->input->post('tanggal_berakhir');
		$waktu_berakhir = $this->input->post('waktu_berakhir');
		$tb = date('d-m-Y H:i:s', strtotime($tanggal_berakhir . ' ' . $waktu_berakhir));
		
		// Validasi tanggal mulai
		if (Carbon::parse($tm)->isBefore($date)) {
			$this->session->set_flashdata('error', 'Tanggal mulai harus setelah tanggal sekarang');
			redirect('admin/anggaran-aktif/'.$id);
			return;
		}
		
		// Validasi waktu mulai
		if (Carbon::parse($tm)->isSameAs($date) && Carbon::parse($waktu_mulai)->isBefore($date->format('H:i:s'))) {
			$this->session->set_flashdata('error', 'Waktu mulai harus setelah waktu sekarang');
			redirect('admin/anggaran-aktif/'.$id);
			return;
		}
		
		$data = [
			'waktu_anggaran_mulai'    => $tm,
			'waktu_anggaran_berakhir' => $tb,
			'thn_aktif_id'            => $id,
		];    
		$this->M_Anggaran_Aktif->create($data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/anggaran-aktif/'.$id);
	}

	public function delete_waktu($id)
	{
		$this->M_Anggaran_Aktif->delete($id);
		$this->session->set_flashdata('success','Data berhasil dihapus');
		return redirect($_SERVER['HTTP_REFERER']);
	}


}
