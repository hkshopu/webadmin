<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$header_title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Load js file per controller -->
  <?php 

    if(isset($load_js))
    { ?>
      <!-- DataTables -->
      <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php }

  ?>

  <?php
    if(isset($isUpload))
    { ?>
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/dropzone.css'); ?>">
    <script src="<?=base_url()?>assets/dist/js/dropzone.js"></script>
    <?php }

  ?>

  <?php
    if(isset($isOneTimeUpload))
    { ?>
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/croppie.css'); ?>">
    <link rel="stylesheet" href="<?= site_url('assets/dist/css/croppie_style.css'); ?>">
    <script src="<?=base_url()?>assets/dist/js/croppie.js"></script>
    <?php }

  ?>

    <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/font.css">
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
  <div class="wrapper">

  <header class="main-header">