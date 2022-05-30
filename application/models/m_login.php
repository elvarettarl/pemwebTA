<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    
    public function cek_login_pembeli()
    {
        $email_pembeli = $this->input->post('email_pembeli');
        $password = $this->input->post('password');

        $query = $this->db->where('email_pembeli', $email_pembeli)
                           ->where('password', $password)
                           ->get('pembeli');

        if ($this->db->affected_rows() > 0) {

            $data_login = $query->row();

            $data_session = array(
                                'email_pembeli' => $data_login->email_pembeli,
                                'nama_pembeli' => $data_login->nama_pembeli,
                                'kelas' => $data_login->kelas,
                                'password' => $data_login->password,
                                'logged_in'=> TRUE,
                                'id_pembeli' => $data_login->id_pembeli,
                                'id_level' => $data_login->id_level
                            );

        $this->session->set_userdata($data_session);
        return TRUE;
        } else {
            return FALSE;
        }
    }

    public function cek_login_penjual()
    {
        $email_penjual = $this->input->post('email_penjual');
        $password = $this->input->post('password');

        $query = $this->db->where('email_penjual', $email_penjual)
                           ->where('password', $password)
                           ->get('penjual');

        if ($this->db->affected_rows() > 0) {

            $data_login = $query->row();

            $data_session = array(
                                'email_penjual' => $data_login->email_penjual,
                                'password' => $data_login->password,
                                'logged_in'=> TRUE,
                                'id_penjual' => $data_login->id_penjual,
                                'id_level' => $data_login->id_level
                            );

        $this->session->set_userdata($data_session);
        return TRUE;
        } else {
            return FALSE;
        }
    }

    public function cek_login_admin()
    {
        $email_admin = $this->input->post('email_admin');
        $password = $this->input->post('password');

        $query = $this->db->where('email_admin', $email_admin)
                           ->where('password', $password)
                           ->get('admin');

        if ($this->db->affected_rows() > 0) {

            $data_login = $query->row();

            $data_session = array(
                                'email_admin' => $data_login->email_admin,
                                'password' => $data_login->password,
                                'logged_in'=> TRUE,
                                'id_admin' => $data_login->id_admin,
                                'id_level' => $data_login->id_level
                            );

        $this->session->set_userdata($data_session);
        return TRUE;
        } else {
            return FALSE;
        }
    }

    public function tambah_pembeli(){
        $tambah = array(
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'email_pembeli' => $this->input->post('email_pembeli'),
            'kelas' => $this->input->post('email_pembeli'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->insert('pembeli', $tambah);
    }

    public function tambah_penjual(){
        $tambah = array(
            'nama_penjual' => $this->input->post('nama_penjual'),
            'email_penjual' => $this->input->post('email_penjual'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->insert('penjual', $tambah);
    }

    public function tambah_admin(){
        $tambah = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'email_admin' => $this->input->post('email_admin'),
            'password' => $this->input->post('password'),
            'id_level' => $this->input->post('id_level'),
        );
        return $this->db->insert('admin', $tambah);
    }
}