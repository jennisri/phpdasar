<?php 
require 'functions.php';

// ambil data di url
$id= $_GET["id"];

// query data nuku berdasarkan id
$book = query("SELECT * FROM buku WHERE id=$id")[0];


//cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"]) ){

	//cek apakah data berhasil ditambahkan atau tidak
	if (ubah($_POST) >0 ) {
		echo "
			<script> 
				alert('data berhasil diubah');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script> 
				alert('data gagal diubah');
				document.location.href = 'index.php';
			</script>
		";
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit data mahasiswa</title>
</head>
<body>
	<h1>Edit Data Mahasiswa</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $book["id"]; ?>">
		<ul>
			<li>
				<label for="judul">Judul :</label>
				<input type="text" name="judul" id="judul" required value="<?php echo $book["judul"] ?>">
			</li>
			<li>
				<label for="penulis">Penulis</label>
				<input type="text" name="penulis" id="penulis" value="<?php echo $book["penulis"] ?>">
			</li>
			<li>
				<label for="tahunterbit">Tahun Terbit</label>
				<input type="text" name="tahunterbit" id="tahunterbit" value="<?php echo $book["tahunterbit"] ?>">
			</li>
			<li>
				<label for="hargabuku">Harga Buku</label>
				<input type="text" name="hargabuku" id="hargabuku" value="<?php echo $book["hargabuku"] ?>">
			</li>
			<li>
				<label for="cover">Cover</label>
				<input type="text" name="cover" id="cover" value="<?php echo $book["cover"] ?>">
			</li>
			<li>
				<button type="submit" name="submit">Edit Data Buku</button>
			</li>
		</ul>
		

	</form>

</body>
</html>