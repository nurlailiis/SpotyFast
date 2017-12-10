<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/admin/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/js/sb-admin.css') ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url('assets/admin/css/plugins/morris.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/admin/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('index.php/admin/dashboard') ?>">PANEL ADMIN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Welcome <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php 
                            if ($this->session->has_userdata('username_admin')) {
                                echo '
                                    <li>
                                        <a>'.$this->session->userdata('username_admin').'
                                        </a>
                                    </li>
                                    <li>
                                        <a href=" '.base_url('index.php/admin/logout').'"><i class="fa fa-fw fa-gear"></i>Logout
                                        </a>
                                    </li>
                                    ';
                                    }
                            else{
                                echo '
                                    <li>
                                        <a href="'.base_url('index.php/admin/setting').'"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href=" '.base_url('index.php/admin/logout').'"><i class="fa fa-fw fa-gear"></i>Logout
                                        </a>
                                    </li>
                                    ';
                                    }
                        ?>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo base_url('index.php/admin/dashboard') ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/inputkompetisi') ?>"><i class="fa fa-fw fa-edit"></i> Input Data Kompetisi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/inputlapangan') ?>"><i class="fa fa-fw fa-edit"></i> Input Data Lapangan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/datalapangan') ?>"><i class="fa fa-fw fa-table"></i> Data Lapangan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/datakompetisi') ?>"><i class="fa fa-fw fa-table"></i> Data Kompetisi</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/admin/datapenyewaan') ?>"><i class="fa fa-fw fa-edit"></i> Data Penyewaan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

</head>