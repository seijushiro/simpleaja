<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getUserData($user,$pass)
	{
		$sql = "select * from user where cuser='$user' and cpass='$pass'";
		$query = $this->db->query($sql);
		 if($query->num_rows()==0){
			return false;
		 }else{
		 	$rs = $query->row();
		 	$find_akses =  $this->db->query("select a.kd_menu,b.nm_menu,b.kd_parent,b.controller,b.icon,b.status from akses a join menu b on a.kd_menu=b.kd_menu where a.cuser='$user' order by a.kd_menu");
		 	$menu = ($find_akses->num_rows()==0?false:$find_akses->result_array());

		 	return array(
		 		'cuser' => $rs->cuser ,
		 		'nama'=> $rs->nama,
		 		'tipe'=>$rs->tipe,
		 		'id_kontraktor'=>$rs->id_kontraktor,
		 		'akses'=>$menu);
		 }
	}

}

?>
