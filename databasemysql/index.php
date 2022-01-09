<?php 
//koneksi ke database
$conn =mysqli_connect("localhost", "root", "", "dasarphp");

// ambil data dari tabel buku
$result = mysqli_query($conn, "SELECT * FROM buku");

//ambil data (fetch) dari object result
//ada 4 cara :
// mysqli_fetch_row() -> mengembalikan array numeric
// mysqli_fetch_assoc() -> mengembalikan array associative
// mysqli_fetch_array() -> mengembalikan array numeric dan associative
// mysqli_fetch_object() -> 

// while ($bk = mysqli_fetch_assoc($result)) {
// 	var_dump($bk);
// }








// untuk error
// if (!$result) {
// 	echo mysqli_error($conn);
// }

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
	<?php while ($row = mysqli_fetch_assoc($result)) : ?>
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
	<?php endwhile ?>


</table>

</body>
</html>