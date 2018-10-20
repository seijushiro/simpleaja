<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20"></i> </a>
            </li>
            <li class="breadcrumb-item">Dashboard</li>
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
    	<div class="row">
	        <div class="col-lg-12">
	            <div class="ibox">
	                <div class="ibox-body bg-success">
	                    <div class="d-flex justify-content-between mb-4">
	                        <div class="text-white">
	                            <h3 class="m-0">Data Proyek Lelang</h3>
	                            <div>Rekap Jumlah Proyek Lelang Tahun <?php echo date('Y') ?></div>
	                        </div>
	                    </div>
	                    <div>
	                        <canvas id="line_chart" style="height:260px;"></canvas>
	                    </div>
	                </div>
	                <div class="ibox-body">
	                    <div class="row">
	                        <div class="col-sm-4 col-xs-12 text-center" style="border-right: 1px solid rgba(0,0,0,.1);">
	                            <div class="text-muted">BELUM</div>
	                            <h2 class="text-success mt-1"><?php echo number_format($data_rekap['belum']) ?></h2>
	                        </div>
	                        <div class="col-sm-4 col-xs-12 text-center" style="border-right: 1px solid rgba(0,0,0,.1);">
	                            <div class="text-muted">PROSES</div>
	                            <h2 class="text-success mt-1"><?php echo number_format($data_rekap['proses']) ?></h2>
	                        </div>	
	                        <div class="col-sm-4 col-xs-12 text-center">
	                            <div class="text-muted">SUDAH</div>
	                            <h2 class="text-success mt-1"><?php echo number_format($data_rekap['sudah']) ?></h2>
	                        </div>		                                                
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>
    </div>
</div>