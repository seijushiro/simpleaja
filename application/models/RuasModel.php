<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RuasModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT * from ruas_jalan";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}


	public function getDataById($id)
	{
		
		$sql = "SELECT * from ruas_jalan where id='$id'";
		$query = $this->db->query($sql);
	 	return $query->row(); 
	}
	public function SimpanData($kd,$nama,$pnj,$almt,$line,$mark)
	{

		$this->db->trans_start();
		$this->db->query("INSERT INTO ruas_jalan (kd_ruas,nm_jalan,panjang,alamat,line_latlong,mark_latlong) VALUES (?,?,?,?,'$line','$mark')",
			array($kd,$nama,$pnj,$almt));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

	public function UbahData($id,$kd,$nama,$pnj,$almt,$line,$mark)
	{

		$this->db->trans_start();
		$this->db->query("UPDATE ruas_jalan SET kd_ruas=?,nm_jalan=?,panjang=?,alamat=?,line_latlong='$line',mark_latlong='$mark' WHERE id=?",
			array($kd,$nama,$pnj,$almt,$id));
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
		$this->db->query("DELETE FROM ruas_jalan WHERE id=?",array($id));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

}


?>