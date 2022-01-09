<?php 

require "functions.php";

// cek apakah tombol login sudah ditekan atau belum
if (isset($_POST["login"])) {

	//menangkap data username dan password
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
	// untuk menghitung ada berpa baris yang dikembalikan dari fungsi select
	if (mysqli_num_rows($result) === 1){

		//cek password nya
		$row= mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			header ("Location:index.php");
			exit;

		}
	}

	$error= true;
}



 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>

	<h1>Halaman Login</h1>

	<?php if (isset($error)) :?>
		<p style="color: red; font-style: italic;">username atau password salah</p>
	<?php endif ?>

	<form action="" method="post">

		<ul>
			<li>
				<label for="username">Username :</label>
				<input type="text" name="username" id="username">
			</li>

			<li>
				<label for="password">Password :</label>
				<input type="password" name="password" id="password">
			</li>

			<li>
				<button type="submit" name="login">Login</button>
			</li>
		</ul>
		


	</form>

</body>
</html>