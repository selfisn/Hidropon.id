<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        $this->load->model('m_kategori');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Produk',
            'produk' => $this->m_produk->get_all_data(),
            'isi' => 'produk/v_produk',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "foto_produk";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Add Barang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'produk/v_add',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            }else {
                $upload_data = array('uploads'=>$this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga_produk' => $this->input->post('harga_produk'),
                    'berat_produk' => $this->input->post('berat_produk'),
                    'deskripsi_produk' => $this->input->post('deskripsi_produk'),
                    'foto_produk' => $upload_data['uploads']['file_name'],
                );
                $this->m_produk->add($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan!'); 
                redirect('produk');
            }
        } 
        
        

        $data = array(
            'title' => 'Add Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'isi' => 'produk/v_add',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }
    

    //Update one item
    public function edit( $id_produk = NULL )
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('harga_produk', 'Harga Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('berat_produk', 'Berat Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );
        $this->form_validation->set_rules('deskripsi_produk', 'Deskripsi Produk', 'required', 
            array('required'=>'%s Harus Diisi!')
        );

        
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
            $config['max_size']     = '2000';
            $this->upload->initialize($config);
            $field_name = "foto_produk";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Barang',
                    'kategori' => $this->m_kategori->get_all_data(),
                    'produk' =>$this->m_produk->get_data($id_produk),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'produk/v_edit',
                );
                $this->load->view('layout/v_wrapper_backend', $data, FALSE);
            }else {
                //hapus foto
                $produk = $this->m_produk->get_data($id_produk);
                if ($produk->foto_produk != "") {
                    unlink('./assets/img/' . $produk->foto_produk);
                }

                //end hapus foto
                $upload_data = array('uploads'=>$this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_produk' => $id_produk,
                    'nama_produk' => $this->input->post('nama_produk'),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'harga_produk' => $this->input->post('harga_produk'),
                    'berat_produk' => $this->input->post('berat_produk'),
                    'deskripsi_produk' => $this->input->post('deskripsi_produk'),
                    'foto_produk' => $upload_data['uploads']['file_name'],
                );
                $this->m_produk->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!'); 
                redirect('produk');
            }
            //jika tanpa mengganti gambar
            $data = array(
                'id_produk' => $id_produk,
                'nama_produk' => $this->input->post('nama_produk'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga_produk' => $this->input->post('harga_produk'),
                'berat_produk' => $this->input->post('berat_produk'),
                'deskripsi_produk' => $this->input->post('deskripsi_produk'),
            );
            $this->m_produk->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Diubah!'); 
            redirect('produk');
        } 
        
        

        $data = array(
            'title' => 'Edit Barang',
            'kategori' => $this->m_kategori->get_all_data(),
            'produk' => $this->m_produk->get_data($id_produk),
            'isi' => 'produk/v_edit',
        );
        $this->load->view('layout/v_wrapper_backend', $data, FALSE);
    }

    //Delete one item
    public function delete( $id_produk = NULL )
    {
        //hapus foto
        $produk = $this->m_produk->get_data($id_produk);
        if ($produk->foto_produk != "") {
            unlink('./assets/img/' . $produk->foto_produk);
        }

        //end hapus foto
        $data = array('id_produk' => $id_produk);
        $this->m_produk->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus!');
        redirect('produk');
    }
}

/* End of file Produk.php */

