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
	<form action="<?php echo base_url(). 'lapangan/createsewa'; ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>No</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $kode ?>" readonly name="no" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><input type="text" name="nama" required ></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>:</td>
				<td>
					<select name="kategori" class="form-control" required>
						<option>Mahasiswa</option>
						<option>Non ITS</option>
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
					<select name="nama_lapangan" class="form-control" required>
						<option>Lapangan A</option>
						<option>Lapangan B</option>
						<option>Lapangan C</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="date" name="tanggal" required></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td>:</td>
				<td><input type="time" name="jam" required></td>
			</tr>
			<tr>
				<td>Lama Sewa</td>
				<td>:</td>
				<td>
					<select name="lama_sewa" class="form-control" required>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
				</td>
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