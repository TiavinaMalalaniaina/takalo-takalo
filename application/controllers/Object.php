<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Object extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
		$this->load->model('object_model');
        if(!$this->log_model->checkUser()) {
            redirect(site_url('log'));
        }
	}
	
	public function index($error = '')
	{	
		$data = array('error' => urldecode($error));
        //TODO: redirect to the home_page
        echo 'home_page';
        // redirect(site_url('home'));
	}	

	public function giveObject(){
        $table = $this->object_model->getOtherObjectDetailled($_SESSION['user_id']);
		$data = array('table'=>$table);
		$this->load->view('listeProduit',$data);
    }

	public function updateObject() {
		$idObject = $this->input->post('idObject');
		$titre = $this->input->post('titre');
		$description = $this->input->post('description');
		$prix = $this->input->post('prix');
		$idCategorie = $this->input->post('idCategorie');
		$this->object_model->updateObject($idObject, $titre, $description, $prix, $idCategorie);
	}

	public function insertObject(){
		$idUser = $this->session->userdata('user_id');
		$titre = $this->input->post('titre');
		$prix = $this->input->post('prix');
		$description = $this->input->post('description');
		$idCategorie = $this->input->post('idCategorie');
		$this->object_model->insertObject($idUser, $titre, $description, $prix,$idCategorie);
		redirect(site_url('object/uploadForm'));
	}

	
	
	public function insertObjectForm(){
		$categories = $this->object_model->getAllCategorie();
		$data = array('categories' => $categories);
		$this->load->view('insertObject', $data);
	}

	public function uploadForm() {
		$this->load->view('uploadObject');
	}

	public function do_upload() {
		$this->object_model->do_upload();
		// redirect(site_url('object/uploadForm'));
	}

	public function user() {
		$idUser = $this->input->get('idUser');
		$objects = $this->object_model->getAllObject($idUser);
		$data = array('objects' => $objects); 
	}

	public function search() {
		$text = $this->input->post('text');
		$idCategorie = $this->input->post('idCategorie');
		$objects = $this->object_model->search($text, $idCategorie);
		$categories = $this->object_model->getAllCategorie();
		$data = array(
			'objects' => $objects,
			'categories' => $categories
		);
		$this->load->view('listObject', $data); 
	}

	public function profile () {
		$this->load->model('user_model');
		$this->load->model('echange_model');
		$idUser = $this->session->userdata('user_id');
		$user = $this->user_model->getUserById($idUser);
		$objects = $this->object_model->getAllObjectDetailled($idUser);
		$prop = $this->echange_model->getPropositionReceived();
		$data = array(
			'objects' => $objects,
			'user' => $user,
			'prop' => $prop
		);
		$this->load->view('profile', $data);
	}

	public function otherProfile() {
		$this->load->model('user_model');
		$idUser = $this->input->get('idUser');
		$user = $this->user_model->getUserById($idUser);
		$objects = $this->object_model->getAllObjectDetailled($idUser);
		$data = array(
			'objects' => $objects,
			'user' => $user
		);
		$this->load->view('profile', $data);
	}

	public function saveImage() {
        $this->load->model('images_model');
        $filename = $this->images_model->getNameNewImage();
		$config['upload_path']		= './assets/img/object/';
		$config['allowed_types']	= 'gif|png|jpg|jpeg';
		$config['filename']	= $filename;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('image')) {
			$error = array('error' => $this->upload->display_errors());
			$idObject = $this->input->get('idObject');
            $this->object_model->addImage($filename, $idObject);
		} else 	echo "done";
	}

	public function detailObject() {
		$idObject = $this->input->get('idObject');
		$object = $this->object_model->getOneObjectDetailled($idObject);
		$hist = $this->object_model->getHistorique($idObject);
		$data = array(
			'object'=>$object,
			'hist' => $hist
		);
		$this->load->view('object_detail', $data);
	}

	public function addObject() {
		$idUser = $this->input->get('idUser');
		$idEchange = $this->input->get('idEchange');
		$this->load->model('user_model');
		$user = $this->user_model->getUserById($idUser);
		$objects = $this->object_model->getAllObjectDetailled($idUser);
		$data = array(
			'objects' => $objects,
			'user' => $user,
			'idEchange' => $idEchange
		);
		$this->load->view('addObject', $data);
	}

	public function listObject($text='', $idCategorie=0) {
		$idUser = $this->session->userdata('user_id');
		$objects = $this->object_model->getAllAllObjectDetailled($idUser);
		$categories = $this->object_model->getAllCategorie();
		$data = array(
			'objects' => $objects,
			'categories' => $categories
		);
		$this->load->view('listObject', $data);
	}

	// TODO add Object to the echange

}
