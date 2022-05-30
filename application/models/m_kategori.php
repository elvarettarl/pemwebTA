<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
    
    public function ambilkategori(){
        $ambilkategori = $this->db->get('kategori')->result();
        return $ambilkategori;
    }

    public function tambah(){
        $tambah = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        return $this->db->insert('kategori', $tambah);
    }

    public function tampil_kategori($id_kategori){
	    return $this->db->where('id_kategori', $id_kategori)->get('kategori')->row();
    }	
    
    public function ubah(){
		$ubah = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        return $this->db->where('id_kategori', $this->input->post('id_kategori'))->update('kategori', $ubah);
    }

    public function hapus($id_kategori){
        return $this->db->where('id_kategori',$id_kategori)->delete('kategori');
    }
}