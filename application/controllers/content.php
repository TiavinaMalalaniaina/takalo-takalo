<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	


	public function __construct() {
		parent::__construct();
		$this->load->model('log_model');
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
	
	
	public function do_upload() {
		$config['upload_path']		= './assets/img/';
		$config['allowed_types']	= 'gif|png|jpg|';


		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		} else 	echo "done";

	}

}
