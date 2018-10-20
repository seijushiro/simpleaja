<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Setup</li>
            <li class="breadcrumb-item">Ruas Jalan</li>
            <li class="breadcrumb-item"><?php echo ($action=='UpdateData'?'Edit':'Tambah') ?> Data</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title"><?php echo ($action=='UpdateData'?'EDIT':'TAMBAH') ?> DATA RUAS JALAN</div>
                    </div>        	
		            
		            <form class="form-info" novalidate enctype="multipart/form-data" method="post" action="<?php  echo base_url().'Ruas/'.$action?>">	
	            	<div class="ibox-body">
            			<div class="row">
            				<div class="col-xs-12 col-sm-4">
	            				<input type="hidden" name="id" value="<?php echo (isset($data_tabel)?$data_tabel['id']:'') ?>">
	        					<div class="form-group mb-4">			            		
		            				<label> Kode Ruas</label>
		            				<input type="text" class="form-control" name="kd" required 
						            	value="<?php echo (isset($data_tabel)?$data_tabel['kd_ruas']:'') ?>">			            			
		            			</div>
		            			<div class="form-group mb-4">
		            				<label> Nama Jalan </label>
		            				<input type="text" class="form-control" name="nama" id="nm" required 
						            	value="<?php echo (isset($data_tabel)?$data_tabel['nm_jalan']:'') ?>">		            				
		            			</div>	
		            			<div class="form-group mb-4">
		            				<label> Panjang </label>
		            				<input type="text" class="form-control" name="panjang" required 
						            	value="<?php echo (isset($data_tabel)?$data_tabel['panjang']:'') ?>">		            				
		            			</div>
		            			<div class="form-group mb-4">
		            				<label> Koordinat Garis </label>
		            				<input type="text" class="form-control" name="l_latlong" id="line_latlong" required readonly 
						            	value="<?php echo (isset($data_tabel)?$data_tabel['line_latlong']:'') ?>">		            				
		            			</div>
                                <div class="form-group mb-4">
                                    <label> Koordinat Titik </label>
                                    <input type="text" class="form-control" name="m_latlong" id="marker_latlong" required readonly 
                                        value="<?php echo (isset($data_tabel)?$data_tabel['mark_latlong']:'') ?>">                                   
                                </div>                                		            			
		            		</div>		            						            			
		            		<div class="col-xs-12 col-sm-8 form-group mb-4">
		            			<label>Alamat</label>
		            			<input type="text" class="form-control " name="alamat" id="almt" required 
	                                onkeydown="clearTimer()" onkeyup="doneTyping()" 
	                                value="<?php echo (!empty($data_tabel)?$data_tabel['alamat']:'') ?>">
                                 <div id="map" style="height:350px; background-color: #000;"></div>                                
		            		</div>
	            		</div>
		            </div>
                    <div class="ibox-footer">
        				<button type="submit" class="btn btn-primary"><span><i class="ft-check-square"></i></span> Simpan</button>
        				<a href="<?php echo base_url().'Ruas' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Batal</a>
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
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_ZJNBkDDBXnyIOlQcubvqH0lqNst1X-M&callback=initMap&libraries=drawing" async defer></script>
<script>    
    var map;
    var markOverlays = []; 
    var lineOverlays = [];
    var lineHandle   = "<?php echo (isset($data_tabel)?$data_tabel['line_latlong']:'') ?>";
    var markHandle   = "<?php echo (isset($data_tabel)?$data_tabel['mark_latlong']:'') ?>";
    

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -8.586164, lng: 116.118042},
            zoom: 17
        });

        geocoder = new google.maps.Geocoder;

        var drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: null,
          drawingControl: true,
          drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: ['marker', 'polyline']
          },
          markerOptions: {draggable: true},
          polylineOptions: {clickable: true,editable: false}
        });
        drawingManager.setMap(map); 
        google.maps.event.addListener(drawingManager, 'polylinecomplete', addLine);

        google.maps.event.addListener(drawingManager, 'markercomplete', addMark);        
        displayPath();
        displayMark();
    }    

    function displayPath() {
        if(lineHandle == "") {
            return;
        }
        path = JSON.parse(lineHandle);
        var newPath = [];
        // Now iterate through all the polylines and draw them on the map.
        for(var i = 0; i < path.length; i++) {         
            newPath.push({ lat: path[i][0], lng: path[i][1]});           
        }
        // Draw saved paths on the map with the same settings as they were drawn.
        var poly = new google.maps.Polyline({
            path: newPath,
            editable: false,
            clickable: true,
            zIndex: 5,
        });

        lineOverlays.push(poly);
        poly.setMap(map);        
    }

    function displayMark() {
        if(markHandle == "") {
            return;
        }
        var mark = JSON.parse(markHandle);        
        var location = {lat: mark[0][0], lng:mark[0][1]};
        marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: true
        }); 
        map.setCenter(location);
        marker.setPosition(location); 
        google.maps.event.addListener(marker, 'dragend', function(evt){
            var new_location = [];
            new_location.push([evt.latLng.lat(),evt.latLng.lng()]);
            JSONString = JSON.stringify(new_location);
            $("#marker_latlong").val(JSONString);
        });        
        markOverlays.push(marker);        

    }    


    function clearMap(type) {
        if(type=='line'){
            for (var i = lineOverlays.length - 1; i >= 0; i--) {
                lineOverlays[i].setMap(null);
            }
            lineOverlays = [];
        }else{
            for (var i = markOverlays.length - 1; i >= 0; i--) {
                markOverlays[i].setMap(null);
            }

            markOverlays = [];            
        }
    }
    function addMark(mark){

        clearMap('marker');
        markOverlays.push(mark);
        var location = mark.getPosition();
        var new_location = [];


        new_location.push([location.lat(),location.lng()]);
        JSONString = JSON.stringify(new_location);
        $("#marker_latlong").val(JSONString);

        google.maps.event.addListener(mark, 'dragend', function(evt){
            var new_location = [];
            new_location.push([evt.latLng.lat(),evt.latLng.lng()]);
            JSONString = JSON.stringify(new_location);
            $("#marker_latlong").val(JSONString);
        });        

    }


    function addLine(line){
        clearMap('line');
        lineOverlays.push(line);
        var path = line.getPath().getArray();            
        var new_path = [];

        for (var i = path.length - 1; i >= 0; i--) {
            new_path.push([path[i].lat(), path[i].lng()]);
        }

        JSONString = JSON.stringify(new_path);
        $("#line_latlong").val(JSONString); 
    }

    function setCoordinate(){

        var alamat = $("#nm").val()+", "+$("#almt").val();            
        geocoder.geocode( { "address": alamat + ", Nusa Tenggara Barat"}, function(results, status) {
            if (status == "OK") {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                var latLng = {lat: latitude, lng: longitude};
                if (results[0]) {
                    map.setCenter(latLng);
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
 
    }

</script>
