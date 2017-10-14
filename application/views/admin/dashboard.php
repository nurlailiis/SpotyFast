<body>
    <!-- /#wrapper -->

     <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                <br></br>
                    <div class="col-lg-12">
                        <!-- <form action="<?php echo base_url('index.php/admin/search_keyword');?>" method = "post">
                            <input type="text" name = "keyword" />
                            <input type="submit" value = "Search" />
                            </form> -->
                        <h1 class="page-header">
                            Dashboard <small></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <br></br>
                            <li>
                            <p>
                                Selamat Datang Admin Futsal Fasor ITS, anda memiliki hak pada panel Admin Banboo.id. Hak Anda sebagai berikut :
                                <br></br>
                                1. Merubah dan Memasukkan Data Lapangan yang disewakan oleh Fasor ITS baik untuk civitas atau non-civitas ITS
                                <br></br>
                                2. Menambahkan Data Penyewaan Lapangan Fasor ITS baik untuk civitas atau non-civitas ITS
                                <br></br>
                                3. Menghapus Data Penyewaan Lapangan Fasor ITS baik untuk civitas atau non-civitas ITS
                                <br></br>
                                4. Mengakses Data Penyewaan Lapangan Fasor ITS baik untuk civitas atau non-civitas ITS
                            </p>
                            </li>

                        </ol>
                    </div>
                </div>

                <div class="col-lg-6 col-md-3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><strong>Dashboard</strong></div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('index.php/admin/login') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Selengkapnya..</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><strong>Data Lapangan</strong></div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url('index.php/admin/inputlapangan') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Selengkapnya..</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div><strong>Data Penyewaan</strong></div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Selengkapnya..</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/metisMenu/metisMenu.min.js') ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/admin/vendor/raphael/raphael.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/vendor/morrisjs/morris.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/data/morris-data.js') ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/js/sb-admin-2.js') ?>"></script>

</body>