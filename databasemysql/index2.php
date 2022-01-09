<?php 
require 'function.php';
$buku = query("SELECT * FROM buku ");



 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Mahasiswa</h1>

<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Aksi</th>
		<th>Cover</th>
		<th>Judul</th>
		<th>Penulis</th>
		<th>Tahun Terbit</th>
		<th>Harga Buku</th>
	</tr>


	<?php $i=1; ?>
	<?php foreach($buku as $row) : ?>
	<tr>
		<td><?php echo $i ?></td>
		<td>
			<a href="">Ubah</a> |
			<a href="">Hapus</a>
		</td>
		<td><img src="img/<?php echo $row["cover"] ?>" width="50"></td>
		<td><?php echo $row["judul"] ?></td>
		<td><?php echo $row["penulis"] ?></td>
		<td><?php echo $row["tahunterbit"] ?></td>
		<td><?php echo $row["hargabuku"] ?></td>
	</tr>
	<?php $i++ ?>
	<?php endforeach ?>


</table>

</body>
</html>