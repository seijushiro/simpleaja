<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Lelang</li>
            <li class="breadcrumb-item">Proyek Lelang</li>
            <li class="breadcrumb-item">SPBBJ Lelang</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">SPBBJ LELANG | NOMOR : <?php echo strtoupper((isset($data_tabel)?$data_tabel['no_reg']:'')) ?></div>
                    </div>        	
		            
                    <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Proyek/'.$action ?>"> 
                    <div class="ibox-body">
                        <div class="alert alert-primary alert-bordered">
                            <h4>KEGIATAN </h4>
                            <p> <?php echo strtoupper((isset($data_tabel)?$data_tabel['nm_kegiatan']:'')) ?> </p>
                        </div>
                        <hr>                        
                        <div class="row">
                            <input type="hidden" name="id" value="<?php echo (isset($data_tabel)?$data_tabel['no_reg']:'') ?>">  
                            <div class="col-xs-12 col-sm-4 form-group mb-4">
                                <label> Tanggal</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" type="text" readonly name="tgl"
                                    value="<?php echo (!empty($data_tabel)?date('Y-m-d',strtotime($data_tabel['tgl_spbbj'])):date('Y-m-d')) ?>" >
                                </div>
                            </div>  
                            <div class="col-xs-12 col-sm-4 form-group mb-4">                                
                                <label> No. SPBBJ </label>
                                <input type="text" class="form-control" name="no" required  
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['no_spbbj']:'') ?>">
                            </div>
                            <div class="col-xs-12 col-sm-4 form-group mb-4"> 
                                <label> File PDF </label>
                                <input type="file" class="form-control" name="userfile" accept=".pdf" value="<?php echo (!empty($data_tabel)?$data_tabel['file']:'') ?>" />                                                             
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-xs-12 col-sm-6 form-group mb-4">
                                <label> Harga Penawaran</label>
                                <input type="text" class="form-control rupiah" name="hrg_penawaran" required  
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['hrg_penawaran']:'0') ?>">                              
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group mb-4">
                                <label> Harga Koreksi</label>
                                <input type="text" class="form-control rupiah" name="hrg_koreksi" required  
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['hrg_koreksi']:'0') ?>">                              
                            </div>                            
                        </div>
                    </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"> Simpan</button>
        				<a href="<?php echo base_url().'Proyek' ?>" class="btn btn-danger"> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>