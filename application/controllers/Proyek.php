<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Proyek extends CI_Controller {
	public function __construct(){
		parent:: __construct();

		$this->load->model("ProyekModel");
		$this->load->library("Pdf");
        $this->load->library('upload');
 		$this->load->library('ServersideDT');
 		if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');
				
	}
	public function index()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");			
 			$data["data_tabel"] = $this->ProyekModel->getData();

			$flash_data = $this->session->flashdata('result_submit');
			if(isset($flash_data)){
				$data['result_submit'] = $flash_data;
			}else{
				$data['result_submit'] = null;
			}
		
			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_layout',$data);
			$this->load->view('footer_admin');		
		}else{
			redirect(base_url().'Login');
		}
	}

    public function getData()
    {

        $data = $this->ProyekModel->getServerSideDT();
        echo json_encode($data);
    }

// TAMBAH DATA =====================
	public function AddPage()
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SaveData";
			$data["autonumb"] = $this->ProyekModel->getNoTransaksi();
			$data["data_tabel"] = null;
			$data["data_wilayah"] = $this->ProyekModel->getDataWilayah();
			$data["data_sumber"] = $this->ProyekModel->getDataSumber();
			$data["data_ruas"] = $this->ProyekModel->getDataRuas();

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_add',$data);
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
			$ket = $this->input->post("ket");

			$almt = $this->input->post("alamat");
			$long = $this->input->post("long");
			$lat = $this->input->post("lat");

			$wil = $this->input->post("wil");
			$pagu = str_replace(",","", $this->input->post("pagu"));
			$file = $this->UploadFile('userfile','pagu_'.$no.'.pdf');

			$hps = str_replace(",","", $this->input->post("nilai"));
			$sumber = $this->input->post("sumber");
			$thn = $this->input->post("tahun");
			$ruas = $this->input->post("ruas");
			$ppk = $this->input->post("ppk");
			$efe = $this->input->post("efektif");
			$fung = $this->input->post("fungsional");
			
			if($file==false){
				$data_save = array("msg"=>"Gagal Mengupload File..");
			}else{	
				$save = $this->ProyekModel->SimpanData($no,$tgl,$ket,$almt,$long,$lat,$wil,$pagu,$file,$hps,$sumber,$thn,$ruas,$ppk,$efe,$fung);
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

// EDIT DATA =====================
	public function EditPage($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "UpdateData";
			$data["autonumb"] = $this->ProyekModel->getNoTransaksi();
			$data["data_tabel"] = (array)$this->ProyekModel->getDataById($id);
			$data["data_wilayah"] = $this->ProyekModel->getDataWilayah();
			$data["data_sumber"] = $this->ProyekModel->getDataSumber();
			$data["data_ruas"] = $this->ProyekModel->getDataRuas();

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_add',$data);
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
			$ket = $this->input->post("ket");

			$almt = $this->input->post("alamat");
			$long = $this->input->post("long");
			$lat  = $this->input->post("lat");

			$wil  = $this->input->post("wil");
			$pagu = str_replace(",","", $this->input->post("pagu"));
			$file = ($this->input->post('userfile')!==null?$this->UploadFile('userfile','Pagu_'.$no.'.pdf'):$this->input->post("pagu_old"));

			$hps = str_replace(",","", $this->input->post("nilai"));
			$sumber = $this->input->post("sumber");
			$thn = $this->input->post("tahun");
			$ruas = $this->input->post("ruas");

			$ppk = $this->input->post("ppk");
			$efe = $this->input->post("efektif");
			$fung = $this->input->post("fungsional");

			if($file==false){
				$data_save = array("msg"=>"Gagal Mengupload File..");
			}else{
				$save = $this->ProyekModel->UbahData($no,$tgl,$ket,$almt,$long,$lat,$wil,$pagu,$file,$hps,$sumber,$thn,$ruas,$ppk,$efe,$fung);
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
			$del = $this->ProyekModel->HapusData($id);
			if($del==true){
				$data_save = array("msg"=>"Proses Hapus Berhasil !");						
			}else{
				$data_save = array("msg"=>"Gagal Menghapus Data..");				
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Proyek"));
		}else{
			redirect(base_url().'Login');
		}
	}	
// PENGUMUMAN LELANG =====================
	public function Pengumuman($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SavePengumuman";
			$rs = $this->ProyekModel->getDataPengumumanById($id);
			$data["data_tabel"] = (isset($rs)?(array)$rs:null);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_pengumuman',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}
	public function SavePengumuman()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$no = $this->input->post("no");
			$tgl = $this->input->post("tgl");
			
			$file = $this->UploadFile('userfile','Pengumuman_'.$id.'.pdf');
			if($file==false){
				$data_save = array("msg"=>"Gagal Mengupload File..");
			}else{
				$save = $this->ProyekModel->SimpanPengumuman($id,$no,$tgl,$file);
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
// PEMENANG LELANG =====================
	public function Pemenang($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SavePemenang";
			$rs = $this->ProyekModel->getDataPemenangById($id);
			$data["data_tabel"] = (isset($rs)?(array)$rs:null);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_pemenang',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}
	public function SavePemenang()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$no = $this->input->post("no");
			$tgl = $this->input->post("tgl");
			$nm = $this->input->post("nama");
			
			$file = $this->UploadFile('userfile','Pemenang_'.$id.'.pdf');

			$save = $this->ProyekModel->SimpanPemenang($id,$no,$tgl,$nm,$file);
			if($save==true){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");				
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Proyek"));
		}else{
			redirect(base_url().'Login');
		}
	}

// SPBBJ LELANG =====================
	public function SPBBJ($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$data["action"] = "SaveSPBBJ";
			$rs = $this->ProyekModel->getDataSPBBJById($id);
			$data["data_tabel"] = (isset($rs)?(array)$rs:null);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_spbbj',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}
	public function SaveSPBBJ()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$no = $this->input->post("no");
			$tgl = $this->input->post("tgl");
			$hrg1 = str_replace(",","", $this->input->post("hrg_penawaran"));
			$hrg2 = str_replace(",","", $this->input->post("hrg_koreksi"));
			
			$file = $this->UploadFile('userfile','SPBBJ_'.$id.'.pdf');

			$save = $this->ProyekModel->SimpanSPBBJ($id,$no,$tgl,$hrg1,$hrg2,$file);
			if($save==true){
				$data_save = array("msg"=>"Proses Simpan Berhasil !");				
			}else{
				$data_save = array("msg"=>"Gagal Menyimpan Data..");
			}
			$this->session->set_flashdata('result_submit',$data_save);
			redirect(base_url("Proyek"));
		}else{
			redirect(base_url().'Login');
		}
	}

// DETAIL LELANG =====================
	public function Detail($id)
	{	
		if($this->session->has_userdata("username")){
			$menu["active_ctrl"] = "Lelang";
			$menu["akses"] = $this->session->userdata("menu");
			$rs = $this->ProyekModel->getDataDetailById($id);
			$data["data_tabel"] = (isset($rs)?(array)$rs:null);

			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view('proyek/proyek_detail',$data);
			$this->load->view('footer_admin');	
		}else{
			redirect(base_url().'Login');
		}
	}

	public function UploadFile($file,$name){

        $config['upload_path']		= './uploads/';
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

	public function GetPPK()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$ppk = $this->input->post("ppk");
			$data = $this->ProyekModel->getDataPPKByWil($id,$ppk);
			if(!empty($data)){
				echo json_encode($data);
			}else{
				echo json_encode(array("-"));
			}
		}else{
			redirect(base_url().'Login');
		}
	}

	public function GetRuasLocation()
	{	
		if($this->session->has_userdata("username")){
			$id = $this->input->post("id");
			$data = $this->ProyekModel->getDataRuasById($id);
			if(!empty($data)){
				echo json_encode($data);
			}else{
				echo json_encode(array("Kosong"));
			}
		}else{
			redirect(base_url().'Login');
		}
	}			
}

