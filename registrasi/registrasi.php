<?php 
require 'functions.php';

//cek apakah tombol registrasi sudah ditekan

if(isset($_POST["registrasi"])) {

	if (registrasi($_POST) >0 ) {
		echo "<script> 
				alert('User baru berhasil ditambahkan');
			</script>
			";
	}else{
		echo mysqli_error($conn);
	}


}




 ?>




<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style >
		label{
			display: block;
		}
	</style>
</head>
<body>

	<h1>Halaman Registrasi</h1>

	<form action="" method="post">

		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username" required>
			</li>

			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>

			<li>
				<label for="password2">Konfirmasi Password :</label>
				<input type="password" name="password2" id="password2">
			</li>

			<li>
				<button type="submit" name="registrasi">Registrasi</button>
			</li>
		</ul>
		
	</form>

</body>
</html>