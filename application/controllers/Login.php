<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
	    $this->load->model('m_login');
    }

    public function pembeli()
    {
        $this->load->view('v_login_pembeli');
	}

	public function penjual()
    {
        $this->load->view('v_login_penjual');
	}

	public function admin()
    {
        $this->load->view('v_login_admin');
	}

    public function proses_login_pembeli()
	{
		if($this->session->userdata('logged_in') == FALSE){
			if ($this->m_login->cek_login_pembeli() == TRUE) {
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('pesan','Email / Password Salah');
				redirect('login/pembeli');
			}
        }else{
			redirect('dashboard');
		}
	}

	public function proses_login_penjual()
	{
		if($this->session->userdata('logged_in') == FALSE){
			if ($this->m_login->cek_login_penjual() == TRUE) {
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('pesan','Email / Password Salah');
				redirect('login/penjual');
			}
        }else{
			redirect('dashboard');
		}
	}

	public function proses_login_admin()
	{
		if($this->session->userdata('logged_in') == FALSE){
			if ($this->m_login->cek_login_admin() == TRUE) {
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('pesan','Email / Password Salah');
				redirect('login/admin');
			}
        }else{
			redirect('dashboard');
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('login/pembeli');
	}
}
