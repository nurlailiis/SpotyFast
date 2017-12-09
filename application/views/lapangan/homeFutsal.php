
<?php echo $this->session->userdata('success') ?>
<div class="col-md-12">
  <h2 class="page-header" align="center">Daftar GOR FUTSAL</h2>
</div>
<section class="lapangan">
<div class="container">
  <div class="row">
    <?php foreach ($lapangan as $l){?>
      <div class="col-md-4">
        <div class="card" style="width: 20rem;">
        <div class="img">
          <img style="max-height: 170px;" class="card-img-top" src="<?php echo $l['gambar_lapangan'] ?>" alt="Card image cap">
        </div>                   
          <div class="card-body">
          <h4 class="card-title"><?php echo $l['nama_lapangan'] ?></h4>
          <p class="card-text">Detail Lapangan: <?php echo $l['detail_lapangan'] ?></p>
          <p class="card-text">Tarif Mhs: <?php echo $l['tarif_student'] ?></p>
          <p class="card-text">Tarif umum: <?php echo $l['tarif_umum'] ?></p>
          <a href="<?php echo base_url('lapangan/detail/'.$l["id_lapangan"]) ?>" class="btn btn-primary">Detail</a>
          </div>
        </div>           
      </div>
    <?php } ?>
  </div>
</div>
</section>