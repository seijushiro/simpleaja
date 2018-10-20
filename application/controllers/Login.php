<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("LoginModel");

	}
	public function index()
	{
		if($this->session->has_userdata("username")){
			$this->session->unset_userdata("nama");
			$this->session->unset_userdata("cuser");
		}
		$flash_data = $this->session->flashdata('result_submit');
		if(isset($flash_data)){
			$data['result_submit'] = $flash_data;
		}else{
			$data['result_submit'] = null;
		}
		$this->load->view('login_layout',$data);
	}
	public function doLogin()
	{
		$user = $this->input->post("username");
		$pass = $this->input->post("password");

		
		$ceklogin = $this->LoginModel->getUserData($user,$pass);
		if($ceklogin){
			$this->session->set_userdata("username",$ceklogin['cuser']);
			$this->session->set_userdata("nama",$ceklogin['nama']);
			$this->session->set_userdata("status",$ceklogin['tipe']);
			$this->session->set_userdata("menu",$ceklogin['akses']);
			$this->session->set_userdata("id_kon",$ceklogin['id_kontraktor']);
			
			redirect(base_url()."Dashboard");
		}else{
			$data = array("msg" =>'Username / Password Anda Salah.');			
			$this->session->set_flashdata('result_submit',$data);
			redirect(base_url('Login'));
		}		
	}

}
