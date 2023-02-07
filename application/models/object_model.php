<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class object_model extends CI_Model {
        public function getAllObject() {
            // $user_id = $this->session->userdata('user_id');
            $user_id = 2;
            // $sql = 'SELECT * FROM object WHERE idUser=%s';
            $sql = 'SELECT * FROM object where iduser = 2';
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function saveObject($titre,$descri,$prix,$idCategorie){
            /* titre  | description | prix    | idUser | idCategorie */
            $sql = "INSERT INTO object VALUES (null,'%','%','%','%')";
            $sql = sprintf($sql,$titre,$descri,$prix,$idCategorie);
            $query = $this->db->query($sql);
        }
        public function getOneObject($id) {
            // $user_id = $this->session->userdata('user_id');
            $sql = 'SELECT * FROM object WHERE idObject=%s';
            $sql = sprintf($sql, $id);
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }

        public function getOtherObject() {
            // $user_id = $this->session->userdata('user_id');
            $user_id = 2;
            // $sql = 'SELECT * FROM object WHERE idUser=%s';
            $sql = 'SELECT * FROM object where iduser != 2';
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }
    }
?>