<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SIMPEL AJA</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link rel="icon" href="<?php echo base_url() ?>assets/img/favicon.png" type="image">
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-sweetalert/dist/sweetalert.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/dataTables/datatables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/multiselect/css/multi-select.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/jsgrid/jsgrid.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/vendors/jsgrid/jsgrid-theme.css" rel="stylesheet" />    
    <link href="<?php echo base_url() ?>assets/vendors/featherlight/featherlight.min.css" type="text/css" rel="stylesheet" />
    <!-- LEAFLET MAP-->
    <link href="<?php echo base_url() ?>assets/leaflet/leaflet.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/leaflet/draw/leaflet.draw.css" rel="stylesheet" />

    <!-- THEME STYLES-->
    <link href="<?php echo base_url() ?>assets/css/main.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <!-- SLIM CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/';?>slim/slim/slim.min.css">
    <!-- END SLIM CSS-->


    <!-- JQUERY JS-->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
</head>

<body class="boxed-layout">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="header-topbar">
                <div class="wrapper d-flex">
                    <div class="page-brand">
                        <a class="link" href="<?php echo base_url().'Dashboard'?>">
                            <span class="brand">
                                <img src="<?php echo base_url() ?>assets/img/logos/logo.png" width="200px" height="50px">
                            </span>
                        </a>
                    </div>
                    <div class="d-flex justify-content-between align-items-center flex-1">
                        <!-- START TOP-LEFT TOOLBAR-->
                        <ul class="nav navbar-toolbar">
                            <li>
                                <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END TOP-LEFT TOOLBAR-->
                        <!-- START TOP-RIGHT TOOLBAR-->
                        <ul class="nav navbar-toolbar">                            
                            <li class="dropdown dropdown-notification">
                                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                                    <span><?php echo $this->session->userdata("nama");?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                                    <div class="dropdown-arrow"></div>
                                    <div class="dropdown-header text-center">
                                        <div>
                                            <a class="font-18" href="<?php echo base_url().'Logout'?>">Logout <i class="ti-shift-right ml-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- END TOP-RIGHT TOOLBAR-->
                        <!-- START SEARCH PANEL-->
                    </div>
                </div>
            </div>