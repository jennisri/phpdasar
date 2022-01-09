<?php 
//memanggil file functions
require 'functions.php';
$buku = query("SELECT * FROM buku ");

// tombol cari ditekan
// jika user menekan tombol cari
if(isset($_POST["cari"])){
	// jadi $buku akan berisi data hasil pencarian
	// lalu function cari akan mendapatkan data apapun yang diketikkan usernya
	$buku= cari($_POST["keyword"]);
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Data Buku</h1>

<a href="tambah.php">Tambah Data Buku</a>
<br><br>

<!-- membuat form untuk searching -->
<form action="" method="post">
	<input type="text" name="keyword" autofocus="" placeholder="Masukkan Keyword Pencarian.." autocomplete="off" size="40">
	<button type="submit" name="cari" >Cari!</button>

</form>
<br>



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
			<a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
			<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick= "return confirm('yakin?');">Hapus</a>
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