<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Setup</li>
            <li class="breadcrumb-item">Lemari</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA LEMARI</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Lemari/'.$action?>">	
	            	<div class="ibox-body">
            			<div class="row">
        					<div class="col-xs-12 col-sm-6 form-group mb-4">			            		
	            				<label> Kode Lemari</label>
	            				<input type="text" class="form-control" name="id" required 
					            	data-validation-required-message="This field is required" readonly
					            	value="<?php echo (isset($data_tabel)?$data_tabel['kd_lemari']:$autonum) ?>">			            			
	            			</div>
	            			<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label> Nama Lemari </label>
	            				<input type="text" class="form-control" name="nama" required
					            	data-validation-required-message="This field is required" 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_lemari']:'') ?>">		            				
	            			</div>				            			
	            		</div>
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'Lemari' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>

