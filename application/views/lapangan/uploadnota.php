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
	<?php echo form_open_multipart(base_url('lapangan/upnota'));?>
		<table style="margin:20px auto;">
			<tr>
				<td>No</td>
				<td>:</td>
				<td><input type="text" value="<?php echo $jadwal ?>" readonly name="no" required></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td><p class="col-md-6"><input type="file" name="gambar"></p></td>
			</tr>

			<tr>
				<td></td>
				<td></td>
				<?php 
				$date = date_default_timezone_set('Asia/Jakarta');
    			echo date('Y-m-d H:i:s');
				 ?>
				<td><p class="col-lg-12"><input type="submit" value="Add" class="btn btn-warning"></td>
			</tr>
		</table>
	<?php echo form_close() ?>
</body>
</html>