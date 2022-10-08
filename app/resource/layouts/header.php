<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <title>PANDORASETUP-<?php echo str_replace("-", " ",strtoupper(url_number(3)))  ?></title>
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/pace/pace.css') ?> ">
    <script src="<?php echo asset_setup('vendor/pace/pace.min.js') ?> "></script>
    <!--vendors-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo asset_setup('vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') ?>">
    <link rel="stylesheet" type="text/css"
        href="<?php echo asset_setup('vendor/jquery-scrollbar/jquery.scrollbar.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/jquery-ui/jquery-ui.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/timepicker/bootstrap-timepicker.min.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Hind+Vadodara:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset_setup('fonts/jost/jost.css') ?>">
    <!--Material Icons-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo asset_setup('fonts/materialdesignicons/materialdesignicons.min.css') ?>">
    <!--Bootstrap + atmos Admin CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset_setup('css/atmos.css') ?>">
    <!-- Additional library for page -->

    <link rel="stylesheet" href="<?php echo asset_setup('vendor/DataTables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/summernote/summernote-bs4.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('vendor/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo asset_setup('css/datatable-select.min.css') ?>">
    <style>
        .disable{
            pointer-events:none;
            cursor: not-allowed;
            opacity: 0.7;
        }
    </style>

</head>
<style>
    
    .merah{
        color:red
    }

</style>
<body class="sidebar-pinned">