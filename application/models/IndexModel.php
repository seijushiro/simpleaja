
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexModel extends CI_Model{
	public function __construct(){
		parent :: __construct();	
	}
	
	public function getDataLelang(){
		$thn = date('Y');
		$result = array();
		for($bln=1;$bln<=12;$bln++){			
			$find = $this->db->query("SELECT count(no_reg) total FROM proyek_lelang where month(tgl_reg)=? and year(tgl_reg)=?",array($bln,$thn));
			if($find->num_rows()>0){
				$total = $find->row()->total;
				array_push($result,(isset($total)?(int)$total:null));
			}
		}
		
		return $result;
	}

	public function getDataLokasi()
	{
		$thn= date('Y');
		$sql = "SELECT a.no_reg,a.nm_kegiatan,a.alamat,format(a.nilai_hps,0) nilai_hps,a.longitude,a.latitude,b.nm_wilayah,a.status,
		 IFNULL(c.nm_pemenang,'') nm_pemenang,IFNULL(d.progres,0) progres from proyek_lelang a join wilayah b on a.kd_wilayah=b.kd_wilayah 
		 left join pemenang_lelang c on a.no_reg=c.no_reg left join proyek_kontraktor d on a.no_reg=d.no_reg where year(a.tgl_reg)=? ";
		$query = $this->db->query($sql,array($thn));
	 	return $query->result_array();
	}	

	public function getRekapData(){
		$bln = date('m');
		$thn = date('Y');

		$find_belum = $this->db->query("SELECT IFNULL(count(no_reg),0) total FROM proyek_lelang where month(tgl_reg)=? and year(tgl_reg)=? and status=1",array($bln,$thn));
		$find_proses = $this->db->query("SELECT IFNULL(count(no_reg),0) total FROM proyek_lelang where month(tgl_reg)=? and year(tgl_reg)=? and status IN (2,3)",array($bln,$thn));		
		$find_sudah = $this->db->query("SELECT IFNULL(count(no_reg),0) total FROM proyek_lelang where month(tgl_reg)=? and year(tgl_reg)=? and status=4",array($bln,$thn));

		$total_1 = $find_belum->row()->total;
		$total_2 = $find_proses->row()->total;
		$total_3 = $find_sudah->row()->total;

		$result = array("belum"=>$total_1,"proses"=>$total_2,"sudah"=>$total_3);
		return $result;

	}

	

}


?>