<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('m_produk');
		$this->load->model('m_kategori');
		$this->load->model('m_level');
		$this->load->model('m_user_admin');
		$this->load->model('m_user_pembeli');
		$this->load->model('m_user_penjual');
		$this->load->model('m_histori');
	}

    public function produk()
	{
        $data['produk']=$this->m_produk->ambilallproduk();
        $data['penjual']=$this->m_produk->ambilpenjual();
        $data['kategori']=$this->m_produk->ambilkategori();
		$data['content']="v_tbl_produk";
		$this->load->view('template', $data);
	}

	public function user_admin()
	{
		$data['level']=$this->m_level->ambillevel();
		$data['admin']=$this->m_user_admin->ambiladmin();
		$data['content']="v_tbl_user_admin";
		$this->load->view('template', $data);
	}

	public function user_pembeli()
	{
		$data['level']=$this->m_level->ambillevel();
		$data['pembeli']=$this->m_user_pembeli->ambilpembeli();
		$data['content']="v_tbl_user_pembeli";
		$this->load->view('template', $data);
	}

	public function user_penjual()
	{
		$data['level']=$this->m_level->ambillevel();
		$data['penjual']=$this->m_user_penjual->ambilpenjual();
		$data['content']="v_tbl_user_penjual";
		$this->load->view('template', $data);
	}

	public function level()
	{
        $data['level']=$this->m_level->ambillevel();
		$data['content']="v_tbl_level";
		$this->load->view('template', $data);
	}

	public function kategori()
	{
        $data['kategori']=$this->m_kategori->ambilkategori();
		$data['content']="v_tbl_kategori";
		$this->load->view('template', $data);
	}

	public function histori_admin()
	{
		$data['histori']=$this->m_histori->ambilallhistori();
		$data['content']="v_tbl_histori_admin";
		$this->load->view('template', $data);
	}

	public function histori_penjual()
	{
		$data['histori']=$this->m_histori->ambilhistoripenjual();
		$data['content']="v_tbl_histori_penjual";
		$this->load->view('template', $data);
	}

	public function histori_pembeli()
	{
		$data['histori']=$this->m_histori->ambilhistori();
		$data['content']="v_tbl_histori_pembeli";
		$this->load->view('template', $data);
	}

	public function ubah_status($id)
	{
		$this->m_histori->ubah_status($id);
		redirect('tabel/histori_penjual','refresh');
	}
}