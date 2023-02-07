<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Log_model extends CI_Model {


        public function log_in($username, $mdp) {
            // TODO: set the customer array
            $this->load->model('user_model');
            $users  = $this->user_model->getAllUser();
            foreach ($users as $user) {
                if (strcmp($username, $user['nom'])==0) {
                    if (strcmp($mdp, $user['mdp'])==0) {
                        $this->session->set_userdata('user_id', $user['idUser']);
                        return;
                    }
                    throw new Exception("Mot de passe érroné");
                }
            }
            throw new Exception("Unknown username");
        }

        
        
        public function log_out() {
            $this->session->unset_userdata('user_id');   
        }


        public function checkUser() {
            if($this->session->has_userdata('user_id')) {
                return true;
            }
            return false;
        }

        public function getLogedUser() {
            $user_id = $this->session->userdata('user_id');
            $sql = 'SELECT * FROM user WHERE idUser=%s';
            $sql = sprintf($sql, $user_id);
            $query = $this->db->query($sql);
            $user = $query->row_array();
            return $user;
        }
    }
?>