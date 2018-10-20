<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyekModel extends CI_Model{
	public function __construct(){
		parent :: __construct();
	}

	public function getServerSideDT(){		
		$DT = new ServersideDT();
        $DT->setQuery("SELECT * FROM (SELECT a.*,b.nm_wilayah,c.nm_sumber,IFNULL(d.nm_ppk,'') nm_ppk,
        	IF(a.status=1,'Belum',IF(a.status=2 || a.status=3,'Proses','Sudah')) cstatus from proyek_lelang a join wilayah b on a.kd_wilayah=b.kd_wilayah join sumber_dana c on a.kd_sumber=c.kd_sumber left join ppk d on a.id_ppk=d.id_ppk) tbl");
        $DT->setColumn(array('nm_kegiatan','alamat','nm_wilayah','nilai_hps','nm_ppk','nm_sumber','tahun','cstatus'));
        $DT->setOrder("no_reg");
        
        $list = $DT->get_datatables();
        $data = array();
        $no = 1;
        foreach ($list as $rs) {
            $row = array();
            $row[] = $no;
            $row[] = $rs->nm_kegiatan;
            $row[] = $rs->alamat;
            $row[] = $rs->nm_wilayah;
            $row[] = str_replace(",", "", $rs->nilai_hps);
            $row[] = $rs->nm_ppk;
			$row[] = $rs->nm_sumber;
			$row[] = $rs->tahun;
			$row[] = $rs->cstatus;

			$str_aksi = 
			"<a href='".base_url('Proyek/Detail/'.$rs->no_reg)."' title='Detail Data'><i class='ti-agenda'></i></a>".
			"<a href='".base_url('Proyek/EditPage/'.$rs->no_reg)."' title='Edit Data' class='".($rs->status!='1'?'disabled':'')."'>
				<i class='ti-pencil'></i></a>".
			"<a href='".base_url('Proyek/Pengumuman/'.$rs->no_reg)."' title='Pengumuman Lelang' class='".($rs->status!='1'?'disabled':'')."'>
				<i class='ti-announcement'></i></a>".			
			"<a href='".base_url('Proyek/Pemenang/'.$rs->no_reg)."' title='Pemenang Lelang' class='".($rs->status!='2'?'disabled':'')."'>
				<i class='ti-crown'></i></a>".
			"<a href='".base_url('Proyek/SPBBJ/'.$rs->no_reg)."' title='SPBBJ Lelang' class='".($rs->status!='3'?'disabled':'')."'>
				<i class='ti-write'></i></a>".
	        "<a href='#' onclick='".'fn_deleteData("Proyek/DeleteData/'.$rs->no_reg.'")'."' title='Hapus Data' 
	        	class='".($this->session->userdata('status')=='A' && $rs->status<='3'?'':'disabled')."'><i class='ti-close'></i></a>";				

			$row[] = $str_aksi;
            $data[] = $row;
            $no++;
        }
 
        $output = array(
                        "draw" => (ISSET($_POST['draw'])?$_POST['draw']:1),
                        "recordsTotal" => $DT->count_all(),
                        "recordsFiltered" => $DT->count_filtered(),
                        "data" => $data,
                );

        return $output;

	}
	

	public function getData()
	{
		
		$sql = "SELECT a.*,b.nm_wilayah,c.nm_sumber,IFNULL(d.nm_ppk,'') nm_ppk from proyek_lelang a join wilayah b on a.kd_wilayah=b.kd_wilayah join sumber_dana c on a.kd_sumber=c.kd_sumber left join ppk d on a.id_ppk=d.id_ppk order by a.no_reg desc";
		$query = $this->db->query($sql);
	 	return $query->result_array();
	}

	public function getNoTransaksi(){
		$sql = "SELECT RIGHT(CONCAT('00000000000',RIGHT(no_reg,9)+1),9) AutoNumb FROM proyek_lelang ORDER BY no_reg DESC LIMIT 1";
		$rs = $this->db->query($sql)->row();
		if($rs){
			return  'L.'.date('Y').date('m').$rs->AutoNumb;		
		}else{
			return 'L.'.date('Y').date('m')."000000001";
			
		}
		

	}

	public function getDataWilayah()
	{
		
		$sql = "SELECT * from wilayah ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
	 		return $query->result_array();
	 	}else{
	 		return null;
	 	}
	}

	public function getDataRuas()
	{
		
		$sql = "SELECT * from ruas_jalan ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
	 		return $query->result_array();
	 	}else{
	 		return null;
	 	}
	}

	public function getDataRuasById($id)
	{
		
		$sql = "SELECT * from ruas_jalan where id =?";
		$query = $this->db->query($sql,array($id));
		if($query->num_rows()>0){
	 		return $query->result_array();
	 	}else{
	 		return null;
	 	}
	}	
	public function getDataSumber()
	{
		
		$sql = "SELECT * from sumber_dana ";
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
	 		return $query->result_array();
	 	}else{
	 		return null;
	 	}
	}	


	public function getDataById($id)
	{
		
		$sql = "SELECT a.*,b.nm_wilayah,c.nm_sumber from proyek_lelang a join wilayah b on a.kd_wilayah=b.kd_wilayah join sumber_dana c on a.kd_sumber=c.kd_sumber where a.no_reg='$id'";
		$query = $this->db->query($sql);
	 	return $query->row();
	}

	public function getDataPengumumanById($id)
	{
		
		$sql = "SELECT b.no_reg,a.no_surat,IFNULL(a.tgl_surat,DATE(NOW())) tgl_surat,a.file,b.nm_kegiatan from surat_lelang a right join proyek_lelang b on a.no_reg=b.no_reg where b.no_reg='$id'";
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
	 		return $query->row();
	 	}else{
	 		return null;
	 	}
	}
	
	public function getDataPemenangById($id)
	{
		
		$sql = "SELECT b.no_reg,a.no_surat,IFNULL(a.tgl_surat,DATE(NOW())) tgl_surat,a.nm_pemenang,a.file,b.nm_kegiatan from pemenang_lelang a right join proyek_lelang b on a.no_reg=b.no_reg where b.no_reg='$id'";
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
	 		return $query->row();
	 	}else{
	 		return null;
	 	}
	}

	public function getDataSPBBJById($id)
	{
		
		$sql = "SELECT b.no_reg,a.no_spbbj,IFNULL(a.tgl_spbbj,DATE(NOW())) tgl_spbbj,a.hrg_penawaran,a.hrg_koreksi,a.file,b.nm_kegiatan from spbbj_lelang a right join proyek_lelang b on a.no_reg=b.no_reg where b.no_reg='$id'";
		$query = $this->db->query($sql);

		if($query->num_rows()>0){
	 		return $query->row();
	 	}else{
	 		return null;
	 	}
	}

	public function getDataDetailById($id)
	{
		
		$sql = "SELECT a.*,b.nm_wilayah,c.nm_sumber,
		IFNULL(d.no_surat,'') no_lelang,IFNULL(d.tgl_surat,'') tgl_lelang,IFNULL(d.file,'') file_pengumuman,
		IFNULL(e.no_surat,'') no_pemenang,IFNULL(e.tgl_surat,'') tgl_pemenang,IFNULL(e.file,'') file_pemenang,IFNULL(e.nm_pemenang,'') nm_pemenang,
		IFNULL(f.no_spbbj,'') no_spbbj,IFNULL(f.tgl_spbbj,'') tgl_spbbj,IFNULL(f.hrg_penawaran,'') hrg_penawaran, IFNULL(f.hrg_koreksi,'') hrg_koreksi,IFNULL(f.file,'') file_spbbj,g.line_latlong,g.mark_latlong  
		from proyek_lelang a join wilayah b on a.kd_wilayah=b.kd_wilayah join sumber_dana c on a.kd_sumber=c.kd_sumber 
		left join surat_lelang d on a.no_reg=d.no_reg left join pemenang_lelang e ON a.no_reg=e.no_reg 
		left join spbbj_lelang f on a.no_reg=f.no_reg join ruas_jalan g on a.id_ruas=g.id where a.no_reg='$id'";
		$query = $this->db->query($sql);
	 	return $query->row();
	}


	public function SimpanData($no,$tgl,$ket,$almt,$long,$lat,$wil,$pagu,$file,$hps,$sumber,$thn,$ruas,$ppk,$efe,$fung)
	{
		$usr = $this->session->userdata("username");
		$sql = "INSERT INTO proyek_lelang VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query($sql,array($no,$tgl,$ket,$almt,$long,$lat,$wil,$pagu,$file,$hps,$sumber,$thn,1,$usr,$ruas,$ppk,$efe,$fung));		
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function UbahData($no,$tgl,$ket,$almt,$long,$lat,$wil,$pagu,$file,$hps,$sumber,$thn,$ruas,$ppk,$efe,$fung)
	{
		$usr = $this->session->userdata("username");
		$sql = "UPDATE proyek_lelang SET tgl_reg=?,nm_kegiatan=?,alamat=?,longitude=?,latitude=?,kd_wilayah=?,
		pagu=?,file_pagu=?,nilai_hps=?,kd_sumber=?,tahun=?,cuser=?,id_ruas=?,id_ppk=?,efektif=?,fungsional=? Where no_reg=?";
		$this->db->trans_start();
		$this->db->query($sql,array($tgl,$ket,$almt,$long,$lat,$wil,$pagu,$file,$hps,$sumber,$thn,$usr,$ruas,$ppk,$efe,$fung,$no));		
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function HapusData($id)
	{

		$this->db->trans_start();
		$this->db->query("DELETE FROM proyek_lelang WHERE no_reg='$id'");
	 	$this->db->trans_complete();
		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function SimpanPengumuman($id,$no,$tgl,$file)
	{
		$usr = $this->session->userdata("username");
		$sql = "INSERT INTO surat_lelang VALUES (?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query("DELETE FROM surat_lelang where no_reg=?",array($id));		
		$this->db->query($sql,array($id,$no,$tgl,$file,$usr));		
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}	
	public function SimpanPemenang($id,$no,$tgl,$nm,$file)
	{
		$usr = $this->session->userdata("username");
		$sql = "INSERT INTO pemenang_lelang VALUES (?,?,?,?,?,?,?)";
		$this->db->trans_start();		
		$find = $this->db->query("SELECT no_reg FROM pemenang_lelang where no_reg=?",array($id))->num_rows();
		if($find == 0){		
			$this->db->query($sql,array($id,$no,$tgl,$nm,$file,null,$usr));
		}else{
			$this->db->query("UPDATE pemenang_lelang SET no_surat=?,tgl_surat=?,nm_pemenang=?,file=?,cuser=? WHERE no_reg=? ",array($no,$tgl,$nm,$file,$usr,$id));
		}
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function SimpanSPBBJ($id,$no,$tgl,$hrg1,$hrg2,$file)
	{
		$usr = $this->session->userdata("username");
		$sql = "INSERT INTO spbbj_lelang VALUES (?,?,?,?,?,?,?)";
		$this->db->trans_start();
		$this->db->query("DELETE FROM spbbj_lelang where no_reg=?",array($id));		
		$this->db->query($sql,array($id,$no,$tgl,$hrg1,$hrg2,$file,$usr));
	 	$this->db->trans_complete();

		if($this->db->trans_status()){
			return true;
		}else{
			return false;
		};
	}

	public function getDataPPKByWil($id,$ppk)
	{
		
		$sql = "SELECT a.id_ppk id, a.nm_ppk text,IF(?='-','false','true') selected from ppk a where a.kd_wilayah=?";
		$query = $this->db->query($sql,array($ppk,$id));
	 	return $query->result_array();
	}

}


?>