<?php 
require '../functions.php';

// keyword dapat dari ajax yang dikirim ke sini
$keyword = $_GET["keyword"];

$query = "SELECT * FROM buku 
				WHERE 

			-- menggunakan LIKE karena pada saat pencarian biarpun nama yang dituliskan hanya nama depan
			-- tetapi tampilan yang muncul akan menampilkan nama yang mengandung data yang telah user inputkan
			-- penggunaan keyword merupakan data apa yang dimasukkan dalam input keyword
			-- menggunakan % pada depan dan belakang
			-- agar ketika dicari nama belakang juga ttp dieksekusi
			judul LIKE '%$keyword%' OR
			penulis LIKE '%$keyword%' OR
			tahunterbit LIKE '%$keyword%' OR
			hargabuku LIKE '%$keyword%'

	";
$buku = query($query);


 ?>
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