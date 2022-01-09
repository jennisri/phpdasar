phpphp<?php 

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] =$row;
	}
	return $rows;

}

// function tambah akan menerima inputan berupa data
// terserah mau data apa cth $mhs
function tambah ($mhs){
	global $conn;
	// tidak menggunakan $_POST karena data akan di kirim ke $mhs
	$nrp =htmlspecialchars($mhs["nrp"]);
	$nama =htmlspecialchars($mhs["nama"]);
	$email =htmlspecialchars($mhs["email"]);
	$jurusan =htmlspecialchars($mhs["jurusan"]);
	$gambar =htmlspecialchars($mhs["gambar"]);



	$query = "INSERT INTO mahasiswa
				VALUES 
				('','$nrp','$nama','$email','$jurusan','$gambar')
				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($Id){
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE Id = $Id");
	return mysqli_affected_rows($conn);
}









?>