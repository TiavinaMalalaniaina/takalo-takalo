<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
		$this->load->helper('form');
	}
	


	public function index($error = '') {	
		$data = array(
			'error' => urldecode($error)
		);
		$this->load->view('log_form', $data);
	}		



    public function login() {
        //Recuperation des donnes
		$username = $this->input->post('username');
        $mdp = $this->input->post('mdp');

		try {
			//log in
			$this->log_model->log_in($username, $mdp);
			var_dump($this->session->all_userdata());
			redirect(site_url('log/index'));
			//TODO: redirect to a home_page_controller
		} catch (Exception $e) {
			redirect(site_url('log/index/'.$e->getMessage()));
		}
    }

	
	
	public function logout() {
		$this->log_model->log_out();
		redirect(site_url('log/index'));
	}
}
