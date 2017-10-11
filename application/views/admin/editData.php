<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        
                    </h1>
                    <h1 class="page-header">Data Penyewaan Futsal Fasor ITS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Data Penyewaan Futsal Fasor ITS
                        </div>
                        <h6>Edit</h6>
                        <div class="panel-body">
                        <?php echo form_open_multipart(base_url('index.php/admin/do_editData')); ?>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Id lapangan" name="id" value="<?php echo $id_lapangan ?>"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Product Name" name="nama" value="<?php echo $nama_lapangan ?>"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Detail" name="detail" value="<?php echo $detail_lapangan ?>"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Price" name="tarif_mahasiswa" value="<?php echo $tarif_mahasiswa ?>"></p>
                                <p class="col-md-6"><input type="text" class="form-control" placeholder="Price" name="tarif_nonits" value="<?php echo $tarif_nonits ?>"></p>
                                <p class="col-md-6">
                                    <img style="width: 300px" src="<?php echo $gambar_lapangan ?>">
                                    <input type="file" class="form-control" placeholder="Picture" name="gambar" value="<?php echo $gambar_lapangan ?>">
                                </p>
                                <br>
                                <p class="col-lg-12"><input type="submit" value="Update" class="btn btn-warning" name=""></p>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
            
</div>

    </div>