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
                          <h5 align="right">
                            <?php 
                            $date = date_default_timezone_set('Asia/Jakarta');
                              echo date('Y-m-d H:i:s');
                             ?>
                          </h5>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Nama Lapangan</th>                                   
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php foreach ($jadwal as $g) { ?>
                                <tr class="odd gradeX">
                                  <td><input type="text" name="jam" readonly value="<?php echo $g['jam'] ?>"></td>
                                   <td><input type="text" name="nama_lapangan" readonly value="<?php echo $g['nama_lapangan'] ?>"></td>
                                   <td><?php if($g['status']==0) {
                                           echo '<a class="btn btn-secondary btn-outline" href="'.base_url('lapangan/inputsewa/'.$g['jam'].'/'.$id).'">Available</a>';
                                       }else{
                                            echo '<a class="btn btn-success btn-outline">Booked</a>';
                                       }

                                   ?></td>
                                

                            <?php } ?>
                            
                        </table>                        
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
            