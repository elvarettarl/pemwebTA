<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_pembeli extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_user_pembeli');
	}

	public function tambah(){
		$this->m_user_pembeli->tambah();
		redirect('tabel/user_pembeli');
	}

	public function tampil_pembeli($id_pembeli=''){
		$data_tampil = $this->m_user_pembeli->tampil_pembeli($id_pembeli);
		echo json_encode($data_tampil);
	}
	
	public function ubah(){
		$this->m_user_pembeli->ubah();
		redirect('tabel/user_pembeli');
	}

	public function hapus($id_pembeli){
		$this->m_user_pembeli->hapus($id_pembeli);
		redirect('tabel/user_pembeli');
	}
}