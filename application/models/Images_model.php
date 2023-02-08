<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Images_model extends CI_Model {

        public function getNameNewImage() {
            $sql = "SELECT count(*) s FROM images ORDER BY idImages DESC LIMIT 1";
            $query = $this->db->query($sql);
            $nbr = $query->row_array();
            return 'im'.$nbr['s'].'.png';
        }

    }
?>