<?php echo $this->session->userdata('success') ?>
<section class="lapangan">
<div class="container">
  <div class="row">
      <div class="col-md-4">
        <div style="width: 20rem;">
          <a href="<?php echo base_url('lapangan/homePil/'.'futsal');?>">
            <img style="max-height: 500px;" class="card-img-top" src="<?php echo base_url('/assets/lapangan/image/fut.png');?>" alt="Card image cap"> 
          </a>                 
        </div>           
      </div>
      <div class="col-md-4">
        <div style="width: 20rem;">
          <a href="<?php echo base_url('lapangan/homePil/'.'basket');?>">
            <img style="max-height: 500px;" class="card-img-top" src="<?php echo base_url('/assets/lapangan/image/bas.png');?>" alt="Card image cap"> 
          </a>                 
        </div>           
      </div>
      <div class="col-md-4">
        <div style="width: 20rem;">
          <a href="#">
            <img style="max-height: 500px;" class="card-img-top" src="<?php echo base_url('/assets/lapangan/image/bad.png');?>" alt="Card image cap"> 
          </a>                 
        </div>           
      </div>
  </div>
</div>
</section>