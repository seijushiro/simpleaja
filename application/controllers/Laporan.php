<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model("LaporanModel");
		$this->load->library("Pdf");
		if($this->session->userdata('username') !== 'admin')
        	redirect(base_url().'Dashboard');			
	}
	
    function _remap($method,$args)
    {
 
        if (method_exists($this, $method)){
               $this->$method($args);
        }else{
               $this->index($method,$args);
        }
    }

	public function index($jns)
	{	
		if($this->session->has_userdata("username")){
			$menu["akses"] = $this->session->userdata("menu");			 			
			$menu["active_ctrl"] = "Laporan";
			switch ($jns) {			
				case 'Lelang':
					$data["data_kontraktor"] = $this->LaporanModel->getDataKontraktor();
					$index_page = 'laporan/lelang/lelang_layout';
					break;

			}


			$this->load->view('header_admin');
			$this->load->view('sidemenu',$menu);
			$this->load->view($index_page,$data);
			$this->load->view('footer_admin');		
		}else{
			redirect(base_url().'Login');
		}
	}
	

	public function Cetak()
	{	
		if($this->session->has_userdata("username")){
			
			$lap = $this->input->post('id');
			
			switch ($lap) {

				case 'Lelang':
					$id = $this->input->post('kontraktor');
					$bln = $this->input->post('bln');
					$thn = $this->input->post('thn');
					$data["data_lelang"] = $this->LaporanModel->getDataLelang($id,$bln,$thn);
					$data["periode"] = $this->bln_to_str($bln).' '.$thn ;

					$lap_page = 'laporan/lelang/lelang_print';
					$kertas = 'legal';
					$orient = 'landscape';
					break;									
							
			}


			//$this->load->view($lap_page,$data);
	
			$this->pdf->load_view($lap_page,$data,$orient,$kertas);
			$this->pdf->render();
			$this->pdf->stream($lap."_".$id.".pdf",array("Attachment" => false)); 			
		}else{
			redirect(base_url().'Login');
		}
	}

	function bln_to_str($bln)
	{
		
		$bln_arr = array(null,"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
		
		return $bln_arr[$bln];
	}
}
