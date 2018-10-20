<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PpkModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT a.*,b.nm_wilayah from ppk a join wilayah b on a.kd_wilayah=b.kd_wilayah";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}


	public function getDataWilayah()
	{
		
		$sql = "SELECT * from wilayah";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getDataById($id)
	{
		
		$sql = "SELECT * from ppk where id_ppk='$id'";
		$query = $this->db->query($sql);
	 	return $query->row(); 
	}
	public function SimpanData($nama,$wil)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO ppk (nm_ppk, kd_wilayah) VALUES (?,?)",array($nama,$wil));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

	public function UbahData($id,$nama,$wil)
	{

		$this->db->trans_start();
		$this->db->query("UPDATE ppk SET nm_ppk=?,kd_wilayah=? WHERE id_ppk=?",array($nama,$wil,$id));
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
		$this->db->query("DELETE FROM ppk WHERE id_ppk=?",array($id));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

}


?>