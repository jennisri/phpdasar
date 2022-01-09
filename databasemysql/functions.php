<?php 
//koneksi ke database
$conn =mysqli_connect("localhost", "root", "", "dasarphp");

// ambil data dari tabel buku
// $result = mysqli_query($conn, "SELECT * FROM buku");

//ambil data (fetch) dari object result
//ada 4 cara :
// mysqli_fetch_row() -> mengembalikan array numeric
// mysqli_fetch_assoc() -> mengembalikan array associative
// mysqli_fetch_array() -> mengembalikan array numeric dan associative
// mysqli_fetch_object() -> 

// while ($bk = mysqli_fetch_assoc($result)) {
// 	var_dump($bk);
// }
//function query
function query($query){
	// dilakukan global agar variabel conn bisa digunakan didalam array
	global $conn;
	// membuat variabel baru yang berisikan mysqli_query 
	// dimana $query mengarah pada perintah di index dua $buku
	$result = mysqli_query($conn, $query);
	//pembuatan variabel kosong yang berfungsi sebagai wadah setelah database
	$rows = [];
	// dilakukan pengulangan untuk menampilkan seluruh data yang ada pada tabel buku
	while ($row = mysqli_fetch_assoc($result)){
		// menampilkan data row pada variabel kosong tadi
		$rows[] =$row;
	}
	// data dikembalikan``
	return $rows;
}
// untuk error
// if (!$result) {
// 	echo mysqli_error($conn);
// }

 ?>