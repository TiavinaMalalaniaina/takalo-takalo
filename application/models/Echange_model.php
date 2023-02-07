<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Echange_model extends CI_Model {
        
        public function getEchangeSend($idEchange) {
            $sql = 'SELECT * FROM transaction WHERE idEchange=%s AND idUser1=idUser';
            $sql = sprintf($sql, $idEchange);
            $query = $this->db->query($sql);
            $echange = array();
            foreach ($query->result_array() as $row) {
                $echange[] = $row;
            }
            return $echange;
        }

        public function getEchangeReceived($idEchange) {
            $sql = 'SELECT * FROM transaction WHERE idEchange=%s AND idUser2=idUser';
            $sql = sprintf($sql, $idEchange);
            $query = $this->db->query($sql);
            $echange = array();
            foreach ($query->result_array() as $row) {
                $echange[] = $row;
            }
            return $echange;
        }
        
        public function getEchange($idEchange) {
            $sql = 'SELECT * FROM echange WHERE idEchange=%s';
            $sql = sprintf($sql, $idEchange);
            $query = $this->db->query($sql);
            $echange = $query->row_array();
            return $echange;
        }

        public function validateEchange($idEchange) {
            $echanges = $this->getEchange($idEchange);
            if ($echanges['etat']!=1) {
                throw new Exception("L'echange n'est plus valide");
            }
            $echangeSend = $this->getEchangeSend($idEchange);
            $echangeReceived = $this->getEchangeReceived($idEchange);
            $user1 = $echanges['idUser1'];
            $user2 = $echanges['idUser2'];
            $sql = 'UPDATE object SET idUser=%s WHERE idObject=%s';
            foreach ($echangeSend as $echange) {
                $sqltemp = sprintf($sql, $user2, $echange['idObject']);
                $this->db->query($sqltemp);
            }
            foreach ($echangeReceived as $echange) {
                $sqltemp = sprintf($sql, $user1, $echange['idObject']);
                $this->db->query($sqltemp);
            }

            $sql = 'UPDATE echange SET etat=5 WHERE idEchange=%s';
            $sqltemp = sprintf($sql, $idEchange);
            $this->db->query($sqltemp);
        }


    }
?>