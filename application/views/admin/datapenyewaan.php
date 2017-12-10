<div class="container">

    <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header"><br></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
          <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <h3><center>DATA HISTORY PENYEWAAN LAPANGAN</center></h3>
                        </div>
                            
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>TYPE</th>
                                    <th>NAMA</th>
                                    <th>KATEGORI</th>
                                    <th>NOMER IDENTITAS</th>
                                    <th>NAMA LAPANGAN</th>
                                    <th>TANGGAL SEWA</th>
                                    <th>JAM</th>
                                    <th>NOTA PEMBAYARAN</th>                                   
                                    <th>STATUS</th>
                                    <th>HAPUS</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php foreach ($jadwal as $g) { ?>
                                <tr class="odd gradeX">
                                   <td><?php echo $g['no'] ?></td>
                                   <td><?php echo $g['type'] ?></td>
                                   <td><?php echo $g['nama'] ?></td>
                                   <td><?php echo $g['kategori'] ?></td>
                                   <td><?php echo $g['nomer_identitas'] ?></td>
                                   <td><?php echo $g['nama_lapangan'] ?></td>
                                   <td><?php echo $g['tanggal'] ?></td>
                                   <td><?php echo $g['jam'] ?></td>
                                   <td class="center"><img style="width: 200px" src="<?php echo $g['nota_pembayaran'] ?>"></td>
                                   <td><?php if($g['status']==0) {
                                           echo '<a class="btn btn-cancel" style="color: white; background: pink" href="'.base_url('admin/validasi/'.$g['no']).'">Decline</a>';
                                       }else{
                                            echo '<a class="btn btn-success btn-outline" style="color: white; background: green;" >Accept</a>';
                                       }
                                   ?></td>
                                   <td class="center">
                                        <a class="btn btn-danger btn-outline" href="<?php echo base_url()."index.php/admin/deleteData/".$g['no']?>">Hapus</a>
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
            