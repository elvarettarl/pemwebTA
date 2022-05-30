<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
    }
    
    public function penjual()
    {
        $this->load->view('v_register_penjual');
	}
	
	public function pembeli()
    {
        $this->load->view('v_register_pembeli');
	}

    public function tambah_pembeli()
    {
        $this->m_login->tambah_pembeli();
        redirect('login/pembeli');
    }

    public function tambah_penjual()
    {
        $this->m_login->tambah_penjual();
        redirect('login/pembeli');
    }
}