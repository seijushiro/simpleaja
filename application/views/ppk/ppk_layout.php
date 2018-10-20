<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Setup</li>
            <li class="breadcrumb-item">PPK</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
		        	<div class="ibox-head">
			        	<div class="ibox-title">DATA PPK </div>
			        	<div class="ibox-tools">
				        	<a class="ibox-collapse"><i class="ti-angle-down"></i></a>
				        	<a class="link" href="<?php echo base_url().'Ppk/AddPage'?>" class="dropdown-item"><i class="ti-plus" title="Tambah Data"></i></a>
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
	                                    <th width="5%">ID</th>
	                                    <th >Nama PPK</th>
	                                    <th >Nama Wilayah</th>
	                                    <th width="5%">Aksi</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	<?php 
	                            		if(!empty($data_tabel)){
	                            			foreach($data_tabel as $rs){?>
	                            				<tr>
	                            					<td><?php echo $rs["id_ppk"];?></td>
	                            					<td><?php echo $rs["nm_ppk"];?></td>
	                            					<td><?php echo $rs["nm_wilayah"];?></td>	
	                            					<td>
	                            						<a href="<?php echo base_url().'Ppk/EditPage/'.$rs['id_ppk']?>"><i class="ti-pencil" title="Edit Data"></i></a>		                            						
	                            						<a href="#" onclick="fn_deleteData('<?php echo 'Ppk/DeleteData/'.$rs['id_ppk']?>')">
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

