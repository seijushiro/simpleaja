<?php ini_set('memory_limit', '-1'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Bag.IT PDAM Giri Menang">
    <title>Penerimaan Badan Jalan</title>
    
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
	</style>
</head>
<body style="font-size: 10px">
<div class="container">
	<div class="row">
		<center><h3> LAPORAN PENERIMAAN BADAN JALAN </h3></center>
		
	</div>
	<div class="row">
		<center><h4> Periode : <?php echo $periode; ?></h4></center>		
	</div>
	
	<br>
	<br>
	<div class="row page-break" style="border-width: 1px 1px 1px 1px;border-style: solid">
		<div class="col-xs-12">
	   		<table class="table table-sm table-bordered">
				<thead>
					<tr>
						<th><center>#</center></th>
						<th><center>No Trans</center></th>
						<th><center>Tanggal</center></th>
						<th><center>Jukir</center></th>
						<th><center>Keterangan</center></th>
						<th><center>Total</center></th>
						<th><center>User</center></th>
					</tr>
				</thead>
				<tbody>
					<?php $tot = 0; if(!empty($data_penerimaan)){
						$no = 1;						
						foreach($data_penerimaan as $row){ ?>
						<tr>
							<td ><?php echo $no ?></td>
							<td ><?php echo $row['no_trans'] ?></td>
							<td ><?php echo date('d-m-Y',strtotime($row['tgl_trans'])) ?></td>
							<td ><?php echo $row['nm_jukir'] ?></td>
							<td ><?php echo $row['ket'] ?></td>							
							<td ><?php echo number_format($row['total']) ?></td>
							<td><?php echo $row['cuser'] ?></td>
						</tr>
						<?php $no++;$tot +=$row['total']; } ?>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr><td colspan="5"><b>Total</b></td> <td colspan="2"><b><?php echo number_format($tot) ?></b></td></tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
</body>
</html>