<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Arsip extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("ArsipModel");
		$this->load->library("Pdf");
		$this->load->library('upload');
        if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');

				
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "ArsipDokumen";
			$menu["akses"] = $this->session->userdata("menu");			
 			$data["data_tabel"] = $this->ArsipModel->getData();

			$flash_data = $this->session->flashdata('result_submit');
			if(isset($flash_data)){
				$data['result_submit'] = $flash_data;
			}else{
				$data['result_submit'] = null;
			}
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('arsip/arsip_layout',$data);
			$this->load->view('footer_admin');		
		}else{
			redirect(base_url().'Login');
		}
	}


// TAMBAH DATA =====================
	public function AddPage()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "ArsipDokumen";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SaveData";
			$data["autonumb"] = $this->ArsipModel->getNoTransaksi();
			$data["data_tabel"] = null;
			$data["data_lemari"] = $this->ArsipModel->getDataLemari();

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('arsip/arsip_add',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}


	public function SaveData()
	{	
		if($this->session->has_userdata("username")){
			$no = $this->input->post("no");
			$tgl = $this->input->post("tgl");
			$lem = $this->input->post("lemari");
			$ket = $this->input->post("keterangan");
		
			$file = $this->UploadFile('userfile','Arsip_'.$ket.'.pdf');
			
			if($file==false){
				$data_save = array("msg"=>"Gagal Mengupload File..");
			}else{	
				$save = $this->ArsipModel->SimpanData($no,$tgl,$ket,$lem,$file);
				if($save==true){
					$data_save = array("msg"=>"Proses Simpan Berhasil !");				
				}else{
					$data_save = array("msg"=>"Gagal Menyimpan Data..");
				}
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Arsip"));
		}else{
			redirect(base_url().'Login');
		}
	}

// EDIT DATA =====================
	public function EditPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "ArsipDokumen";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "UpdateData";
			$data["autonumb"] = null;
			$data["data_tabel"] = (array)$this->ArsipModel->getDataById($id);
			$data["data_lemari"] = $this->ArsipModel->getDataWilayah();

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('arsip/arsip_add',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}


	public function UpdateData()
	{	
		if($this->session->has_userdata("username")){
			$no = $this->input->post("no");
			$tgl = $this->input->post("tgl");
			$lem = $this->input->post("lemari");
			$ket = $this->input->post("keterangan");

			$file = $this->UploadFile('userfile','Arsip_'.$ket.'.pdf');
			
			if($file==false){
				$data_save = array("msg"=>"Gagal Mengupload File..");
			}else{
				$save = $this->ArsipModel->UbahData($no,$tgl,$ket,$lem,$file);
				if($save==true){
					$data_save = array("msg"=>"Proses Simpan Berhasil !");				
				}else{
					$data_save = array("msg"=>"Gagal Menyimpan Data..");
				}
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Proyek"));
		}else{
			redirect(base_url().'Login');
		}
	}

// HAPUS DATA 	=============================
	public function DeleteData($id)
	{	
		if($this->session->has_userdata("username")){
			$data = $this->ArsipModel->getCFile($id);
			$del = $this->ArsipModel->HapusData($id);
			if($del==true){
				$data_save = array("msg"=>"Proses Hapus Berhasil !");						
			}else{
				$data_save = array("msg"=>"Gagal Menghapus Data..");				
			}
			unlink('./uploads/arsip/'.$data->cfile);
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Proyek"));
		}else{
			redirect(base_url().'Login');
		}
	}	



	public function UploadFile($file,$name){

        $config['upload_path']		= './uploads/arsip/';
        $config['allowed_types']    = 'pdf';
        $config['file_name']        = $name;
        $config['overwrite']        = true;
        

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($file)){
            return false;
        }else{
            return $this->upload->data('file_name'); ;
        }        
	}	
}

