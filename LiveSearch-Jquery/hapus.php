<?php 
session_start();
//cek dulu ada tidak session nya
//user sudah login atau belum

if (!isset($_SESSION["login"])) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';
// mengambil id menggunakan GET
$id = $_GET["id"];


if (hapus($id) > 0) {
	echo " 
	<script> 
		alert('data berhasil dihapus');
		document.location.href = 'index.php';
	</script>

		";
		}else {
			echo " 
				<script> 
					alert('data berhasil dihapus');
					document.location.href = 'index.php';
				</script>

		";
		}




 ?>