<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_produk');
		$this->load->model('m_kategori');
	}
	
	public function makananminuman()
	{
		$data['produk']=$this->m_produk->ambilmakanan();
		$data['content']="v_kat_makanan";
		$this->load->view('template', $data);
	}

	public function pakaian()
	{
		$data['produk']=$this->m_produk->ambilpakaian();
		$data['content']="v_kat_pakaian";
		$this->load->view('template', $data);
	}

	public function kecantikan()
	{
		// var_dump(count($this->cart->contents()));die;
		$data['produk']=$this->m_produk->ambilkecantikan();
		$data['content']="v_kat_kecantikan";
		$this->load->view('template', $data);
	}

	public function peralatanatk()
	{
		$data['produk']=$this->m_produk->ambilalattulis();
		$data['content']="v_kat_alattulis";
		$this->load->view('template', $data);
	}
	public function tambah(){
		$this->m_kategori->tambah();
		redirect('tabel/kategori');
	}

	public function tampil_kategori($id_kategori=''){
		$data_tampil = $this->m_kategori->tampil_kategori($id_kategori);
		echo json_encode($data_tampil);
	}
	
	public function ubah(){
		$this->m_kategori->ubah();
		redirect('tabel/kategori');
	}

	public function hapus($id_kategori){
		$this->m_kategori->hapus($id_kategori);
		redirect('tabel/kategori');
	}
}