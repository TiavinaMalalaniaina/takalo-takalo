<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class object_model extends CI_Model {
        public function getAllObject($idUser) {
            $sql = 'SELECT * FROM object where iduser=%s';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        
        public function getAllObjectDetailled($idUser) {
            $sql = 'SELECT * FROM objectDetailled where iduser=%s';
            $sql = 'SELECT o.idObject,o.idCategorie, o.titre, o.description, o.prix, u.idUser, u.nom, u.prenom, u.image
                    FROM object o
                    JOIN user u
                    ON o.idUser=u.idUser
                    WHERE u.idUser=%s
            ';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function updateCateg($idObject,$idCategorie) {
            $sql = "UPDATE object SET idCategorie='%s' WHERE idObject=%s";
            $sql = sprintf($sql, $idCategorie, $idObject);
            $this->db->query($sql);
        }
        
        public function getAllAllObjectDetailled($idUser) {
            $sql = 'SELECT * FROM objectDetailled where iduser!=%s';
            $sql = 'SELECT o.idObject,o.idCategorie, o.titre, o.description, o.prix, u.idUser, u.nom, u.prenom, u.image
                    FROM object o
                    JOIN user u
                    ON o.idUser=u.idUser
                    WHERE u.idUser!=%s
            ';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function getOtherObjectDetailled($idUser) {
            $sql = 'SELECT * FROM otherProduct where iduser !=%s';
            $sql = 'SELECT o.idObject, o.titre, o.description, o.prix, u.idUser, u.nom, u.prenom, u.image, c.nom nomCategorie
                    FROM object o
                    JOIN user u
                    ON o.idUser=u.idUser
                    JOIN categorie c
                    ON c.idCategorie = o.idCategorie
                    WHERE idUser!=%s
            ';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function saveObject($titre,$descri,$prix,$idUser,$idCategorie){
            /* titre  | description | prix    | idUser | idCategorie */
            $sql = "INSERT INTO object VALUES (null,'%s','%s','%s',%s,%s)";
            $sql = sprintf($sql,$titre,$descri,$prix,$idUser,$idCategorie);
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
        public function getOneObjectDetailled($id) {
            // $user_id = $this->session->userdata('user_id');
            $sql = 'SELECT * FROM objectDetailled WHERE idObject=%s';
            $sql = 'SELECT o.idObject,o.idCategorie, o.titre, o.description, o.prix, u.idUser, u.nom, u.prenom, u.image
                    FROM object o
                    JOIN user u
                    ON o.idUser=u.idUser
                    WHERE o.idObject=%s
            ';
            $sql = sprintf($sql, $id);
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }

        public function getOtherObject() {
            $user_id = $this->session->userdata('user_id');
            $sql = 'SELECT * FROM object WHERE idUser!=%s';
            $sql = sprintf($sql, $user_id);
            $query = $this->db->query($sql);
            $user = array();
            foreach ($query->result_array() as $row) {
                $user[] = $row;
            }
            return $user;
        }

        public function setUserObject($idUser, $idObject) {
            $sql = 'UPDATE object SET idUser=%s WHERE idObject=%s';
            $sqltemp = sprintf($sql, $idUser, $idObject);
            $this->db->query($sqltemp);
        }

        public function updateObject($idObject, $titre, $description, $prix, $idCategorie) {
            $sql = "UPDATE object SET titre='%s',description='%s',prix=%s,idCategorie=%s WHERE idObject=%s";
            $sql = sprintf($sql, $titre, $description, $prix, $idCategorie, $idObject);
            $this->db->query($sql);
        }

        public function insertObject($idUser, $titre, $description, $prix, $idCategorie) {
            $sql = "INSERT INTO object VALUES (null, '%s', '%s', %s, %s, %s)";
            $sql = sprintf($sql, $titre, $description, $prix,$idUser, $idCategorie);
            $this->db->query($sql);
        }

        public function search($text, $idCategorie) {
            $sql = "SELECT * FROM objectDetailled WHERE titre LIKE '%s%s%s' AND idCategorie=%s";
            $sql = "SELECT o.idObject,o.idCategorie, o.titre, o.description, o.prix, u.idUser, u.nom, u.prenom, u.image
                    FROM object o
                    JOIN user u
                    ON o.idUser=u.idUser
                    WHERE o.titre LIKE '%s%s%s' AND o.idCategorie=%s
            ";
            $sql = sprintf($sql,'%', $text, '%', $idCategorie);
            echo $sql;
            $query = $this->db->query($sql);
            $objects = array();
            foreach ($query->result_array() as $row) {
                $objects[] = $row;
            }
            return $objects;
        }

        public function addImage($idObject, $image) {
            $sql = "INSERT INTO images_object VALUES (null, %s, '%s')";
            $sql = sprintf($sql,$idObject, $image);
            $this->db->query($sql);
        }

        public function getAllCategorie() {
            $sql = "SELECT * FROM categorie";
            $query = $this->db->query($sql);
            $idCategorie = array();
            foreach ($query->result_array() as $row) {
                $idCategorie[] = $row;
            }
            return $idCategorie;
        }

        public function getHistorique($idObject) {
            $sql = "SELECT * FROM historiqueEchangeDetailled WHERE idObject=%s ORDER BY dateEchange";
            $sql = 'SELECT he.*, o.titre, o.description, o.prix, u.nom, u.prenom 
                    FROM historiqueEchange he
                    JOIN object o ON he.idObject=o.idObject
                    JOIN user u ON he.idUser=u.idUser
                    WHERE he.idObject=%s 
                    ORDER BY he.dateEchange
                    ';
            $sql = sprintf($sql, $idObject);
            $query = $this->db->query($sql);
            $idCategorie = array();
            foreach ($query->result_array() as $row) {
                $idCategorie[] = $row;
            }
            return $idCategorie;
        }

        public function do_upload2() {
            $this->load->library('upload');
            $filecount = count($_FILES['file']['name']);
            $img_string = "";
            echo $filecount;
            for ($i=0; $i < $filecount; $i++) { 
                $filename = $_FILES['file']['name'][$i];
                if (in_array(strchr($filename, "."), array('.png', '.jpg', '.jpeg', '.PNG', '.JPG', 'jfif' ))) {
                    move_uploaded_file($_FILES['file']['tmp_name'][$i], site_url('./assets/images/objects/'.$filename));
                    $img_string .= $filename;
                    echo $_FILES['file']['name'][$i];
                    if ($i < $filecount - 1) $img_string .= ",";
                } else {
                    echo 'nope';    
                }
            }
        }

        public function do_upload() {
            $this->load->library('upload');

            $config['upload_path']          = './assets';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('file'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    echo $this->upload->display_errors();
                    // $this->load->view('upload_form', $error);
            }
            else
            {
                    $data = array('upload_data' => $this->upload->data());

                    // $this->load->view('upload_success', $data);
            }
        }
    }
?>