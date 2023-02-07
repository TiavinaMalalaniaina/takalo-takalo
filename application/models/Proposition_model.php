<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Proposition_model extends CI_Model {
        
        public function addProposition($idEchange, $idObject) {
            $sql = 'INSERT INTO proposition VALUES (null,%s,%s)';
            $sql = sprintf($sql, $idEchange, $idObject);
            $query = $this->db->query($sql);
        }

        public function verifProposition($idEchange, $idObject) {
            $this->load->model('echange_model');
            $this->load->model('object_model');
            $echange = $this->echange_model->getEchange($idEchange);
            $object = $this->object_model->getOneObject($idObject);
            if ($object['idUser']==$echange['idUser1'] || $object['idUser']==$echange['idUser2']) {
                return true;
            }
            return false;
        }

    }
?>