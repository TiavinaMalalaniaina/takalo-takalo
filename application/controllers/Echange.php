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


    public function propositionSends() {
        $idEchange = $this->input->get('idEchange');
        $objectSends = $this->echange_model->getPropositionSend($idEchange);
        $objectReceived = $this->echange_model->getPropositionReceived($idEchange);
        $echange = $this->echange_model->getEchangeDetailled($idEchange);
        $data = array(
            'objectSends' => $objectSends,
            'objectReceiveds' => $objectReceived,
            'idEchange' => $idEchange,
            'echange' => $echange
        );
        $this->load->view('propositionSend', $data);
    }

    public function propositionReceiveds() {
        $idEchange = $this->input->get('idEchange');
        $objectSends = $this->echange_model->getPropositionSend($idEchange);
        $objectReceived = $this->echange_model->getPropositionReceived($idEchange);
        $echange = $this->echange_model->getEchangeDetailled($idEchange);
        $data = array(
            'objectSends' => $objectSends,
            'objectReceiveds' => $objectReceived,
            'idEchange' => $idEchange,
            'echange' => $echange
        );
        $this->load->view('propositionReceived', $data);
    }

    public function validateEchange() {
        $idEchange = $this->input->get('idEchange');
        $this->echange_model->validateEchange($idEchange);
        redirect(site_url('object/profile'));
    }

    public function refuseEchange() {
        $idEchange = $this->input->get('idEchange');
        $this->echange_model->refusedEchange($idEchange);
        redirect(site_url('object/profile'));
    }

    public function propositionSend() {
        $idUser = $this->session->userdata('user_id');
        $propositions = $this->echange_model->getPropositionSend($idUser);
        $data = array('propositions' => $propositions);
    }

    public function propositionReceived() {
        $idUser = $this->session->userdata('user_id');
        $propositions = $this->echange_model->getPropositionReceived($idUser);
        $data = array('propositions' => $propositions);
    }

    public function propose() {
        $idUser = $this->session->userdata('user_id');
        $idObject = $this->input->get('idObject');
        $this->echange_model->proposer($idUser, $idObject);
        $idEchange = $this->echange_model->getLastEchange();
        redirect(site_url('echange/propositionSends?idEchange='.$idEchange['idEchange']));
    }


}
