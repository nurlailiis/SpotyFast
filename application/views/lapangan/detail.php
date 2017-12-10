	<section class="lapangan">
		<div class="container">
			<h1>Detail Lapangan</h1>
			<hr>
			<?php foreach ($lapangan as $l) {?>
				<div class="row">
					<div class="col-md-6">
						<img class="main-img" src="<?php echo $l['gambar_lapangan'] ?>">
					</div>
					<div class="col-md-6">
						<h1><?php echo $l['nama_lapangan'] ?></h1>
						<p class="prc"><?php echo $l['detail_lapangan'] ?></p>
						<br>
						<p class="prc"><?php echo 'Rp. '.number_format($l['tarif_student'], 2, ',', '.'); ?>/jam untuk Pelajar</p>
						<p class="prc"><?php echo 'Rp. '.number_format($l['tarif_umum'], 2, ',', '.'); ?>/jam untuk Umum</p>
						<br>
						<?php
							$this->session->set_userdata(array('lapangan' => $l['nama_lapangan'])); 
						?>
						<a href="<?php echo base_url('lapangan/jadwal/'.$l['id_lapangan'])?>" class="btn btn-primary">Cek jadwal</a>
					</div>
					<?php } ?>
				</div>
		</div>
	</section>