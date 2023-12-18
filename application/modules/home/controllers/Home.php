<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	protected $user_login_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Home');
		//load library 
		$this->load->library('form_validation');
		$this->user_login_data = $this->M_Home->get_user_login_data();
	}

	public function halaman_v_home()
	{
		$data['user_login_data'] = $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
		->from('tbl_setting')
		->where('id_setting',1)
		->get()->row_array();
		############# ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_home/v_home',$data);
		$this->load->view('layouts/footer');
	}

	public function halaman_v_panduan()
	{
		$data['user_login_data'] = $this->user_login_data;
		$data['setting']				=  $this->db->select('*')
		->from('tbl_setting')
		->where('id_setting',1)
		->get()->row_array();
		############# ============= ##############
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar',$data);
		$this->load->view('v_panduan/v_panduan',$data);
		$this->load->view('layouts/footer');
	}
}
