<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proposition extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('proposition_model');
        if(!$this->log_model->checkUser()) {
            redirect(site_url('log'));
        }
	}
	
	public function index($error = '')
	{	
        //TODO: redirect to the home_page
        echo 'home_page';
        // redirect(site_url('home'));
	}	


    public function addProposition() {
        $idEchange = $this->input->post('idEchange');
        $idObject = $this->input->post('idObject');
        $this->proposition_model->addProposition($idEchange, $idObject);
    }


}
