<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_level extends CI_Model {

    public function ambillevel(){
        $ambillevel = $this->db->get('level')->result();
        return $ambillevel;
    }

    public function tambah(){
        $tambah = array(
            'nama_level' => $this->input->post('nama_level')
        );
        return $this->db->insert('level', $tambah);
    }

    public function tampil_level($id_level){
	    return $this->db->where('id_level', $id_level)->get('level')->row();
    }	
    
    public function ubah(){
		$ubah = array(
            'nama_level' => $this->input->post('nama_level')
        );
        return $this->db->where('id_level', $this->input->post('id_level'))->update('level', $ubah);
    }

    public function hapus($id_user){
        return $this->db->where('level',$id_user)->delete('level');
    }
}