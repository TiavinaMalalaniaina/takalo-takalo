<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Categorie_model extends CI_Model {
        public function udpateCategorie($idCategorie, $nom) {
            $sql = "UPDATE categorie SET nom='%s' WHERE idCategorie=%s";
            $sql = sprintf($sql, $nom, $idCategorie);
            $this->db->query($sql);
        }

        public function insertCategorie($nom) {
            $sql = "INSERT INTO Categorie VALUES (null, '%s')";
            $sql = sprintf($sql, $nom);
            $this->db->query($sql);
        }

        public function getAllCategorie() {
            $sql = "SELECT * FROM Categorie";
            $query = $this->db->query($sql);
            $categorie = array();
            foreach ($query->result_array() as $row) {
                $categorie[] = $row;
            }
            return $categorie;
        }

        public function getCategById($idCateg) {
            $sql = 'SELECT * FROM Categorie WHERE idCategorie=%s';
            $sql = sprintf($sql, $idCateg);
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }



    }
?>