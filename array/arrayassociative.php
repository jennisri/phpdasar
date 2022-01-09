<!DOCTYPE html>
<html>
<head>
	<title>Latihan Array Associative</title>
</head>
<body>

<?php 
$book = [
	[
	"cover" => "bintang.jpg",
	"judul" => "Bintang",
	"penulis" => "Tereliye",
	"tahunterbit" => "2009"
	],

	[
	"cover" => "rembulan.jpg",
	"judul" => "Rembulan Tenggelan diWajahmu",
	"penulis" => "Tereliye",
	"tahunterbit" => "2011"
	],

	[
	"cover" => "hujan.jpg",
	"judul" => "Hujan",
	"penulis" => "Tereliye",
	"tahunterbit" => "2017"
	],

	[
	"cover" => "pergi.jpg",
	"judul" => "Pergi",
	"penulis" => "Tereliye",
	"tahunterbit" => "2011"
	]
];

 ?>

 <h1>Daftar Nama Buku</h1>
 <?php foreach ( $book as $buku) : ?>
 <ul>
 	<li>
 		<img src="img/<?php echo $buku ["cover"]; ?>">
 	</li>
 	<li><?php echo $buku["judul"]; ?></li>
 	<li><?php echo $buku["penulis"]; ?></li>
 	<li><?php echo $buku["tahunterbit"]; ?></li>

 </ul>
<?php endforeach; ?>

</body>
</html>