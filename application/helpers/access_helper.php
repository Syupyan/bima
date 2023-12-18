<?php 

function check_access1()
{
	$ci = get_instance();
	$nip_nik = $ci->session->userdata('nip_nik');
	if (!$nip_nik) {
		redirect('login');
	}
}

function check_admin()
{
	$ci = get_instance();
	$id_pengguna = $ci->session->userdata('nip_nik');
	$role = $ci->session->userdata('role_id');
	if (!$id_pengguna) {
		redirect('login');
	}elseif($role != 1){
		redirect('not-found');
	}
}

function check_dosen()
{
	$ci = get_instance();
	$id_pengguna = $ci->session->userdata('nip_nik');
	$role = $ci->session->userdata('role_id');
	if (!$id_pengguna) {
		redirect('login');
	}elseif($role != 2 && $role !=4){
		redirect('not-found');
	}
}

function check_reviewer()
{
	$ci = get_instance();
	$id_pengguna = $ci->session->userdata('nip_nik');
	$role = $ci->session->userdata('role_id');
	if (!$id_pengguna) {
		redirect('login');
	}elseif($role != 3){
		redirect('not-found');
	}
}

function check_p3m()
{
	$ci = get_instance();
	$id_pengguna = $ci->session->userdata('nip_nik');
	$role = $ci->session->userdata('role_id');
	if (!$id_pengguna) {
		redirect('login');
	}elseif($role != 4){
		redirect('not-found');
	}
}


