<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Lelang</li>
            <li class="breadcrumb-item">Proyek Lelang</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA PROYEK LELANG</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" action="<?php echo base_url().'Proyek/'.$action ?>" method="post">	
	            	<div class="ibox-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 form-group mb-4">                                
                                <label> No. Proyek</label>
                                <input type="text" class="form-control" name="no" required readonly 
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['no_reg']:$autonumb) ?>">
                            </div> 
                            <div class="col-xs-12 col-sm-4 form-group mb-4">                                
                                <label> Tanggal</label>
                                <div class="input-group">
                                    <input class="form-control datepicker" type="text" readonly name="tgl"
                                    value="<?php echo (!empty($data_tabel)?date('Y-m-d',strtotime($data_tabel['tgl_reg'])):date('Y-m-d')) ?>" >
                                </div>                                  
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label> Uraian Kegiatan </label>
                            <input type="text" class="form-control " name="ket" required 
                            value="<?php echo (!empty($data_tabel)?$data_tabel['nm_kegiatan']:'') ?>">
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-3 form-group mb-4">
                                <label> Wilayah </label>
                                <select class="form-control" required name="wil" onchange="fn_getppk()" id="wil">
                                    <option value="">-</option>
                                    <?php if(!empty($data_wilayah)){
                                        $kd = (!empty($data_tabel)?$data_tabel['kd_wilayah']:'');
                                    foreach($data_wilayah as $wil){ 
                                        $select = ($wil['kd_wilayah']==$kd?' selected':''); ?>
                                        <option value="<?php echo $wil['kd_wilayah'] ?>" <?php echo $select ?> ><?php echo $wil['nm_wilayah'] ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>

                            </div>
                            <div class="col-xs-12 col-sm-3 form-group mb-4">
                                <label> Tahun </label>
                                <input type="number" class="form-control" name="tahun" required                                     
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['tahun']:date('Y')) ?>">
                            </div>
                            <div class="col-xs-12 col-sm-3 form-group mb-4">
                                <label> Sumber Dana </label>
                                <select class="form-control" required name="sumber">
                                    <option value="">-</option>
                                    <?php if(!empty($data_sumber)){
                                        $sum = (!empty($data_tabel)?$data_tabel['kd_sumber']:'');
                                    foreach($data_sumber as $sumber){ 
                                        $select = ($sumber['kd_sumber']==$sum?' selected':''); ?>
                                        <option value="<?php echo $sumber['kd_sumber'] ?>" <?php echo $select ?> ><?php echo $sumber['nm_sumber'] ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>                                                              
                            <div class="col-xs-12 col-sm-3 form-group mb-4">
                                <label> Nilai HPS </label>
                                 <input type="text" class="form-control rupiah" name="nilai" required 
                                    value="<?php echo (!empty($data_tabel)?$data_tabel['nilai_hps']:'0') ?>">
                            </div>
                        </div>                                                                        
            			<div class="row">
	            			<div class="col-xs-12 col-sm-8">
                                <div class="form-group mb-4">
                                    <label> Ruas - Kecamatan, Kabupaten </label>
                                    <div class="input-group">
                                        <select class="form-control select2" required name="ruas" id="ruas" onchange="fn_getLocation()">
                                            <option value="">-</option>
                                            <?php if(!empty($data_ruas)){
                                                $idr = (!empty($data_tabel)?$data_tabel['id_ruas']:'');
                                            foreach($data_ruas as $ruas){ 
                                                $select = ($ruas['id']==$idr?' selected':''); ?>
                                                <option value="<?php echo $ruas['id'] ?>" <?php echo $select ?> ><?php echo $ruas['nm_jalan'] ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <span class="input-group-addon">-</span>                                     
                                        <input type="text" class="form-control " name="alamat" required 
                                        value="<?php echo (!empty($data_tabel)?$data_tabel['alamat']:'') ?>">

                                        <input type="hidden" class="form-control " name="long" id="lng" required readonly 
                                        value="<?php echo (!empty($data_tabel)?$data_tabel['longitude']:'') ?>">
                                        <input type="hidden" class="form-control " name="lat" id="lat" required readonly
                                        value="<?php echo (!empty($data_tabel)?$data_tabel['latitude']:'') ?>">                                        
                                    </div>
                                </div>
                                <div class="form-group mb-4"> 
                                    <div id="map-container" style="height:430px; background-color: #000;"></div>                              
                                </div>                                 
	            			</div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group mb-4">
                                    <label> Pagu Anggaran </label>
                                    <input type="text" class="form-control rupiah" name="pagu" required 
                                        value="<?php echo (!empty($data_tabel)?$data_tabel['pagu']:'') ?>">
                                </div>
                                <div class="form-group mb-4">                
                                    <label > File PDF </label>
                                    <input type="file" class="form-control" name="userfile" accept=".pdf" /> 
                                    <input type="hidden" name ="pagu_old" value="<?php echo (!empty($data_tabel)?$data_tabel['file_pagu']:'') ?>">
                                </div>
                                <div class="form-group mb-4">                
                                    <label > Nama PPK</label>
                                    <select class="form-control select2" required name="ppk" id="ppk">
                                        <option value="" disabled selected>-</option>
                                    </select>
                                </div>
                                <div class="form-group mb-4">                
                                    <label > Efektif</label>
                                    <input type="number" name="efektif" class="form-control"  
                                    min="0" step="1" required value="<?php echo (!empty($data_tabel)?$data_tabel['efektif']:'0') ?>">
                                </div>
                                <div class="form-group mb-4">                
                                    <label > Fungsional</label>
                                    <input type="number" name="fungsional" min="0" step="1" class="form-control" 
                                    required value="<?php echo (!empty($data_tabel)?$data_tabel['fungsional']:'0') ?>">
                                </div>
                            </div>                                                         				            			
	            		</div>                       
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'Proyek' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>
<script type="text/javascript">
    var typingTimer;                //timer identifier
    var doneTypingInterval = 3000;   // 3sec
    function clearTimer(){
        clearTimeout(typingTimer);
    }
    function doneTyping(){
        clearTimeout(typingTimer);
        typingTimer = setTimeout(setCoordinate, doneTypingInterval);
    }

    function fn_getppk(){
        var id = $("#wil option:selected").val();
        var ppk = "<?php echo (!empty($data_tabel)?$data_tabel['id_ppk']:'-') ?>";
        $.post("<?php echo base_url().'Proyek/GetPPK'?>",{id:id,ppk:ppk}).done(function(result){ 
            $("#ppk").select2().empty().select2({data:$.parseJSON(result)});
        })

    }

    <?php echo ($action=='UpdateData'?'fn_getppk();':''); ?>       
</script>

<script src="<?php echo base_url() ?>assets/leaflet/leaflet.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.js"></script>
<script>    
    var map;
    var markers = []; 
    var lineHandle   = "";
    var markHandle   = "";
    var lat = parseFloat(<?php echo (isset($data_tabel)?$data_tabel['latitude']:'0') ?>);
    var long = parseFloat(<?php echo (isset($data_tabel)?$data_tabel['longitude']:'0') ?>);  

    initMap();

    function initMap() {
      map = L.map('map-container').setView([-8.591367,116.097428], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        map.on("click", function (e) {
            var mark = e.latlng;
            addMark(mark);
        });


        
        
    }    

    function fn_getLocation(){
        var id = $("#ruas option:selected").val();
        $.post("<?php echo base_url().'Proyek/GetRuasLocation'?>",{id:id}).done(function(result){             
            var data = JSON.parse(result);

            if(data[0]=="Kosong"){
                map.clearLayers();
                return;
            }            
            lineHandle = JSON.parse(data[0]['line_latlong']);
            displayPath(map);
            markHandle = JSON.parse(data[0]['mark_latlong']);
            <?php if ($action=='UpdateData'){ ?>
                var location = {lat: lat, lng : long};       
            <?php }else{ ?>
                var location = {lat: markHandle[0], lng:markHandle[1]};       
            <?php } ?>
            addMark(location);
        })

    }


    function displayPath(Layer) {
        if(lineHandle == "") {
            return;
        }

        var line = L.polyline(lineHandle);
        Layer.addLayer(line);

        map.fitBounds(line.getBounds());
    }


    function clearMarkers(){
        for (var i = 0; i < markers.length; i++) {
            map.removeLayer(markers[i]);
        }
        markers = [];                           
    }  

    function addMark(latlong){
        clearMarkers();
        mark = new L.Marker([latlong.lat,latlong.lng]);
        map.addLayer(mark);   
        markers.push(mark);

        $("#lng").val(latlong.lng);
        $("#lat").val(latlong.lat); 

    }

</script>

