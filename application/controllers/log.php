<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('user_model');
		$this->load->helper('form');
	}
	


	public function index($error = '') {	
		$data = array(
			'error' => urldecode($error)
		);
		$this->load->view('login', $data);
	}		



    public function login() {
		$username = $this->input->post('username');
        $mdp = $this->input->post('mdp');

		try {
			$this->log_model->log_in($username, $mdp);
			$user = $this->log_model->getLogedUser();
			if($user['admin']==1){
				redirect(site_url('Categorie/index'));
			}else{
				redirect(site_url('object/profile'));
			}
		} catch (Exception $e) {
			redirect(site_url('log/index/'.$e->getMessage()));
		}
    }
	
	public function logout() {
		$this->log_model->log_out();
		redirect(site_url('log/index'));
	}

	public function sign() {
		$this->load->model('user_model');
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$mdp = $this->input->post('mdp');

		$this->user_model->saveNewUser($nom, $prenom, $mdp);
		redirect(site_url('log/index'));
	}

	public function signup() {
		$this->load->view('inscription');
	}

	public function pdp() {
		
	}

	public function savePdp() {
		$config['upload_path']		= './assets/img/profile/';
		$config['allowed_types']	= 'gif|png|jpg|jpeg';

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			
		} else 	echo "done";
	}
}
