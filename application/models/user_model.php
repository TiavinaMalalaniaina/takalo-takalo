<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class User_model extends CI_Model {
        
        public function getUserById($idUser) {
            $sql = 'SELECT * FROM user WHERE idUser=%s';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }

        public function getAllUser() {
            $sql = 'SELECT * FROM user';
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function saveNewUser($nom, $prenom, $mdp) {
            $sql = "INSERT INTO user(idUser, nom, prenom, mdp, image, admin) VALUES (null, '%s', '%s', '%s', 'im.png', 0)";
            $sql = sprintf($sql, $nom, $prenom, $mdp);
            $this->db->query($sql);
        }

        public function setImageUser($image, $idUser) {
            $sql = "UPDATE user SET image='%s' WHERE idUser=%s";
            $sql = sprintf($sql, $image, $idUser);
            $this->db->query($sql);
        }


        public function getNbrUser() {
            $sql = "SELECT count(*) FROM user WHERE admin=0";
            $query = $this->db->query($sql);
            $nbr = $query->row_array();
            return $nbr;
        }

        public function getLastUser() {
            $sql = "SELECT * FROM user ORDER BY idUser DESC LIMIT 1";
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }
    }
?>