<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Auth extends CI_Model {


	public function login()
	{
		$cek = $this->input->post("data");
		$password = $this->input->post("password");
	
		$user = $this->db->get_where("tbl_pengguna", "email = '$cek' OR nidn_nidk = '$cek' OR nip_nik = '$cek'")->row_array();
		$is_reviewer = false;
	
		if (!$user) {
			$user = $this->db->get_where("tbl_reviewer", ["nip_nik" => $cek])->row_array();
			$is_reviewer = true;
		}
	
		if ($user) {
			if (password_verify($password, $user['password'])) {
				if ($user['pengguna_aktif'] == 1) {
					$data_session = [
						"nip_nik" => $user["nip_nik"],
						"role_id" => $user["role_id"]
					];
	
					$this->session->set_userdata($data_session);
					$redirect_url = '';
	
					if ($is_reviewer) {
						$redirect_url = 'dashboard';
						$this->session->set_flashdata('success', 'Anda Berhasil Login sebagai Reviewer!');
					} elseif ($user["role_id"] == 4) {
						$redirect_url = 'dashboard-p3m';
						$this->session->set_flashdata('success', 'Anda Berhasil Login!');
					} else {
						$redirect_url = 'dashboard';
						$this->session->set_flashdata('success', 'Anda Berhasil Login!');
					}
	
					redirect($redirect_url);
				} else {
					$this->session->set_flashdata('warning', 'Akun anda belum diaktifkan');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('error', 'Data yang dimasukkan salah atau tidak ditemukan');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('error', 'Data yang dimasukkan salah atau tidak ditemukan');
			redirect('login');
		}
	}
	
	

}
