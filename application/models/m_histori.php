<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_histori extends CI_Model {

    public function ambilallhistori(){
        $ambilhistori = $this->db->join('produk','produk.id_produk=transaksi.id_produk')
                                 ->join('pembeli','pembeli.id_pembeli=transaksi.id_pembeli')
                                 ->join('penjual','penjual.id_penjual=produk.id_penjual')
                                 ->order_by('id_transaksi', 'DESC')
                                 ->get('transaksi')
                                 ->result();
        return $ambilhistori;
    }

    public function ambilhistoripenjual(){
        $ambilhistori = $this->db->join('produk','produk.id_produk=transaksi.id_produk')
                                 ->join('pembeli','pembeli.id_pembeli=transaksi.id_pembeli')
                                 ->where('produk.id_penjual', $this->session->userdata('id_penjual'))
                                 ->order_by('id_transaksi', 'DESC')
                                 ->get('transaksi')
                                 ->result();
        return $ambilhistori;
    }

    public function ambilhistori(){
        $ambilhistori = $this->db->join('produk','produk.id_produk=transaksi.id_produk')
                                 ->join('pembeli','pembeli.id_pembeli=transaksi.id_pembeli')
                                 ->where('pembeli.id_pembeli', $this->session->userdata('id_pembeli'))
                                 ->order_by('id_transaksi', 'DESC')
                                 ->get('transaksi')
                                 ->result();
        return $ambilhistori;
    }

    public function ambilproduk(){
        $ambilproduk = $this->db->get('produk')->result();
    }

    public function ambilpembeli(){
        $ambilproduk = $this->db->get('pembeli')->result();
    }
    
    public function ubah_status($id){

        $getIdTransaksi = $this->db->select('*')
                                   ->where('id_transaksi', $id)
                                   ->get('transaksi')
                                   ->result();

        $data = array('status' => 'Selesai');
        $this->db->where('id_transaksi', $id)->update('transaksi', $data);
    }
}