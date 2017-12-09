<div class="container">
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>History Booking</h2>
                        </div>
                        <hr>
                        <div class="panel-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Nomer Identitas</th>
                                    <th>Nama Lapangan</th>
                                    <th>Tanggal Sewa</th>
                                    <th>Jam</th>
                                    <th>Lama Sewa</th>                                    
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php foreach ($sewajadwal as $g) { ?>
                                <tr class="odd gradeX">
                                   <td><?php echo $g['no'] ?></td>
                                   <td><?php echo $g['nama'] ?></td>
                                   <td><?php echo $g['kategori'] ?></td>
                                   <td><?php echo $g['nomer_identitas'] ?></td>
                                   <td><?php echo $g['nama_lapangan'] ?></td>
                                   <td><?php echo $g['tanggal'] ?></td>
                                   <td><?php echo $g['jam'] ?></td>
                                   <td><?php echo $g['lama_sewa'] ?> Jam</td>
                                   <td><?php if($g['status']==0) {
                                           echo '<a class="btn btn-secondary btn-outline" >Ngutang</a>';
                                       }else{
                                            echo '<a class="btn btn-success btn-outline" >Dibayar</a>';
                                       }

                                   ?></td>
                                   <td><a class="btn btn-danger btn-outline" href="<?php echo base_url()."lapangan/uploadnota/".$g['no']?>">Upload</a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
            