<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>
	<center>
		<h3><i>Tambah Penyewaan</i></h3>
	</center>
	<form action="<?php echo base_url('lapangan/createsewa'); ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>No</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $kode ?>" readonly name="no" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $this->session->userdata('nama')?>" readonly enabled ></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td>
					<select name="kategori" class="form-control" readonly required>				
						<option>Pelajar</option>
						<option>Umum</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Nomer Identitas</td>
				<td>:</td>
				<td><input onkeypress="return hanyaAngka(event)" type="text" name="nomer_identitas" required></td>
			</tr>
			<tr>
				<td>Nama Lapangan</td>
				<td>:</td>
				<td>
					<input type="text" name="nama_lapangan" value="<?php echo $lapangan[0]['nama_lapangan'];?>" readonly>
				</td>
			</tr>
			<input type="hidden" name="type" value="<?php echo $lapangan[0]['type'];?>" readonly>
			<input type="hidden" name="admin" value="<?php echo $lapangan[0]['pemilik'];?>" readonly>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="date" name="tanggal" value="<?php 
                            $date = date_default_timezone_set('Asia/Jakarta');
                              echo date('Y-m-d');
                             ?>" readonly required></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td>:</td>
				<td><input type="text" name="jam" value="<?php echo $jam;?>" readonly required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="Sewa" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>	
</body>
</html>