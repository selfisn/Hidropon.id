<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_produk extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_foto_produk');
        $this->load->model('m_produk');   
    }

    public function index()
    {
        $data = array(
            'title' => 'Foto Produk',
            'foto_produk' => $this->m_foto_produk->get_all_data(),
            'isi' => 'foto_produk/v_index',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    public function add($id_produk)
    {
        $this->form_validation->set_rules('keterangan', 'Keterangan Foto Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img2';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "foto_produk";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Foto Produk',
                    'error_upload' => $this->upload->display_errors(),
                    'produk' =>$this->m_produk->get_data($id_produk),
                    'foto_produk' => $this->m_foto_produk->get_foto_produk($id_produk),
                    'isi' => 'foto_produk/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            }else {
                $upload_data = array('uploads'=>$this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img2'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_produk' => $id_produk,
                    'keterangan' => $this->input->post('keterangan'),
                    'foto_produk' => $upload_data['uploads']['file_name'],
                );
                $this->m_foto_produk->add($data);
                $this->session->set_flashdata('pesan', 'Foto Berhasil Ditambahkan!'); 
                redirect('foto_produk/add/'.$id_produk);
            }
        } 
        
        $data = array(
            'title' => 'Add Foto Produk',
            'produk' =>$this->m_produk->get_data($id_produk),
            'foto_produk' => $this->m_foto_produk->get_foto_produk($id_produk),
            'isi' => 'foto_produk/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete( $id_produk, $id_foto_produk )
    {
        //hapus foto
        $foto_produk = $this->m_foto_produk->get_data($id_foto_produk);
        if ($foto_produk->foto_produk != "") {
            unlink('./assets/img2/' . $foto_produk->foto_produk);
        }

        //end hapus foto
        $data = array('id_foto_produk' => $id_foto_produk);
        $this->m_foto_produk->delete($data);
        $this->session->set_flashdata('pesan', 'Foto Berhasil Dihapus!');
        redirect('foto_produk/add/'.$id_produk);
    }

}