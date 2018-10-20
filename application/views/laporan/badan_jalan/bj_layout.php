<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Laporan</li>
            <li class="breadcrumb-item">Badan Jalan</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
		        	<div class="ibox-head">
			        	<div class="ibox-title">LAPORAN PENERIMAAN BADAN JALAN </div>
		            </div>
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Laporan/Cetak'?>" target="_blank">	
		            <div class="ibox-body">
                        <div class="row">
                        	<input type="hidden" value="BadanJalan" name="id">
                            <div class="col-xs-12 col-sm-12 form-group mb-4">                                
                                <label> Tgl Transaksi</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" type="text" value="<?php echo date('Y-m-d') ?>"  name="tgl1">
                                    <span class="input-group-addon">Sampai</span>
                                    <input class="form-control datepicker" type="text" value="<?php echo date('Y-m-d') ?>"  name="tgl2">
                                </div>                                  
                            </div>
                        </div> 
                        <div class="form-group mb-4">                                
                            <label> Juru Parkir</label>
                            <select class="select2 form-control" name="jukir">
                                <option value="All">Keseluruhan</option>
                                <?php if(!empty($data_jukir)){
                                        foreach ($data_jukir as $juk) {?>
                                            <option value="<?php echo $juk['id_jukir'] ?>"><?php echo mb_convert_case($juk['nm_jukir'],MB_CASE_TITLE) ?></option>
                                        <?php }	?>		            								
                                <?php } ?>
                            </select>                            
                        </div>
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary" ><span><i class="ft-printer"></i></span> Cetak</button>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
	</div>
</div>
