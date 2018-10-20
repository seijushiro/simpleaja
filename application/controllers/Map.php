<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('IndexModel');


	}
	public function index()
	{
		$data['data_lokasi'] = $this->IndexModel->getDataLokasi();
		$this->load->view('home_layout',$data);
	}
	
	public function getMap(){
        $rs = $this->IndexModel->getDataLokasi();
		$this->output->set_content_type('application/json')->set_output(json_encode($rs));
	}

	public function FullMap()
	{	
		if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');
		else{
			$data['data_lokasi'] = $this->IndexModel->getDataLokasi();
			$this->load->view('map_layout',$data);
		}
	}	
}
