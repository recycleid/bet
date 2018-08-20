<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>InvisibleX</title>
    <!-- Favicon-->
    <link rel="icon" href="<?=base_url();?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?=base_url();?>resource/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?=base_url();?>resource/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?=base_url();?>resource/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?=base_url();?>resource/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?=base_url();?>resource/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Sweetalert Css -->
    <link href="<?=base_url();?>resource/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Font awesome Css -->
    <link href="<?=base_url();?>resource/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?=base_url();?>resource/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


    <!-- Custom Css -->
    <link href="<?=base_url();?>resource/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?=base_url();?>resource/css/themes/all-themes.css" rel="stylesheet" />


    <!-- Jquery Core Js -->
    <script src="<?=base_url();?>resource/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?=base_url();?>resource/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/raphael/raphael.min.js"></script>
    <script src="<?=base_url();?>resource/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?=base_url();?>resource/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?=base_url();?>resource/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?=base_url();?>resource/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?=base_url();?>resource/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?=base_url();?>resource/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?=base_url();?>resource/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="<?=base_url();?>resource/plugins/sweetalert/sweetalert.min.js"></script>


    <!-- Custom Js -->
    <script src="<?=base_url();?>resource/js/admin.js"></script>

    <!-- Demo Js -->
    <script src="<?=base_url();?>resource/js/demo.js"></script>


</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?=base_url();?>">InvisibleX</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url();?>">หน้าแรก</a></li>
                    <li><a href="<?=base_url();?>Login">เข้าสู่ระบบ</a></li>
										<li><a href="javascript:void(0);">ราคาบอลสเต็ป</a></li>
										<li><a href="<?=base_url();?>Home/ballresult">ผลบอล</a></li>
										<li><a href="javascript:void(0);">คาสิโน</a></li>
										<li><a href="javascript:void(0);">ติดต่อเรา</a></li>
                </ul>
            </div>
        </div>
    </nav>
