<?php 
function salam($waktu,$nama) {
	return "selamat $waktu, $nama ";
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Latihan Function</title>
 </head>
 <body>

 	<h1><?= salam("pagi","jenni") ?></h1>
 
 </body>
 </html>