<body>

    <br></br>
     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lapangan </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Lapangan 
                        </div>
                        <div class="panel-body">
                        <?php echo form_open_multipart(base_url('index.php/admin/tambahLapangan')); ?>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Id Lapangan" name="id"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Nama Lapangan" name="nama"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Detail Lapangan" name="detail"></p>
                                <input type="hidden" name="type" value = "<?php echo $this->session->userdata('type')?>">
                                <input type="hidden" name="admin" value = "<?php echo $this->session->userdata('username')?>">
                                <p class="col-md-6"><input type="number" class="form-control" placeholder="Tarif Pelajar" name="tarifmhs"></p>
                                <p class="col-md-6"><input type="number" class="form-control" placeholder="Tarif Umum" name="tarifnon"></p>
                                <p class="col-md-6"><input type="file" placeholder="gambar" name="gambar"></p>
                                <br>
                                <p class="col-lg-12"><input type="submit" value="Add" class="btn btn-warning" name=""></p>
                        <?php echo form_close(); ?>
                        <p class="col-lg-12"> <a href="<?php echo base_url().'index.php/admin/login'?>" class="btn btn-success btn-outline" name="Back" style="font-size: 15px; padding-top: 10px">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            
</div>

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