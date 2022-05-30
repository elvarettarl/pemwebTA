<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_penjual extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_user_penjual');
	}

	public function tambah(){
		$this->m_user_penjual->tambah();
		redirect('tabel/user_penjual');
	}

	public function tampil_penjual($id_penjual=''){
		$data_tampil = $this->m_user_penjual->tampil_penjual($id_penjual);
		echo json_encode($data_tampil);
	}
	
	public function ubah(){
		$this->m_user_penjual->ubah();
		redirect('tabel/user_penjual');
	}

	public function hapus($id_penjual){
		$this->m_user_penjual->hapus($id_penjual);
		redirect('tabel/user_penjual');
	}
}