<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorie extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('Categorie_model');
		$this->load->model('user_model');
		$this->load->model('echange_model');
        $this->load->model('object_model');
		$this->load->helper('form');
	}
    
    public function index($error = '') {	
		$data = array(
			'error' => urldecode($error)
		);
        $table = $this->Categorie_model->getAllCategorie();
        $user = $this->user_model->getNbrUser();
        $echange = $this->echange_model->getNbrEchange();
        $data = array(
            'table'=>$table,
            'nbrUser'=>$user,
            'nbrEchange'=>$echange
        );
		$this->load->view('Categorie_form',$data);
	}
    
    public function insertCategorie(){
        /* idCategorie | nom */
        $name = $this->input->post('name');
        $this->Categorie_model->insertCategorie($name);
        redirect(base_url('Categorie/'));
        
    }
    
    public function updateCategorie(){
        // /* idCategorie | nom */
        $id = $this->input->post('idCateg');
        $this->object_model->updateCateg($_SESSION['idObject'],$id);
        redirect(base_url('Categorie/'));
    }
    public function sendUpdate(){
        $id = $this->input->get('id');
        $_SESSION['idObject'] = $id;
        $cate = $this->Categorie_model->getAllCategorie();
        $valiny = $this->object_model->getOneObject($id);
        $data = array('valiny'=>$valiny,'cate'=>$cate);
		$this->load->view('Categorie_update',$data);

    }
}
?>