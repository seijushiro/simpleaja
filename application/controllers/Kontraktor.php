<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Kontraktor extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("KontraktorModel");	
		if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');			
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");			
 			$data["data_tabel"] = $this->KontraktorModel->getData();
 			$data["data_trans"] = null;

			$flash_data = $this->session->flashdata('result_submit');
			if(isset($flash_data)){
				$data['result_submit'] = $flash_data;
			}else{
				$data['result_submit'] = null;
			}
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('kontraktor/kontraktor_layout',$data);
			$this->load->view('footer_admin');		
		}else{
			redirect(base_url().'Login');
		}
	}


// TAMBAH DATA =====================
	public function AddPage()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SaveData";
			$data["data_tabel"] = null;

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('kontraktor/kontraktor_add',$data);
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
			$telp = $this->input->post("telp");
			$alamat = $this->input->post("alamat");	

			$pejabat = $this->input->post("nm_pejabat");
			$jabatan = $this->input->post("jabatan");
			$no_pajak = $this->input->post("no_pajak");
			$no_siup = $this->input->post("jo_siup");
			
			$save = $this->KontraktorModel->SimpanData($nama,$alamat,$telp,$pejabat,$jabatan,$no_pajak,$no_siup);
			if($save==1){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");		
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");				
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Kontraktor"));
		}else{
			redirect(base_url().'Login');
		}
	}
// HAPUS DATA 	=============================
	public function DeleteData($id)
	{	
		if($this->session->has_userdata("username")){
			$del = $this->KontraktorModel->HapusData($id);
			if($del==0){
				$data_error = array("msg"=>"Gagal Menghapus Data...");								
			}else{
				$data_error = array("msg"=>"Berhasil Menghapus Data...");				
			}
			$this->session->set_flashdata("result_submit",$data_error);									
			redirect(base_url("Kontraktor"));
		}else{
			redirect(base_url().'Login');
		}
	}	

//EDIT DATA ====================================
	public function EditPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["akses"] = $this->session->userdata("menu");
			$menu["active_ctrl"] = "Lelang";			
			$data["action"] = "UpdateData";
			$data["data_tabel"] = (array)$this->KontraktorModel->getDataById($id);
			
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('kontraktor/kontraktor_add',$data);
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
			$telp = $this->input->post("telp");
			$alamat = $this->input->post("alamat");
			$pejabat = $this->input->post("nm_pejabat");
			$jabatan = $this->input->post("jabatan");
			$pajak = $this->input->post("no_pajak");
			$siup = $this->input->post("no_siup");			

			$save = $this->KontraktorModel->UbahData($id,$nama,$alamat,$telp,$pejabat,$jabatan,$pajak,$siup);
			if($save==1){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");		
			}else{
				$data_save = array("msg"=>"Proses Simpan Gagal !");						
			}
			$this->session->set_flashdata("result_submit",$data_save);
			redirect(base_url("Kontraktor"));
		}else{
			redirect(base_url().'Login');
		}
	}

	public function ProyekPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
 
			$data["proyek"] = $this->KontraktorModel->getDataProyek();
			$data["user_proyek"] = $this->KontraktorModel->getProyekById($id);
			$data["daftar_proyek"] = $this->KontraktorModel->getDataProyekById($id);
			$data["data_tabel"] = (array)$this->KontraktorModel->getDataById($id);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('kontraktor/kontraktor_proyek',$data);
			$this->load->view('footer_admin');					
		}else{
			redirect(base_url().'Login');
		}
	}
	public function AddProyek()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$proyek = $this->input->post("proyek");
			$tgl = $this->input->post("tgl");
			$save = $this->KontraktorModel->SimpanProyek($id,$proyek,$tgl);			
			if($save==true){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");	
				
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Kontraktor"));
		}else{
			redirect(base_url().'Login');
		}
	}

}
