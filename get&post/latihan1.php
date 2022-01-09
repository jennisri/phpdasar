<?php 
//variable scope / lingkup variabel

// $x = 10;

// function tampilx(){
// 	global $x;
// 	echo $x;
// }

// tampilx();

//SUPERGLOBALS
// variable global milik PHP
// merupakan Array Associative
// var_dump($_SERVER);

// var_dump($_GET);


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

 <!DOCTYPE html>
 <html>
 <head>
 	<title>GET</title>
 </head>
 <body>
 <h1>Daftar Buku</h1>
 <ul>
 <?php foreach ($book as $buku) : ?>
 	
 	<li>
 		<a href="latihan2.php?judul=<?php echo $buku["judul"] ?>&penulis=<?php echo $buku["penulis"] ?>&tahunterbit=<?php echo $buku["tahunterbit"] ?>&cover=<?php echo $buku["cover"] ?>"><?php echo $buku["judul"]; ?></a>
 			
 	</li>

 <?php endforeach; ?>
 	
 </ul>
 </body>
 </html>

