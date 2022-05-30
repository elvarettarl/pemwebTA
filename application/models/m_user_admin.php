<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user_admin extends CI_Model {

    public function ambiladmin(){
        $ambiluser = $this->db->join('level','level.id_level=admin.id_level')
                              ->get('admin')
                              ->result();
        return $ambiluser;
    }

    public function ambillevel(){
        $ambillevel = $this->db->get('level')->result();
        return $ambillevel;
    }

    public function tambah(){
        $tambah = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'email_admin' => $this->input->post('email_admin'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->insert('admin', $tambah);
    }

    public function tampil_admin($id_admin){
	    return $this->db->where('id_admin', $id_admin)->get('admin')->row();
    }	
    
    public function ubah(){
		$ubah = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'email_admin' => $this->input->post('email_admin'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->where('id_admin', $this->input->post('id_admin'))->update('admin', $ubah);
    }

    public function hapus($id_admin){
        return $this->db->where('id_admin',$id_admin)->delete('admin');
    }
    
}