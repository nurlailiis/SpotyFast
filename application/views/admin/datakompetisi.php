            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header"><br>Data Kompetisi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                        <a class="btn btn-success" href="<?php echo base_url('index.php/admin/inputlapangan') ?>">+ Tambah Kompetisi</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="width: 250px;">ID Kompetisi</th>
                                    <th style="width: 250px;">Nama Kompetisi</th>
                                    <th style="width: 250px;">Tanggal</th>
                                    <th style="width: 250px;">Penyelenggara</th>
                                    <th style="width: 250px;">Lokasi</th>
                                    <th style="width: 250px;">Gambar</th>
                                    <th style="width: 250px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($datakompetisi as $d) {?>
                                <tr class="odd gradeX">
                                    <td><?php echo $d['id_kompetisi'] ?></td>
                                    <td><?php echo $d['nama_kompetisi'] ?></td>
                                    <td class="center"><?php echo $d['tanggal_kompetisi'] ?></td>
                                    <td><?php echo $d['penyelenggara'] ?></td>
                                    <td><?php echo $d['lokasi_kompetisi'] ?></td>
                                    <td class="center"><img style="width: 200px" src="<?php echo $d['gambar_kompetisi'] ?>"></td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-outline" href="<?php echo base_url()."index.php/admin/editDataKompetisi/".$d['id_kompetisi']?>">Update</a>
                                        <a class="btn btn-danger btn-outline" href="<?php echo base_url()."index.php/admin/deleteDataKompetisi/".$d['id_kompetisi']?>">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
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

</html>
