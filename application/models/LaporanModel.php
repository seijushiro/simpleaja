<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	


	public function getDataKontraktor()
	{
		$sql = "SELECT * from kontraktor order by nm_kontraktor";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getDataLelang($id,$bln,$thn)
	{
		
		$qry_table = "SELECT * FROM (SELECT a.*,b.nm_wilayah,c.nm_sumber,IFNULL(d.no_surat,'-') no_lelang, IFNULL(d.tgl_surat,'-') tgl_lelang,
		IFNULL(e.no_surat,'-') no_pemenang, IFNULL(e.tgl_surat,'-') tgl_pemenang,IFNULL(e.nm_pemenang,'-') nm_pemenang,
		IFNULL(e.id_kontraktor,'-') id_kontraktor,
		IFNULL(f.no_spbbj,'-') no_spbbj, IFNULL(f.tgl_spbbj,'-') tgl_spbbj,IFNULL(f.hrg_penawaran,'0') hrg_penawaran,
		IFNULL(f.hrg_koreksi,'0') hrg_koreksi 
		FROM proyek_lelang a join wilayah b on a.kd_wilayah=b.kd_wilayah join sumber_dana c on a.kd_sumber=c.kd_sumber 
		LEFT JOIN surat_lelang d on a.no_reg=d.no_reg LEFT JOIN pemenang_lelang e ON a.no_reg=e.no_reg 
		LEFT JOIN spbbj_lelang f on a.no_reg=f.no_reg) tbl " ;

		if($id=="All"){
			$sql = $qry_table." Where month(tgl_reg)=? and year(tgl_reg)=? order by no_reg";
			$query = $this->db->query($sql,array($bln,$thn));
		}else{
			$sql = $qry_table." Where month(tgl_reg)=? and year(tgl_reg)=? and id_kontraktor= ? order by no_reg";
			$query = $this->db->query($sql,array($bln,$thn,$id));			
		}		
		return $query->result_array();
	}	

}

?>
