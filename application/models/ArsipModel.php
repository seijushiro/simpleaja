<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArsipModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT a.*,b.nm_lemari from arsip a join lemari b on a.kd_lemari=b.kd_lemari order by a.no_arsip desc";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getNoTransaksi(){
		$sql = "SELECT RIGHT(CONCAT('00000000000',RIGHT(no_arsip,9)+1),9) AutoNumb FROM arsip ORDER BY no_arsip DESC LIMIT 1";
		$rs = $this->db->query($sql)->row();
		if($rs){
			return  'A.'.date('Y').date('m').$rs->AutoNumb;		
		}else{
			return 'A.'.date('Y').date('m')."000000001";
			
		}
	}

	public function getDataLemari()
	{
		
		$sql = "SELECT * from lemari ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
	 		return $query->result_array();
	 	}else{
	 		return null;
	 	}
	}


	public function getDataById($id)
	{
		
		$sql = "SELECT a.*,b.nm_lemari from arsip a join lemari b on a.kd_lemari=b.kd_lemari where a.no_arsip='$id'";
		$query = $this->db->query($sql);
	 	return $query->row();
	}



	public function SimpanData($no,$tgl,$ket,$lem,$file)
	{
		$no = $this->getNoTransaksi();
		$usr = $this->session->userdata("username");
		$sql = "INSERT INTO arsip VALUES (?,?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query($sql,array($no,$tgl,$ket,$lem,$file,$usr));		
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function UbahData($no,$tgl,$ket,$lem,$file)
	{
		$usr = $this->session->userdata("username");
		$sql = "UPDATE arsip SET tgl_reg=?,keterangan=?,kd_lemari=?,cfile=?,cuser=? Where no_arsip=?";
		$this->db->trans_start();
		$this->db->query($sql,array($tgl,$ket,$lem,$file,$usr,$no));		
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function HapusData($id)
	{

		$this->db->trans_start();
		$this->db->query("DELETE FROM arsip WHERE no_arsip='$id'");
	 	$this->db->trans_complete();
		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function getCFile($id){
		$sql = "SELECT * FROM arsip WHERE no_arsip = '$id'";
		$query = $this->db->query($sql);
		return $query->row();
	}
}


?>