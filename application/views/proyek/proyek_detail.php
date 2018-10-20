<div class="wrapper content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <ol class="breadcrumb mt-4">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url().'Dashboard'?>"><i class="la la-home font-20" title="Dashboard"></i></a>
            </li>
            <li class="breadcrumb-item">Lelang</li>
            <li class="breadcrumb-item">Proyek Lelang</li>
            <li class="breadcrumb-item">Detail</li>            
        </ol>
    </div>	
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
		<div class="row">
		    <div class="col-xl-12 col-lg-12 col-xs-12">
		        <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">DETAIL PROYEK LELANG</div>
                    </div>        	
	            	<div class="ibox-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 mb-4">
                                <table class="table table-bot">
                                    <tr>
                                        <th>No. Proyek</th>
                                        <td><?php echo (!empty($data_tabel)?$data_tabel['no_reg']:'') ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td><?php echo (!empty($data_tabel)?date('d-m-Y',strtotime($data_tabel['tgl_reg'])):'') ?></td>
                                    </tr> 
                                    <tr>
                                        <th> Uraian Kegiatan</th>
                                        <td><?php echo (!empty($data_tabel)?$data_tabel['nm_kegiatan']:'') ?></td>
                                    </tr>
                                    <tr>
                                        <th> Alamat</th>
                                        <td><?php echo (!empty($data_tabel)?$data_tabel['alamat']:'') ?></td>
                                    </tr>
                                    <tr>
                                        <th> Wilayah</th>
                                        <td><?php echo (!empty($data_tabel)?$data_tabel['nm_wilayah']:'') ?></td>
                                    </tr>
                                    <tr>
                                        <th> Tahun</th>
                                        <td><?php echo (!empty($data_tabel)?$data_tabel['tahun']:'') ?></td>
                                    </tr>
                                    <tr>
                                        <th> Nilai HPS</th>
                                        <td><?php echo 'Rp. '.(!empty($data_tabel)?number_format($data_tabel['nilai_hps']):'') ?></td>
                                    </tr> 
                                    <tr>
                                        <th> Pagu Anggaran</th>
                                        <td><a href="#" data-featherlight="#PDF_Pagu"><?php echo 'Rp. '.(!empty($data_tabel)?number_format($data_tabel['pagu']):'-') ?></a></td>
                                        <div style="display: none">
                                            <div id="PDF_Pagu" style="height: 500px;width: 800px"></div>
                                        </div>
                                    </tr> 
                                    <tr>
                                        <th> Pengumuman Lelang</th>
                                        <td>
                                            <table>
                                                <tr><td class="borderless">Nomor</td><td class="borderless"><a href="#" data-featherlight="#PDF_Pengumuman"> : 
                                                    <?php echo (!empty($data_tabel)?$data_tabel['no_lelang']:'-') ?></a></td>
                                                </tr>
                                                <tr><td class="borderless">Tanggal</td><td class="borderless"> : <?php echo (!empty($data_tabel)?date('d-m-Y',strtotime($data_tabel['tgl_lelang'])):'') ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <div style="display: none">
                                            <div id="PDF_Pengumuman" style="height: 500px;width: 800px"></div>                                            
                                        </div>                                                                                   
                                    </tr> 
                                    <tr>
                                        <th> Pemenang Lelang</th>
                                        <td>
                                            <table>
                                                <tr><td class="borderless">Nomor</td><td class="borderless"><a href="#" data-featherlight="#PDF_pemenang"> : 
                                                    <?php echo (!empty($data_tabel)?$data_tabel['no_pemenang']:'-') ?></a></td>
                                                </tr>
                                                <tr><td class="borderless">Tanggal</td><td class="borderless"> : <?php echo (!empty($data_tabel)?date('d-m-Y',strtotime($data_tabel['tgl_pemenang'])):'') ?></td>
                                                </tr>
                                                <tr><td class="borderless">Pemenang</td><td class="borderless"> : <?php echo (!empty($data_tabel)?$data_tabel['nm_pemenang']:'') ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <div style="display: none">
                                            <div id="PDF_pemenang" style="height: 500px;width: 800px"></div>
                                        </div>                                         
                                    </tr>                                                                         
                                    <tr>
                                        <th> SPBBJ Lelang</th>
                                        <td>
                                            <table>
                                                <tr><td class="borderless">Nomor</td><td class="borderless"><a href="#" data-featherlight="#PDF_SPBBJ"> : 
                                                    <?php echo (!empty($data_tabel)?$data_tabel['no_spbbj']:'-') ?></a></td>
                                                </tr>
                                                <tr><td class="borderless">Tanggal</td><td class="borderless"> : <?php echo (!empty($data_tabel)?date('d-m-Y',strtotime($data_tabel['tgl_spbbj'])):'') ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <div style="display: none">
                                            <div id="PDF_SPBBJ" style="height: 500px;width: 800px"></div>
                                        </div>                                         
                                    </tr> 
                                </table>                                
                            </div> 
                            <div class="col-xs-12 col-sm-4 mb-4">                                
                                <div id="map" style="height:400px; background-color: #000;"></div>
                            </div>
                        </div>                                                          				            			
		            </div>
                    <div class="ibox-footer">
        				<a href="<?php echo base_url().'Proyek' ?>" class="btn btn-danger"><span><i class="ft-rotate-ccw"></i></span> Kembali</a>
                    </div>
                    </form>			            
		        </div>
		    </div>
		</div>
		<!--/ Stats -->
	</div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/pdfobject/pdfobject.min.js"></script>
<script type="text/javascript">
    PDFObject.embed("<?php echo base_url().'uploads/'.(!empty($data_tabel['file_pemenang'])?$data_tabel['file_pemenang']:'') ?>", "#PDF_pemenang");
    PDFObject.embed("<?php echo base_url().'uploads/'.(!empty($data_tabel['file_pengumuman'])?$data_tabel['file_pengumuman']:'') ?>", "#PDF_Pengumuman");    
    PDFObject.embed("<?php echo base_url().'uploads/'.(!empty($data_tabel)?$data_tabel['file_pagu']:'') ?>", "#PDF_Pagu");     
    PDFObject.embed("<?php echo base_url().'uploads/'.(!empty($data_tabel)?$data_tabel['file_spbbj']:'') ?>", "#PDF_SPBBJ");     
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_ZJNBkDDBXnyIOlQcubvqH0lqNst1X-M&callback=initMap" async defer></script>
<script>
    var map;        
    var lineHandle  = "<?php echo (isset($data_tabel)?$data_tabel['line_latlong']:'') ?>";
    var markHandle  = "<?php echo (isset($data_tabel)?$data_tabel['mark_latlong']:'') ?>";
    var lat         = parseFloat(<?php echo (isset($data_tabel)?$data_tabel['latitude']:'0') ?>);
    var long        = parseFloat(<?php echo (isset($data_tabel)?$data_tabel['longitude']:'0') ?>);

    function initMap() {
        var mylocation = {lat: lat, lng: long};
        map = new google.maps.Map(document.getElementById('map'), {
            center: mylocation,
            zoom: 17
        });
        displayPath();
        var marker = new google.maps.Marker({
                position: mylocation,
                map: map
        }); 
        map.setCenter(mylocation);
        marker.setPosition(mylocation);
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
        poly.setMap(map);        
    }

    function displayMark() {
        if(markHandle == "") {
            return;
        }
        var mark = JSON.parse(markHandle) ;       
        var location = {lat: mark[0][0], lng:mark[0][1]};
        marker = new google.maps.Marker({
            position: location,
            map: map,
            draggable: false
        }); 
        map.setCenter(location);
        marker.setPosition(location);      

    }        
</script>