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
                                 <div id="map-container" style="height:350px; background-color: #000;"></div>                                
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

<script src="<?php echo base_url() ?>assets/leaflet/leaflet.js"></script>
<script src="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.js"></script>
<script>    
    var map;
    var markOverlays = []; 
    var lineOverlays = [];
    var lineHandle   = "<?php echo (isset($data_tabel)?$data_tabel['line_latlong']:'') ?>";
    var markHandle   = "<?php echo (isset($data_tabel)?$data_tabel['mark_latlong']:'') ?>";
    initMap();

    function initMap() {
      map = L.map('map-container').setView([-8.591367,116.097428], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var editableLayers = new L.FeatureGroup();
        map.addLayer(editableLayers);

        var options = {
            position: 'topright',
            draw: {
                polygon : false,
                circle : false,
                rectangle: false,
                circlemarker: false,
                polyline: {
                    showArea: true,
                    shapeOptions: {
                        color: '#0f2d63',
                        weight: 5
                    }
                },
                marker: true
            },
            edit: {
                featureGroup: editableLayers, //REQUIRED!!
                remove: true,
                edit:false
            }
        };
        var drawControl = new L.Control.Draw(options);
        map.addControl(drawControl);
        <?php if($action !=='UpdateData'){ ?>
                          var marker = null;
       <?php } ?>
        map.on(L.Draw.Event.CREATED, function (e) {
            editableLayers.addLayer(e.layer);
            coord = editableLayers.toGeoJSON().features[0].geometry.coordinates;
            var newPath = [];        
            // Now iterate through all the polylines and draw them on the map.
            for(var i = 0; i < coord.length; i++) {         
                newPath.push([coord[i][1],coord[i][0]]);           
            }
            // console.log(editableLayers);
            JSONString = JSON.stringify(newPath);
            if(e.layerType === "marker"){
                if(marker){
                    editableLayers.removeLayer(marker);
                }
                marker = e.layer;    
                jsstr = JSON.stringify([e.layer._latlng.lat,e.layer._latlng.lng]);            
                $("#marker_latlong").val(jsstr);
            }else{
                $("#line_latlong").val(JSONString);
            }
        });
       
        <?php if($action=='UpdateData'){ ?>
                displayPath(editableLayers);
                addMark(editableLayers);
        <?php } ?>

        
    }    

    function displayPath(Layer) {
        if(lineHandle == "") {
            return;
        }

        path = JSON.parse(lineHandle);
        var line = L.polyline(path);
        Layer.addLayer(line);

        map.fitBounds(line.getBounds());
    }


    function addMark(Layer){
        if(markHandle == "") {
            return;
        }
        mark = JSON.parse(markHandle);     
        marker = new L.Marker([mark[0],mark[1]]);   
        Layer.addLayer(marker);
    }

    function setCoordinate(){
        var alamat = $("#almt").val();
        $.get("https://nominatim.openstreetmap.org/?format=json&addressdetails=1&street="+alamat+"&state=Nusa Tenggara Barat&country=Indonesia&limit=1")
        .done(function(data){
            console.log(data);
            position = [data[0].lat,data[0].lon];        
            map.setView(position,17);
        });

    }

</script>
