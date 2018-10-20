<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProgresModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$id = $this->session->userdata('id_kon');
		$and = ($id!=0?" and id_kontraktor='$id'":"");
		
		$sql = "SELECT a.*,b.nm_kegiatan from proyek_kontraktor a join proyek_lelang b on a.no_reg=b.no_reg Where a.progres<>100".$and;
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}


	public function getDataById($id)
	{
		
		$sql = "SELECT a.*,b.nm_kegiatan from proyek_kontraktor a join proyek_lelang b on a.no_reg=b.no_reg Where a.progres<>100 and a.no_reg='$id'";
		$query = $this->db->query($sql);
	 	return $query->row();
	}

	public function SimpanData($no,$foto1,$foto2,$foto3,$foto4,$file)
	{
		$id = $this->session->userdata('id_kon');
		$this->db->trans_start();
		$tgl_mulai = $this->db->query("SELECT tgl_mulai from proyek_kontraktor where no_reg=?",array($no))->row()->tgl_mulai;
		$selisih = round((time()-strtotime($tgl_mulai))/ (60 * 60 * 24));
		$efektif = $this->db->query("SELECT efektif from proyek_lelang where no_reg=?",array($no))->row()->efektif;
		$progres = round(($selisih/$efektif)*100);
		$this->db->query("INSERT INTO progres_pekerjaan (tgl_lapor,no_reg,id_kontraktor,foto1,foto2,foto3,foto4,file_pdf,progres) 			
			VALUES (NOW(),?,?,?,?,?,?,?,?)",array($no,$id,$foto1,$foto2,$foto3,$foto4,$file,$progres));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}



}


?>