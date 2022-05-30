<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_pembeli extends CI_Model {

    public function ambilpembeli(){
        $ambiluser = $this->db->join('level','level.id_level=pembeli.id_level')
                              ->get('pembeli')
                              ->result();
        return $ambiluser;
    }

    public function ambillevel(){
        $ambillevel = $this->db->get('level')->result();
        return $ambillevel;
    }

    public function tambah(){
        $tambah = array(
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'kelas' => $this->input->post('kelas'),
            'email_pembeli' => $this->input->post('email_pembeli'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->insert('pembeli', $tambah);
    }

    public function tampil_pembeli($id_pembeli){
	    return $this->db->where('id_pembeli', $id_pembeli)->get('pembeli')->row();
    }	
    
    public function ubah(){
		$ubah = array(
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'kelas' => $this->input->post('kelas'),
            'email_pembeli' => $this->input->post('email_pembeli'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->where('id_pembeli', $this->input->post('id_pembeli'))->update('pembeli', $ubah);
    }

    public function hapus($id_pembeli){
        return $this->db->where('id_pembeli',$id_pembeli)->delete('pembeli');
    }
    
}