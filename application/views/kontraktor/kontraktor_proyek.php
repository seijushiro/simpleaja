<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Lelang</li>
            <li class="breadcrumb-item">Detail Pemenang</li>
            <li class="breadcrumb-item">Data Proyek</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">DATA PROYEK PEMENANG LELANG</div>
                    </div>        	
		            
		            <form class="form-horizontal" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Kontraktor/AddProyek'?>">
	            	<div class="ibox-body">
            			<div class="row">
        					<div class="col-xs-12 col-sm-2 form-group mb-4">			            		
	            				<input type="hidden" value="<?php echo (isset($data_tabel)?$data_tabel['id_kontraktor']:'') ?>" name="id">
	            				<label> Nama Kontraktor</label>
	            				<input type="text" class="form-control" name="nama" required 
					            	data-validation-required-message="This field is required" readonly 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_kontraktor']:'') ?>">
	            			</div>
	            			<div class="col-xs-12 col-sm-3 form-group mb-4">
	            				<label> Nama Pejabat </label>
	            				<input type="text" class="form-control" name="pejabat" required
					            	data-validation-required-message="This field is required" readonly 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_pejabat']:'') ?>">
	            			</div>
	            			<div class="col-xs-12 col-sm-5 form-group mb-4">
            					<label> Daftar Proyek </label>
	        					<select class="select2 form-control" multiple="multiple" name="proyek[]" >
	        						<?php 
	        						if(!empty($proyek)){		
	        							foreach ($proyek as $pr) { 	          
								            $selected = (in_array($pr['no_reg'], $user_proyek)?' selected':''); ?>
						                	<option value="<?php echo $pr['no_reg'] ?>" <?php echo $selected ?>>
						                		<?php echo $pr['nm_kegiatan'] ?>
						                	</option>
	        							<?php } ?>
	        						<?php } ?>
	        					</select>
        					</div>
        					<div class="col-xs-12 col-sm-2 form-group mb-4">
        						<label> Tgl Mulai </label>
        						<div class="input-group">
        							<input type="text" class="form-control datepicker" name="tgl" value="<?php echo date('Y-m-d')?>" readonly>
        						</div >
        					</div>	            							            			
	            		</div>
	            		<hr>
	            		<div class="form-group mb-4">
	            			<label>Daftar Proyek Yang Sudah Dimenangkan</label>
	            			<div class="row table-responsive">
		            			<table class="table table-bordered table-hover" id="datatable" >
		            				<thead>
		            					<tr class="thead-custom">
		            						<th>#</th>
		            						<th>Nomor</th>
		            						<th>Nama Pekerjaan</th>
		            						<th>Tgl Mulai</th>
		            						<th>Nilai</th>
											<th>Progress</th>
		            					</tr>
		            				</thead>
		            				<tbody>
		            					<?php if(!empty($daftar_proyek)){ 
		            						$no=1 ; 
		            						foreach($daftar_proyek as $row ) { ?>
		            							<tr>
		            								<td><?php echo $no;?> </td>
		            								<td><?php echo $row['no_reg'];?> </td>
		            								<td><?php echo $row['nm_kegiatan'];?> </td>
		            								<td><?php echo $row['tgl_mulai'];?> </td>
		            								<td><?php echo number_format($row['hrg_koreksi']);?> </td>
		            								<td><?php echo $row['progres'];?> </td>
		            							</tr>
		            							<?php }?>
		            						<?php }?>
		            				</tbody>
		            			</table>
		            		</div>
	            		</div>					            								            			
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'Kontraktor' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>