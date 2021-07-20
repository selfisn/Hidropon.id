<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

        public function login_user($username, $password) {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where(array(
                'username' => $username, 
                'password' => $password
            ));
            return $this->db->get()->row();
        }
        public function login_pelanggan($email_pelanggan, $password_pelanggan) {
            $this->db->select('*');
            $this->db->from('pelanggan');
            $this->db->where(array(
                'email_pelanggan' => $email_pelanggan, 
                'password_pelanggan' => $password_pelanggan
            ));
            return $this->db->get()->row();
        }
    }


/* End of file M_auth.php */
