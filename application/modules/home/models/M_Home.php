<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Home extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		return $this->db->get_where("tbl_pengguna",["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
	}

}
