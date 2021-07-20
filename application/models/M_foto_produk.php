<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_foto_produk extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('produk.*,COUNT(foto_produk.id_produk) as total_foto');
        $this->db->from('produk');
        $this->db->join('foto_produk', 'foto_produk.id_produk = produk.id_produk', 'left');
        $this->db->group_by('produk.id_produk');
        $this->db->order_by('produk.id_produk', 'asc');
        return $this->db->get()->result();
    }

    public function get_data($id_foto_produk)
    {
        $this->db->select('*');
        $this->db->from('foto_produk');
        $this->db->where('id_foto_produk', $id_foto_produk);
        return $this->db->get()->row();
    }

    public function get_foto_produk($id_produk)
    {
        $this->db->select('*');
        $this->db->from('foto_produk');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get()->result();
        
    }

    public function add($data)
    {
        $this->db->insert('foto_produk', $data);   
    }

    public function delete($data) 
    {
        $this->db->where('id_foto_produk', $data['id_foto_produk']);
        $this->db->delete('foto_produk', $data); 
    }
}