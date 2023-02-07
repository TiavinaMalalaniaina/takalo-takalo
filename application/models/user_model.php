<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class user_model extends CI_Model {
        
        public function getLogedUser() {
            $user_id = $this->session->userdata('user_id');
            $sql = 'SELECT * FROM customer WHERE id=%';
            $sql = sprintf($sql, $user_id);
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }

        public function getAllUser() {
            $sql = 'SELECT * FROM customer';
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function saveNewUser($name) {
            $sql = "INSERT INTO user VALUES (default, '%')";
            $sql = sprintf($sql, $this->db->escape($name));
            $this->db->query($sql);
        }

        public function updateUser($id, $name) {
            $sql = "UPDATE user SET name='%' WHERE id=%";
            $sql = sprintf($sql, $this->db->escape($name), $this->db->escape($id));
            $this->db->query($sql);
        }
    }
?>