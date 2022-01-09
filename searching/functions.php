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

// mengambil $keyword dari index.php
function cari($keyword){

	$query = "SELECT * FROM buku 
				WHERE 

			-- menggunakan LIKE karena pada saat pencarian biarpun nama yang dituliskan hanya nama depan
			-- tetapi tampilan yang muncul akan menampilkan nama yang mengandung data yang telah user inputkan
			-- penggunaan keyword merupakan data apa yang dimasukkan dalam input keyword
			-- menggunakan % pada depan dan belakang
			-- agar ketika dicari nama belakang juga ttp dieksekusi
			judul LIKE '%$keyword%' OR
			penulis LIKE '%$keyword%' OR
			tahunterbit LIKE '%$keyword%' OR
			hargabuku LIKE '%$keyword%'

	";

	return query ($query);
}






 ?>