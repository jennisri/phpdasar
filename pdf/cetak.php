<?php 	
// untuk memanggil library yang ada dalam vendor
require_once __DIR__ . '/vendor/autoload.php';

//memanggil file functions
// mengambil ke database
require 'functions.php';
$buku = query("SELECT * FROM buku ");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Buku</title>
 	<link rel="stylesheet" href="css/print.css">
 </head>
 <body>
 		<h1>Daftar Buku</h1>
 		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<th>No.</th>
				<th>Cover</th>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Tahun Terbit</th>
				<th>Harga Buku</th>
			</tr>';


			$i = 1;
			foreach ($buku as $row) {
				$html .= '<tr>
					<td>'. $i++ .'</td>
					<td><img src="img/'. $row["cover"].'" width="50"></td>
					<td>'. $row["judul"].'</td>
					<td>'. $row["penulis"].'</td>
					<td>'. $row["tahunterbit"].'</td>
					<td>'. $row["hargabuku"].'</td>
					
				 </tr>';
			}

			
$html .= '</table>
		 
 </body>
 </html>';
$mpdf->WriteHTML($html);
$mpdf->Output();

 ?>
 