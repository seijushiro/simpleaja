<script src="<?php echo base_url() ?>assets/vendors/pdfobject/pdfobject.min.js"></script>
<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Arsip</li>
            <li class="breadcrumb-item">Dokumen Lelang</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
		        	<div class="ibox-head">
			        	<div class="ibox-title">DATA DOKUMEN </div>
			        	<div class="ibox-tools">
				        	<a class="ibox-collapse"><i class="ti-angle-down"></i></a>
				        	<a class="link" href="<?php echo base_url().'Arsip/AddPage'?>" class="dropdown-item"><i class="ti-plus" title="Tambah Data"></i></a>
			            </div>
		            </div>
		            <div class="ibox-body">
                        <div class="flexbox mb-4">
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control form-control-solid" id="key-search" type="text" placeholder="Search ...">
                            </div>
                        </div>			            	
		            	<div class="table-responsive row">
			            	<table class="table table-bordered table-hover" id="datatable">
	                            <thead class="thead-custom">
	                                <tr>
	                                    <th >ID</th>
	                                    <th >Tanggal</th>
	                                    <th >Keterangan</th>
	                                    <th >Lemari</th>
	                                    <th width="5%">Aksi</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php 
	                            		if(!empty($data_tabel)){
	                            			foreach($data_tabel as $rs){?>
								            	<div style="display: none">
					                            	<div id="<?php echo substr($rs["no_arsip"],2) ?>" style="height: 500px;width: 800px">
														<embed src="<?php echo base_url().'uploads/arsip/'.$rs["cfile"] ?>#page=1" type="application/pdf" width="100%" height="100%">
					                            	</div>
					                            </div>	                            				
	                            				<tr>
	                            					<td><?php echo $rs["no_arsip"];?></td>
	                            					<td><?php echo $rs["tgl_arsip"];?></td>	
	                            					<td><?php echo $rs["keterangan"];?></td>
	                            					<td><?php echo $rs["nm_lemari"];?></td>	
	                            					<td>
														<a href="#" data-featherlight="#<?php echo substr($rs['no_arsip'], 2) ?>"><i class="ti-search" title="Lihat Dokumen"></i></a>
	                            						<a href="<?php echo base_url().'Arsip/EditPage/'.$rs['no_arsip']?>"><i class="ti-pencil" title="Edit Data"></i></a>		                            						
	                            						<a href="#" onclick="fn_deleteData('<?php echo 'Arsip/DeleteData/'.$rs['no_arsip']?>')">
	                            							<i class="ti-close" title="Hapus Data"></i>
	                            						</a>		                            						
	                            					</td>
	                            				</tr>	                            				
	                            			<?php } ?>
	                            	<?php } ?>
	                            </tbody>           		
			            	</table>
			            </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>

			<!--/ Stats -->

