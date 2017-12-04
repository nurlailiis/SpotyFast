<div class="container">
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>Tabel Sewa Jadwal</h2>
                        </div>
                        <hr>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Penyelenggara</th>
                                    <th>Lokasi</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php foreach ($kompetisi as $g) { ?>
                                <tr class="odd gradeX">
                                   <td><?php echo $g['id_kompetisi'] ?></td>
                                    <td><?php echo $g['nama_kompetisi'] ?></td>
                                    <td><?php echo $g['tanggal_kompetisi'] ?></td>
                                    <td><?php echo $g['penyelenggara'] ?></td>
                                    <td><?php echo $g['lokasi_kompetisi'] ?></td>
                                    <td class="center"><img style="width: 200px" src="<?php echo $g['gambar_kompetisi'] ?>"></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <p class="col-md-12">
                          <a class="btn btn-primary" href="<?php echo base_url('lapangan/inputsewa'); ?>">Sewa</a> 
                        </p>                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
            