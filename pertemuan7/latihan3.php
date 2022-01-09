<?php 

//Array didalam array
$mahasiswa = [
	["Sri Jenni", "025012", "Teknik Informatika", "email"],
	["Jenni", "025012", "Teknik Informatika", "email"],

]
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Daftar Mahasiswa</title>
 </head>
 <body>
 	<h1>Daftar Mahasiswa</h1>


 	<?php foreach ($mahasiswa as $mhs) : ?>
 	<ul>
 		
 			<li><?php echo $mhs[0]; ?></li>
 			<li><?php echo $mhs[1]; ?></li>
 			<li><?php echo $mhs[2]; ?></li>
 			<li><?php echo $mhs[3]; ?></li>
 		
 	</ul>
 	<?php endforeach ?>
 
 </body>
 </html>