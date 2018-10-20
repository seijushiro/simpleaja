<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WilayahModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT * from wilayah";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getAutonumb(){
		$sql = "SELECT RIGHT(CONCAT('00',kd_wilayah+1),2) AutoNumb FROM wilayah ORDER BY kd_wilayah DESC LIMIT 1";
		$rs = $this->db->query($sql)->row();
		if($rs){
			return $rs->AutoNumb;		
		}else{
			return "01";
			
		}
		

	}

	public function getDataById($id)
	{
		
		$sql = "SELECT * from wilayah where kd_wilayah='$id'";
		$query = $this->db->query($sql);
	 	return $query->row(); 
	}
	public function SimpanData($id,$nama)
	{
		$id = $this->getAutonumb();
		$this->db->trans_start();
		$this->db->query("INSERT INTO wilayah VALUES (?,?)",array($id,$nama));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

	public function UbahData($id,$nama)
	{

		$this->db->trans_start();
		$this->db->query("UPDATE wilayah SET nm_wilayah=? WHERE kd_wilayah=?",array($nama,$id));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}


	public function HapusData($id)
	{

		$this->db->trans_start();
		$this->db->query("DELETE FROM wilayah WHERE kd_wilayah=?",array($id));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

}


?>