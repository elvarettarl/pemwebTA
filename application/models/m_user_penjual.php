<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_penjual extends CI_Model {

    public function ambilpenjual(){
        $ambiluser = $this->db->join('level','level.id_level=penjual.id_level')
                              ->get('penjual')
                              ->result();
        return $ambiluser;
    }

    public function ambillevel(){
        $ambillevel = $this->db->get('level')->result();
        return $ambillevel;
    }

    public function tambah(){
        $tambah = array(
            'nama_penjual' => $this->input->post('nama_penjual'),
            'email_penjual' => $this->input->post('email_penjual'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->insert('penjual', $tambah);
    }

    public function tampil_penjual($id_penjual){
	    return $this->db->where('id_penjual', $id_penjual)->get('penjual')->row();
    }	
    
    public function ubah(){
		$ubah = array(
            'nama_penjual' => $this->input->post('nama_penjual'),
            'email_penjual' => $this->input->post('email_penjual'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->where('id_penjual', $this->input->post('id_penjual'))->update('penjual', $ubah);
    }

    public function hapus($id_penjual){
        return $this->db->where('id_penjual',$id_penjual)->delete('penjual');
    }
    
}