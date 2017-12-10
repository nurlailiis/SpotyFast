<?php echo $this->session->userdata('success') ?>
<div class="col-md-12">
  <h2 class="page-header" align="center">DBL Basketball Court</h2>
</div>
<div class="col-md-12">
  <h3 class="page-header" align="center">Jl. Frontage Ahmad Yani Siwalankerto No.88, Surabaya.</h3>
</div>
<section class="lapangan">
<div class="container">
  <div class="row">
    <?php foreach ($lapangan as $l){?>
      <div class="col-md-12" align="center">
        <div class="card" style="width: 20rem;">
        <div class="img">
          <img style="max-height: 170px;" class="card-img-top" src="<?php echo $l['gambar_lapangan'] ?>" alt="Card image cap">
        </div>                   
          <div class="card-body">
          <h4 class="card-title"><?php echo $l['nama_lapangan'] ?></h4>
          <p class="card-text">Tarif Student: <?php echo $l['tarif_student'] ?></p>
          <p class="card-text">Tarif Umum: <?php echo $l['tarif_umum'] ?></p>
          <a href="<?php echo base_url('lapangan/detail/'.$l["id_lapangan"]) ?>" class="btn btn-primary">Detail</a>
          </div>
        </div>           
      </div>
    <?php } ?>
  </div>
</div>
</section>