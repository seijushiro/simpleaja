<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("IndexModel");				
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Dashboard";
			$menu["akses"] = $this->session->userdata("menu");

			$chart["data_lelang"] = $this->IndexModel->getDataLelang();
			$data["data_rekap"] = $this->IndexModel->getRekapData();			
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('dashboard_layout',$data);
			$this->load->view('footer_admin',$chart);
		}else{
			redirect(base_url().'Login');
		}
	}
		
		
}
