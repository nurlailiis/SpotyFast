<!DOCTYPE html>
<html>
<head>
	<title>Futsal Fasor ITS | <?php echo $page; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Futsal fasor ITS, tempat untuk menyewa lapangan futsal dengan cepat.">
    <meta name="author" content="Mohamad David | Nur laili | Aisyah paramastri">
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
<nav class="navbar navbar-default navbar-fixed-top ">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
	        		<span class="icon-bar"></span>
			        <span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	        	</button>
        		<a class="navbar-brand" href="<?php echo base_url(); ?>">Futsal Fasor ITS</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form action="<?php echo base_url('marketplace/searchResult') ?>" method="post" class="navbar-form navbar-left">
					<div class="input-group src">
			            <input style="border: none; height: 32px" type="text" class="form-control" placeholder="Search" name="srch-term">
			            <div class="input-group-btn">
			                <button type="submit" style="border: none;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			            </div>
			        </div>
				</form>
				<ul class="nav navbar-nav navbar-right" id="nav-top">
					<li <?php if ($page=='home') {echo 'class="active"';} ?> ><a href="<?php echo base_url(); ?>">Home</a></li>
					<li <?php if ($page=='sewa jadwal') {echo 'class="active"';} ?> ><a href="<?php echo base_url('lapangan/sewajadwal'); ?>">Sewa Jadwal</a></li>
					<li class=" <?php if ($page=='product') {echo 'active';} ?> dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Produk <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('marketplace/product/pasminah'); ?>">Pasminah</a></li>
							<li><a href="<?php echo base_url('marketplace/product/kotak'); ?>">Kotak</a></li>
						</ul>
					</li>
					<li class=" <?php if ($page=='login') {echo 'active';} ?> dropdown">

					<?php 
						if ($this->session->has_userdata('username')) {
							echo '
							<a href="'.base_url('marketplace/logout').'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img class="img-circle" style="height: 30px;" src="'.$this->session->userdata('gambar').'"> '.$this->session->userdata('nama').' <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="'.base_url('marketplace/setting').'">Update Profile</a></li>
								<li><a href="'.base_url('marketplace/changePass').'">Change Password</a></li>
								<li><a href="'.base_url('marketplace/#').'">Check Order</a></li>
								<li><a href="'.base_url('marketplace/logout').'">Logout</a></li>
							</ul>
							';
						}
						else{
							echo '<a href="'.base_url('marketplace/login').'">Login</a>';
						}
					 ?>

					</li>
				</ul>
			</div>
		</div>
	</nav>
