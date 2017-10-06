            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header"><br>Data Lapangan Futsal Fasor ITS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Lapangan
                        </div>
                        <div class="panel-body">
                        <a class="btn btn-success" href="<?php echo base_url('index.php/admin/inputlapangan') ?>">+ Tambah Lapangan</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th style="width: 250px;">ID Lapangan</th>
                                    <th style="width: 250px;">Nama Lapangan</th>
                                    <th style="width: 250px;">Detail Lapangan</th>
                                    <th style="width: 250px;">Tarif Civitas ITS</th>
                                    <th style="width: 250px;">Tarif Non ITS</th>
                                    <th style="width: 250px;">Gambar</th>
                                    <th style="width: 250px;">Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($jadwal as $d) {?>
                                <tr class="odd gradeX">
                                    <td><?php echo $d['id_lapangan'] ?></td>
                                    <td><?php echo $d['nama_lapangan'] ?></td>
                                    <td class="center"><?php echo $d['detail_lapangan'] ?></td>
                                    <td><?php echo 'Rp. '.number_format($d['tarif_mahasiswa'], 2, ',', '.'); ?></td>
                                    <td><?php echo 'Rp. '.number_format($d['tarif_nonits'], 2, ',', '.'); ?></td>
                                    <td class="center"><img style="width: 200px" src="<?php echo $d['gambar_lapangan'] ?>"></td>
                                    <td class="center">
                                        <a class="btn btn-primary btn-outline" href="<?php echo base_url()."index.php/admin/editData/".$d['id_lapangan']?>">Update</a>
                                        <a class="btn btn-danger btn-outline" href="<?php echo base_url()."index.php/admin/deleteDataLapangan/".$d['id_lapangan']?>">Hapus</a>
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