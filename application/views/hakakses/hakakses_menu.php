<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Setup</li>
            <li class="breadcrumb-item">Hak Akses</li>
            <li class="breadcrumb-item">Menu User</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">HAK AKSES USER</div>
                    </div>        	
		            
		            <form class="form-horizontal" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'HakAkses/AddAkses'?>">
	            	<div class="ibox-body">
            			<div class="row">
        					<div class="col-xs-12 col-sm-6 form-group mb-4">			            		
	            				<label> User</label>
	            				<input type="text" class="form-control" name="user" required 
					            	data-validation-required-message="This field is required" readonly 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['cuser']:'') ?>">
	            			</div>
	            			<div class="col-xs-12 col-sm-6 form-group mb-4">
	            				<label> Nama Pegawai </label>
	            				<input type="text" class="form-control" name="nama" required
					            	data-validation-required-message="This field is required" readonly 
					            	value="<?php echo (isset($data_tabel)?$data_tabel['nama']:'') ?>">
	            			</div>				            			
	            		</div>
	            		<div class="form-group mb-4">
            				<label> Menu Aplikasi </label>
        					<select class="select2 form-control" multiple="multiple" name="menu_akses[]" >
        						<?php 
        						if(!empty($menu)){
									$parent_menu = array_filter($menu,function($var){
									    return $var['status']==1;
								    	},ARRAY_FILTER_USE_BOTH);

        							foreach ($parent_menu as $mn) { ?>
	            						<optgroup label="<?php echo $mn['nm_menu']?>">
	            							<?php 
							                $key = $mn['kd_menu'];
							                $child_menu = array_filter($menu,function($var) use ($key){
							                    return $var['kd_parent'] == $key;
							                },ARRAY_FILTER_USE_BOTH); 
							                foreach ($child_menu as $ch) {
							                	$selected = (in_array($ch['kd_menu'], $user_akses)?' selected':''); ?>
							                	<option value="<?php echo $ch['kd_menu'] ?>" <?php echo $selected ?>>
							                		<?php echo $ch['nm_menu'] ?>
							                	</option>
							                <?php }	?>
	            						</optgroup>				            								
        							<?php } ?>
        						<?php } ?>
        					</select>	            			
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