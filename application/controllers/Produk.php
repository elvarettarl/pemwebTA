<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('m_produk');
		if (!isset($_SESSION['logged_in'])) {
			redirect(base_url('login'),'refresh');
		}
	}

    public function index()
	{
		$data['produk']=$this->m_produk->ambilproduk();
		$data['penjual']=$this->m_produk->ambilpenjual();
		$data['kategori']=$this->m_produk->ambilkategori();
		$data['content']="v_produk";
		$this->load->view('template', $data);
	}

	public function tambah()
	{
		$config['upload_path'] = './assets/img/product-img';
		$config['allowed_types'] = 'jpg|png';

		if ($_FILES['gambar']['name'] != "") {
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('produk');
			} else {
				if($this->m_produk->tambah($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'berhasil menambah data');
				} else {
					$this->session->set_flashdata('pesan', 'gagal menambah data');
				}
				redirect('produk');
			}
				
		} else {
			if ($this->m_produk->tambah('')) {
				$this->session->set_flashdata('pesan', 'berhasil menambah data');
			} else {
				$this->session->set_flashdata('pesan', 'gagal menambah data');
			}
			redirect('produk');
		}	
	}


	public function tampil_ubah_produk($id_produk)
	{
		$data =  $this->m_produk->tampil_ubah_produk($id_produk);
		echo json_encode($data);
	}

	public function update(){
		if($this->input->post('update')){
			if($_FILES['gambar']['name']==""){
				if($this->m_produk->update()){
					$this->session->set_flashdata('pesan', 'sukses ubah data ');
				}else{
					$this->session->set_flashdata('pesan', 'gagal ubah data ');
				}
				redirect('produk');	
			}else{
				$config['upload_path'] = './assets/img/product-img/';
				$config['allowed_types'] = 'jpg|png|jpeg';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('gambar')){
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('produk');
				}else{
					if($this->m_produk->update_gbr($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'sukses ubah data ');
					}else{
						$this->session->set_flashdata('pesan', 'gagal ubah data ');
					}
					redirect('produk');
				}
			}
		}
	}

	public function hapus($id_produk){
		$this->m_produk->hapus($id_produk);
		redirect('produk');
	}

	public function addCart()
	{
		$data = array(
			'id'      => $this->input->post('id_produk'),
			'qty'     => 1,
			'price'   => $this->input->post('harga'),
			'name'    => $this->input->post('nama_produk'),
		);
		
		$this->cart->insert($data);	
	}

	public function check()
	{
		foreach ($this->cart->contents() as $d ) {
			var_dump($d);
		}
	}

	public function updateCart()
	{
		$cart = $_POST['cart'];
		foreach ($cart as $d ) {
			$data = array(
				'id' => $d['id'], 
				'qty' => $d['qty'],
				'price' => $d['price'],
				'name' => $d['name'],
				'rowid' => $d['rowid'],
			);

			$this->cart->update($data);
		}
		
		redirect('dashboard','refresh');
	}

	public function deleteCart($cart)
	{
		$data = array(
			'rowid' => $cart,
			'qty' => 0
		);

		$this->cart->update($data);
		redirect('dashboard');
	}

	public function checkout()
	{
		foreach ($this->cart->contents() as $d ) {
			$data = array(
				'waktu' => date("Y-m-d H:i:s"),
				'id_produk' => $d['id'],
				'jumlah' => $d['qty'],
				'total' => $d['qty'] * $d['price'],
				'id_pembeli' => $_SESSION['id_pembeli'],
				'status' => 'Proses'
			);

			$qty = $this->db->get_where('produk', ['id_produk' => $d['id']])->result_array()[0]['stok'];
			
			$stokNow = $qty - $d['qty'];

			if ($stokNow > 0) {
				$this->db->insert('transaksi', $data);
	
				$this->db->where('id_produk', $d['id']);
				$this->db->update('produk', [
					'stok' => $stokNow
				]);
			} else {
				redirect('dashboard','refresh');
			}
		}
		$this->cart->destroy();
	}
}