<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Setup</li>
            <li class="breadcrumb-item">PPK</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA PPK</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Ppk/'.$action?>">	
	            	<div class="ibox-body">
            			<div class="row">
        					<div class="col-xs-12 col-sm-8 form-group mb-4">
        						<input type="hidden" name="id" required value="<?php echo (isset($data_tabel)?$data_tabel['id_ppk']:'') ?>">
	            				<label> Nama PPK</label>
	            				<input type="text" class="form-control" name="nama" required  
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_ppk']:'') ?>">			            			
	            			</div>
	            			<div class="col-xs-12 col-sm-4 form-group mb-4">
	            				<label> Nama Wilayah </label>
                                <select class="form-control" required name="wil">
                                    <?php if(!empty($data_wilayah)){
                                        $kd = (!empty($data_tabel)?$data_tabel['kd_wilayah']:'');
                                    foreach($data_wilayah as $wil){ 
                                        $select = ($wil['kd_wilayah']==$kd?' selected':''); ?>
                                        <option value="<?php echo $wil['kd_wilayah'] ?>" <?php echo $select ?> ><?php echo $wil['nm_wilayah'] ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>	            						            				
	            			</div>				            			
	            		</div>
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'Ppk' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>

