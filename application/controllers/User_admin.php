<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_user_admin');
	}

	public function tambah(){
		$this->m_user_admin->tambah();
		redirect('tabel/user_admin');
	}

	public function tampil_admin($id_admin=''){
		$data_tampil = $this->m_user_admin->tampil_admin($id_admin);
		echo json_encode($data_tampil);
	}
	
	public function ubah(){
		$this->m_user_admin->ubah();
		redirect('tabel/user_admin');
	}

	public function hapus($id_admin){
		$this->m_user_admin->hapus($id_admin);
		redirect('tabel/user_admin');
	}
}