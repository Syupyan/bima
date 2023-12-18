<?php 

function get_csrf()
{	
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}


function ajukan_proyek_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('proyek_nama','N','required|is_unique[tbl_proyek.proyek_nama]',[
		'required' => 'nama usulan harus diisi !',
		'is_unique' => 'Judul ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('proyek_deskripsi','D','required|min_length[10]',[
		'required' => 'deskripsi harus diisi !',
		'min_length' => 'deskripsi terlalu pendek'
	]);
	$ci->form_validation->set_rules('matakuliah_id','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	$ci->form_validation->set_rules('proyek_pengajuan','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	$ci->form_validation->set_rules('proyek_penyelesaian','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	$ci->form_validation->set_rules('proyek_kompetensi','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	
}

function usulan_proyek_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('proyek_nama','N','required|is_unique[tbl_proyek.proyek_nama]',[
		'required' => 'nama usulan harus diisi !',
		'is_unique' => 'Judul ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('proyek_deskripsi','D','required|min_length[10]',[
		'required' => 'deskripsi harus diisi !',
		'min_length' => 'deskripsi terlalu pendek'
	]);
	$ci->form_validation->set_rules('matakuliah_id','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	$ci->form_validation->set_rules('proyek_pengajuan','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	$ci->form_validation->set_rules('proyek_penyelesaian','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	$ci->form_validation->set_rules('proyek_kompetensi','D','required',[
		'required' => 'deskripsi harus diisi !',
	]);
	
}


function is_auth_protect($status=NULL)
{
	$ci=get_instance();
	if ($status=="logout") {
		if ($ci->session->userdata("nip_nik")) {
			$ci->session->set_flashdata('error','Anda sudah login');
			redirect('home');
		}
	}elseif($status=="login"){
		if (!$ci->session->userdata("nip_nik")) {
			$ci->session->set_flashdata('error','Login terlebih dahulu');
			redirect('login');
		}
	}
}
