<?php 
require 'functions.php';


//cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"]) ){
//ambil data dari tiap elemen dalam form
	// $nrp =$_POST["nrp"];
	// $nama =$_POST["nama"];
	// $email =$_POST["email"];
	// $jurusan =$_POST["jurusan"];
	// $gambar =$_POST["gambar"];

	//query insert data
	// $query = "INSERT INTO mahasiswa
	// 			VALUES 
	// 			('','$nrp','$nama','$email','$jurusan','$gambar')
	// 			";
	// mysqli_query($conn, $query);

	//apakah data berhasil ditambahkan atau tidak
	// if (mysqli_affected_rows($conn) > 0) {
	// 	echo "berhasil";

	// } else {
	// 	echo "gagal";
	// 	echo "<br>";
	// 	echo mysqli_error($conn);
	// }

	//cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) >0 ) {
		echo "
			<script> 
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script> 
				alert('data gagal ditambahkan');
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="judul">Judul :</label>
				<input type="text" name="judul" id="judul" required>
			</li>
			<li>
				<label for="penulis">Penulis</label>
				<input type="text" name="penulis" id="penulis">
			</li>
			<li>
				<label for="tahunterbit">Tahun Terbit</label>
				<input type="text" name="tahunterbit" id="tahunterbit">
			</li>
			<li>
				<label for="hargabuku">Harga Buku</label>
				<input type="text" name="hargabuku" id="hargabuku">
			</li>
			<li>
				<label for="cover">Cover</label>
				<input type="file" name="cover" id="cover">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data Buku</button>
			</li>
		</ul>
		

	</form>

</body>
</html>