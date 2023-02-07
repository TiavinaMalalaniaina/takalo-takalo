<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Echange extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('echange_model');
        if(!$this->log_model->checkUser()) {
            redirect(site_url('log'));
        }
	}
	
	public function index($error = '')
	{	
        $echanges = $this->echange_model->validateEchange(1);
        //TODO: redirect to the home_page
        echo 'home_page';
        // redirect(site_url('home'));
	}	


    public function proposition($idEchange='') {
        $objectSends = $this->echange_model->getPropositionSend($idEchange);
        $objectReceived = $this->echange_model->getPropositionReceived($idEchange);
        $data = array(
            'objectSend' => $objectSends,
            'objectReceived' => $objectReceived
        );
    }

    public function validateEchange() {
        $idEchange = $this->input->get('idEchange');
        $this->echange_model->validateEchange($idEchange);
    }

    public function refusedEchange() {
        $idEchange = $this->input->get('idEchange');
        $this->echange_model->refusedEchange($idEchange);
    }

}
