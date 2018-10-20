
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HakAksesModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}
	

	public function getData()
	{
		
		$sql = "SELECT a.cuser,a.nama,a.tipe,GROUP_CONCAT(c.nm_menu order by c.kd_menu) akses FROM user a LEFT JOIN akses b ON a.cuser=b.cuser LEFT JOIN menu c on b.kd_menu=c.kd_menu GROUP BY a.cuser,a.nama,a.tipe";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getDataById($user)
	{
		
		$sql = "select * from user where cuser='$user'";
		$query = $this->db->query($sql);
	 	return $query->row();
	}	

	public function getDataKontraktor()
	{
		
		$sql = "SELECT * from kontraktor";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getMenuById($user)
	{
		
		$result = array();
		$sql = "select kd_menu from akses where cuser=? order by kd_menu";
		$query = $this->db->query($sql,array($user));
	 	$rs =  $query->result_array();
	 	foreach ($rs as $arr) {
	 		array_push($result,$arr['kd_menu']);
	 	}
	 	return $result;

	}
	public function getMenu()
	{
		
		$sql = "SELECT * FROM menu ORDER BY kd_menu";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}
	
	public function SimpanData($user,$nama,$pass,$stat,$kon)
	{
		$sql = "INSERT INTO user VALUES (?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query($sql,array($user,$nama,$pass,$stat,$kon));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function UbahData($user,$nama,$pass,$stat,$kon)
	{
		$sql = "UPDATE user SET nama=?,cpass=?,tipe=?,id_kontraktor=?  WHERE cuser=?";

		$this->db->trans_start();
		$this->db->query($sql,array($nama,$pass,$stat,$kon,$user));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}	

	public function SimpanHakAkses($user,$menu)
	{

		$this->db->trans_start();
		$this->db->query("DELETE FROM akses where cuser='$user'");
		foreach ($menu as $akses) {
			$parent = $this->db->query("SELECT kd_parent from menu Where kd_menu=?",array($akses))->row();
			if($kd_parent != $parent->kd_parent){
				$this->db->query("INSERT INTO akses (cuser,kd_menu) VALUES(?,?)",array($user,$parent->kd_parent));
				$kd_parent = $parent->kd_parent;
			}
			$this->db->query("INSERT INTO akses (cuser,kd_menu) VALUES('$user','$akses')");
		}
	 	$this->db->trans_complete();
		if($this->db->trans_status()){
			return true;
		}else{

			return false;
		};
	}

	public function HapusData($user)
	{

		$this->db->trans_start();
		$this->db->query("DELETE FROM user WHERE cuser='$user'");
	 	$this->db->trans_complete();
		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}
}


?>