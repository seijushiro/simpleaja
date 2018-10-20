<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Lelang</li>
            <li class="breadcrumb-item">Detail Pemenang</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA KONTRAKTOR</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Kontraktor/'.$action?>">	
	            	<div class="ibox-body">
            			<div class="row">
            				<input type="hidden" name="id" value="<?php echo (isset($data_tabel)?$data_tabel['id_kontraktor']:'') ?>">	
	            			<div class="col-xs-12 col-sm-8 form-group mb-4">
	            				<label> Nama Kontraktor </label>
	            				<input type="text" class="form-control" name="nama" required
					            	data-validation-required-message="This field is required" 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_kontraktor']:'') ?>">	
	            			</div>
        					<div class="col-xs-12 col-sm-4 form-group mb-4">			            		
	            				<label> No. Hp / Telp </label>
	            				<input type="text" class="form-control" name="telp" required 
					            	data-validation-required-message="This field is required"
					            	value="<?php echo (isset($data_tabel)?$data_tabel['telp']:'') ?>">			            			
	            			</div>	            							            			
	            		</div>
    					<div class="form-group mb-4">			            		
            				<label> Alamat </label>
            				<input type="text" class="form-control" name="alamat" required
				            	data-validation-required-message="This field is required"
				            	value="<?php echo (isset($data_tabel)?$data_tabel['alamat']:'') ?>">			            			
            			</div>
                        <div class="row">
                            <div class="col-md-6 col-xs-12 form-group mb-4">
                                <label> Nama Pejabat </label> 
                                <input type="text" class="form-control" name="nm_pejabat" required
                                    data-validation-required-message="This field is required"
                                    value="<?php echo (isset($data_tabel)?$data_tabel['nm_pejabat']:'') ?>">                                                                   
                           </div>
                           <div class="col-md-6 col-xs-12 form-group mb-4">
                                <label> Jabatan </label>
                                <input type="text" class="form-control" name="jabatan" required
                                    data-validation-required-message="This field is required"
                                    value="<?php echo (isset($data_tabel)?$data_tabel['nm_jabatan']:'') ?>">                                                                                         
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6 col-xs-12 form-group mb-4">
                                <label> No. Pajak </label>
                                <input type="text" class="form-control" name="no_pajak" required  
                                    data-validation-required-message="This field is required"
                                    value="<?php echo (isset($data_tabel)?$data_tabel['no_pajak']:'') ?>">                                                                    
                           </div>
                           <div class="col-md-6 col-xs-12 form-group mb-4">
                                <label> No. SIUP </label> 
                                <input type="text" class="form-control" name="no_siup" required
                                    data-validation-required-message="This field is required"
                                    value="<?php echo (isset($data_tabel)?$data_tabel['no_siup']:'') ?>">                                                                   
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
