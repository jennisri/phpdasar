<?php 

$mahasiswa = [
	["Sri Jenni Murniati","0250125540119065","Teknik Informatika","srijenni622@gmail.com"],
	["Sri Jenni Murniati","0250125540119065","Teknik Informatika","srijenni622@gmail.com"],
	["Sri Jenni Murniati","0250125540119065","Teknik Informatika","srijenni622@gmail.com"]
];

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
 		<!-- <?php foreach ($mahasiswa as $mhs ) : ?>
 			<li><?php echo $mhs ?></li>

 		<?php endforeach ?>
 -->
 		<li>Nama :<?php echo $mhs[0] ?></li>
 		<li>NIM :<?php echo $mhs[1] ?></li>
 		<li>Jurusan :<?php echo $mhs[2] ?></li>
 		<li>Email :<?php echo $mhs[3] ?></li>
 	</ul>
 <?php endforeach ?>
 
 </body>
 </html>