<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Laporan</li>
            <li class="breadcrumb-item">Data Lelang</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
		        	<div class="ibox-head">
			        	<div class="ibox-title">LAPORAN LELANG </div>
		            </div>
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Laporan/Cetak'?>" target="_blank">	
		            <div class="ibox-body">
                        <div class="row">
                        	<input type="hidden" value="Lelang" name="id">
                            <div class="col-xs-12 col-sm-6 form-group mb-4">                                
                                <label> Periode </label>
                                <div class="input-group">
                                    <span class="input-group-addon">Bulan</span>
                                    <select class="form-control" name="bln">
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nopember</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <span class="input-group-addon">Tahun</span>
                                    <input class="form-control" type="number" min=0 max=9999 step=1 
                                    value="<?php echo date('Y') ?>"  name="thn">
                                </div>                                  
                            </div>
                            <div class="col-xs-12 col-sm-6 form-group mb-4">                                
                                <label> Kontraktor</label>
                                <select class="select2 form-control" name="kontraktor">
                                    <option value="All">Keseluruhan</option>
                                    <?php if(!empty($data_kontraktor)){
                                            foreach ($data_kontraktor as $kontraktor) {?>
                                                <option value="<?php echo $kontraktor['id_kontraktor'] ?>"><?php echo mb_convert_case($kontraktor['nm_kontraktor'],MB_CASE_TITLE) ?></option>
                                            <?php } ?>                                                  
                                    <?php } ?>
                                </select>                            
                            </div>                            
                        </div> 
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary" > Cetak</button>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
	</div>
</div>
