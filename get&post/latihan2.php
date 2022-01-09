<?php 
// cek apakah tidak ada data di $_GET 
if (!isset($_GET["judul"]) || 
	!isset($_GET["penulis"]) ||
	!isset($_GET["tahunterbit"]) ||
	!isset($_GET["cover"])

) {
	//redirect
	header("Location: latihan1.php");
	exit;
}




 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Buku</title>
</head>
<body>

<ul>
	<li><img src="img/<?php echo $_GET["cover"] ?>"></li>
	<li><?php echo $_GET["judul"] ?></li>
	<li><?php echo $_GET["penulis"] ?></li>
	<li><?php echo $_GET["tahunterbit"] ?></li>



</ul>
<a href="latihan1.php">kembali ke Daftar Buku</a>

</body>
</html>