<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Echange_model extends CI_Model {
        

        public function insertEchange($idUser1, $idUser2) {
            $sql = "INSERT INTO echange VALUES (null, %s, %s, 1, now(), null)";
            $sql = sprintf($sql, $idUser1, $idUser2);
            $this->db->query($sql);
        }

        public function getEchangeSend($idEchange) {
            $sql = 'SELECT * FROM transaction WHERE idEchange=%s AND idUser1=idUser';

            $sql = '
                SELECT e.idEchange,e.idUser1,e.idUser2,p.idProposition,o.idObject,o.idUser
                FROM proposition p
                JOIN echange e ON e.idEchange=p.idEchange
                JOIN object o ON p.idObject=o.idObject
                WHERE p.idEchange=%s
                AND e.idUser1=o.idUser';
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
            $sql = '
                SELECT e.idEchange,e.idUser1,e.idUser2,p.idProposition,o.idObject,o.idUser
                FROM proposition p
                JOIN echange e ON e.idEchange=p.idEchange
                JOIN object o ON p.idObject=o.idObject
                WHERE p.idEchange=%s
                AND e.idUser2=o.idUser';
            $sql = sprintf($sql, $idEchange);
            $query = $this->db->query($sql);
            $echange = array();
            foreach ($query->result_array() as $row) {
                $echange[] = $row;
            }
            return $echange;
        }

        public function getPropositionSend($idEchange) {
            $sql = 'SELECT * FROM propositionDetailled WHERE etat=1 AND idEchange=%s AND idUser=idUser1';
            $sql = '
                SELECT p.idProposition, e.idEchange, o.idObject, e.idUser1, e.idUser2, e.etat, o.titre, o.description, o.prix, o.idUser, o.idCategorie, c.nom nomCategorie, u.nom, u.prenom
                FROM proposition p
                JOIN echange e ON p.idEchange=e.idEchange
                JOIN object o ON p.idObject=o.idObject
                JOIN user u ON o.idUser=u.idUser
                JOIN categorie c ON o.idCategorie=c.idCategorie
                WHERE e.etat=1
                AND e.idechange=%s
                AND o.idUser=e.idUser1';
            $sql = sprintf($sql, $idEchange);
            $query = $this->db->query($sql);
            $echange = array();
            foreach ($query->result_array() as $row) {
                $echange[] = $row;
            }
            return $echange;
        }
        
        public function detailledProposition($proposition) {

            
        }



        public function getPropositionReceived($idEchange) {
            $sql = 'SELECT * FROM propositionDetailled WHERE idUser2=idUser AND etat=1 AND idEchange=%s';
            $sql = '
                SELECT p.idProposition, e.idEchange, o.idObject, e.idUser1, e.idUser2, e.etat, o.titre, o.description, o.prix, o.idUser, o.idCategorie, c.nom nomCategorie, u.nom, u.prenom
                FROM proposition p
                JOIN echange e ON p.idEchange=e.idEchange
                JOIN object o ON p.idObject=o.idObject
                JOIN user u ON o.idUser=u.idUser
                JOIN categorie c ON o.idCategorie=c.idCategorie
                WHERE e.etat=1
                AND e.idechange=%s
                AND o.idUser=e.idUser2';
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
        public function getEchangeDetailled($idEchange) {
            $sql = 'SELECT * FROM echangeDetailled WHERE idEchange=%s';
            $sql = 'SELECT e.*,u1.nom nom1, u1.prenom prenom1, u2.nom nom2, u2.prenom prenom2 
                FROM echange e
                JOIN user u1 ON e.idUser1=u1.idUser
                JOIN user u2 ON e.idUser2=u2.idUser
                WHERE e.idEchange=%s';
            $sql = sprintf($sql, $idEchange);
            $query = $this->db->query($sql);
            $echange = $query->row_array();
            return $echange;
        }

        public function setEtat($idEchange, $etat) {
            $sql = 'UPDATE echange SET etat=%s WHERE idEchange=%s';
            $sqltemp = sprintf($sql,$etat, $idEchange);
            $this->db->query($sqltemp);
        }

        public function validateEchange($idEchange) {
            $this->load->model('object_model');
            $echanges = $this->getEchange($idEchange);
            if ($echanges['etat']!=1) {
                throw new Exception("L'echange n'est plus valide");
            }
            $echangeSend = $this->getEchangeSend($idEchange);
            $echangeReceived = $this->getEchangeReceived($idEchange);
            $user1 = $echanges['idUser1'];
            $user2 = $echanges['idUser2'];
            foreach ($echangeSend as $echange) {
                $this->object_model->setUserObject($user2, $echange['idObject']);
                $this->insertHistorique($user1, $echange['idObject']);
            }
            foreach ($echangeReceived as $echange) {
                $this->object_model->setUserObject($user1, $echange['idObject']);
                $this->insertHistorique($user2, $echange['idObject']);
            }
            $this->setEtat($idEchange, 5);
        }

        public function refusedEchange($idEchange) {
            $echanges = $this->getEchange($idEchange);
            if ($echanges['etat']!=1) {
                throw new Exception("L'echange n'est plus valide");
            }
            $this->setEtat($idEchange, -5);
        }

        public function getLastEchange() {
            $sql = "SELECT * FROM echange ORDER BY idechange DESC LIMIT 1";
            $query = $this->db->query($sql);
            $echange = $query->row_array();
            return $echange;
        }

        public function getObjectSend($idEchange) {
            $this->load->model('object_model');
            $echangeSends = $this->getEchangeSend($idEchange);
            $objects = array();
            foreach ($echangeSends as $echangeSend) {
                $objects[] = $this->object_model->getOneObject($echangeSend['idObject']);
            }
            return $objects;
        }

        public function getObjectReceived($idEchange) {
            $this->load->model('object_model');
            $echangeReceiveds = $this->getEchangeReceived($idEchange);
            $objects = array();
            foreach ($echangeReceiveds as $echangeReceived) {
                $objects[] = $this->object_model->getOneObject($echangeReceived['idObject']);
            }
            return $objects;
        }

        public function getNbrEchange() {
            $sql = "SELECT count(idEchange) s FROM echange WHERE etat=5";
            $query = $this->db->query($sql);
            $nbr = $query->row_array();
            return $nbr['s'];
        }


        public function insertHistorique ($idUser, $idObject) {
            $sql = 'INSERT INTO historiqueEChange VALUES (null, %s, %s, now())';
            $sql = sprintf($sql, $idObject, $idUser);
            $this->db->query($sql);
        }


        public function proposer ($idUser, $idObject) {
            $this->load->model('object_model');
            $this->load->model('proposition_model');
            $object = $this->object_model->getOneObject($idObject);
            $this->insertEchange($idUser,$object['idUser']);
            $echange = $this->getLastEchange();
            $this->proposition_model->addProposition($echange['idEchange'], $idObject);
        }


        public function addObject() {
            $idEchange = $this->input->get('idEchange');


        }



    }
?>