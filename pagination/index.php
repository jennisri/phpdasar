<?php 

session_start();
//cek dulu ada tidak session nya
//user sudah login atau belum

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

//memanggil file functions
require 'functions.php';

// KONFIGURASI 
$jmldataperhalaman = 2;
$jmldata = count(query("SELECT * FROM buku"));

$jmlhalaman = ceil ($jmldata / $jmldataperhalaman);


//menggunakan ternary 
$halamanaktif = isset($_GET['halaman'])? $_GET['halaman'] : 1;

$awaldata = ($jmldataperhalaman * $halamanaktif) - $jmldataperhalaman;


$buku = query("SELECT * FROM buku LIMIT $awaldata, $jmldataperhalaman ");

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

<a href="logout.php">Logout</a>

<h1>Daftar Data Buku</h1>

<a href="tambah.php">Tambah Data Buku</a>
<br><br>

<!-- membuat form untuk searching -->
<form action="" method="post">
	<input type="text" name="keyword" autofocus="" placeholder="Masukkan Keyword Pencarian.." autocomplete="off" size="40">
	<button type="submit" name="cari" >Cari!</button>

</form>
<br>
<br>

<!--Navigasi  -->
<?php if($halamanaktif > 1) : ?>
<a href="?halaman=<?php echo $halamanaktif -1 ?>">&laquo;</a>
<?php endif ?>

<?php for($i=1; $i<=$jmlhalaman; $i++) : ?>
	<?php if ($i == $halamanaktif) : ?>
		<a href="?halaman=<?php echo $i ?>" style="font-weight: bold; color: red"><?php echo $i ?></a>
	<?php else : ?>
	<a href="?halaman=<?php echo $i ?>"><?php echo $i?></a>
<?php endif ?>
<?php endfor ?>


<?php if($halamanaktif < $jmlhalaman) : ?>
<a href="?halaman=<?php echo $halamanaktif + 1 ?>">&raquo;</a>
<?php endif ?>





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