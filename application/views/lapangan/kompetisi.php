<?php echo $this->session->userdata('success') ?>
<div class="col-md-12">
  <h2 class="page-header" align="center">Daftar Kompetisi</h2>
</div>
<section class="lapangan">
<div class="container">
  <div class="row">
    <?php foreach ($kompetisi as $l){?>
      <div class="col-md-4">
        <div class="card" style="width: 20rem;">
        <div class="img">
          <img style="max-height: 170px;" class="card-img-top" src="<?php echo $l['gambar_kompetisi'] ?>" alt="Card image cap">
        </div>                   
          <div class="card-body">
          <h4 class="card-title"><?php echo $l['nama_kompetisi'] ?></h4>
          <p class="card-text">Tanggal Kompetisi: <?php echo $l['tanggal_kompetisi'] ?></p>
          <p class="card-text">Penyelenggara: <?php echo $l['penyelenggara'] ?></p>
          <p class="card-text">Lokasi: <?php echo $l['lokasi_kompetisi'] ?></p>
          <a href="<?php echo base_url('lapangan/detailkompetisi/'.$l["id_kompetisi"]) ?>" class="btn btn-primary">Detail</a>
          </div>
        </div>           
      </div>
    <?php } ?>
  </div>
</div>
</section>