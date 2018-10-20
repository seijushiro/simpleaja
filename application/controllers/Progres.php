<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Progres extends CI_Controller {
	public function __construct(){
		parent:: __construct();

		$this->load->model("ProgresModel");	
		$this->load->library("MySlim");
		$this->load->library('upload');				
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Laporan";
			$menu["akses"] = $this->session->userdata("menu");			
 			$data["data_tabel"] = $this->ProgresModel->getData();

			$flash_data = $this->session->flashdata('result_submit');
			if(isset($flash_data)){
				$data['result_submit'] = $flash_data;
			}else{
				$data['result_submit'] = null;
			}
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('progres/progres_layout',$data);
			$this->load->view('footer_admin');		
		}else{
			redirect(base_url().'Login');
		}
	}


// TAMBAH DATA =====================
	public function Lapor($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Laporan";
			$menu["akses"] = $this->session->userdata("menu");
			$data["data_tabel"] = (array)$this->ProgresModel->getDataById($id);


			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('progres/progres_add',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}


	public function SaveData()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");

			$image1 = Slim::getImages('foto1');
			$foto1 = 'data:image/jpeg;base64,'.base64_encode($image1[0]['output']['data']);

			$image2 = Slim::getImages('foto2');
			$foto2 = 'data:image/jpeg;base64,'.base64_encode($image2[0]['output']['data']);

			$image3 = Slim::getImages('foto3');
			$foto3 = 'data:image/jpeg;base64,'.base64_encode($image3[0]['output']['data']);

			$image4 = Slim::getImages('foto4');
			$foto4 = 'data:image/jpeg;base64,'.base64_encode($image4[0]['output']['data']);

			$file = $this->UploadFile('userfile','progres_'.$id.'_'.date('Y-m-d H.i.s').'.pdf',$id);			

			$save = $this->ProgresModel->SimpanData($id,$foto1,$foto2,$foto3,$foto4,$file);
			if($save==1){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");		
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");				
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Progres"));
		}else{
			redirect(base_url().'Login');
		}
	}

	public function UploadFile($file,$name,$id){

        $config['upload_path']		= './uploads/progres/'.$id;
        $config['allowed_types']    = 'pdf';
        $config['file_name']        = $name;
        $config['overwrite']        = true;
        
		if (!is_dir('uploads/progres/'.$id)) {
		    mkdir('./uploads/progres/' .$id, 0777, TRUE);

		}
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($file)){
            return false;
        }else{
            return $this->upload->data('file_name'); ;
        }        
	}
}
