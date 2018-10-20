<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LemariModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT * from lemari";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getAutonumb(){
		$sql = "SELECT RIGHT(CONCAT('00',kd_lemari+1),2) AutoNumb FROM lemari ORDER BY kd_lemari DESC LIMIT 1";
		$rs = $this->db->query($sql)->row();
		if($rs){
			return $rs->AutoNumb;		
		}else{
			return "01";
			
		}
		

	}

	public function getDataById($id)
	{
		
		$sql = "select * from lemari where kd_lemari='$id'";
		$query = $this->db->query($sql);
	 	return $query->row(); 
	}
	public function SimpanData($id,$nama)
	{
		$id = $this->getAutonumb();
		$this->db->trans_start();
		$this->db->query("INSERT INTO lemari VALUES (?,?)",array($id,$nama));
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
		$this->db->query("UPDATE lemari SET nm_lemari=? WHERE kd_lemari=?",array($nama,$id));
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
		$this->db->query("DELETE FROM lemari WHERE kd_lemari=?",array($id));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

}


?>