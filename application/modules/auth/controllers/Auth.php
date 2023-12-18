<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load library	
		$this->load->library('form_validation');
		$this->load->library('email');
		//load model
		$this->load->model('M_Auth');
		//load helper
		$this->load->helper('auth');
	}

	public function index()
	{
		$data=[
			'title' => 'Login',
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag()
		];
        $data['setting']				=  $this->db->select('*')
                                                        ->from('tbl_setting')
                                                        ->where('id_setting',1)
                                                        ->get()->row_array();
		//helper function dari auth_helper
        $recaptcha = $this->input->post('g-recaptcha-response');
        $response = $this->recaptcha->verifyResponse($recaptcha);
		login_validation();
		if ($this->form_validation->run()==FALSE || !isset($response['success']) || $response['success'] <> true) {
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/login',$data);
			$this->load->view('layouts/footer',$data);
		}else{
			$this->M_Auth->login();
		}
	}


	public function forgot_password()
	{
		$data=[
			'title' => 'Forgot Password'
		];
        $data['setting']				=  $this->db->select('*')
        ->from('tbl_setting')
        ->where('id_setting',1)
        ->get()->row_array();
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/forgot_password',$data);
			$this->load->view('layouts/footer',$data);

	}

	private function _sendEmail($token, $type)
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol' 	=> 'smtp',
            'smtp_host' => 'ssl://niix61.idcloudhost.com',
            'smtp_port' => 465,
            'smtp_pass' => 'c2a041220@',
            'smtp_user' => 'info@botx.my.id',
            'charset' 	=> 'utf-8',
            'newline' 	=> "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('info@botx.my.id', 'BIMA POLITALA | Politeknik Negeri Tanah Laut');
        $this->email->to($this->input->post('email'));
        $emailku = $this->db->get_where('tbl_pengguna', ['email' => $this->input->post('email')])->row_array();
        $data['nama'] = $emailku['nama'];
        $email = $this->input->post('email');
        $data['link'] = base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token);
        $mesg  = $this->load->view('v_auth/email', $data,true);

  		if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message($mesg);
            // $this->email->message('Halo, '.$email.'<br> Jika anda merasa <strong>tidak melakukan hal ini</strong>, maka <strong>abaikan</strong> pesan ini !<br> Klik tautan berikut untuh merubah password anda: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Ubah Password</a><br><strong style="color: green;">*Tautan ini hanya berlaku 1 jam.</strong><br><strong style="color: red;">*Harap tidak membagikan tautan ini kepada siapapun !</strong>');

        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_pengguna', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_pengguna_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60)) {
                    $this->session->set_userdata('reset_email', $email);
                    $this->db->delete('tbl_pengguna_token', ['email' => $email]);
                    $this->changePassword();
                } else {
                    $this->db->delete('tbl_pengguna_token', ['email' => $email]);
                    $this->session->set_flashdata('warning','Ubah Password gagal, Tautan sudah Kadaluarsa !');
            redirect('login');
                }
            } else {
                $this->session->set_flashdata('warning','Tautan salah atau Sudah tidak berlaku !');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('warning','Email salah !');
            redirect('login');
        }
    }

	public function changepassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $data['setting']				=  $this->db->select('*')
                                                ->from('tbl_setting')
                                                ->where('id_setting',1)
                                                ->get()->row_array();
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/change_password',$data);
			$this->load->view('layouts/footer',$data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tbl_pengguna');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('tbl_pengguna_token', ['email' => $email]);

            $this->session->set_flashdata('success','Password anda berhasil dirubah !');
            redirect('login');
        }
    }

	public function lupapassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $data['setting']				=  $this->db->select('*')
                                                    ->from('tbl_setting')
                                                    ->where('id_setting',1)
                                                    ->get()->row_array();
			$this->load->view('layouts/header',$data);
			$this->load->view('v_auth/forgot_password',$data);
			$this->load->view('layouts/footer',$data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tbl_pengguna', ['email' => $email, 'pengguna_status' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('tbl_pengguna_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('success','Berhasil, Silahkan periksa email anda !');
                redirect('login');
            } else {
				$this->session->set_flashdata('warning','Email belum aktif atau belum terdaftar !');
                redirect('login');
            }
        }
    }

	public function logout()
	{	
		$this->session->unset_userdata(["nip_nik","nip_nik"]);
		$this->session->set_flashdata('info','Anda telah logout');
		redirect('login');
	}

}
