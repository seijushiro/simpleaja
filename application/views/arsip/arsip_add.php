<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Arsip</li>
            <li class="breadcrumb-item">Dokumen Lelang</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA DOKUMEN LELANG</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" action="<?php echo base_url().'Arsip/'.$action ?>" method="post">	
	            	<div class="ibox-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-5 form-group mb-4">                                
                                <label> No. Arsip</label>
                                <input type="text" class="form-control" name="no" required readonly 
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['no_arsip']:$autonumb) ?>">
                            </div> 
                            <div class="col-xs-12 col-sm-2 form-group mb-4">                                
                                <label> Tanggal</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" type="text" readonly name="tgl"
                                    value="<?php echo (!empty($data_tabel)?date('Y-m-d',strtotime($data_tabel['tgl_arsip'])):date('Y-m-d')) ?>" >
                                </div>                                  
                            </div>
                            <div class="col-xs-12 col-sm-5 form-group mb-4">                
                                <label > File PDF </label>
                                <input type="file" class="form-control" name="userfile" accept=".pdf" value="<?php echo (!empty($data_tabel)?$data_tabel['cfile']:'') ?>" /> 
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-10 form-group mb-4">
                                <label> Keterangan Dokumen </label>
                                <input class="form-control" type="text"  name="keterangan"
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['keterangan']:'') ?>" >                                
                            </div>
                            <div class="col-xs-12 col-sm-2 form-group mb-4">
                                <label> Lokasi </label>
                                <select class="form-control" required name="lemari">
                                    <?php if(!empty($data_lemari)){
                                        $kd = (!empty($data_tabel)?$data_tabel['kd_lemari']:'');
                                    foreach($data_lemari as $lmr){ 
                                        $select = ($lmr['kd_lemari']==$kd?' selected':''); ?>
                                        <option value="<?php echo $lmr['kd_lemari'] ?>" <?php echo $select ?> ><?php echo $lmr['nm_lemari'] ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>                            
                        </div>
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"> Simpan</button>
        				<a href="<?php echo base_url().'Arsip' ?>" class="btn btn-danger"> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>
