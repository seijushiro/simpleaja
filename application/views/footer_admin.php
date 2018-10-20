            <footer class="page-footer">
                <div class="font-13">© Copyright 2018.<b> Dinas Pekerjaan Umum & Perumahan Rakyat Provinsi Nusa Tenggara Barat</b> - Powered by Lestari Informatika</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>    
    <!-- PAGA BACKDROPS--> 
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->    

    <!-- CORE PLUGINS-->

    <script src="<?php echo base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/toastr/toastr.min.js"></script>    
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?php echo base_url() ?>assets/vendors/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/dist/locale/bootstrap-datepicker.id.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/multiselect/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/inputmask/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jsgrid/jsgrid.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/featherlight/featherlight.min.js"></script>    

    <!-- BEGIN SLIM JS-->
    <script src="<?php echo base_url().'assets/';?>slim/slim/slim.kickstart.min.js" type="text/javascript"></script>    
    <!-- END SLIM JS-->    
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url() ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/app.custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/app.chart.js"></script>
</body>

<script type="text/javascript">
    $(".form-info").validate();
    <?php if($active_ctrl=="Dashboard"){ ?>
        showChart(<?php echo json_encode($data_lelang) ?>)  ;
    <?php }?>
  
    function fn_deleteData(url){
        swal({
            title:"Yakin akan dihapus ?",
            text:"data akan dihapus secara permanent",
            type:"warning",
            showCancelButton:!0,
            confirmButtonColor:"#DA4453",
            confirmButtonText:"Yes",
            cancelButtonText:"No",
            closeOnConfirm:!1,closeOnCancel:!0}
            ,function(yes){
                if(yes){
                    $.post("<?php echo base_url() ?>"+url).done(function(){
                        window.location.reload();
                    });
                    
                }
            }
        );
    } 
       
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: "linked" ,
        language:'id',
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true             
    });

    $(document).ready(function(){
        $(".select2").select2({
            allowClear: true
        });

        $(".rupiah").inputmask("numeric",{
            groupSeparator: ".",
            autoGroup: true,
            rightAlign: false
        });
        
        $(".multiselect").multiSelect({
            selectableOptgroup: true
        });


    })
</script>

<script type="text/javascript">
    // SWAL
    <?php 
        $flash_data = $this->session->flashdata('result_submit');
        if(isset($flash_data)){
            echo "swal('".$flash_data['msg']."');";
        }
    ?>
</script>
</html>