<div class="container">
  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Data Penyewaan Lapangan
                          <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url()."index.php/admin/deleteData/"?>">LAPANGAN A</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url()."index.php/admin/deleteData/"?>">LAPANGAN B</a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url()."index.php/admin/deleteData/"?>">LAPANGAN C</a>
                                </li>
                              </ul>
                            </li>
                        </div>
                        <hr>
                        <div class="panel-body">

                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <h3><center>LAPANGAN</center></h3>
                            <center>
                              <p class="col-md-4" align="center"><select name="kategori" class="form-control">
                                    <option selected="" disabled="">--Category--</option>
                                    <option>Lapangan A</option>
                                    <option>Lapangan B</option>
                                    <option>Lapangan C</option>
                                </select></p>
                            </center>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>KATEGORI</th>
                                    <th>NOMER IDENTITAS</th>
                                    <th>NAMA LAPANGAN</th>
                                    <th>TANGGAL SEWA</th>
                                    <th>JAM</th>
                                    <th>LAMA SEWA</th>                                    
                                    <th>STATUS</th>
                                    <th>HAPUS</th>
                                    <th>NOTA</th>
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
                                   <td><?php echo $g['lama_sewa'] ?></td>
                                   <td><?php if($g['status']==0) {
                                           echo '<a class="btn btn-cancel" style="color: white; background: pink" href="'.base_url('admin/validasi/'.$g['no']).'">Ngutang</a>';
                                       }else{
                                            echo '<a class="btn btn-success btn-outline" style="color: white; background: green;" >Dibayar</a>';
                                       }
                                   ?></td>
                                   <td class="center">
                                        <a class="btn btn-danger btn-outline" href="<?php echo base_url()."index.php/admin/deleteData/".$g['no']?>">Hapus</a>
                                    </td>
                                     <td class="center">
                                          <button class="btn btn-outline" onclick="myFunction()" style="color: white; background: blue">Cetak</button>
                                          <a class="btn btn-outline" href="<?php echo base_url()."index.php/admin/cetaksewa/".$g['no']?>" style="color: white; background: blue">Cetak</a>
                                          <script>
                                          function myFunction() {
                                              window.print();
                                          }
                                          </script></a>
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
</div>
            