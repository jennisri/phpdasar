<?php 
//koneksi ke database
$conn =mysqli_connect("localhost", "root", "", "dasarphp");


//function query
function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] =$row;
	}
	return $rows;
}

function tambah ($book){
	global $conn;

	$judul = htmlspecialchars($book["judul"]);
	$penulis = htmlspecialchars($book["penulis"]);
	$tahunterbit = htmlspecialchars($book["tahunterbit"]);
	$hargabuku = htmlspecialchars($book["hargabuku"]);
	$cover = htmlspecialchars($book["cover"]);
	// query insert data

	$query= "INSERT INTO buku
				VALUES
				('','$judul','$penulis','$tahunterbit','$hargabuku','$cover')

				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

// function tambah ($book){
// 	global $conn;
// 	// tidak menggunakan $_POST karena data akan di kirim ke $book
// 	$judul =htmlspecialchars($book["judul"]);
// 	$penulis =htmlspecialchars($book["penulis"]);
// 	$tahunterbit =htmlspecialchars($book["tahunterbit"]);
// 	$hargabuku =htmlspecialchars($book["hargabuku"]);
// 	$cover =htmlspecialchars($book["cover"]);



// 	$query = "INSERT INTO buku
// 				VALUES 
// 				('','$judul','$penulis','$tahunterbit','$hargabuku','$cover')
// 				";
// 	mysqli_query($conn, $query);

// 	return mysqli_affected_rows($conn);
// }


function hapus($id) {
	global $conn ;
	$query = "DELETE FROM buku WHERE id = $id";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function ubah($book) {
	global $conn;
	$id = $book["id"];
	$judul = htmlspecialchars($book["judul"]);
	$penulis = htmlspecialchars($book["penulis"]);
	$tahunterbit = htmlspecialchars($book["tahunterbit"]);
	$hargabuku = htmlspecialchars($book["hargabuku"]);
	$cover = htmlspecialchars($book["cover"]);
	// query insert data

	$query= " UPDATE buku SET 
				judul ='$judul', 
				penulis='$penulis',
				tahunterbit='$tahunterbit', 
				hargabuku='$hargabuku', 
				cover='$cover'
				WHERE id =$id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);


}









 ?>