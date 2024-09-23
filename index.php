<?php
	$koneksi=mysqli_connect("localhost","root","","latihan");
	if (isset($_POST['simpan'])) {
		$nim_npm=mysqli_real_escape_string($koneksi, $_POST['nim_npm']);
		$nama=mysqli_real_escape_string($koneksi, $_POST['nama']);
		$angkatan=mysqli_real_escape_string($koneksi, $_POST['angkatan']);
		$jurusan=mysqli_real_escape_string($koneksi, $_POST['jurusan']);
		$simpan=mysqli_query($koneksi,"INSERT INTO data_mhs VALUES('$nim_npm','$nama','$angkatan','$jurusan')");
		if ($simpan) {
			echo "<script>window.alert('Data Mahasiswa berhasil disimpan')window.location='index.php'</script>";
		}else{
			echo "<script>window.alert('Data Mahasiswa gagal disimpan')window.location='index.php'</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<div class="center">
<div class="container">
	<center>
		<div class="row">
		<h2 class="center">Form Input Data Mahasiswa</h2>
		<form action="" method="post">
			<table border="0">
			<tr>
				<td>
					Nim/Npm
				</td>
				<td>
					<input type="text" placeholder="Nim/Npm" name="nim_npm" required>
				</td>
			</tr>
			<tr>
				<td>Nama Mahasiswa</td>
				<td>
					<input type="text" placeholder="Nama" name="nama" required>
				</td>
			</tr>
			<tr>
				<td>Angkatan</td>
				<td>
					<input type="number" placeholder="Angkatan" maxlength="4" name="angkatan" required>
				</td>
			</tr>
			<tr>
				<td>Jurusan/Prodi</td>
				<td>
					<input type="text" name="jurusan" placeholder="Jurusan/Prodi" required>
				</td>
			</tr>
			<tr>
				<td colspan="2"></td>
			</tr>
			<tr>
				<td colspan="2">
					<div class="parent"><input type="submit" name="simpan" value="Simpan Data"></div>
				</td>
			</tr>
			</table>
		</form>
		<br>
		<table border="1" cellpadding="6" cellspacing="0">
			<tr>
				<td>No.</td>
				<td>Nim/Npm</td>
				<td>Nama</td>
				<td>Angkatan</td>
				<td>Jurusan/Prodi</td>
			</tr>
			<?php 
			$no=1;
			$data_mhs=mysqli_query($koneksi,"SELECT * FROM data_mhs ORDER BY nama ASC");
			while ($tampil_mhs=mysqli_fetch_array($data_mhs)) {
				?>
			<tr>
				<td><?= $no++; ?>.</td>
				<td><?= $tampil_mhs['nim_npm']; ?></td>
				<td><?= $tampil_mhs['nama']; ?></td>
				<td><?= $tampil_mhs['angkatan']; ?></td>
				<td><?= $tampil_mhs['jurusan']; ?></td>
			</tr>
		<?php } ?>
		</table>
	</div>
	</center>
</div>
</div>
</body>
</html>