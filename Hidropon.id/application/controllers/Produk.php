<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
        

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

    }

    //Update one item
    public function update( $id = NULL )
    {

    }

    //Delete one item
    public function delete( $id = NULL )
    {

    }
}

/* End of file Produk.php */

