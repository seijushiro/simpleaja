<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class HakAkses extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("HakAksesModel");
		if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');

				
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Setup";
			$menu["akses"] = $this->session->userdata("menu");			
 			$data["data_tabel"] = $this->HakAksesModel->getData();

			$flash_data = $this->session->flashdata('result_submit');
			if(isset($flash_data)){
				$data['result_submit'] = $flash_data;
			}else{
				$data['result_submit'] = null;
			}
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('hakakses/hakakses_layout',$data);
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
			$data["data_kontraktor"] = $this->HakAksesModel->getDataKontraktor();

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('hakakses/hakakses_add',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}
	public function SaveData()
	{	
		if($this->session->has_userdata("username")){
			$user = $this->input->post("user");
			$nama = $this->input->post("nama");
			$pass = $this->input->post("pass");
			$stat = $this->input->post("status");
			$kontrak = $this->input->post("kontraktor");
	
			$save = $this->HakAksesModel->SimpanData($user,$nama,$pass,$stat,$kontrak);
			if($save==true){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");						
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");				
			}
			$this->session->set_flashdata('statImport',$data_save);
			redirect(base_url("HakAkses"));
		}else{
			redirect(base_url().'Login');
		}
	}
// HAPUS DATA 	=============================
	public function DeleteData($id)
	{	
		if($this->session->has_userdata("username")){
			$del = $this->HakAksesModel->HapusData($id);
			if($del==true){
				$data_save = array("msg"=>"Proses Hapus Berhasil !");						
			}else{
				$data_save = array("msg"=>"Gagal Menghapus Data..");				
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("HakAkses"));
		}else{
			redirect(base_url().'Login');
		}
	}	

//EDIT DATA ====================================
	public function EditPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Setup";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "UpdateData";
			$data["data_tabel"] = (array)$this->HakAksesModel->getDataById($id);
			$data["data_kontraktor"] = $this->HakAksesModel->getDataKontraktor();

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('hakakses/hakakses_add',$data);
			$this->load->view('footer_admin');					
		}else{
			redirect(base_url().'Login');
		}
	}
	public function UpdateData()
	{	
		if($this->session->has_userdata("username")){
			$user = $this->input->post("user");
			$nama = $this->input->post("nama");
			$pass = $this->input->post("pass");
			$stat = $this->input->post("status");
			$kontrak = $this->input->post("kontraktor");

			$save = $this->HakAksesModel->UbahData($user,$nama,$pass,$stat,$kontrak);
			
			if($save==true){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");	
				
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("HakAkses"));
		}else{
			redirect(base_url().'Login');
		}
	}

	public function AksesPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Setup";
			$menu["akses"] = $this->session->userdata("menu");
 
			$data["menu"] = $this->HakAksesModel->getMenu();
			$data["user_akses"] = $this->HakAksesModel->getMenuById($id);
			$data["data_tabel"] = (array)$this->HakAksesModel->getDataById($id);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('hakakses/hakakses_menu',$data);
			$this->load->view('footer_admin');					
		}else{
			redirect(base_url().'Login');
		}
	}
	public function AddAkses()
	{	
		if($this->session->has_userdata("username")){
			$user = $this->input->post("user");
			$menu = $this->input->post("menu_akses");

			$save = $this->HakAksesModel->SimpanHakAkses($user,$menu);			
			if($save==true){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");	
				
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("HakAkses"));
		}else{
			redirect(base_url().'Login');
		}
	}
}

