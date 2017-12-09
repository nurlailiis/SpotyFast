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
		<h3><i>upload nota</i></h3>
	</center>
	<form action="<?php echo base_url('lapangan/upload'); ?>" method="post">
		<table style="margin:20px auto;">
			<tr>
				<td>No</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $kode ?>" readonly name="no" required></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><p class="col-md-6"><input type="file" placeholder="gambar" name="gambar"></p></td>
			</tr>

			<tr>
				<td></td>
				<td><!--<input type="submit" value="Sewa" class="btn btn-primary">--></p></td>

				<td><p class="col-lg-12"><input type="submit" value="Add" class="btn btn-warning" name=""></td>
			</tr>
		</table>
	</form>	
</body>
</html>