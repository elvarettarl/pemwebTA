<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    public function ambilallproduk(){
        $ambilproduk = $this->db->join('penjual','penjual.id_penjual=produk.id_penjual')
                                ->join('kategori','kategori.id_kategori=produk.id_kategori')
                                ->get('produk')
                                ->result();
        return $ambilproduk;
    }

    public function ambilproduk(){
        $ambilproduk = $this->db->join('penjual','penjual.id_penjual=produk.id_penjual')
                                ->join('kategori','kategori.id_kategori=produk.id_kategori')
                                ->where('penjual.id_penjual', $this->session->userdata('id_penjual'))
                                ->get('produk')
                                ->result();
        return $ambilproduk;
    }

    public function ambilpenjual(){
        $ambiluser = $this->db->get('penjual')->result();
        return $ambiluser;
    }

    public function ambilkategori(){
        $ambilkategori = $this->db->get('kategori')->result();
        return $ambilkategori;
    }

    public function ambilmakanan(){
        $ambilproduk = $this->db->join('penjual','penjual.id_penjual=produk.id_penjual')
                                ->where('id_kategori','1')
                                ->get('produk')
                                ->result();
        return $ambilproduk;
    }

    public function ambilpakaian(){
        $ambilproduk = $this->db->join('penjual','penjual.id_penjual=produk.id_penjual')
                                ->where('id_kategori','2')
                                ->get('produk')
                                ->result();
        return $ambilproduk;
    }

    public function ambilkecantikan(){
        $ambilproduk = $this->db->join('penjual','penjual.id_penjual=produk.id_penjual')
                                ->where('id_kategori','3')
                                ->get('produk')
                                ->result();
        return $ambilproduk;
    }

    public function ambilalattulis(){
        $ambilproduk = $this->db->join('penjual','penjual.id_penjual=produk.id_penjual')
                                ->where('id_kategori','4')
                                ->get('produk')
                                ->result();
        return $ambilproduk;
    }

    public function tambah($nama_file){
        if ($nama_file == "") {
            $tambah = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_penjual' => $this->session->userdata('id_penjual'),
                'id_kategori' => $this->input->post('id_kategori')
            );
        } else {
            $tambah = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $nama_file,
                'id_penjual' => $this->session->userdata('id_penjual'),
                'id_kategori' => $this->input->post('id_kategori')
            );
        }
        return $this->db->insert('produk', $tambah);
    }

    public function tampil_ubah_produk($id_produk){
		return $this->db->where('id_produk',$id_produk)->get('produk')->row();
    }
    
    public function update(){
        $ubah = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_penjual' => $this->session->userdata('id_penjual'),
            'id_kategori' => $this->input->post('id_kategori')
        );
        return $this->db->where('id_produk',$this->input->post('id_produk'))->update('produk', $ubah);
    }

    public function update_gbr($nama_file){
        $ubah = array(
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $nama_file,
            'id_penjual' => $this->session->userdata('id_penjual'),
            'id_kategori' => $this->input->post('id_kategori')
        );
        return $this->db->where('id_produk',$this->input->post('id_produk'))->update('produk', $ubah);
    }

    public function hapus($id_produk){
        return $this->db->where('id_produk',$id_produk)->delete('produk');
    }
}