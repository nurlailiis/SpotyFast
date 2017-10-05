<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Futsal Fasor ITS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/clean-blog.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/img.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url();?>">Futsal Fasor</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('lapangan/home');?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('lapangan/sewajadwal');?>">Sewa Jadwal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('lapangan/login'); ?>">Login</a>
              <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('marketplace/product/pasminah'); ?>">Pasminah</a></li>
              <li><a href="<?php echo base_url('marketplace/product/kotak'); ?>">Kotak</a></li>
            </ul>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php //echo base_url('user/signup'); ?>">SignUp</a>
            </li>  -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('user/logout'); ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo base_url();?>assets/img/futsal wall.png')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Futsal Fasor ITS</h1>
              <span class="subheading">Fasilitas futsal dengan berbagai macam jenis lapangan</span>
            </div>
          </div>
        </div>
      </div>
    </header>
