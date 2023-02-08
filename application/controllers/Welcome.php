<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		// $this->load->view('login');
		// $this->load->view('header');
		// $this->load->view('profil');
		$this->load->view('modifier');

	}
	public function log($error='' ){
		$data = array('error' => urldecode($error));
		$this->load->view('log_form', $data);
	}
	public function login(){
		$this->load->view('login');
	}
	public function head(){
		$this->load->view('head');
	}
	public function inscri(){
		$this->load->view('inscription');
	}
	public function ajout(){
		$this->load->view('ajout');
	}
	public function page(){
		$data['contents']='profil';
		$this->load->view('page',$data);
	}
}
