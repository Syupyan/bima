<?php 

function get_csrf()
{	
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}

function create_slug($str)
{
	$illegal_string=[" ","?","!","(",")","^","$","#","@","{","}","+","[","]","/","'\'",
					"<",">",";",":","|","'",'"',",","`","*","%"];
	return str_replace($illegal_string,"-",$str);
}

function master_mahasiswa()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('mahasiswa_nama','N','required',[
		'required' => 'nama usulan harus diisi !',
		'is_unique' => 'nama usulan ini sudah ada , gunakan nama lain'
	]);
	$ci->form_validation->set_rules('mahasiswa_nim','D','required|min_length[5]|is_unique[tbl_mahasiswa.mahasiswa_nim]',[
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