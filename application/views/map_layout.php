
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SIMPEL AJA</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <link rel="icon" href="<?php echo base_url() ?>assets/img/marker3.png" type="image/gif">

    <link href="<?php echo base_url() ?>assets/leaflet/leaflet.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.css" rel="stylesheet">    
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="<?php echo base_url() ?>assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        body, html {
            background-color: #f2f3fa;
            height: 100% !important;
            width: 100% !important;            
        }
        .map-content{
            width: 100% !important; height: 100% !important;
        }


        .header-topbar-map {
            background: #2b3c4e;
            position: fixed;
            z-index: 1000;
            width: 100%;               
        }
    </style>
</head>

<body class="boxed-layout"> 
    <header class="header">

       <div class="header-topbar">
            <div class="wrapper d-flex">
                <div class="d-flex justify-content-between align-items-center flex-1">
                    <!-- START TOP-LEFT TOOLBAR-->
                    <ul class="nav navbar-toolbar">
                        <li>
                            <div class="text-white" >
                                <i class="la la-binoculars"></i>
                                LOKASI PROYEK PENGEMBANGAN & PEMBUATAN JALAN TAHUN <?php echo date('Y') ?> 
                            </div>
                        </li>
                    </ul>
                    <!-- END TOP-LEFT TOOLBAR-->
                    <!-- START TOP-RIGHT TOOLBAR-->                   
                    <ul class="nav navbar-toolbar">                            
                        <?php if($this->session->has_userdata('username')) {?>
                        <li class="bg-white">
                            <div class="ml-2 mr-2 mb-2 mt-2" >
                                <a class="link" href="<?php echo base_url().'Dashboard'?>" ><b>KEMBALI</b></a>
                            </div>                                
                        </li>
                        <?php }else{ ?>
                        <li class="bg-white">
                            <div class="ml-2 mr-2 mb-2 mt-2 " >
                            <a class="link" href="<?php echo base_url().'Login'?>" ><b> LOGIN</b></a>
                            </div>                                
                        </li>
                        <?php } ?>                        
                    </ul>
                    <!-- END TOP-RIGHT TOOLBAR-->
                    <!-- START SEARCH PANEL-->
                </div>
            </div>
        </div>          
    </header>       

    <div class="map-content" id="map-container" ></div>

            <footer class="page-footer">
                <div class="font-13">2018 © <b>Simpel Aja</b> - Powered by Lestari Informatika</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>    
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- CORE PLUGINS-->

    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

    <script src="<?php echo base_url() ?>assets/leaflet/leaflet.js"></script>
    <script src="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.js"></script>    
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url() ?>assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->    
    <script type="text/javascript">
      var map;
      var markers = [];
      var position = [-8.747973,117.780988]; //default position
      var lokasi = <?php echo json_encode($data_lokasi); ?>;
      function initMap(){

              map = L.map('map-container').setView(position, 9);
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              addMarkers(lokasi);
      }
          initMap();

          function addMarkers(locations){
          var image1 = '<?php echo base_url()?>assets/img/marker1.png';
          var image2 = '<?php echo base_url()?>assets/img/marker2.png';
          var image3 = '<?php echo base_url()?>assets/img/marker3.png';            

          var marker, i;
          for (i = 0; i < locations.length; i++) {  
              var myIcon = L.icon({iconUrl:(locations[i]["status"]==1?image1:(locations[i]["status"]==2 || locations[i]["status"]==3 ?image2:image3))});
              var position = [locations[i]['latitude'], locations[i]['longitude']];
              var popupContent = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h5 id="firstHeading" class="firstHeading">Nomor : '+locations[i]["no_reg"]+'</h5>'+
            '<div id="bodyContent">'+
            '<table class="table">'+
            '<tr><td><b>Kegiatan</b></td>'+'<td>: '+locations[i]["nm_kegiatan"]+'</td></tr>'+
            '<tr><td><b>Alamat</b></td>'+'<td>: '+locations[i]["alamat"]+'</td></tr>'+
            '<tr><td><b>Nilai</b></td>'+'<td>: '+locations[i]["nilai_hps"]+'</td></tr>'+
            '<tr><td><b>Wilayah</b></td>'+'<td>: '+locations[i]["nm_wilayah"]+'</td></tr>'+
                '<tr><td><b>Kontraktor</b></td>'+'<td>: '+locations[i]["nm_pemenang"]+'</td></tr>'+
                '<tr><td><b>Progres</b></td>'+'<td>: '+locations[i]["progres"]+' %</td></tr>'+
            '</table>'+
            '</div>'+
            '</div>';
              marker = L.marker(position,{icon:myIcon}).bindPopup(popupContent).addTo(map);
              markers.push(marker);
          }
         
          setTimeout(function(){
              clearMarkers();                
              var data = lokasi;               
              addMarkers(data);
          },60000);
      }

      function clearMarkers(){
          for (var i = 0; i < markers.length; i++) {
              map.removeLayer(markers[i]);
          }
          markers = [];                      
      }            
    </script>   
</body>
</html>