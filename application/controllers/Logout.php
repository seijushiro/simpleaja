<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	public function __construct(){
		parent:: __construct();

	}
	public function index()
	{
		$this->session->unset_userdata("nama");
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("status");
		$this->session->unset_userdata("menu");
		$this->session->unset_userdata("id_kon");		
		$data['statlogin'] = null;

		redirect(base_url());
		
	}

}
