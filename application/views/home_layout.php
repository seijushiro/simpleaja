<!DOCTYPE html>
<html data-style-switcher-options="{'borderRadius': '0', 'changeLogo': false, 'colorPrimary': '#E04622', 'colorSecondary': '#EEAB26', 'colorTertiary': '#EAEFF3', 'colorQuaternary': '#080808'}">
	
<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Simpel AJA (Sistem Informasi Pelaporan Pembangunan Jalan)</title>	
		<meta name="RaditNugros" content="">

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url().'assets/frontend/' ?>img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="<?php echo base_url().'assets/frontend/' ?>img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/animate/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/theme.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/theme-shop.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/rs-plugin/css/navigation.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/nivo-slider/nivo-slider.css">
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>vendor/nivo-slider/default/default.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/skins/skin-construction.css">		

		<!-- Demo CSS -->		
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/demos/demo-construction.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url().'assets/frontend/' ?>css/custom.css">

	    <link href="<?php echo base_url() ?>assets/leaflet/leaflet.css" rel="stylesheet">
	    <link href="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.css" rel="stylesheet">

		<!-- Head Libs -->
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/modernizr/modernizr.min.js"></script>		

	</head>
	<body data-spy="scroll" data-target="#sidebar" data-offset="120">

		<div class="body">
			<header id="header" class="header-narrow header-semi-transparent-light header-flex" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 1, 'stickySetTop': '1'}">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<img class="logo-default" alt="Porto" width="324" height="212" src="<?php echo base_url().'assets/frontend/' ?>img/logo-construction.png">
									<a href="demo-construction.html">
										<img class="logo-small" alt="Porto" width="191" height="48" src="<?php echo base_url().'assets/frontend/' ?>img/logo-construction-small.png">
									</a>
								</div>
							</div>
							<div class="header-column">
								<div class="header-row">
									<div class="header-nav header-nav-stripe">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										<ul class="header-social-icons social-icons visible-lg">
											<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
											<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
										</ul>
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1 collapse">
											<nav>
												<ul class="nav nav-pills" id="mainNav">
													<li class="active">
														<a href="demo-construction.html">
															Beranda
														</a>
													</li>
													<li>
														<a href="#">
															Profil
														</a>
													</li>
													<li>
														<a href="#">
															Layanan
														</a>
														
													</li>
													<li>
														<a href="#">
															Data
														</a>
													</li>
													
													<li>
														<a href="<?php echo base_url().'Login'?>">
															Login
														</a>
													</li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">
				<div class="slider-container light rev_slider_wrapper" style="height: 700px;">
					<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 700, 'disableProgressBar': 'on'}">
						<ul>
							<li data-transition="fade">
								<img src="<?php echo base_url().'assets/frontend/' ?>img/slides/slide-construction-1.jpg"  
									alt=""
									data-bgposition="center 100%" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">
								
								<div class="tp-caption top-label tp-caption-custom-stripe"
									data-x="right" data-hoffset="0"
									data-y="bottom" data-voffset="100"
									data-start="1000"
									data-transform_in="x:[100%];opacity:0;s:1000;">Jalan Merupakan Urat Nadi Perekonomian</div>
							</li>
							<li data-transition="fade">
								<img src="<?php echo base_url().'assets/frontend/' ?>img/slides/slide-construction-2.jpg"  
									alt=""
									data-bgposition="center 100%" 
									data-bgfit="cover" 
									data-bgrepeat="no-repeat" 
									class="rev-slidebg">
								
								<div class="tp-caption top-label tp-caption-custom-stripe"
									data-x="right" data-hoffset="20"
									data-y="bottom" data-voffset="100"
									data-start="1000"
									data-transform_in="x:[100%];opacity:0;s:1000;">Ikhtiar Meningkatan Infrastruktur Jalan</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="container">
					<div class="row mt-xl mb-xl pt-xl mb-xl">
						<div class="col-md-4">
							<h2 class="mt-xl mb-none text-color-dark"><strong>SIMPEL AJA</strong></h2>
							<p>(Sistem Informasi Pelaporan Pembangunan Jalan)</p>
						</div>
						<div class="col-md-2 center hidden-xs hidden-sm">
							<img src="<?php echo base_url().'assets/frontend/' ?>img/dotted-line-angle.png" class="img-responsive" />
						</div>
						<div class="col-md-6">
							<p class="mt-xl">Simpel AJA merupakan sistem informasi yang dikembangkan oleh <strong>Dinas Pekerjaan Umum & Perumahan Rakyat Provinsi NTB</strong> dalam mengelola pembangunan jalan di Provinsi NTB. Sistem ini berfungsi untuk memonitor perkembangan pembangunan jalan di seluruh Provinsi NTB.</p>
							
						</div>
					</div>
				</div>

				<section>
							    				
					 <div id="map-container" style="width:100%;height:600px"></div>
					 
					 </div>
					</div>
				</div>	 
				</section>

				<section class="section section-tertiary section-no-border section-custom-construction">
					<div class="container">
						<div class="row pt-xl">
							<div class="col-md-12">
								<h2 class="mb-none text-color-dark">Fitur Layanan</h2>
								<p class="lead">Fitur layanan yang terdapat dalam sistem</p>
							</div>
						</div>

						<div class="row mt-lg">
							<div class="col-md-6">
								<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
									<div class="feature-box-icon">
										<img src="<?php echo base_url().'assets/frontend/' ?>img/icons/pu.png" alt="" class="img-responsive" />
									</div>
									<div class="feature-box-info ml-md">
										<h4 class="mb-sm">Basis Data</h4>
										<p>Simpel AJA merekam semua bentuk pekerjaan pembangunan jalan yang ada di Provinsi NTB dalam bentuk file yang dapat diakses oleh pihak yang memiliki hak akses. </p>
										
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
									<div class="feature-box-icon">
										<img src="<?php echo base_url().'assets/frontend/' ?>img/icons/pu.png" alt="" class="img-responsive" />
									</div>
									<div class="feature-box-info ml-md">
										<h4 class="mb-sm">Rekam Data</h4>
										<p>Sistem ini dapat berfungsi sebagai media penyimpanan data berupa data kontrak, data lelang dan dokumentasi kegiatan. </p>
										
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-md mb-xl">
							<div class="col-md-6">
								<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="300">
									<div class="feature-box-icon">
										<img src="<?php echo base_url().'assets/frontend/' ?>img/icons/pu.png" alt="" class="img-responsive" />
									</div>
									<div class="feature-box-info ml-md">
										<h4 class="mb-sm">Mapping Area</h4>
										<p>Sistem ini pula menampilkan pemetaan lokasi proyek pembangunan jalan yang tersebar diseluruh Provinsi Nusa Tenggara Barat</p>
										
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="feature-box feature-box-style-2 mb-xl appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
									<div class="feature-box-icon">
										<img src="<?php echo base_url().'assets/frontend/' ?>img/icons/pu.png" alt="" class="img-responsive" />
									</div>
									<div class="feature-box-info ml-md">
										<h4 class="mb-sm">Ekspor & Cetak File</h4>
										<p>Memudahkan pengguna dalam memproses data yang telah di input sekaligus mencetaknya dalam bentuk rekapitulasi laporan yang rapi.</p>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="pt-md pb-xl home-concept-construction">
					<div class="container">
						<div class="row pt-xl">
							<div class="col-md-12">
								<h2 class="mb-none text-color-dark">Galeri Kegiatan</h2>
								<p class="lead">Perkembangan Pengerjaan Jalan di Provinsi NTB</p>

								<div class="diamonds-wrapper lightbox" data-plugin-options="{'delegate': '.diamond', 'type': 'image', 'gallery': {'enabled': true}}">
									<ul class="diamonds">
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-1.jpg" class="diamond">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-1.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-2.jpg" class="diamond">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-2.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-3.jpg" class="diamond">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-3.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-4.jpg" class="diamond diamond-sm">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-4.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-5.jpg" class="diamond">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-5.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-6.jpg" class="diamond diamond-sm">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-6.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
										<li>
											<a href="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-7.jpg" class="diamond diamond-sm">
												<div class="content">
													<img src="<?php echo base_url().'assets/frontend/' ?>img/gallery/construction-gallery-7.jpg" class="img-responsive" />
												</div>
											</a>
										</li>
									</ul>
								</div>

							</div>
						</div>
						<div class="row row-diamons-description">
							<div class="col-md-6">
								<p>Dokumentasi perkembangan proyek pengerjaan jalan di Provinsi Nusa Tenggara Barat.</p>
								<a class="btn btn-borders btn-primary" href="#">Galeri Kegiatan</a>
							</div>
						</div>
					</div>
				</section>

				
				<section class="pt-md section-custom-construction-2">
					<div class="container">
						
							
						<div class="row">
							
							<div class="col-md-12 center">
								<p>© Copyright 2018. Dinas Pekerjaan Umum & Perumahan Rakyat Provinsi Nusa Tenggara Barat .</p>
							</div>
						</div>
					</div>
						</div>
						
						</div>
					</div>
				</section>
			</div>


		</div>

		<!-- Vendor -->
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery-cookie/jquery-cookie.min.js"></script>
		
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/common/common.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/isotope/jquery.isotope.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/vide/vide.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url().'assets/frontend/' ?>js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>		
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="<?php echo base_url().'assets/frontend/' ?>vendor/nivo-slider/jquery.nivo.slider.min.js"></script>
		<script src="<?php echo base_url().'assets/frontend/' ?>js/views/view.contact.js"></script>

		<!-- Demo -->
		<script src="<?php echo base_url().'assets/frontend/' ?>js/demos/demo-construction.js"></script>	
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url().'assets/frontend/' ?>js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url().'assets/frontend/' ?>js/theme.init.js"></script>
   
	    <script src="<?php echo base_url() ?>assets/leaflet/leaflet.js"></script>
	    <script src="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.js"></script> 		
		<!-- PAGE LEVEL PLUGINS-->
    	<!-- CORE SCRIPTS-->
    
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
	            markers = [];                ;                           
	        }            
		</script>
	</body>
</html>