<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Proposition_model extends CI_Model {
        
        public function getPropositionReceivedByUser($idUser) {
            $sql = 'SELECT * FROM proposition WHERE idUser2=%s';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $proposition = array();
            foreach ($query->result_array() as $row) {
                $proposition[] = $row;
            }
            return $proposition;
        }

        public function getPropositionSendByUser($idUser) {
            $sql = 'SELECT * FROM proposition WHERE idUser1=%s';
            $sql = sprintf($sql, $idUser);
            $query = $this->db->query($sql);
            $proposition = array();
            foreach ($query->result_array() as $row) {
                $proposition[] = $row;
            }
            return $proposition;
        }

    }
?>