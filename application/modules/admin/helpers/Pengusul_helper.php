<?php 

function get_csrf()
{	
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}


function write_usulan_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('proyek_nama','N','required|is_unique[tbl_proyek.proyek_nama]',[
		'required' => 'nama usulan harus diisi !',
		'is_unique' => 'nama usulan ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('proyek_deskripsi','D','required|min_length[10]',[
		'required' => 'deskripsi harus diisi !',
		'min_length' => 'deskripsi terlalu pendek'
	]);
}

function write_pengumuman_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('pengumuman_nama','N','required|is_unique[tbl_pengumuman.pengumuman_nama]',[
		'required' => 'nama pengumuman harus diisi !',
		'is_unique' => 'nama pengmuman ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('pengumuman_deskripsi','D','required|min_length[10]',[
		'required' => 'deskripsi harus diisi !',
		'min_length' => 'deskripsi terlalu pendek'
	]);
}

function create_slug($str)
{
	$illegal_string=[" ","?","!","(",")","^","$","#","@","{","}","+","[","]","/","'\'",
					"<",">",";",":","|","'",'"',",","`","*","%"];
	return str_replace($illegal_string,"-",$str);
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

function is_pengusul()
{
	$ci=get_instance();
	if ($ci->session->userdata("nip_nik")==3) {
		redirect('not-found');
	}else{
		return TRUE;
	}
}