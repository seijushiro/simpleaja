<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Setup</li>
            <li class="breadcrumb-item">Hak Akses</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA PENGGUNA</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'HakAkses/'.$action?>">	
	            	<div class="ibox-body">
            			<div class="row">
		            		<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label> Nama </label>
	            				<input type="text" class="form-control" name="nama" required
	            					data-validation-required-message="This field is required" 
	            					value="<?php echo (isset($data_tabel)?$data_tabel['nama']:'') ?>">			            			
		            		</div>	            				
        					<div class="col-xs-12 col-sm-3 form-group mb-4">			            		
	            				<label> User</label>
	            				<input type="text" class="form-control" name="user" required 
	            					data-validation-required-message="This field is required" <?php echo ($action=='UpdateData'?'readonly':'')?>
	            					value="<?php echo (isset($data_tabel)?$data_tabel['cuser']:'') ?>">			            			
	            			</div>
	            			<div class="col-xs-12 col-sm-3 form-group mb-4">
	            				<label> Password </label>
	            				<input type="password" class="form-control" name="pass" required
	            					data-validation-required-message="This field is required" 
	            					value="<?php echo (isset($data_tabel)?$data_tabel['cpass']:'') ?>">			            				
	            			</div>				            			
	            		</div>
	            		<div class="row">				            								            			
		            		<div class="col-xs-12 col-sm-6 form-group mb-4">
		            			<label> Status </label>
		            			<select class="form-control" name="status" required>
		            				<option value="A" <?php echo (isset($data_tabel)?($data_tabel['tipe']=='A'?'selected':''):'') ?>">Administrator</option>
		            				<option value="U" <?php echo (isset($data_tabel)?($data_tabel['tipe']=='U'?'selected':''):'') ?>">Basic User</option>
		            			</select>			            				
		            		</div>
		            		<div class="col-xs-12 col-sm-6 form-group mb-4">
		            			<label> ID Kontraktor </label>
		            			<select class="form-control" name="kontraktor" required	>
		            				<option value="0" selected>-</option>
		            				<?php if(!empty($data_kontraktor)){
		            					$kontrak = (isset($data_tabel)?$data_tabel['id_kontraktor']:'0');
		            					foreach ($data_kontraktor as $rs) { ?>
		            						<option value="<?php echo $rs['id_kontraktor']?>" <?php echo ($kontrak==$rs['id_kontraktor']?' selected':'') ?>>
		            							<?php echo $rs['nm_kontraktor']?>
		            						</option>
		            					<?php } ?>
		            				<?php } ?>
		            			</select>			            				
		            		</div>		            		
		            	</div>		            	
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'HakAkses' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>

