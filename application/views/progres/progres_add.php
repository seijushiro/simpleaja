<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Laporan</li>
            <li class="breadcrumb-item">Progres Pekerjaan</li>
            <li class="breadcrumb-item">Tambah Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">LAPOR DATA PROGRES PEKERJAAN</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Progres/SaveData' ?>">	
	            	<div class="ibox-body">
            			<div class="row">
        					<div class="col-xs-12 col-sm-4 form-group mb-4">        						
	            				<label> No. Proyek</label>
	            				<input type="text" class="form-control" name="id" required readonly
					            	value="<?php echo (isset($data_tabel)?$data_tabel['no_reg']:'') ?>">			            			
	            			</div>
	            			<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label> Nama Pekerjaan </label>
	            				<input type="text" class="form-control" name="nama" required readonly 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_kegiatan']:'') ?>">		            				
	            			</div>				          
	            			<div class="col-xs-12 col-sm-2 form-group mb-4">
	            				<label> Progres Terakhir</label>
	            				<input type="text" class="form-control" name="progres" required	readonly 			            	
					            	value="<?php echo (isset($data_tabel)?$data_tabel['progres']:'') ?>">		            					            				
	            			</div>  			
	            		</div>
	            		<hr>
	            		<div class="row">
	            			<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label>Foto 1</label> 
								<div class="slim form-control" 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="true" >
									<input type="file" name="foto1[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
	            			<div class="col-xs-12 col-sm-6 form-group mb-4"> 
	            				<label>Foto 2</label> 
								<div class="slim form-control" 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="true" >
									<input type="file" name="foto3[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
	            			<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label>Foto 3</label>  
								<div class="slim form-control" 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="true" >
									<input type="file" name="foto3[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>
	            			<div class="col-xs-12 col-sm-6 form-group mb-4"> 
	            				<label>Foto 4</label> 
								<div class="slim form-control" 
									data-ratio="400:200" data-force-size="400,200" 
									data-upload-base64="true" >
									<input type="file" name="foto4[]" required accept="image/jpg, image/jpeg" />
								</div>	            				
	            			</div>	            				            				            			
	            		</div>
			            <div class="form-group mb-4">
			            	<label>Dokumen Pendukung (PDF)</label>
			            	<input type="file" class="form-control" name="userfile" accept=".pdf" >
			            </div>	            		
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'Progres' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>

