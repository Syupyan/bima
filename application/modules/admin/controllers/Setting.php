<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('M_Admin');
		// $this->load->model('Pesan_M');
		$this->load->model('M_Setting');
		$this->load->library('form_validation');
		//load helper
		$this->load->helper('admin');
		$this->load->helper('access');
		check_admin();
		//data user yang login
		$this->user_login_data = $this->M_Admin->get_user_login_data();
	}

	public function halaman_v_setting()
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
		$this->load->view('v_setting/v_setting',$data);			
		$this->load->view('layouts/template/footer');
	}

	public function update_setting_panduan()
	{
		$id = 1;

		$this->form_validation->set_rules('panduan_bima', 'Panduan Bima', 'required');
		$this->form_validation->set_rules('nomor_whatsapp', 'Nomor WhatsApp', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/setting');
		} else {
			$data = [
				'panduan_bima' => htmlentities($this->input->post('panduan_bima')),
				'nomor_whatsapp' => htmlentities($this->input->post('nomor_whatsapp')),
			];
		
			$this->M_Setting->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/setting');
		}
	}

	public function update_setting_title()
	{
		$id = 1;

		$this->form_validation->set_rules('title_header', 'Title Header', 'required');
		$this->form_validation->set_rules('title_footer', 'Title Footer', 'required');
		$this->form_validation->set_rules('title_url', 'Title URL', 'required');
		$this->form_validation->set_rules('title_login', 'Title Login', 'required');
		
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/setting');
		} else {
			$data = [
				'title_header' => htmlentities($this->input->post('title_header')),
				'title_footer' => htmlentities($this->input->post('title_footer')),
				'title_url' => htmlentities($this->input->post('title_url')),
				'title_login' => htmlentities($this->input->post('title_login')),
			];
		
			$this->M_Setting->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/setting');
		}
	}

	public function update_setting_anggota_penelitian()
	{
		$id = 1;
	
		$this->form_validation->set_rules('maksimal_anggota_dosen_penelitian', 'Panduan Bima', 'required|callback_validate_angka');
	
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/setting');
		} else {
			$data = [
				'maksimal_anggota_dosen_penelitian' => htmlentities($this->input->post('maksimal_anggota_dosen_penelitian')),
			];
	
			$this->M_Setting->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/setting');
		}
	}

	public function update_setting_anggota_pengabdian()
	{
		$id = 1;
	
		$this->form_validation->set_rules('maksimal_anggota_dosen_pengabdian', 'Panduan Bima', 'required|callback_validate_angka');
	
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('admin/setting');
		} else {
			$data = [
				'maksimal_anggota_dosen_pengabdian' => htmlentities($this->input->post('maksimal_anggota_dosen_pengabdian')),
			];
	
			$this->M_Setting->update($id, $data);
			$this->session->set_flashdata('success', 'Data berhasil diubah');
			redirect('admin/setting');
		}
	}
	
	public function validate_angka($input)
	{
		if ($input === '0') {
			$this->form_validation->set_message('validate_angka', 'Angka 0 tidak diizinkan.');
			return false;
		} else {
			return true;
		}
	}
	
	public function update_setting_file()
	{

		$id = 1;
		$config['upload_path']          = './asset/file/template/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
															// Menghapus file lama jika ada
															$existing_file = $this->M_Setting->getFileNamePanduan($id); // Ganti "M_Penelitian" dengan model yang sesuai
															if ($existing_file) {
																$file_path = $config['upload_path'] . $existing_file;
																if (file_exists($file_path)) {
																	unlink($file_path);
																}
															}
		if ( ! $this->upload->do_upload('file_panduan'))
		{
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('admin/setting');
		}else{
		$data = [
			'file_panduan' 	=> $this->upload->data("file_name"),
		];
		$this->M_Setting->update($id,$data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/setting');
		}
	}

	public function update_setting_file_subtansi_penelitian()
	{
		$id = 1;
		$config['upload_path']          = './asset/file/template/';
		$config['allowed_types']        = 'doc|docx';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
													// Menghapus file lama jika ada
													$existing_file = $this->M_Setting->getFileNameSubtansiP($id); // Ganti "M_Penelitian" dengan model yang sesuai
													if ($existing_file) {
														$file_path = $config['upload_path'] . $existing_file;
														if (file_exists($file_path)) {
															unlink($file_path);
														}
													}
		if ( ! $this->upload->do_upload('template_subtansi_penelitian'))
		{
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('admin/setting');
		}else{
		$data = [
			'template_subtansi_penelitian' 	=> $this->upload->data("file_name"),
		];
		$this->M_Setting->update($id,$data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/setting');
		}
	}

	public function update_setting_file_subtansi_pengabdian()
	{
		$id = 1;
		$config['upload_path']          = './asset/file/template/';
		$config['allowed_types']        = 'doc|docx';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
											// Menghapus file lama jika ada
											$existing_file = $this->M_Setting->getFileNameSubtansi($id); // Ganti "M_Penelitian" dengan model yang sesuai
											if ($existing_file) {
												$file_path = $config['upload_path'] . $existing_file;
												if (file_exists($file_path)) {
													unlink($file_path);
												}
											}
		if ( ! $this->upload->do_upload('template_subtansi_pengabdian'))
		{
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('admin/setting');
		}else{
		$data = [
			'template_subtansi_pengabdian' 	=> $this->upload->data("file_name"),
		];
		$this->M_Setting->update($id,$data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/setting');
		}
	}

	public function update_setting_file_import_mahasiswa()
	{
		$id = 1;
		$config['upload_path']          = './asset/file/template/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);

										// Menghapus file lama jika ada
										$existing_file = $this->M_Setting->getFileNameMahasiswa($id); // Ganti "M_Penelitian" dengan model yang sesuai
										if ($existing_file) {
											$file_path = $config['upload_path'] . $existing_file;
											if (file_exists($file_path)) {
												unlink($file_path);
											}
										}
		if ( ! $this->upload->do_upload('template_import_mahasiswa'))
		{
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('admin/setting');
		}else{
		$data = [
			'template_import_mahasiswa' 	=> $this->upload->data("file_name"),
		];
		$this->M_Setting->update($id,$data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/setting');
		}
	}

	public function update_setting_file_import_pengguna()
	{
		$id = 1;
		$config['upload_path']          = './asset/file/template/';
		$config['allowed_types']        = 'xls|xlsx';
		$config['max_size']             = 3000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
								// Menghapus file lama jika ada
								$existing_file = $this->M_Setting->getFileName($id); // Ganti "M_Penelitian" dengan model yang sesuai
								if ($existing_file) {
									$file_path = $config['upload_path'] . $existing_file;
									if (file_exists($file_path)) {
										unlink($file_path);
									}
								}
		if ( ! $this->upload->do_upload('template_import_pengguna'))
		{
			$this->session->set_flashdata('error', 'File tidak didukung !');
			redirect('admin/setting');
		}else{
		$data = [
			'template_import_pengguna' 	=> $this->upload->data("file_name"),
		];
		$this->M_Setting->update($id,$data);
		$this->session->set_flashdata('success','Data berhasil ditambah');
		redirect('admin/setting');
		}
	}

}