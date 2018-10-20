<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Sumber extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("SumberModel");	
		if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');			
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Setup";
			$menu["akses"] = $this->session->userdata("menu");			
 			$data["data_tabel"] = $this->SumberModel->getData();

			$flash_data = $this->session->flashdata('result_submit');
			if(isset($flash_data)){
				$data['result_submit'] = $flash_data;
			}else{
				$data['result_submit'] = null;
			}
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('sumber/sumber_layout',$data);
			$this->load->view('footer_admin');		
		}else{
			redirect(base_url().'Login');
		}
	}


// TAMBAH DATA =====================
	public function AddPage()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Setup";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SaveData";
			$data["data_tabel"] = null;
			$data["autonum"] = $this->SumberModel->getAutonumb();


			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('sumber/sumber_add',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}


	public function SaveData()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");
			
			$save = $this->SumberModel->SimpanData($id,$nama);
			if($save==1){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");		
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");				
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Sumber"));
		}else{
			redirect(base_url().'Login');
		}
	}
// HAPUS DATA 	=============================
	public function DeleteData($id)
	{	
		if($this->session->has_userdata("username")){
			$del = $this->SumberModel->HapusData($id);
			if($del==0){
				$data_error = array("msg"=>"Gagal Menghapus Data...");								
			}else{
				$data_error = array("msg"=>"Berhasil Menghapus Data...");				
			}
			$this->session->set_flashdata("result_submit",$data_error);									
			redirect(base_url("Sumber"));
		}else{
			redirect(base_url().'Login');
		}
	}	

//EDIT DATA ====================================
	public function EditPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["akses"] = $this->session->userdata("menu");
			$menu["active_ctrl"] = "Setup";			
			$data["action"] = "UpdateData";
			$data["data_tabel"] = (array)$this->SumberModel->getDataById($id);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('sumber/sumber_add',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}
	public function UpdateData()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$nama = $this->input->post("nama");

			$save = $this->SumberModel->UbahData($id,$nama);
			if($save==1){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");		
			}else{
				$data_save = array("msg"=>"Proses Simpan Gagal !");						
			}
			$this->session->set_flashdata("result_submit",$data_save);
			redirect(base_url("Sumber"));
		}else{
			redirect(base_url().'Login');
		}
	}



}
