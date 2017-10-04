<div class="container">
  <div class="row">
    <!-- <?php foreach ($lapangan as $l){?>
     -->  <div class="col-md-4">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" src="<?php echo $l['gambar_lapangan'] ?>" alt="Card image cap">
          <div class="card-body">
          <h4 class="card-title"><?php echo $l['nama_lapangan'] ?></h4>
          <p class="card-text">Tarif Mahasiswa: <?php echo $l['tarif_mahasiswa'] ?></p>
          <p class="card-text">Tarif Non ITS: <?php echo $l['tarif_nonits'] ?></p>
          <a href="<?php echo base_url('lapangan/detail') ?>" class="btn btn-primary">Detail</a>
          </div>
        </div>      
      </div>
    <?php } ?>
  </div>
</div>