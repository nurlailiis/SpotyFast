	<section class="lapangan">
		<div class="container">
			<h1>Detail Lapangan</h1>
			<hr>
			<?php foreach ($lapangan as $l) {?>
				<div class="row">
					<div class="col-md-6">
						<img class="main-img" src="<?php echo $l['gambar_kompetisi'] ?>">
					</div>
					<div class="col-md-6">
						<h1><?php echo $l['nama_kompetisi'] ?></h1>
						<br>
						<p class="prc"><?php echo $l['detail_kompetisi'] ?></p>
						<p class="prc">Tanggal Kompetisi: <?php echo $l['tanggal_kompetisi'] ?></p>
          				<p class="prc">Penyelenggara: <?php echo $l['penyelenggara'] ?></p>
          				<p class="prc">Lokasi: <?php echo $l['lokasi_kompetisi'] ?></p>
						<br>						
					</div>
					<?php } ?>
				</div>
		</div>
	</section>