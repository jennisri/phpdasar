<?php 
require 'functions.php';

$mahasiswa =query("SELECT * FROM mahasiswa") ;
//ambil data(fetch) mahasiswa dari object result
//ada 4 cara:
//mysqli_fetch_row() // mengembalikan array numerik
//my_syqli_fetch_assoc() // mengembalikan array assosiative
//my_sqli_fetch_array() // mengembalikan keduanya
//mysqli_fetch_object()

// while( $mhs = mysqli_fetch_assoc($result)){
// 	var_dump($mhs);
// }




 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah data mahasiswa</a>
	<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>


		<?php $i = 1; ?>
		<?php foreach( $mahasiswa as $row ) : ?>
		<tr>
			<td><?php echo $i ?></td>
			<td>
				<a href="">Ubah</a> |
				<a href="hapus.php?Id=<?php echo $row["Id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
			</td>
			<td><img src= "img/<?php echo $row["gambar"]; ?>" width="50"></td>
			<td><?php echo $row["nrp"] ;?></td>
			<td><?php echo $row["nama"] ;?></td>
			<td><?php echo $row["email"] ;?></td>
			<td><?php echo $row["jurusan"] ;?></td>
		</tr>
		<?php $i++ ?>
		<?php endforeach; ?>


	</table>

</body>
</html>