<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('id_produk', 'asc');
        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('produk', $data);   
    }

    public function edit($data) 
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk', $data); 
    }

    public function delete($data) 
    {
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data); 
    }

}

/* End of file M_produk.php */
