<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_level');
	}

	public function tambah(){
		$this->m_user->tambah();
		redirect('tabel/level');
	}

	public function tampil_level($id_level=''){
		$data_tampil = $this->m_level->tampil_level($id_level);
		echo json_encode($data_tampil);
	}
	
	public function ubah(){
		$this->m_level->ubah();
		redirect('tabel/level');
	}

	public function hapus($id_level){
		$this->m_level->hapus($id_level);
		redirect('tabel/level');
	}
}