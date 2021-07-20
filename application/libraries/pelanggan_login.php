<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->model('m_auth');
    }

    public function login($email_pelanggan, $password_pelanggan) {
        $cek = $this->ci->m_auth->login_pelanggan($email_pelanggan, $password_pelanggan);
        if ($cek) {
            $id_pelanggan = $cek->id_pelanggan;
            $nama_pelanggan = $cek->nama_pelanggan;
            $email_pelanggan  = $cek->email_pelanggan;
            $foto = $cek->foto;

            //buat session
            $this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
            $this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
            $this->ci->session->set_userdata('email_pelanggan', $email_pelanggan);
            $this->ci->session->set_userdata('foto', $foto);
            redirect('home');
        }else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Email atau Password salah');
            redirect('pelanggan/login');
            
        }
    }

    public function proteksi_halaman() {
        if ($this->ci->session->userdata('nama_pelanggan') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('pelanggan/login');
        }
    }

    public function logout()
    {
            $this->ci->session->unset_userdata('id_pelanggan');
            $this->ci->session->unset_userdata('nama_pelanggan');
            $this->ci->session->unset_userdata('email_pelanggan');
            $this->ci->session->unset_userdata('foto');
            $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!');
            redirect('pelanggan/login');
    }
}

/* End of file User_login.php */
