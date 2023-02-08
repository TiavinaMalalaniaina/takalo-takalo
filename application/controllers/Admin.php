<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
        if(!$this->log_model->checkUser()) {
            redirect(site_url('log'));
        }
    }

    public function index() {
        $this->load->model('categorie_model');
        $this->load->model('user_model');
        $this->load->model('echange_model');

        $categories = $this->categorie_model->getAllCategorie();
        $nbrUser = $this->user_model->getNbrUser();
        $nbrEchange = $this->echange_model->getNbrEchange();

        $data = array(
            'categories' => $categories,
            'nbrUser' => $nbrUser,
            'nbrEchange' => $nbrEchange
        );

    }
	
	
}
