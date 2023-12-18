<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_User extends CI_Model {

	//get data user jika user login
	public function get_user_login_data()
	{
		$user = $this->db->select('*')
                                            ->from('tbl_pengguna')
                                            ->join('tbl_role', 'tbl_pengguna.role_id = tbl_role.id_role')
                                            ->where('tbl_pengguna.nip_nik', $this->session->userdata("nip_nik"))
                                            ->get()->row();
		if (isset($user->nip_nik)) {
			return $this->db->get_where("tbl_pengguna", ["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
		} else {
			return $this->db->get_where("tbl_reviewer", ["nip_nik" => $this->session->userdata("nip_nik")])->row_array();
		}
	}


	public function update_user($id,$data=[])
	{	
		$this->db->where("nip_nik",$id);
		return $this->db->update("tbl_pengguna",$data);
	}

	public function update_anggota($id,$data=[])
	{	
		$this->db->where("nip_nik_anggota",$id);
		return $this->db->update("tbl_anggota",$data);
	}

	public function upload($path,$allowed_types)
	{
		$config['upload_path']   = './asset/'.$path;
		$config['allowed_types'] = $allowed_types;
		$config['detect_mime']   = TRUE;
		$config['mod_mime_fix']  = TRUE;
		$this->load->library('upload',$config);
		if ($this->upload->do_upload('file')) {
			return $this->upload->data('file_name');
		}else{
			echo $this->upload->display_errors();
		}
	}

	public function resize_img($path,$width,$height)
	{
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 		= './asset/img/'.$path;
		$config['maintain_ratio'] 	= FALSE;
		$config['width']			= $width;
		$config['height']			= $height;
		$config['quality'] 			= 	'100%';
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}

}
