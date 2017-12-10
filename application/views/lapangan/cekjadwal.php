<div class="container">
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h2>Jadwal Booking</h2>
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
                                </tr>
                            </thead>
                            <tbody>
                           <?php foreach ($jadwal as $g) { ?>
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
                                

                            <?php } ?>
                            </tbody>
                            <tbody>
                              </tr>

                                <tr class="odd gradeX">
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td>
                                        <a class="btn btn-danger btn-outline" href="<?php echo base_url()."lapangan/inputsewa/".$g['admin']?>">Sewa</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
            