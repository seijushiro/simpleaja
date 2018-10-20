<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20 " title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Lelang</li>
            <li class="breadcrumb-item">Proyek Lelang</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
		        	<div class="ibox-head">
			        	<div class="ibox-title">DATA PROYEK LELANG </div>
			        	<div class="ibox-tools">
				        	<a class="ibox-collapse"><i class="ti-angle-down"></i></a>
				        	<a href="<?php echo base_url().'Proyek/AddPage'?>" class="link"><i class="ti-plus"></i></a>
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
			            	<table class="table table-bordered table-hover " id="datatable_serverside">
	                            <thead class="thead-custom">
	                                <tr>	                                    
	                                    <th>#</th>
	                                    <th>Kegiatan</th>
	                                    <th>Alamat</th>
	                                    <th>Wilayah</th>
	                                    <th>Nilai HPS</th>
	                                    <th>Nama PPK</th>
	                                    <th>Sumber</th>
	                                    <th>Tahun</th>
	                                    <th>Status</th>
	                                    <th width="10%">Aksi</th>
	                                </tr>
	                            </thead>
	                            <tbody>

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
