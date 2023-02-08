<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('form');
	}

	public function sign_form() {
		$this->load->view('inscription');		
	}

	public function sign() {
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');
		$mdp = $this->input->post('mdp');

		$this->user_model->saveNewUser($nom, $prenom, $mdp);
		redirect(site_url('log/index'));
	}

	public function pdp() {
		
	}

	public function savePdp() {
        $this->load->model('images_model');
        $filename = $this->images_model->getNameNewImage();
		$config['upload_path']		= './assets/img/profile/';
		$config['allowed_types']	= 'gif|png|jpg|jpeg';
		$config['filename']	= $filename;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			$idUser = $this->session->userdata('user_id');
            $this->user_model->setImageUser($filename, $idUser);
		} else 	echo "done";
	}
}
