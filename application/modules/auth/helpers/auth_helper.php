<?php 

//fungsi untuk mengenerate csrf token
function get_csrf()
{
	$ci=get_instance();
	return '<input type="hidden" name="'.$ci->security->get_csrf_token_name().'" 
		 	value="'.$ci->security->get_csrf_hash().'">';
}

function is_auth_protect($status=NULL)
{
	$ci=get_instance();
	if ($status=="logout") {
		if ($ci->session->userdata("nip_nik")) {
			redirect('dashboard');
		}
	}elseif($status=="login"){
		if (!$ci->session->userdata("nip_nik")) {
			$ci->session->set_flashdata('error','Login terlebih dahulu');
			redirect('login');
		}
	}
}


//fungsi validasi untuk login
function login_validation()
{
	$ci=get_instance();
	$ci->form_validation->set_rules('password','Password','required|min_length[2]',[
		'required' =>	'password belum diisi !', 
		'min_length'	=>	'password terlalu pendek !'
	]);
	$ci->form_validation->set_rules('g-recaptcha-response','Password','required',[
		'required' =>	'Captcha belum diisi !', 
	]);
}

//send email untuk verifikasi dan reset kata sandi

