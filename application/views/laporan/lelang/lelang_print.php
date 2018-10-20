<?php ini_set('memory_limit', '-1'); ?>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Lestari Informatika">
    <title>Data Lelang</title>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- END VENDOR CSS-->
	<style type="text/css">
		.img-center {
	    	display: block;
	    	margin: 0 auto;
		}
		.page-break {
			page-break-inside: avoid;
			page-break-before: auto;
		}
		thead:before, thead:after { display: none; }
		tbody:before, tbody:after { display: none; }		
	</style>
</head>
<body style="font-size: 10px">
<div class="container-fluid">
	<div class="row">
		<center><h3> LAPORAN DATA LELANG </h3></center>
		
	</div>
	<div class="row">
		<center><h4> Periode : <?php echo $periode; ?></h4></center>		
	</div>
	
	<br>
	<br>
	<div class="row">
		<div class="col-xs-12">
	   		<table class="table table-sm table-bordered">
				<thead>
					<tr>
						<th rowspan="2"><center>#</center></th>
						<th rowspan="2"><center>Wilayah</center></th>
						<th rowspan="2"><center>Nama Paket/ Kegiatan</center></th>
						<th rowspan="2"><center>Pagu DPA</center></th>
						<th rowspan="2"><center>Nilai HPS</center></th>
						<th rowspan="2"><center>Sumber Dana</center></th>
						<th rowspan="2"><center>Tahun Anggaran</center></th>
						<th rowspan="2"><center>Status</center></th>
						<th colspan="2"><center>Surat Pengumuman Lelang</center></th>
						<th colspan="2"><center>Surat Pengumuman Pemenang Lelang</center></th>
						<th rowspan="2"><center>Pemenang Lelang</center></th>
						<th colspan="2"><center>Surat Penunjukan Pengadan Baran & Jasa</center></th>
						<th rowspan="2"><center>Harga Penawaran</center></th>
						<th rowspan="2"><center>Harga Terkoreksi</center></th>
						<th rowspan="2"><center>Sisa Lelang</center></th>
					</tr>
					<tr>
						<th><center>Tanggal</center></th>
						<th><center>Nomor</center></th>
						<th><center>Tanggal</center></th>
						<th><center>Nomor</center></th>
						<th><center>Tanggal</center></th>
						<th><center>Nomor</center></th>
					</tr>					
				</thead>
				<tbody>
					<?php $tot = 0;$sisa = 0; if(!empty($data_lelang)){
						$no = 1;						
						foreach($data_lelang as $row){ ?>
						<tr>
							<td ><?php echo $no ?></td>
							<td ><?php echo $row['nm_wilayah'] ?></td>
							<td ><?php echo $row['nm_kegiatan'] ?></td>
							<td ><?php echo number_format($row['pagu']) ?></td>
							<td ><?php echo number_format($row['nilai_hps']) ?></td>
							<td ><?php echo $row['nm_sumber'] ?></td>
							<td ><?php echo $row['tahun'] ?></td>
							<td ><?php echo ($row['status']==1?'Belum':($row['status']==4?'Selesai':'Proses')) ?></td>
							<td ><?php echo date('d-m-Y',strtotime($row['tgl_lelang'])) ?></td>
							<td ><?php echo $row['no_lelang'] ?></td>
							<td ><?php echo date('d-m-Y',strtotime($row['tgl_pemenang'])) ?></td>
							<td ><?php echo $row['no_pemenang'] ?></td>
							<td ><?php echo $row['nm_pemenang'] ?></td>
							<td ><?php echo date('d-m-Y',strtotime($row['tgl_spbbj'])) ?></td>
							<td ><?php echo $row['no_spbbj'] ?></td>
							<td ><?php echo number_format($row['hrg_penawaran']) ?></td>
							<td ><?php echo number_format($row['hrg_koreksi']) ?></td>
							<td ><?php echo number_format(($row['hrg_koreksi']!=0?$row['hrg_koreksi']-$row['nilai_hps']:$row['nilai_hps'])) ?></td>
						</tr>
						<?php $no++;$tot +=$row['hrg_koreksi']; $sisa +=($row['hrg_koreksi']!=0?$row['hrg_koreksi']-$row['nilai_hps']:$row['nilai_hps']); } ?>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr><td colspan="16"><b>Total</b></td>
						<td><b><?php echo number_format($tot) ?></b></td>
						<td><b><?php echo number_format($sisa) ?></b></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
</body>
</html>