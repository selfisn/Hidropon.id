<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pelanggan');
        $this->load->model('m_auth');
    }
    

    public function register()
    {
        $this->form_validation->set_rules('nama_pelanggan', 'nama_pelanggan', 'required', array (
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('email_pelanggan', 'E-mail', 'required|is_unique[pelanggan.email_pelanggan]', array (
            'required' => '%s Harus Diisi!!!',
            'is_unique' => '%s Email sudah ini terdaftar!!!'
        ));
        $this->form_validation->set_rules('password_pelanggan', 'password', 'required', array (
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('ulangi_password_pelanggan', 'ulangi password', 'required|matches[password_pelanggan]', array (
            'required' => '%s Harus Diisi!!!',
            'matches' => '$s password tidak sama'
        ));
        $this->form_validation->set_rules('telepon_pelanggan', 'telepon', 'required', array (
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('alamat_pelanggan', 'alamat pelanggan', 'required', array (
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run()== false) {
            $data = array(
                'title' => 'Register Pelanggan',
                'isi' => 'v_register',
            );
            $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
        } else {
            $data = array(
                'nama_pelanggan' => $this->input->post('nama_pelanggan'),
                'email_pelanggan' => $this->input->post('email_pelanggan'),
                'password_pelanggan' => $this->input->post('password_pelanggan'),
                'telepon_pelanggan' => $this->input->post('telepon_pelanggan'),
                'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
            );
            $this->m_pelanggan->register($data);
            $this->session->set_flashdata('pesan', 'Selamat, Register berhasil Silahkan Login Kembali !!');
            redirect('pelanggan/register');

        }
    }
    public function login()
    {
    $this->form_validation->set_rules('email_pelanggan', 'username', 'required', array(
            'required' => '%s Harus Diisi !'
    ));
    $this->form_validation->set_rules('password_pelanggan', 'Password', 'required', array(
        'required' => '%s Harus Diisi !'
        
    ));
        
    if ($this->form_validation->run() == TRUE) {
        $email_pelanggan = $this->input->post('email_pelanggan');
        $password_pelanggan= $this->input->post('password_pelanggan');
        $this->pelanggan_login->login($email_pelanggan, $password_pelanggan);
    } 
       $data = array(
           'title' => 'Login Pelanggan',
           'isi' => 'v_login_pelanggan',
       );
       $this->load->view('layout/v_wrapper_frontend', $data, FALSE);
    } 
    public function logout(){
        $this->pelanggan_login->logout();
    }
    
    public function akun()
    {
        //proteksi halaman
        $this->pelanggan_login->proteksi_halaman();
        $data = array(
            'title' => 'Akun Saya',
            'isi' => 'v_akun_saya',
        );
        $this->load->view('layout/v_wrapper_frontend', $data, FALSE);   
    }
}