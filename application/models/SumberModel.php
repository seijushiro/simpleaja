<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SumberModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "select * from sumber_dana";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getAutonumb(){
		$sql = "SELECT RIGHT(CONCAT('00',kd_sumber+1),2) AutoNumb FROM sumber_dana ORDER BY kd_sumber DESC LIMIT 1";
		$rs = $this->db->query($sql)->row();
		if($rs){
			return $rs->AutoNumb;		
		}else{
			return "01";
			
		}
		

	}

	public function getDataById($id)
	{
		
		$sql = "select * from sumber_dana where kd_sumber=?";
		$query = $this->db->query($sql,array($id));
	 	return $query->row(); 
	}


	public function SimpanData($id,$nama)
	{

		$sql = "INSERT INTO sumber_dana VALUES (?,?)";
		$this->db->trans_start();
		$this->db->query($sql,array($id,$nama));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

	public function UbahData($id,$nama)
	{

		$sql = "UPDATE sumber_dana SET nm_sumber=? WHERE kd_sumber=?";
		$this->db->trans_start();
		$this->db->query($sql,array($nama,$id));
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
		$this->db->query("DELETE FROM sumber_dana WHERE kd_sumber='$id'");
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}


}


?>