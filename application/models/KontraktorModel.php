<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KontraktorModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT * from kontraktor";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getDataById($id)
	{
		
		$sql = "SELECT * from kontraktor where id_kontraktor='$id'";
		$query = $this->db->query($sql);
	 	return $query->row(); 
	}

	public function getDataProyek()
	{
		
		$sql = "SELECT a.* FROM proyek_lelang a join pemenang_lelang b on a.no_reg=b.no_reg where a.status=4 and ISNULL(b.id_kontraktor) ORDER BY no_reg";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getProyekById($id)
	{
		
		$result = array();
		$sql = "SELECT a.no_reg,a.nm_kegiatan from proyek_lelang a join pemenang_lelang b on a.no_reg=b.no_reg  
		where a.status=4 and b.id_kontraktor=?  order by a.no_reg";
		$query = $this->db->query($sql,array($id));
	 	$rs =  $query->result_array();
	 	if($query->num_rows()>0){
		 	foreach ($rs as $arr) {
		 		array_push($result,$arr['no_reg']);
		 	}
	 	}
	 	return $result;

	}
	public function getDataProyekById($id)
	{
		
		$sql = "SELECT a.no_reg,a.nm_kegiatan,c.tgl_mulai,b.hrg_koreksi,c.progres from proyek_lelang a join spbbj_lelang b  on a.no_reg=b.no_reg  
		join proyek_kontraktor c on a.no_reg=c.no_reg where a.status=4 and c.id_kontraktor=?  order by a.no_reg";
		$query = $this->db->query($sql,array($id));	 
	 	return $query->result_array();

	}
	public function SimpanData($nama,$alamat,$telp,$pej,$jab,$paj,$siup)
	{

		$this->db->trans_start();
		$this->db->query("INSERT INTO kontraktor (nm_kontraktor,alamat,telp,nm_pejabat,nm_jabatan,no_pajak,no_siup) VALUES (?,?,?,?,?,?,?)",
			array($nama,$alamat,$telp,$pej,$jab,$paj,$siup));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

	public function UbahData($id,$nama,$alamat,$telp,$pej,$jab,$paj,$siup)
	{

		$this->db->trans_start();
		$this->db->query("UPDATE kontraktor SET nm_kontraktor=?,alamat=?,telp=?,nm_pejabat=?,nm_jabatan=?,no_pajak=?,no_siup=? WHERE id_kontraktor=?",
			array($nama,$alamat,$telp,$pej,$jab,$paj,$siup,$id));
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
		$this->db->query("DELETE FROM kontraktor WHERE id_kontraktor=?",array($id));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return 1;
		}else{
			return 0;
		};
	}

	public function SimpanProyek($id,$proyek,$tgl)
	{

		$this->db->trans_start();
		foreach ($proyek as $rs) {
			$this->db->query("INSERT INTO proyek_kontraktor VALUES('$id','$rs','$tgl',0,null)");
		}
	 	$this->db->trans_complete();
		if($this->db->trans_status()){
			return true;
		}else{

			return false;
		};
	}

}


?>